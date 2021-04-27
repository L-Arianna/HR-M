<div class="page-wrapper">
    <div class="page-content">
        <?= $this->session->flashdata('sukses'); ?>
        <h3 class="mb-0 text-uppercase"><?= $title ?></h3>
        <form action="<?= base_url('Gudang/Produk/add_keg_khazanah') ?>" name="formdata" class="form-horizontal" enctype="multipart/form-data" method="POST">
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
                <div class="form-group">
                    <label class="control-label col-md-6">Tujuan Kegiatan</label>
                    <?php $no = 1;
                    foreach ($kegiatan as $value) {
                    ?>
                        <div class="form-check col-md-2">
                            <input class="form-check-input" name="tujuan[]" type="checkbox" value="<?= $value->id_tujuan_khazanah; ?>" id="flexCheckIndeterminate<?= $no; ?>">
                            <label class="form-check-label" for="flexCheckIndeterminate<?= $no; ?>"><?= $value->nama_tujuan_khazanah; ?></label>
                        </div>
                    <?php
                        $no++;
                    } ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnSavekegkhazanah" class="btn btn-primary btn-sm">Save changes</button>
            </div>
        </form>
    </div>
</div>