<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">#{{ $organization->name }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-3">
            <div class="img-upload-preview" style="width: 150px; height: 150px;">
                <img src="{{ url($organization->logo) }}" alt="" width="200" class="img-responsive">
            </div>
        </div>
        <div class="col-md-9">
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
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-sm"  id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Role</th>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>