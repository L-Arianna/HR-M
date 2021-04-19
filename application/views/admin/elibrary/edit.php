<div class="page-wrapper">
    <div class="page-content">
        <h3 class="mb-0 text-uppercase"><?= $title ?></h3>
        <?= $this->session->flashdata('sukses'); ?>
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url(); ?>Admin/E_Library/update" id="formbook" name="formdata" class="form-horizontal" enctype="multipart/form-data" method="POST">
                    <div class="col-md-12">
                        <input type="hidden" value="<?= $elib->id_book; ?>" name="idelib" />
                        <div class="form-group">
                            <label class="control-label col-md-6">Judul</label>
                            <div class="col-md-12">
                                <input name="judulbook" placeholder="Judul E-Library" class="form-control" type="text" value="<?= $elib->judul_book; ?>"> </input>
                                <?= form_error('judulbook', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Keterangan</label>
                            <div class="col-md-12">
                                <textarea name="keteranganbook" placeholder="Keterangan E-Library" class="form-control" type="text"><?= $elib->keterangan_book; ?></textarea>
                                <?= form_error('keteranganbook', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Kategori</label>
                            <div class="col-md-12">
                                <select class="form-control" name="kategori">
                                    <option value="">Pilih</option>
                                    <?php foreach ($katelib as $v) {
                                        if ($v->id_kat_book == $elib->kategori_book) {
                                            $select = 'selected';
                                        } else {
                                            $select = '';
                                        }
                                        echo "<option value=$v->id_kat_book $select> $v->nama_kat_book </option>";
                                    ?>

                                    <?php
                                    } ?>
                                </select>
                                <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Nama File E-Library</label>
                            <div class="col-md-12">
                                <input name="filebook" placeholder="Filenya nih" class="form-control" type="file" accept="application/pdf"></input>
                                <?= form_error('filebook', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <input name="filebooklama" class="form-control" type="hidden" value="<?= $elib->file_book; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>