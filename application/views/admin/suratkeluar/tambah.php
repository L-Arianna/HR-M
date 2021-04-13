<div class="page-wrapper">
    <div class="page-content">
        <h3 class="mb-0 text-uppercase"><?= $title ?></h3>
        <div class="card">
            <div class="card-body">
                <?php
                date_default_timezone_set('Asia/Jakarta'); ?>
                <form action="<?= base_url(); ?>Admin/Surat_Keluar/add" id="formsuratkeluar" name="formdata" class="form-horizontal" enctype="multipart/form-data" method="POST">
                    <div class="col-md-12">
                        <input type="hidden" value="" name="idsuratkeluar" />
                        <div class="form-group">
                            <label class="control-label col-md-6">Nomor Surat Keluar</label>
                            <div class="col-md-12">
                                <input name="nomorsuratkeluar" placeholder="Nomor Surat Keluar" class="form-control" type="text">
                                <?= form_error('nomorsuratkeluar', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Kepada</label>
                            <div class="col-md-12">
                                <input name="kepada" placeholder="Kepada" class="form-control" type="text">
                                <?= form_error('kepada', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Lampiran</label>
                            <div class="col-md-12">
                                <input name="lampiran" placeholder="Lampiran" class="form-control" type="text" value="-">
                                <?= form_error('lampiran', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Perihal</label>
                            <div class="col-md-12">
                                <input name="perihal" placeholder="Perihal" class="form-control" type="text">
                                <?= form_error('perihal', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Tembusan</label>
                            <div class="col-md-12">
                                <input name="tembusan" placeholder="Tembusan" class="form-control" type="text">
                                <?= form_error('tembusan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleDataList" class="form-label">Pengirim Surat</label>
                            <input class="form-control" name="pengirimsurat" placeholder="Pengirim Surat">
                            <?= form_error('pengirimsurat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Keterangan</label>
                            <div class="col-md-12">
                                <input name="keterangan" placeholder="Keterangan" class="form-control" type="text">
                                <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Status Surat Keluar</label>
                            <div class="col-md-12">
                                <select class="form-control" name="statussuratkeluar">
                                    <option value="">Pilih</option>
                                    <?php foreach ($statussurat as $v) {
                                    ?>
                                        <option value="<?= $v->id_dropdown_statussuratmasuk; ?>"><?= $v->nama_dropdown_statussuratmasuk; ?></option>
                                    <?php
                                    } ?>
                                </select>
                                <?= form_error('statussuratkeluar', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Indexs Berkas Surat</label>
                            <div class="col-md-12">
                                <input name="indexsberkassurat" placeholder="Indexs Berkas Surat" class="form-control" type="text" />
                                <?= form_error('indexsberkassurat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Nama File Surat Keluar</label>
                            <div class="col-md-12">
                                <input name="filesuratkeluar" placeholder="File Surat Keluar" class="form-control" type="file" accept="application/pdf"></input>
                                <?= form_error('filesuratkeluar', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Tambah Surat Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>