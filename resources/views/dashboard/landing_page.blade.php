<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PrinterousAPP</title>

  <!-- Custom fonts for this template-->
  <link href="{{ url('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ url('admin/css/font.css') }}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ url('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="text-center">
                <h3>Selamat datang di PrinterousAPP</h1>
                  @if (Auth::check() !== true)
                  <p>Silahkan login!</p>
                  <a href="{{ route('login.index') }}" class="btn btn-block btn-primary">
                      Login
                  </a>
                @else
                  <p>Anda sudah login.</p>
                  <a href="{{ route('dashboard.index') }}" class="btn btn-block btn-primary">
                      Dashboard
                  </a>
                @endif
                <a href="{{ route('user.guide') }}" class="btn btn-block btn-success">
                    User Guide
                </a>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ url('admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ url('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ url('admin/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
