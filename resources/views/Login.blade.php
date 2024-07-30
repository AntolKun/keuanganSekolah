<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login | Keuangan Sekolah</title>
  <!-- Meta Tags, Favicon, and CSS Links -->
  <link id="themeColors" rel="stylesheet" href="{{ asset('dist/css/style.min.css') }}" />
</head>

<body>
  <div class="page-wrapper">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100">
      <div class="position-relative z-index-5">
        <div class="row">
          <div class="col-xl-7 col-xxl-8">
            <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
              <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/login-security.svg" alt="" class="img-fluid" width="500">
            </div>
          </div>
          <div class="col-xl-5 col-xxl-4">
            <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
              <div class="col-sm-8 col-md-6 col-xl-9">
                <h2 class="mb-3 fs-7 fw-bolder">Selamat Datang</h2>
                <p class="mb-9">Website Keuangan Sekolah SMAN 1 Gedong Tataan</p>
                <div class="position-relative text-center my-4">
                  <p class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">Silahkan Login</p>
                  <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                </div>
                <form action="{{ route('login.process') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
                  @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript Files -->
  <script src="{{ asset('dist/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
  <script src="{{ asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('dist/js/app.min.js') }}"></script>
  <script src="{{ asset('dist/js/app.init.js') }}"></script>
  <script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
  <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('dist/js/custom.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @if ($message = session()->get('success'))
  <script type="text/javascript">
    Swal.fire({
      icon: 'success',
      title: 'Sukses!',
      text: '{{ $message }}',
    })
  </script>
  @endif

  @if ($message = session()->get('error'))
  <script type="text/javascript">
    Swal.fire({
      icon: 'error',
      title: 'Waduh!',
      text: '{{ $message }}',
    })
  </script>
  @endif
</body>

</html>