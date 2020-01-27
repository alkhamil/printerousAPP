@extends('layouts.app')

@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Organization</h1>
    <div class="mb-1">
        <a href="{{ route('organization.create') }}" class="btn btn-outline-primary">
            <i class="fa fa-plus"></i> Add New Organization
        </a>
    </div>
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
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $o->name }}</td>
                    <td>{{ $o->phone }}</td>
                    <td>{{ $o->email }}</td>
                    <td>
                        <img src="{{ url($o->logo) }}" alt="{{$o->logo}}" class="img-fluid" width="80">
                    </td>
                    <td>
                        <a href="{{ route('organization.update') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('organization.details') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('organization.destroy') }}" class="btn btn-danger btn-sm">
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