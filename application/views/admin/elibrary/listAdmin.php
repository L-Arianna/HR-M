<div class="page-wrapper">
    <div class="page-content">
        <a type="button" class="btn btn-primary" href="<?= base_url(); ?>Admin/E_Library/tambah_admin">Tambah</a>
        </br></br>
        <div class="card">
            <div class="card-body">
                <h3 class="mb-0 text-uppercase"><?= $title ?></h3>
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
                            //foreach ($x as $v) {
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= 'judul'; ?></td>
                                <td><?= 'keterangan'; ?></td>
                                <td><?= 'namafile'; ?></td>
                                <td>
                                    <a href="<?= base_url('Admin/E_Library/edit/') ?>" class="btn btn-warning btn-sm"><i class="bx bx-edit-alt"></i></a>
                                    <a href="<?= base_url('Admin/E_Library/hapus/') ?>" onclick="return confirm('yakin mau dihapus?')" class="btn btn-danger btn-sm"><i class="bx bx-trash-alt"></i></a>
                                </td>

                                <td><input type="checkbox" class="check-item" name="idlib[]" value="xxx"></td>
                            </tr>
                            <?php $no++; ?>
                            <?php
                            //} 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>