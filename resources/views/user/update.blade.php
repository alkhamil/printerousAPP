@extends('layouts.app')

@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">User</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah PIC</h6>
      </div>
      <div class="card-body">
        <form action="{{ route('user.update.proses') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Organization</label>
                        <select name="org_id" class="form-control">
                            @foreach ($organizations as $key => $o)
                                @if ($user->organization_id === $o->id)
                                    <option value="{{ $o->id }}" selected>{{ $o->name }}</option> 
                                @else 
                                    <option value="{{ $o->id }}">{{ $o->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role_id" class="form-control">
                            @foreach ($roles as $key => $r)
                                @if ($user->role_id === $r->id)
                                    <option value="{{ $r->id }}" selected>{{ $r->name }}</option>
                                @else 
                                    <option value="{{ $r->id }}">{{ $r->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="{{ $user->email }}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" name="phone" value="{{ $user->phone }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                        <div class="badge badge-info">Jika ingin mengganti password silahkan ganti!, Jika tidak kosongkan!</div>
                    </div>
                    <div class="form-group">
                        <label>Avatar</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="img-upload-preview">
                                    <img src="{{ url($user->avatar) }}" alt="" width="200" class="img-responsive">
                                    <input type="hidden" name="avatar_old" value="{{ $user->avatar }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success">Update</button>
        </form>
      </div>
    </div>

</div>
@endsection