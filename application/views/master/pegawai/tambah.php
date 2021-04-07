<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="<?= base_url('master/pegawai/tambah') ?>" method="post">
                        <div class="row mb-1">
                            <div class="col-md-3">
                                <label for="form-control">NIP</label>
                                <input type="text" class="form-control" name="nip" value="<?= $getnip ?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Nama Pegawai</label>
                                <input type="text" name="nama_pegawai" class="form-control" value="<?= set_value('nama_pegawai') ?>" placeholder="Nama Pegawai">
                                <?= form_error('nama_pegawai', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Tempat lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" value="<?= set_value('tempat_lahir') ?>" placeholder="Tempat lahir Pegawai">
                                <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Tanggal lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" value="<?= set_value('tanggal_lahir') ?>">
                                <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-3">
                                <label for="form-control">Alamat</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat Pegawai" value="<?= set_value('alamat') ?>">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Jenis kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Agama</label>
                                <select name="agama" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindhu">Hindhu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katholik">Katholik</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-3">
                                <label for="form-control">Nomor Telepon</label>
                                <input type="text" name="no_telp" class="form-control" placeholder="Nomor Telepon" value="<?= set_value('no_telp') ?>">
                                <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Asal Negara</label>
                                <select name="asal_negara" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="WNI">Warga Negara Indonesia</option>
                                    <option value="WNA">Warga Negara Asing</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Status Perkawinan</label>
                                <select name="status_nikah" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Belum">Belum</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Duda">Duda</option>
                                    <option value="Janda">Janda</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-3">
                                <label for="form-control">Nama Jabatan</label>
                                <select name="id_gaji" id="jabatan" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php foreach ($gaji as $gaji) { ?>
                                        <option value="<?= $gaji->id_gaji ?>">
                                            <?= $gaji->nama_jabatan ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Golongan Pegawai</label>
                                <select name="golongan" id="golongan" class="form-control">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Pendidikan</label>
                                <select name="pend" id="pend" class="form-control">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Gaji Pokok</label>
                                <select name="gapok" id="gapok" class="form-control">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-3">
                                <label for="form-control">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email Pegawai" value="<?= set_value('email') ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username Pegawai" value="<?= set_value('username') ?>">
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password Pegawai" value="<?= set_value('password') ?>">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Hak akses</label>
                                <select name="role_id" class="form-control">
                                    <option value="1">Super Admin</option>
                                    <option value="2">Admin</option>
                                    <option value="3">pegawai</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <button class="btn btn-success btn-sm" name="submit" type="submit">
                                    <i class="fas fa-fw fa-save"></i> Simpan
                                </button>
                                <button class="btn btn-info btn-sm" name="reset" type="reset">
                                    <i class="fas fa-fw fa-times"></i> Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->