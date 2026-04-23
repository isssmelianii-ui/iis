<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="{{ asset('assets/img/stisla-fill.svg')}}" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">

                <!-- FORM -->
                <form method="POST" action="{{ route('register_process') }}">
                  @csrf

                  <div class="form-group">
                      <label for="full_name">Full Name</label>
                      <input id="full_name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                      @error('name')
                        <span class="text-danger text-sm">{{ $message }}</span>
                      @enderror
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                    @error('email')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Password</label>
                      <input type="password" class="form-control" name="password">
                    </div>

                    <div class="form-group col-6">
                      <label>Password Confirmation</label>
                      <input type="password" class="form-control" name="password_confirmation">
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>

                </form>
              </div>
            </div>

            <div class="mt-5 text-muted text-center">
              have an account? <a href="{{ url('/login') }}">Sign here</a>
            </div>

            <div class="simple-footer">
              Copyright &copy; Stisla <span id="year"></span>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- JS -->
  <script src="{{ asset('assets/modules/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>

  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  {{-- SUCCESS --}}
  @if (session('success'))
  <script>
    Swal.fire({
      icon: "success",
      title: "Berhasil",
      text: "{{ session('success') }}",
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000
    })
  </script>
  @endif

  {{-- ERROR --}}
  @if (session('error'))
  <script>
    Swal.fire({
      icon: "error",
      title: "Gagal",
      text: "{{ session('error') }}",
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000
    })
  </script>
  @endif

  {{-- VALIDATION ERROR (INI YANG BARU DITAMBAHKAN) --}}
  @if ($errors->any())
  <script>
    Swal.fire({
      icon: "error",
      title: "Validasi gagal",
      text: "Periksa kembali input Anda",
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000
    })
  </script>
  @endif

  <script>
    document.getElementById('year').innerHTML = new Date().getFullYear();
  </script>

</body>
</html>