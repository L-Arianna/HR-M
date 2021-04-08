<div class="page-wrapper">
    <div class="page-content">
        <div class="col">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick="suratmasuk_add_ajax()" data-bs-target="#modal_form">Tambah Surat Masuk</button>
            </br></br>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablesuratmasuk" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Surat</th>
                                    <th>Surat Diterima</th>
                                    <th>Kepada</th>
                                    <th>Deposisi</th>
                                    <th>Ringkasan</th>
                                    <th>Status Surat</th>
                                    <th>Nama File Surat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Surat</th>
                                    <th>Surat Diterima</th>
                                    <th>Kepada</th>
                                    <th>Deposisi</th>
                                    <th>Ringkasan</th>
                                    <th>Status Surat</th>
                                    <th>Nama File Surat</th>
                                    <th>Action</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modal_form" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formsuratmasuk" name="formdata" class="form-horizontal" enctype="multipart/form-data" method="POST">
                            <div class="col-md-12">
                                <input type="hidden" value="" name="iddropdownproduk" />
                                <div class="form-group">
                                    <label class="control-label col-md-6">Nomor Surat Masuk</label>
                                    <div class="col-md-12">
                                        <input name="nomorsuratmasuk" placeholder="Nomor Surat Masuk" class="form-control" type="text">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-6">Surat Masuk Diterima</label>
                                    <div class="col-md-12">
                                        <input name="diterimasuratmasuk" placeholder="Surat Masuk Diterima" class="form-control" type="text" value="sekarang" readonly>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-6">Kepada Surat Masuk Dikirim</label>
                                    <div class="col-md-12">
                                        <input name="kepadasuratmasuk" placeholder="Kepada Surat Masuk Dikirim" class="form-control" type="text">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-6">Deposisi Surat Masuk</label>
                                    <div class="col-md-12">
                                        <input name="deposisisuratmasuk" placeholder="Deposisi Surat Masuk" class="form-control" type="text">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-6">Ringkasan Surat Masuk</label>
                                    <div class="col-md-12">
                                        <textarea name="ringkasansuratmasuk" placeholder="Ringkasan Surat Masuk" class="form-control" type="text"></textarea>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-6">Status Surat Masuk</label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="statussuratmasuk">
                                            <option value="0">Rahasia</option>
                                            <option value="1">Tidak Rahasia</option>
                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-6">Nama File Surat Masuk</label>
                                    <div class="col-md-12">
                                        <input name="filesuratmasuk" placeholder="Ringkasan Surat Masuk" class="form-control" type="file" accept="application/pdf"></input>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="btnSaveProduk" onclick="suratmasuk_save();" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>