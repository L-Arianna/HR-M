<div class="page-wrapper">
    <div class="page-content">
        <?= $this->session->flashdata('sukses'); ?>
        <h3 class="mb-0 text-uppercase"><?= $title ?></h3>
        <form action="<?= base_url('Gudang/Produk/update_keg_khazanah') ?>" name="formdata" class="form-horizontal" enctype="multipart/form-data" method="POST">
            <div class="col-md-12">
                <input type="hidden" value="<?= $kegiatan->id_keg_khazanah; ?>" name="idkegkhazanah" />
                <div class="form-group">
                    <label class="control-label col-md-6">Jenis </label>
                    <div class="col-md-12">
                        <input name="jeniskegkhazanah" placeholder="Nama Jenis" class="form-control" type="text" value="<?= $kegiatan->jenis_keg_khazanah; ?>">
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-6">ID Buku </label>
                    <div class="col-md-12">
                        <input name="idbukukegkhazanah" placeholder="ID Buku" class="form-control" type="text" value="<?= $kegiatan->idbuku_keg_khazanah; ?>">
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-6">Nomor Buku </label>
                    <div class="col-md-12">
                        <input name="nobukukegkhazanah" placeholder="Nomor Buku" class="form-control" type="text" value="<?= $kegiatan->nobuku_keg_khazanah; ?>">
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-6">Stok </label>
                    <div class="col-md-12">
                        <input name="stokkegkhazanah" placeholder="Stok" class="form-control" type="number" value="<?= $kegiatan->stok_keg_khazanah; ?>">
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-6">Tujuan Kegiatan</label>
                    <div class="row d-flex">
                        <?php $no = 1;
                        foreach ($tujuan as $value) {
                            $exp = explode(",", $kegiatan->tujuan_keg_khazanah);
                        ?>
                            <div class="form-check col-md-2">
                                <input class="form-check-input" name="tujuan[]" type="checkbox" value="<?= $value->id_tujuan_khazanah; ?>" <?php if (array_search($value->id_tujuan_khazanah, $exp) !== false) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                <label class="form-check-label" for="flexCheckIndeterminate<?= $no; ?>"><?= $value->nama_tujuan_khazanah; ?></label>
                            </div>
                        <?php
                            $no++;
                        } ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnSavekegkhazanah" class="btn btn-primary btn-sm">Save changes</button>
            </div>
        </form>
    </div>
</div>