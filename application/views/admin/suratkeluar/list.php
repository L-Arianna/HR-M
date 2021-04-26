<div class="page-wrapper">
    <div class="page-content">
        <div class="col">
            <?= $this->session->flashdata('sukses'); ?>
            <h3 class="mb-0 text-uppercase"><?= $title ?></h3>
            <!-- Button trigger modal -->

            <form method="POST" action="<?= base_url(); ?>Admin/Surat_Keluar/multidelete" id="form-delete">
                <div class="col mb-1">
                    <div class="btn-group" role="group">
                        <a type="button" class="btn btn-primary btn-sm" href="<?= base_url(); ?>Admin/Surat_Keluar/tambah">Tambah Surat Masuk</a>
                    </div>
                    <button id="btn-delete" onclick="return confirm('yakin mau dihapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Surat</th>
                                        <th>Kepada</th>
                                        <th>Pengirim Surat</th>
                                        <th>Status Surat</th>
                                        <th>Keterangan</th>
                                        <th>Indexs Berkas</th>
                                        <th>File</th>
                                        <th>Action</th>
                                        <th><input type="checkbox" id="check-all"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($suratkeluar as $value) {
                                    ?>

                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $value->nomor_surat_keluar; ?></td>
                                            <td><?= $value->kepada_surat_keluar; ?></td>
                                            <td><?= $value->pengirim_surat_keluar; ?></td>
                                            <td><?= $value->nama_dropdown_statussuratmasuk; ?></td>
                                            <td><?= $value->keterangan_surat_keluar; ?></td>
                                            <td><?= $value->indexs_berkas_surat; ?></td>
                                            <td><?= $value->file_surat_keluar; ?></td>
                                            <td>
                                                <a href="<?= base_url('Admin/Surat_Keluar/lihatsurat/' . $value->id_surat_keluar) ?>" target="_blank" class="btn btn-info btn-sm"><i class="bx bx-book-alt"></i></a>
                                                <a href="<?= base_url('Admin/Surat_Keluar/edit/' . $value->id_surat_keluar) ?>" class="btn btn-warning btn-sm"><i class="bx bx-edit-alt"></i></a>
                                            </td>

                                            <td><input type="checkbox" class="check-item" name="idsurat[]" value="<?= $value->id_surat_keluar; ?>"></td>
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