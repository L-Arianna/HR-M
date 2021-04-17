<div class="page-wrapper">
    <div class="page-content">
        <h3 class="mb-0 text-uppercase"><?= $title ?></h3>
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url(); ?>Admin/E_Library/add" id="formbook" name="formdata" class="form-horizontal" enctype="multipart/form-data" method="POST">
                    <div class="col-md-12">
                        <input type="hidden" value="" name="idelib" />
                        <div class="form-group">
                            <label class="control-label col-md-6">Judul</label>
                            <div class="col-md-12">
                                <input name="judulbook" placeholder="Judul E-Library" class="form-control" type="text"> </input>
                                <?= form_error('judulbook', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Keterangan</label>
                            <div class="col-md-12">
                                <textarea id="mytextarea" name="keteranganbook" placeholder="Keterangan E-Library" class="form-control" type="text"> </textarea>
                                <?= form_error('keteranganbook', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Kategori</label>
                            <div class="col-md-12">
                                <select class="form-control" name="statussuratkeluar">
                                    <option value="">Pilih</option>
                                    <?php foreach ($x as $v) {
                                    ?>
                                        <option value=""></option>
                                    <?php
                                    } ?>
                                </select>
                                <?= form_error('statussuratkeluar', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Nama File E-Library</label>
                            <div class="col-md-12">
                                <input name="filebook" placeholder="Filenya nih" class="form-control" type="file" accept="application/pdf"></input>
                                <?= form_error('filebook', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
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