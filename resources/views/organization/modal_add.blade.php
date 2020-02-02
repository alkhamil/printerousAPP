<div class="modal-header">
    @php
        $org_id = Auth::user()->organization_id;
    @endphp
    <h5 class="modal-title" id="exampleModalLongTitle"># Tambah PIC di {{ \App\Organization::where('id', $org_id)->first()->name }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="{{ route('organization.modal.add.proses') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                    <strong class="text-danger">{!! $errors->first('name', '<p class="help-block">:message</p>') !!}</strong>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role_id" class="form-control">
                        @foreach ($roles as $key => $r)
                            @if ($r->id !== 3)
                                <option value="{{ $r->id }}">{{ $r->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Organization</label>
                    <select name="org_id" id="org" class="form-control">
                        @foreach ($organizations as $key => $o)
                            @if (Auth::user()->organization_id === $o->id)
                                <option value="{{ $o->id }}">{{ $o->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('email') ? 'has-error' : ''}}">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                            <strong class="text-danger">{!! $errors->first('email', '<p class="help-block">:message</p>') !!}</strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('phone') ? 'has-error' : ''}}">
                            <label>Phone</label>
                            <input type="number" name="phone" class="form-control">
                            <strong class="text-danger">{!! $errors->first('phone', '<p class="help-block">:message</p>') !!}</strong>
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? 'has-error' : ''}}">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <strong class="text-danger">{!! $errors->first('password', '<p class="help-block">:message</p>') !!}</strong>
                </div>
                <div class="form-group{{ $errors->has('avatar') ? 'has-error' : ''}}">
                    <label>Avatar</label>
                    <input type="file" class="form-control" name="avatar">
                    <strong class="text-danger">{!! $errors->first('avatar', '<p class="help-block">:message</p>') !!}</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</form>