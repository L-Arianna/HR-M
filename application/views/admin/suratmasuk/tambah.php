<div class="page-wrapper">
    <div class="page-content">
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