<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase"><?= $title ?></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" action="<?= base_url('Admin/Khazanah/update') ?>" method="post">
                        <div class="row mb-2">
                            <input type="hidden" name="idkhazanah" value="<?= $khazanah->id_khazanah; ?>">
                            <div class="col-md-4">
                                <label for="kegiatan">Kegiatan</label>
                                <select class="form-control" id="kegiatan" name="kegiatan">
                                    <option>Pilih</option>
                                    <?php foreach ($kegiatan as $value) {
                                        if ($khazanah->kegiatan_khazanah == $value->id_keg_khazanah) {
                                            echo $s = "selected";
                                        } else {
                                            echo $s = "";
                                        }
                                        echo "<option value=$value->id_keg_khazanah $s > $value->jenis_keg_khazanah</option>";
                                    } ?>
                                </select>
                                <?= form_error('kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label for="tujuan">Tujuan</label>
                                <select class="form-control" id="tujuan" name="tujuan" onkeydown="callajax()">
                                </select>
                                <?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label for="filelokasi">File Lokasi</label>
                                <input type="text" class="form-control" name="filelokasi" placeholder="File Lokasi" value="<?= $khazanah->filelokasi_khazanah; ?>">
                                <?= form_error('filelokasi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label for="petugas">Petugas</label>
                                <input type="text" class="form-control" name="petugas" placeholder="Petugas" value="<?= $khazanah->petugas_khazanah; ?>">
                                <?= form_error('petugas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label for="pengawas">Pengawas</label>
                                <select class="form-control" id="pengawas" name="pengawas">
                                    <option>Pilih</option>
                                    <?php foreach ($pengawas as $v) {
                                    ?>
                                        <option value="<?= $v->nama_jabatan; ?>"><?= $v->nama_jabatan; ?> </option>
                                    <?php
                                    } ?>
                                </select>
                                <?= form_error('pengawas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" name="submit" type="submit">Submit form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->