<div class="page-wrapper">
    <div class="page-content">
        <h3 class="mb-0 text-uppercase"><?= $title ?></h3>
        <a type="button" class="btn btn-primary" href="<?= base_url(); ?>Admin/E_Library/tambah_admin">Tambah</a>
        <form method="POST" action="<?= base_url(); ?>Admin/E_Library/multidelete" id="form-delete">
            <div class="card">
                <div class="row">
                    <div class="col-lg-10">
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-danger" onclick="return confirm('yakin mau dihapus?')">Hapus</button>
                    </div>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('sukses'); ?>
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Keterangan</th>
                                    <th>Nama File</th>
                                    <th>Action</th>
                                    <th><input type="checkbox" id="check-all"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($elib as $v) {
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $v->judul_book; ?></td>
                                        <td><?= $v->keterangan_book; ?></td>
                                        <td><?= $v->file_book ?></td>
                                        <td>
                                            <a href="<?= base_url('Admin/E_Library/edit/' . $v->id_book) ?>" class="btn btn-warning btn-sm"><i class="bx bx-edit-alt"></i></a>
                                        </td>

                                        <td><input type="checkbox" class="check-item" name="idlib[]" value="<?= $v->id_book; ?>"></td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
        </form>
    </div>
</div>
</div>
</div>
</div>