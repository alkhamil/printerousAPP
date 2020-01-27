@extends('layouts.app')

@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">User</h1>
    <div class="mb-1">
        <a href="{{ route('user.create') }}" class="btn btn-outline-primary">
            <i class="fa fa-plus"></i> Add New User
        </a>
    </div>
    <!-- DataTales Example -->
    @if (Session::has('message'))
        <div class="alert alert-success">
            {!! session('message') !!}
        </div>
    @endif
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">User List</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Avatar</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $key => $u)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->phone }}</td>
                    <td>
                        <img src="{{ url($u->avatar) }}" alt="{{$u->avatar}}" class="img-fluid" width="80">
                    </td>
                    <td>
                        <a href="{{ route('user.update') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('user.details') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('user.destroy') }}" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

</div>
@endsection