<div class="page-wrapper">
    <div class="page-content">
        <div class="col">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" onclick="tujuan_khazanah_add_ajax()" data-bs-target="#tujuan_khazanah_modal_form">Tambah Tujuan Khazanah</button>
            </br></br>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabletujuankhazanah" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Tujuan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>No</td>
                                    <td>Nama Tujuan</td>
                                    <th>Action</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="tujuan_khazanah_modal_form" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formtujuankhazanah" name="formdata" class="form-horizontal" enctype="multipart/form-data" method="POST">
                            <div class="col-md-12">
                                <input type="hidden" value="" name="idtujuankhazanah" />
                                <div class="form-group">
                                    <label class="control-label col-md-6">Nama Tujuan </label>
                                    <div class="col-md-12">
                                        <input name="namatujuankhazanah" placeholder="Nama Tujuan" class="form-control" type="text">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="btnSavetujuankhazanah" onclick="tujuan_khazanah_save();" class="btn btn-primary btn-sm">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>