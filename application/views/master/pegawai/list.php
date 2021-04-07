<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <a href="<?= base_url('master/pegawai/tambah') ?>" class="btn btn-primary btn-sm mb-2">Tambah Data Pegawai</a>
    <?= $this->session->flashdata('sukses'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($peg as $peg) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td>
                                    <img width="15%" src="<?= base_url('assets/img/profile/' . $peg->image) ?>">
                                    <br><small>
                                        <br>Nama Pegawai : <?= $peg->nama_pegawai ?>
                                        <br>Email : <?= $peg->email ?>
                                        <br>Telepon : <?= $peg->no_telp ?>
                                    </small>
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
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->