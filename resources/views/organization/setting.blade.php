@extends('layouts.app')

@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Organization</h1>
    @if (Session::has('message'))
        <div class="alert alert-success">
            {!! session('message') !!}
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table>
                        <tr>
                            <th>Name</th>
                            <td>: {{ $organization->name }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>: {{ $organization->phone }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>: {{ $organization->email }}</td>
                        </tr>
                        <tr>
                            <th>Webiste</th>
                            <td>: {{ $organization->website }}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>: {{ date('d M Y H:i:s', strtotime($organization->created_at)) }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <div class="text-center">
                        <div class="img-upload-logo" style="width: 150px; height: 150px;">
                            <img src="{{ url($organization->logo) }}" alt="" width="200" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <button onclick="OrgModalAdd()" class="btn btn-outline-primary">
                <i class="fa fa-plus"></i> Tambah PIC
            </button>
        </div>
    </div>
    <div class="card shadow mb-4 mt-2">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar PIC di {{ $organization->name }}</h6>
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($organization->users as $key => $user)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->role_id === 1)
                                            <div class="badge badge-success">{{ \App\Role::where('id', $user->role_id)->first()->name }}</div>
                                        @elseif ($user->role_id === 2)
                                            <div class="badge badge-info">{{ \App\Role::where('id', $user->role_id)->first()->name }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->role_id !== 1)
                                            <button onclick="OrgModalEdit({{ $user->id }})" class="btn btn-sm btn-primary btn-circle">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button data-toggle="modal" data-target="#deleteModal{{ $user->id }}" class="btn btn-sm btn-danger btn-circle">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @else
                                            <div class="badge badge-success">Readonly</div>
                                        @endif
                                    </td>
                                </tr>
                                <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">{{ $user->name }}</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          Apakah anda yakin ingin menghapus user <strong>{{ $user->name }}</strong> ?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <a href="{{ route('organization.modal.delete', $user->id) }}" class="btn btn-primary">Ya, Hapus</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
@endsection

<script>
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