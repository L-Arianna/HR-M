<div class="page-wrapper">
    <div class="page-content">
        <div class="col">
            <?= $this->session->flashdata('sukses'); ?>
            <h3 class="mb-0 text-uppercase"><?= $title ?></h3>
            <!-- Button trigger modal -->
            <a type="button" class="btn btn-primary" href="<?= base_url(); ?>Admin/Surat_Masuk/tambah">Tambah Surat Masuk</a>
            <form method="POST" action="<?= base_url(); ?>Admin/Surat_Masuk/multidelete" id="form-delete">
                <button id="btn-delete" onclick="return confirm('yakin mau dihapus?')" class="btn btn-info">Multi Delete</button>
                </br></br>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Surat</th>
                                        <th>Pengirim Surat</th>
                                        <th>Surat Diterima</th>
                                        <th>Kepada</th>
                                        <th>Deposisi</th>
                                        <th>Ringkasan</th>
                                        <th>Status Surat</th>
                                        <th>Tembusan</th>
                                        <th>File</th>
                                        <th>Action</th>
                                        <th><input type="checkbox" id="check-all"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($suratmasuk as $value) {
                                        $exp = explode(",", $value->tembusan_surat_masuk);

                                    ?>

                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $value->nomor_surat_masuk; ?></td>
                                            <td><?= $value->pengirim_surat_masuk; ?></td>
                                            <td><?= $value->diterima_surat_masuk; ?></td>
                                            <td><?= $value->kepada_surat_masuk; ?></td>
                                            <td><?= $value->deposisi_surat_masuk; ?></td>
                                            <td><?= $value->ringkasan_surat_masuk; ?></td>
                                            <td><?= $value->status_surat_masuk; ?></td>
                                            <td><?php foreach ($y as $v) {
                                                    if (array_search($v->id_kat_jabatan, $exp) !== false) {
                                                        echo "<span class='badge rounded-pill bg-warning text-dark'>" . "[" . $v->nama_jabatan . "] " . "</span";
                                                    }
                                                } ?></td>
                                            <td><?= $value->file_surat_masuk; ?></td>
                                            <td>
                                                <a href="<?= base_url('Admin/Surat_Masuk/lihatsurat/' . $value->id_surat_masuk) ?>" target="_blank" class="btn btn-info btn-sm"><i class="bx bx-book-alt"></i></a>
                                                <a href="<?= base_url('Admin/Surat_Masuk/edit/' . $value->id_surat_masuk) ?>" class="btn btn-warning btn-sm"><i class="bx bx-edit-alt"></i></a>
                                                <a href="<?= base_url('Admin/Surat_Masuk/delete/' . $value->id_surat_masuk . '/' . $value->file_surat_masuk) ?>" onclick="return confirm('yakin mau dihapus?')" class="btn btn-danger btn-sm"><i class="bx bx-trash-alt"></i></a>
                                            </td>
                                            <td><input type="checkbox" class="check-item" name="idsurat[]" value="<?= $value->id_surat_masuk; ?>"></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                            </table>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>