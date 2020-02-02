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