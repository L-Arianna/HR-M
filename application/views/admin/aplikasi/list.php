<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-1 text-uppercase"><?= $title ?></h6>
        <a href="<?= base_url() ?>Admin/Aplikasi/tambah" class="btn btn-primary btn-sm mb-1">Tambah Data Aplikasi</a>
        <?= $this->session->flashdata('sukses'); ?>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pemohon</th>
                                <th>Jenis Kelamin</th>
                                <th>No KTP</th>
                                <th>Alamat Pemohon</th>
                                <th>Nama Perusahaan</th>
                                <th>Alamat Perusahaan</th>
                                <th>Omzet Per-Bulan</th>
                                <th>No Aplikasi</th>
                                <th>Nama Analisis Kredit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->