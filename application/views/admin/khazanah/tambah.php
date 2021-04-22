<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase"><?= $title ?></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" action="<?= base_url('admin/jabatan/tambah') ?>" method="post">
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label for="kegiatan">Kegiatan</label>
                                <select class="form-control" name="kegiatan">
                                    <option>Satu</option>
                                    <option>Dua</option>
                                    <option>Tiga</option>
                                </select>
                                <?= form_error('kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label for="tujuan">Tujuan</label>
                                <input type="text" class="form-control" name="tujuan" placeholder="Tujuan">
                                <?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label for="norek">Nomor Rekening</label>
                                <input type="text" class="form-control" name="norek" placeholder="Nomor Rekening">
                            </div>
                            <div class="col-md-4">
                                <label for="filelokasi">File Lokasi</label>
                                <input type="text" class="form-control" name="filelokasi" placeholder="File Lokasi">
                            </div>
                            <div class="col-md-4">
                                <label for="masuk">Waktu Masuk</label>
                                <input type="time" class="form-control" name="masuk" placeholder="Waktu Masuk">
                            </div>
                            <div class="col-md-4">
                                <label for="keluar">Waktu Keluar</label>
                                <input type="time" class="form-control" name="keluar" placeholder="Waktu Keluar">
                            </div>
                            <div class="col-md-4">
                                <label for="petugas">Petugas</label>
                                <input type="text" class="form-control" name="petugas" placeholder="Petugas">
                            </div>
                            <div class="col-md-4">
                                <label for="pengawas">Pengawas</label>
                                <input type="text" class="form-control" name="pengawas" placeholder="Pengawas">
                            </div>
                            <div class="col-md-4">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" name="status" placeholder="Status">
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