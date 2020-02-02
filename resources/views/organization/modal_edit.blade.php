<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle"># {{ $user->name }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="{{ route('organization.modal.edit.proses') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                </div>
                
                <div class="form-group">
                    <label>Role</label>
                    <select name="role_id" class="form-control">
                        @foreach ($roles as $key => $r)
                            @if ($user->role_id === $r->id)
                                <option value="{{ $r->id }}" selected>{{ $r->name }}</option>
                            @else
                                @if ($r->id !== 3)
                                    <option value="{{ $r->id }}">{{ $r->name }}</option>
                                @endif 
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Organization</label>
                    <select name="org_id" class="form-control">
                        @foreach ($organizations as $key => $o)
                            @if ($user->organization_id === $o->id)
                                <option value="{{ $o->id }}" selected>{{ $o->name }}</option> 
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
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</form>