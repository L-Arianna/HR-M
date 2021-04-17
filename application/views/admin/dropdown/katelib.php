<div class="page-wrapper">
    <div class="page-content">
        <div class="col">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick="kat_lib_add_ajax()" data-bs-target="#kat_lib_modal_form">Tambah Kategori E-Lib</button>
            </br></br>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablekatlib" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori E-Lib</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori E-Lib</th>
                                    <th>Action</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="kat_lib_modal_form" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formkatlib" name="formdata" class="form-horizontal" enctype="multipart/form-data" method="POST">
                            <div class="col-md-12">
                                <input type="hidden" value="" name="idkatbook" />
                                <div class="form-group">
                                    <label class="control-label col-md-6">Nama Kategori E-Library</label>
                                    <div class="col-md-12">
                                        <input name="namakatbook" placeholder="Nama Kategori E-Library" class="form-control" type="text">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="btnSavekatlib" onclick="kat_lib_save();" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>