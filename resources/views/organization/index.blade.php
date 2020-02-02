@extends('layouts.app')

@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Organization</h1>
    @if (Auth::user()->role_id === 3)
      <div class="mb-1">
          <a href="{{ route('organization.create') }}" class="btn btn-outline-primary">
              <i class="fa fa-plus"></i> Tambah Organisasi Baru
          </a>
      </div>
    @endif
    @if (Session::has('message'))
        <div class="alert alert-success">
            {!! session('message') !!}
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Organization List</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($organizations as $key => $o)

                @if (Auth::user()->organization_id === 0 && Auth::user()->role_id === 3)
                  <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $o->name }}</td>
                      <td>{{ $o->phone }}</td>
                      <td>{{ $o->email }}</td>
                      <td>
                          <img src="{{ url($o->logo) }}" alt="{{$o->logo}}" class="img-fluid" width="80">
                      </td>
                      <td>
                          <a href="{{ route('organization.update', encrypt($o->id)) }}" class="btn btn-primary btn-circle btn-sm">
                              <i class="fa fa-edit"></i>
                          </a>
                          <button onclick="OrgDetail({{ $o->id }})" class="btn btn-secondary btn-circle btn-sm">
                              <i class="fa fa-eye"></i>
                          </button>
                          <button data-toggle="modal" data-target="#deleteOrg{{ $o->id }}" class="btn btn-danger btn-circle btn-sm">
                              <i class="fa fa-trash"></i>
                          </button>
                          
                      </td>
                  </tr>
                  <div class="modal fade" id="deleteOrg{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">{{ $o->name }}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Apakah anda yakin ingin menghapus orgnisasi <strong>{{ $o->name }}</strong> ?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <a href="{{ route('organization.destroy', encrypt($o->id)) }}" type="button" class="btn btn-primary">Ya, Hapus</a>
                        </div>
                      </div>
                    </div>
                  </div>
                @elseif (Auth::user()->organization_id === $o->id && Auth::user()->role_id === 1)
                  <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $o->name }}</td>
                      <td>{{ $o->phone }}</td>
                      <td>{{ $o->email }}</td>
                      <td>
                          <img src="{{ url($o->logo) }}" alt="{{$o->logo}}" class="img-fluid" width="80">
                      </td>
                      <td>
                          <button type="button" onclick="OrgDetail({{ $o->id }})" class="btn btn-secondary btn-circle btn-sm">
                            <i class="fa fa-eye"></i>
                          </button>
                          <a href="{{ route('organization.settings', encrypt($o->id)) }}" class="btn btn-info btn-circle btn-sm">
                            <i class="fa fa-cogs"></i>
                          </a>
                      </td>
                  </tr>
                @else
                  <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $o->name }}</td>
                      <td>{{ $o->phone }}</td>
                      <td>{{ $o->email }}</td>
                      <td>
                          <img src="{{ url($o->logo) }}" alt="{{$o->logo}}" class="img-fluid" width="80">
                      </td>
                      <td>
                          <button onclick="OrgDetail({{ $o->id }})" class="btn btn-secondary btn-circle btn-sm">
                              <i class="fa fa-eye"></i>
                          </button>
                      </td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>

<!-- Modal -->
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

@endsection


<script>
  function OrgDetail(id) {
      $('#OrgDetailbody').html(null);
      $('#OrgModaldetail').modal();
      $('.loader').show();
      $.post('{{ route('organization.details') }}', {_token:'{{ csrf_token() }}', org_id:id}, function(data){
          $('.loader').hide();
          $('#OrgDetailbody').html(data);
      });
  }
</script>