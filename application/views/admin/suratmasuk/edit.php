<div class="page-wrapper">
    <div class="page-content">
        <h3 class="mb-0 text-uppercase"><?= $title ?></h3>
        <div class="card">
            <div class="card-body">
                <?php
                date_default_timezone_set('Asia/Jakarta'); ?>
                <form action="<?= base_url(); ?>Admin/Surat_Masuk/update" id="formsuratmasuk" name="formdata" class="form-horizontal" enctype="multipart/form-data" method="POST">
                    <div class="col-md-12">
                        <input type="hidden" value="<?= $surat_masuk->id_surat_masuk; ?>" name="idsuratmasuk" />
                        <div class="form-group">
                            <label class="control-label col-md-6">Nomor Surat Masuk</label>
                            <div class="col-md-12">
                                <input name="nomorsuratmasuk" placeholder="Nomor Surat Masuk" class="form-control" type="text" value="<?= $surat_masuk->nomor_surat_masuk; ?>">
                                <?= form_error('nomorsuratmasuk', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Surat Masuk Diterima</label>
                            <div class="col-md-12">
                                <input name="diterimasuratmasuk" placeholder="Surat Masuk Diterima" class="form-control" type="text" value="<?= $surat_masuk->diterima_surat_masuk; ?>" readonly>
                                <?= form_error('diterimasuratmasuk', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleDataList" class="form-label">Pengirim Surat</label>
                            <input class="form-control" name="pengirimsuratmasuk" placeholder="Pengirim Surat" value="<?= $surat_masuk->pengirim_surat_masuk; ?>" required>
                            <?= form_error('pengirimsuratmasuk', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Deposisi Surat Masuk</label>
                            <div class="col-md-12">
                                <input name="deposisisuratmasuk" placeholder="Deposisi Surat Masuk" class="form-control" type="text" value="<?= $surat_masuk->deposisi_surat_masuk; ?>" required>
                                <?= form_error('deposisisuratmasuk', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-6">Kepada</label>
                            <div class="col-md-12">
                                <input name="kepadasuratmasuk" placeholder="Kepada" class="form-control" type="text" value="<?= $surat_masuk->kepada_surat_masuk; ?>" required>
                                <?= form_error('kepadasuratmasuk', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Ringkasan Surat Masuk</label>
                            <div class="col-md-12">
                                <textarea id="mytextarea" name="ringkasansuratmasuk" placeholder="Ringkasan Surat Masuk" class="form-control" type="text" required><?= $surat_masuk->kepada_surat_masuk; ?></textarea>
                                <?= form_error('ringkasansuratmasuk', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label class="form-label">Tembusan</label>
                                <select id="multiple-select2" name="tembusan[]" class="multiple-select2 form-control" data-placeholder="Choose anything" multiple="multiple">
                                    <?php
                                    $o = 0;
                                    $exp = explode(",", $surat_masuk->tembusan_surat_masuk);
                                    $hitung = count($exp);
                                    foreach ($jabatan as $value) {
                                    ?>
                                        <option value="<?= $value->id_kat_jabatan; ?>" <?php if (array_search($value->id_kat_jabatan, $exp) !== false) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $value->nama_jabatan; ?></option>
                                    <?php
                                    }
                                    $o++; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Status Surat Masuk</label>
                            <div class="col-md-12">
                                <input name="statussuratmasuk" placeholder="Status Surat Masuk" class="form-control" type="text" value="<?= $surat_masuk->status_surat_masuk; ?>" />
                                <?= form_error('statussuratmasuk', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Nama File Surat Masuk</label>
                            <div class="col-md-12">
                                <input name="filesuratmasuk" placeholder="Ringkasan Surat Masuk" class="form-control" type="file" accept="application/pdf" value="<?= $surat_masuk->file_surat_masuk; ?>"></input>
                                <?= form_error('filesuratmasuk', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input name="namafilelama" class="form-control" type="hidden" value="<?= $surat_masuk->file_surat_masuk; ?>.pdf">
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