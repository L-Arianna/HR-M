<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase"><?= $title ?></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" action="<?= base_url('Admin/Khazanah/add') ?>" method="post">
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label for="kegiatan">Kegiatan</label>
                                <select class="form-control" name="kegiatan">
                                    <option>Pilih</option>
                                    <?php foreach ($kegiatan as $value) {
                                    ?>
                                        <option value="<?= $value->id_keg_khazanah; ?>"><?= $value->jenis_keg_khazanah ?> </option>
                                    <?php
                                    } ?>
                                </select>
                                <?= form_error('kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label for="tujuan">Tujuan</label>
                                <select class="form-control" name="tujuan">
                                    <option> Pilih </option>
                                    <?php if ($this->session->userdata('username') == 'admin') {
                                        echo "<option value=audit>Audit</option>";
                                    } ?>
                                    <option value="operasional">Operasional Harian</option>
                                </select>
                                <?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label for="filelokasi">File Lokasi</label>
                                <input type="text" class="form-control" name="filelokasi" placeholder="File Lokasi">
                                <?= form_error('filelokasi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label for="petugas">Petugas</label>
                                <input type="text" class="form-control" name="petugas" placeholder="Petugas">
                                <?= form_error('petugas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label for="pengawas">Pengawas</label>
                                <input type="text" class="form-control" name="pengawas" placeholder="Pengawas">
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