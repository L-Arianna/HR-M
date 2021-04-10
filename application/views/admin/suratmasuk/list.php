<div class="page-wrapper">
    <div class="page-content">
        <div class="col">
            <!-- Button trigger modal -->
            <a type="button" class="btn btn-primary" href="<?= base_url(); ?>Admin/Surat_Masuk/tambah">Tambah Surat Masuk</a>
            </br></br>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Surat</th>
                                    <th>Surat Diterima</th>
                                    <th>Kepada</th>
                                    <th>Deposisi</th>
                                    <th>Ringkasan</th>
                                    <th>Status Surat</th>
                                    <th>Tembusan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($suratmasuk as $value) {
                                ?>

                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $value->pengirim_surat_masuk; ?></td>
                                        <td><?= $value->diterima_surat_masuk; ?></td>
                                        <td><?= $value->kepada_surat_masuk; ?></td>
                                        <td><?= $value->deposisi_surat_masuk; ?></td>
                                        <td><?= $value->ringkasan_surat_masuk; ?></td>
                                        <td><?= $value->nama_dropdown_statussuratmasuk; ?></td>
                                        <td><?= $value->tembusan_surat_masuk; ?></td>
                                        <td><a href="<?= base_url() ?>" class="btn btn-warning btn-sm"><i class="bx bx-edit-alt"></i></a>
                                            <a href="<?= base_url() ?>" class="btn btn-danger btn-sm"><i class="bx bx-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>