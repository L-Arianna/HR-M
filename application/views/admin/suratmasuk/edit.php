<div class="page-wrapper">
    <div class="page-content">
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
                            <label class="control-label">Tembusan</label>
                            <div class="col-md-12">
                                <div class="row">
                                    <?php foreach ($jabatan as $value) {
                                    ?>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <!--<input class="form-check-input" type="checkbox" value=""><?//= $value->nama_jabatan; ?></input>-->
                                                <div class="input-group-text">
                                                    <input class="form-check-input" name="tembusan[]" type="checkbox" value="<?= $value->nama_jabatan; ?>" aria-label="Checkbox for following text input">
                                                </div>
                                                <input type="text" class="form-control" aria-label="Text input with checkbox" value="<?= $value->nama_jabatan; ?>" readonly>
                                            </div>
                                        </div>
                                    <?php
                                    } ?>
                                    <!-- <?= form_error('tembusan', '<small class="text-danger pl-3">', '</small>'); ?> -->
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Status Surat Masuk</label>
                            <div class="col-md-12">
                                <select class="form-control" name="statussuratmasuk" id="sss" required>
                                    <?php
                                    $x = $surat_masuk->status_surat_masuk;
                                    foreach ($statussurat as $v) {
                                        if ($x = $v->id_dropdown_statussuratmasuk) {
                                            echo "<option value= $v->id_dropdown_statussuratmasuk>$v->nama_dropdown_statussuratmasuk</option>";
                                        }
                                    ?>
                                    <?php
                                    } ?>
                                </select>
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