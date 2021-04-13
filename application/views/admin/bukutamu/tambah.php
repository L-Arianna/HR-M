<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <h6 class="mb-0 text-uppercase"><?= $title ?></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" action="<?= base_url('Admin/Buku_Tamu/add') ?>" method="post">
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label>Nama Tamu</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label>Tujuan / Kepentingan</label>
                                <input type="text" class="form-control" name="tujuan" placeholder="Tujuan">
                                <?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label>Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" placeholder="Tujuan">
                                <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label>Waktu Datang</label>
                                <input class="form-control" type="text" name="waktustart" id="date-time" placeholder="Date Picker...">
                                <?= form_error('waktustart', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label>Waktu Selesai</label>
                                <input class="result form-control" type="text" name="waktuend" id="date-time-2" placeholder="Date Picker...">
                                <?= form_error('waktuend', '<small class="text-danger pl-3">', '</small>'); ?>
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