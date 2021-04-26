<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <h6 class="mb-0 text-uppercase"><?= $title ?></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" action="<?= base_url('Admin/Buku_Tamu/update') ?>" method="post">
                        <div class="row mb-2">
                            <input type="hidden" class="form-control" name="id_buku_tamu" placeholder="Nama" value="<?= $tamu->id_tamu; ?>" required>
                            <div class="col-md-4">
                                <label>Nama Tamu</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?= $tamu->nama_tamu; ?>" required>
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label>Tujuan / Kepentingan</label>
                                <input type="text" class="form-control" name="tujuan" placeholder="Tujuan" value="<?= $tamu->tujuan_tamu; ?>" required>
                                <?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label>Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="<?= $tamu->keterangan_tamu; ?>" required>
                                <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary btn-sm" name="submit" type="submit">Update Tamu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->