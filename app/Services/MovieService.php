<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MovieService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('omdb.api_key');
    }

    protected function httpClient()
    {
        $client = Http::acceptJson();

        if (! config('omdb.verify_ssl', true)) {
            $client = $client->withoutVerifying();
        }

        return $client->timeout(10);
    }

    public function search($query, $page = 1)
    {
        try {
            $url = rtrim(config('omdb.base_url'), '/');
            $response = $this->httpClient()->get($url, [
                'apikey' => $this->apiKey,
                's'      => $query,
                'page'   => $page,
                'type'   => 'movie',
            ]);

            if ($response->failed()) {
                $body = $response->json();
                $errorMessage = $body['Error'] ?? 'Gagal menghubungi API.';

                Log::error('OMDB HTTP failure', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                return [
                    'movies' => [],
                    'total'  => 0,
                    'error'  => $errorMessage,
                ];
            }

            $data = $response->json();

            if (isset($data['Response']) && $data['Response'] === 'True') {
                return [
                    'movies' => $data['Search'],
                    'total'  => (int) $data['totalResults'],
                    'error'  => null,
                ];
            }

            return [
                'movies' => [],
                'total'  => 0,
                'error'  => $data['Error'] ?? 'Tidak ada hasil.',
            ];
        } catch (\Exception $e) {
            Log::error('OMDB error: ' . $e->getMessage());
            return false;
        }
    }

    public function detail($imdbId)
    {
        try {
            $url = rtrim(config('omdb.base_url'), '/');
            $response = $this->httpClient()->get($url, [
                'apikey' => $this->apiKey,
                'i'      => $imdbId,
                'plot'   => 'full',
            ]);

            if ($response->failed()) {
                Log::error('OMDB detail HTTP failure', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
                return false;
            }

            $data = $response->json();

            Log::info('OMDB detail response: ', $data);

            if (isset($data['Response']) && $data['Response'] === 'True') {
                return $data;
            }

            return false;
        } catch (\Exception $e) {
            Log::error('OMDB detail error: ' . $e->getMessage());
            return false;
        }
    }
}