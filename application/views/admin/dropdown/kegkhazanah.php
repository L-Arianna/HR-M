<div class="page-wrapper">
    <div class="page-content">
        <div class="col">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick="keg_khazanah_add_ajax()" data-bs-target="#keg_khazanah_modal_form">Tambah Kegiatan Khazanah</button>
            </br></br>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablekegkhazanah" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Id Buku</th>
                                    <th>Nomor Buku</th>
                                    <th>Stok</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>No</td>
                                    <td>Jenis</td>
                                    <td>Id Buku</td>
                                    <td>Nomor Buku</td>
                                    <td>Stok</td>
                                    <td>Action</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="keg_khazanah_modal_form" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formkegkhazanah" name="formdata" class="form-horizontal" enctype="multipart/form-data" method="POST">
                            <div class="col-md-12">
                                <input type="hidden" value="" name="idkegkhazanah" />
                                <div class="form-group">
                                    <label class="control-label col-md-6">Jenis </label>
                                    <div class="col-md-12">
                                        <input name="jeniskegkhazanah" placeholder="Nama Jenis" class="form-control" type="text">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-6">ID Buku </label>
                                    <div class="col-md-12">
                                        <input name="idbukukegkhazanah" placeholder="ID Buku" class="form-control" type="text">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-6">Nomor Buku </label>
                                    <div class="col-md-12">
                                        <input name="nobukukegkhazanah" placeholder="Nomor Buku" class="form-control" type="text">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-6">Stok </label>
                                    <div class="col-md-12">
                                        <input name="stokkegkhazanah" placeholder="Stok" class="form-control" type="number">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="btnSavekegkhazanah" onclick="keg_khazanah_save();" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>