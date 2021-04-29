<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-1 text-uppercase"><?= $title ?></h6>
        <?= $this->session->flashdata('sukses'); ?>
        <div id="jam"></div>
        <div class="row mb-1">
            <div id="notif0" class="col-md-3"></div>
            <div id="notif1" class="col-md-3"></div>
            <div id="notif2" class="col-md-3"></div>
            <div id="notif3" class="col-md-3"></div>
        </div>
        <form method="POST" action="<?= base_url(); ?>Admin/Khazanah/multidelete2" id="form-delete">
            <div class="col mb-1">
                <div class="btn-group" role="group">
                    <a type="button" class="btn btn-primary btn-sm" href="<?= base_url(); ?>Admin/Khazanah/add">Tambah</a>
                </div>
                <button id="btn-delete" type="submit" onclick="return confirm('yakin mau dihapus?')" class="btn btn-danger btn-sm">Hapus</button>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kegiatan</th>
                                    <th>Tujuan</th>
                                    <th>File Lokasi</th>
                                    <th>Waktu Masuk</th>
                                    <th>Waktu Keluar</th>
                                    <th>Petugas</th>
                                    <th>Pengawas</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th><input type="checkbox" id="check-all"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($khazanah as $v) { ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $v->jenis_keg_khazanah ?></td>
                                        <td><?= $v->tujuan_khazanah ?></td>
                                        <td><?= $v->filelokasi_khazanah ?></td>
                                        <td><?= $v->masuk_khazanah ?></td>
                                        <td><?= $v->keluar_khazanah ?></td>
                                        <td><?= $v->petugas_khazanah ?></td>


                                        <td><?= $v->pengawas_khazanah ?></td>
                                        <td><?php if ($v->status_khazanah == 0) {
                                                echo "Belum ACC";
                                                echo "</td><td>
                                            <button id='btnkhazanah' type='button' class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#passwordKhazanah' data-tujuan=" . $v->status_khazanah . " data-id=" . $v->id_khazanah . "><i class='bx bx-edit-alt'></i>ACC</button>";
                                            } else if ($v->status_khazanah == 1) {
                                                echo "Sudah ACC";
                                                echo "</td><td>
                                            <button type='button' class='btn btn-info btn-sm' data-bs-toggle='modal' data-bs-target='#passwordKhazanah' data-tujuan=" . $v->status_khazanah . " data-id=" . $v->id_khazanah . "><i class='bx bx-edit-alt'></i>Selesai</button>";
                                            } else {
                                                echo "Selesai";
                                                echo "</td><td>
                                            <button type='button' class='btn btn-info btn-sm' data-bs-toggle='modal' data-bs-target='#passwordKhazanah' data-id=" . $v->id_khazanah . " disabled><i class='bx bx-edit-alt'></i>Ok</button>";
                                            } ?>

                                            <a href="<?= base_url('Admin/Khazanah/edit/' . $v->id_khazanah) ?>" class="btn btn-warning btn-sm"><i class="bx bx-edit-alt"></i></a>
                                        </td>
                                        <td><input type="checkbox" class="check-item" name="idkhazanah[]" value="<?= $v->id_khazanah ?>"></td>

                                    </tr>
                                    <?php $no++; ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="passwordKhazanah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?= base_url(); ?>Admin/Khazanah/otorisasi" id="formkhazanah" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Otorisasi Khazanah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="">
                    <input type="hidden" id="tujuan" name="tujuan" value="">
                    <input type="hidden" class="form-control" id="username" name="username" value="<?= $this->session->userdata('username'); ?>">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<!--end page wrapper -->