<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PanelControl\DashboardController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('auth.login');
// });
// Route::get('/register', function () {
//     return view('auth.register');
// });

// Route::get('/dashboard', function () {
//     return view('controlpanel.dashboard');
// });

// Route::get('/My', function () {
//     return view('controlpanel.My');
// });


Route::middleware('setLocale')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'register_process'])->name('signup');
    Route::post('/login', [AuthController::class, 'login_process'])->name('signin');
    Route::get('/logout', [AuthController::class, 'logout'])->name('signout');

    Route::get('/lang/{locale}', function ($locale) {
        $available = ['en', 'id'];

        if (in_array($locale, $available, true)) {
            session(['locale' => $locale]);
        }

        return redirect()->back();
    })->name('lang.switch');

    Route::prefix('panel_control')->middleware('checkLogin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/favorite', function () {
            return view('controlpanel.my');
        })->name('favorite');
    });
});

