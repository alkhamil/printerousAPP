<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PrinterousAPP</title>

  <!-- Custom fonts for this template -->
  <link href="{{ url('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ url('admin/css/font.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ url('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ url('admin/css/custom.css') }}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="{{ url('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('layouts.sidenav')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('layouts.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        @yield('content')
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; PrinterousAPP 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik logout, jika ingin mengakhiri sesi!</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="row loader" style="padding: 20px">
            <div class="col-md-12">
            <div class="text-center">
                <i class="fa fa-spinner" style="font-size: 30px; color: black;"></i>
            </div>
            </div>
        </div>
        <div id="searchbody">
    
        </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="OrgModaldetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="row loader" style="padding: 20px">
            <div class="col-md-12">
              <div class="text-center">
                <i class="fa fa-spinner" style="font-size: 30px; color: black;"></i>
              </div>
            </div>
          </div>
          <div id="OrgDetailbody">
    
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="OrgModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
          <div class="row loader" style="padding: 20px">
              <div class="col-md-12">
              <div class="text-center">
                  <i class="fa fa-spinner" style="font-size: 30px; color: black;"></i>
              </div>
              </div>
          </div>
          <div id="OrgModalEditbody">
      
          </div>
          </div>
      </div>
      </div>
      
      <div class="modal fade" id="OrgModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
          <div class="row loader" style="padding: 20px">
              <div class="col-md-12">
              <div class="text-center">
                  <i class="fa fa-spinner" style="font-size: 30px; color: black;"></i>
              </div>
              </div>
          </div>
          <div id="OrgModalAddbody">
      
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

  <!-- Page level plugins -->
  <script src="{{ url('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ url('admin/js/demo/datatables-demo.js') }}"></script>

  <script>
    function search() {
      var q = $('#q').val();
      $('#searchbody').html(null);
      $('#search').modal();
      $('.loader').show();
      $.post('{{ route('search') }}', {_token:'{{ csrf_token() }}', q:q}, function(data){
          $('.loader').hide();
          $('#searchbody').html(data);
      });
    }

    function OrgDetail(id) {
        $('#OrgDetailbody').html(null);
        $('#OrgModaldetail').modal();
        $('.loader').show();
        $.post('{{ route('organization.details') }}', {_token:'{{ csrf_token() }}', org_id:id}, function(data){
            $('.loader').hide();
            $('#OrgDetailbody').html(data);
        });
    }

    function OrgModalEdit(id) {
        $('#OrgModalEditbody').html(null);
        $('#OrgModalEdit').modal();
        $('.loader').show();
        $.post('{{ route('organization.modal.edit') }}', {_token:'{{ csrf_token() }}', user_id:id}, function(data){
            $('.loader').hide();
            $('#OrgModalEditbody').html(data);
        });
    }

    function OrgModalAdd() {
        $('#OrgModalAddbody').html(null);
        $('#OrgModalAdd').modal();
        $('.loader').show();
        $.get('{{ route('organization.modal.add') }}', function(data) {
            $('.loader').hide();
            $('#OrgModalAddbody').html(data);
        })
    }
  </script>
</body>

</html>
