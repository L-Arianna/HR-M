<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-1 text-uppercase"><?= $title ?></h6>
        <a href="<?= base_url('admin/pegawai/tambah') ?>" class="btn btn-primary btn-sm mb-1">Tambah data pegawai</a>
        <?= $this->session->flashdata('sukses'); ?>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama Pegawai</th>
                                <th>Alamat</th>
                                <th>Kontak</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($peg as $peg) { ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $peg->nip ?></td>
                                    <td><?= $peg->nama_pegawai ?>
                                        <small>
                                            <br>Status Pegawai :<?php if ($peg->is_active == 1) { ?>
                                            <span class="badge bg-success">Aktif</span>
                                        <?php    } else { ?>
                                            <span class="badge bg-danger">Non Aktif</span>
                                        <?php } ?>
                                        </small>

                                    </td>
                                    <td>
                                        <small>
                                            Alamat : <?= $peg->alamat ?>
                                            <br>Tempat dan tanggal lahir : <?= $peg->tempat_lahir ?>, <?= $peg->tanggal_lahir ?>
                                            <br>Jenis kelamin : <?= $peg->jenis_kelamin ?>
                                            <br>Agama : <?= $peg->agama ?>
                                            <br>Status nikah : <?= $peg->status_nikah ?>
                                            <br>Kebangsaan : <?= $peg->asal_negara ?>
                                        </small>
                                    </td>
                                    <td> Email : <?= $peg->email ?>
                                        <small>
                                            <br>Nomor Telepon : <?= $peg->no_telp ?>
                                        </small>
                                    </td>
                                    <td>
                                        <?php if ($peg->is_active == 1) { ?>
                                            <a href="<?= base_url('admin/pegawai/edit/' . $peg->nip) ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="edit data pegawai"><i class="bx bx-edit-alt"></i></a>

                                            <a href="<?= base_url('admin/pegawai/resign/' . $peg->nip) ?>" class="btn btn-danger btn-sm"><i class="bx bx-log-out" data-bs-toggle="tooltip" data-bs-placement="top" title="tambah data resign"></i></a>
                                        <?php } else { ?>
                                            <a href="<?= base_url('admin/pegawai/hapus/' . $peg->nip) ?>" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="hapus data pegawai"><i class="bx bx-trash-alt"></i></a>
                                        <?php } ?>
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
<!--end page wrapper -->