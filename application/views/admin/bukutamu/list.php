<div class="page-wrapper">
    <div class="page-content">
        <div class="col">
            <h3 class="mb-0 text-uppercase"><?= $title ?></h3>
            <?= $this->session->flashdata('sukses'); ?>
            <div class="card shadow-none bg-transparent border-bottom border-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <h4 class="mb-3 mb-md-0">Audience Overview</h4>
                        </div>
                        <div class="col-md-9">
                            <form action="<?= base_url(); ?>Admin/Buku_Tamu/cari" class="float-md-end" method="POST">
                                <div class="row row-cols-md-auto g-lg-3">
                                    <label for="inputFromDate" class="col-md-2 col-form-label text-md-end">From Date</label>
                                    <div class="col-md-4">
                                        <input type="date" class="form-control" name="tgl1" id="inputFromDate">
                                    </div>
                                    <label for="inputToDate" class="col-md-2 col-form-label text-md-end">To Date</label>
                                    <div class="col-md-4">
                                        <input type="date" class="form-control" name="tgl2" id="inputToDate">
                                    </div>
                                    <div class="col-md-4">
                                        <button class="form-control btn btn-info btn-sm" name="caritanggal" type="submit">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow-none bg-transparent">
                <div class="card-body">

                    <div id="chart1"></div>
                </div>
            </div>
            <!-- Button trigger modal -->
            <a type="button" class="btn btn-primary btn-sm" href="<?= base_url(); ?>Admin/Buku_Tamu/tambah">Tambah Data Tamu</a>
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
                                if (isset($_POST['caritanggal'])) {
                                    foreach ($cart as $v) { ?>
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
                                        <?php
                                    }
                                } else {
                                    $awal = date_create();
                                    //$r = date_format($start, '2021-04-14');
                                    $r = date_format($awal, 'Y-m-d');
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
                                                    <a href="<?= base_url('Admin/Buku_Tamu/hapus/' . $v->id_tamu) ?>" onclick="return confirm('yakin mau dihapus?')" class="btn btn-danger btn-sm"><i class="bx bx-trash-alt"></i>aaa</a>
                                                </td>
                                            </tr>
                                <?php $no++;
                                        }
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>