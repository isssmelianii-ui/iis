<footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; <span id="year"></span> <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>  

  <!-- General JS Scripts -->
  <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
  <script src="{{asset('assets/modules/popper.js')}}"></script>
  <script src="{{asset('assets/modules/tooltip.js')}}"></script>
  <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('assets/modules/moment.min.js')}}"></script>
  <script src="{{asset('assets/js/stisla.js')}}"></script>
  
  <!-- JS Libraies -->
  <script src="{{asset('assets/modules/jquery.sparkline.min.js')}}"></script>
  <script src="{{asset('assets/modules/chart.min.js')}}"></script>
  <script src="{{asset('assets/modules/owlcarousel2/dist/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/modules/summernote/summernote-bs4.js')}}"></script>
  <script src="{{asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('assets/js/page/index.js')}}"></script>
  
  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    const year = document.getElementById('year');
    year.innerHTML = new Date().getFullYear();
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const favoriteStoreUrl = '{{ route('favorites.store') }}';
        const favoriteDestroyUrlTemplate = '{{ route('favorites.destroy', ['imdbId' => '__IMDB__']) }}';
        const csrfToken = '{{ csrf_token() }}';

        document.querySelectorAll('.favorite-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const imdbId = this.dataset.imdb;
                const title = this.dataset.title;
                const year = this.dataset.year;
                const poster = this.dataset.poster;
                const type = this.dataset.type || 'movie';
                const isDetailButton = this.id === 'favorite-btn';
                const currentlyFavorite = this.classList.contains('btn-danger');

                if (!imdbId || !title) {
                    Swal.fire({
                        text: 'Data film tidak lengkap.',
                        icon: 'error',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    return;
                }

                if (isDetailButton && currentlyFavorite) {
                    const deleteUrl = favoriteDestroyUrlTemplate.replace('__IMDB__', imdbId);

                    fetch(deleteUrl, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                    })
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (data) {
                        Swal.fire({
                            text: data.message || 'Operasi selesai.',
                            icon: data.success ? 'success' : 'error',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                        });

                        if (data.success) {
                            btn.classList.remove('btn-danger');
                            btn.classList.add('btn-outline-danger');

                            const icon = btn.querySelector('i');
                            const label = btn.querySelector('span');

                            if (icon) {
                                icon.classList.remove('fas');
                                icon.classList.add('far');
                            }

                            if (label) {
                                label.textContent = 'Add to Favorites';
                            }
                        }
                    })
                    .catch(function () {
                        Swal.fire({
                            text: 'Terjadi kesalahan saat menghapus dari favorites.',
                            icon: 'error',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                        });
                    });

                    return;
                }

                fetch(favoriteStoreUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        imdb_id: imdbId,
                        title: title,
                        year: year,
                        poster: poster,
                        type: type,
                    }),
                })
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    Swal.fire({
                        text: data.message || 'Operasi selesai.',
                        icon: data.success ? 'success' : 'error',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });

                    if (data.success && isDetailButton) {
                        btn.classList.remove('btn-outline-danger');
                        btn.classList.add('btn-danger');

                        const icon = btn.querySelector('i');
                        const label = btn.querySelector('span');

                        if (icon) {
                            icon.classList.remove('far');
                            icon.classList.add('fas');
                        }

                        if (label) {
                            label.textContent = 'Remove from Favorites';
                        }
                    }
                })
                .catch(function () {
                    Swal.fire({
                        text: 'Terjadi kesalahan saat menambahkan ke favorites.',
                        icon: 'error',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                });
            });
        });
    });
  </script>