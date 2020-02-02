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

<body class="bg-gradient-info">

  <div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            @if (Auth::check() === true)
                <a href="{{ route('dashboard.index') }}" class="btn btn-primary">Dashboard</a>
            @else
                <a href="{{ route('login.index') }}" class="btn btn-warning">Login</a>
            @endif
        </div>
    </div>
    <!-- Outer Row -->
    <div class="row mt-5">
        <div class="col-md-12" style="color: white">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-page-login-tab" data-toggle="pill" href="#pills-page-login" role="tab" aria-controls="pills-page-login" aria-selected="true">Page Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-page-dashboard-tab" data-toggle="pill" href="#pills-page-dashboard" role="tab" aria-controls="pills-page-dashboard" aria-selected="false">Page Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-page-organization-tab" data-toggle="pill" href="#pills-page-organization" role="tab" aria-controls="pills-page-organization" aria-selected="false">Page Organization</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-page-user-tab" data-toggle="pill" href="#pills-page-user" role="tab" aria-controls="pills-page-user" aria-selected="false">Page User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-ac-tab" data-toggle="pill" href="#pills-ac" role="tab" aria-controls="pills-ac" aria-selected="false">Account Manager</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-st-tab" data-toggle="pill" href="#pills-st" role="tab" aria-controls="pills-st" aria-selected="false">Staff</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-page-login" role="tabpanel" aria-labelledby="pills-page-login-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-black-50">1. Login Page</h4>
                                    <img src="{{ url('user_guide/login.png') }}" class="img-fluid">
                                    <div class="mt-2" style="color: black">
                                        <p>Semua PIC / User yang telah di daftarkan di printerousAPP bisa login di halaman ini. <br>
                                        Syarat login harus menggunakan email dan password <br>
                                        Untuk uji coba silahkan login menggunakan : <br>
                                        </p>
                                        <p>
                                            <b>User Admin</b> <br>
                                            email : admin@pr.com <br>
                                            password : polisi86 <br><br>

                                            <b>PIC Account Manager</b> <br>
                                            email : naz@mozastudio.com <br>
                                            password : polisi86 <br><br>

                                            <b>PIC Staff</b> <br>
                                            email : dea@mozastudio.com <br>
                                            password : polisi86 <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-page-dashboard" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-black-50">2. Dashboard Page</h4>
                                    <img src="{{ url('user_guide/dashboard.png') }}" class="img-fluid">
                                    <div class="mt-2" style="color: black">
                                        <p>
                                            Semua PIC yang logged in dapat mengakses dan melihat halaman dashboard <br>
                                            di halaman dashboard ini hanya menampilkan jumlah dari semua organisasi dan user yang terdaftar di organisasi
                                        </p>

                                        <p>
                                            <b>Note:</b> <br>
                                            Peran admin bisa memanage organisasi dan pic <br>
                                            Peran account manager bisa memanage organisasi nya sendiri <br>
                                            Peran staff hanya bisa melihat data organisasi dan pic
                                        </p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-page-organization" role="tabpanel" aria-labelledby="pills-page-organization-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="row" style="color: black;">
                                <div class="col-md-12">
                                    <h4 class="text-black-50">3. Organization Page</h4>
                                    <p class="mt-2">a. Halaman daftar organisasi</p>
                                    <img src="{{ url('user_guide/org_list.png') }}" class="img-fluid">
                                    
                                    <p class="mt-3">b. Feature tambah organisai</p>
                                    <img src="{{ url('user_guide/org_add.png') }}" class="img-fluid">
                                    
                                    <p class="mt-3">c. Feature ubah organisasi</p>
                                    <img src="{{ url('user_guide/org_update.png') }}" class="img-fluid">
                                    
                                    <p class="mt-3">d. Feature detail organisasi</p>
                                    <img src="{{ url('user_guide/org_detail.png') }}" class="img-fluid">
                                    
                                    <p class="mt-3">e. Feature delete organisasi</p>
                                    <img src="{{ url('user_guide/org_delete.png') }}" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-page-user" role="tabpanel" aria-labelledby="pills-page-user-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="row" style="color: black;">
                                <div class="col-md-12">
                                    <h4 class="text-black-50">4. User Management Page</h4>
                                    <p class="mt-2">a. Halaman daftar semua pic</p>
                                    <img src="{{ url('user_guide/user_list.png') }}" class="img-fluid">
                                    
                                    <p class="mt-3">b. Feature tambah pic</p>
                                    <img src="{{ url('user_guide/user_add.png') }}" class="img-fluid">
                                    
                                    <p class="mt-3">c. Feature ubah pic</p>
                                    <img src="{{ url('user_guide/user_update.png') }}" class="img-fluid">
                                    
                                    <p class="mt-3">a. Feature hapus pic</p>
                                    <img src="{{ url('user_guide/user_delete.png') }}" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-ac" role="tabpanel" aria-labelledby="pills-ac-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-black-50">5. Account Manager</h4>
                                    <img src="{{ url('user_guide/ac_dashboard.png') }}" class="img-fluid mt-2">
                                    
                                    <img src="{{ url('user_guide/ac_org_list.png') }}" class="img-fluid mt-3">

                                    <img src="{{ url('user_guide/ac_org_detail.png') }}" class="img-fluid mt-3">
                                    
                                    <img src="{{ url('user_guide/ac_org_setting.png') }}" class="img-fluid mt-3">

                                    <img src="{{ url('user_guide/ac_org_edit.png') }}" class="img-fluid mt-3">

                                    <img src="{{ url('user_guide/ac_org_delete.png') }}" class="img-fluid mt-3">

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-st" role="tabpanel" aria-labelledby="pills-st-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-black-50">6. Staff</h4>
                                    <img src="{{ url('user_guide/st_org_list.png') }}" class="img-fluid mt-2">
                                    
                                    <img src="{{ url('user_guide/st_org_detail.png') }}" class="img-fluid mt-3">
                                    
                                </div>
                            </div>
                        </div>
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
