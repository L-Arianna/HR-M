<div class="page-wrapper">
    <div class="page-content">
        <div class="col">
            <h3 class="mb-0 text-uppercase"><?= $title ?></h3>
            <?= $this->session->flashdata('sukses'); ?>
            <!-- Button trigger modal -->
            <a type="button" class="btn btn-primary" href="<?= base_url(); ?>Admin/Buku_Tamu/tambah">Tambah Data Tamu</a>
            </br></br>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Tamu</th>
                                    <th>Tujuan Tamu</th>
                                    <th>Keterangan</th>
                                    <th>Start Tamu</th>
                                    <th>End Tamu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $start = date_create();
                                //$r = date_format($start, '2021-04-13');
                                $r = date_format($start, 'Y-m-d');
                                $arr = array($r);
                                foreach ($buku_tamu as $v) {
                                    if (array_search($v->start, $arr) !== false) { ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $v->nama_tamu; ?></td>
                                            <td><?= $v->tujuan_tamu; ?></td>
                                            <td><?= $v->keterangan_tamu; ?></td>
                                            <td><?= $v->start_tamu; ?></td>
                                            <td><?= $v->end_tamu; ?></td>
                                            <td>
                                                <?php if ($v->end_tamu == '') {
                                                    echo "<a href=" . base_url('Admin/Buku_Tamu/tamu_selesai/' . $v->id_tamu) . " class='btn btn-success btn-sm'>Selesai</a>";
                                                } else {
                                                    echo "<button class='btn btn-info btn-sm' disabled>Selesai</button>";
                                                } ?>

                                                <a href="<?= base_url('Admin/Buku_Tamu/edit/' . $v->id_tamu) ?>" class="btn btn-warning btn-sm" visibility="hidden"><i class="bx bx-edit-alt"></i></a>
                                                <a href="<?= base_url('Admin/Buku_Tamu/hapus/' . $v->id_tamu) ?>" onclick="return confirm('yakin mau dihapus?')" class="btn btn-danger btn-sm"><i class="bx bx-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>