<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <h6 class="mb-0 text-uppercase"><?= $title ?></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" action="<?= base_url('Admin/Pegawai/tambah') ?>" method="post">
                        <div class="row mb-1">
                            <div class="col-md-3">
                                <label for="form-control">NIP</label>
                                <input type="text" class="form-control" name="nip" value="<?= $getnip ?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Nomor KTP</label>
                                <input type="text" name="nomor_ktp" class="form-control" value="<?= set_value('nomor_ktp') ?>" placeholder="Nomor KTP">
                                <?= form_error('nomor_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Nomor NPWP</label>
                                <input type="text" name="npwp" class="form-control" value="<?= set_value('npwp') ?>" placeholder="Nomor NPWP">
                                <?= form_error('npwp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Nama pegawai</label>
                                <input type="text" name="nama_pegawai" class="form-control" value="<?= set_value('nama_pegawai') ?>" placeholder="Nama Pegawai">
                                <?= form_error('nama_pegawai', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Alamat tinggal</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?= set_value('alamat') ?>">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Kelurahan</label>
                                <input type="text" name="kelurahan" class="form-control" placeholder="kelurahan" value="<?= set_value('kelurahan') ?>">
                                <?= form_error('kelurahan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-2">
                                <label for="form-control">RW</label>
                                <input type="text" name="rt" class="form-control" placeholder="006" value="<?= set_value('rt') ?>">
                                <?= form_error('rt', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-2">
                                <label for="form-control">RW</label>
                                <input type="text" name="rw" class="form-control" placeholder="005" value="<?= set_value('rw') ?>">
                                <?= form_error('rw', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-2">
                                <label for="form-control">Kecamatan</label>
                                <input type="text" name="kecamatan" class="form-control" placeholder="kecamatan" value="<?= set_value('kecamatan') ?>">
                                <?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-3">
                                <label for="form-control">Dusun</label>
                                <input type="text" name="desa" class="form-control" placeholder="Desa" value="<?= set_value('desa') ?>">
                                <?= form_error('desa', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Nomor telepon</label>
                                <input type="text" name="no_telp" class="form-control" placeholder="Nomor Telepon" value="<?= set_value('no_telp') ?>">
                                <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-2">
                                <label for="form-control">Nama bank</label>
                                <input type="text" name="nama_bank" class="form-control" placeholder="Nama bank" value="<?= set_value('nama_bank') ?>">
                                <?= form_error('nama_bank', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-2">
                                <label for="form-control">Nomor rekening</label>
                                <input type="text" name="no_rek" class="form-control" placeholder="Nomor rekening" value="<?= set_value('no_rek') ?>">
                                <?= form_error('no_rek', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-2">
                                <label for="form-control">Atas nama rekening</label>
                                <input type="text" name="atas_nama" class="form-control" placeholder="Atas nama rekening" value="<?= set_value('atas_nama') ?>">
                                <?= form_error('atas_nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-2">
                                <label for="form-control">Jenis kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-2">
                                <label for="form-control">Tempat lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat lahir" value="<?= set_value('tempat_lahir') ?>">
                                <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-2">
                                <label for="form-control">Tanggal lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" value="<?= set_value('tanggal_lahir') ?>">
                                <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-2">
                                <label for="form-control">Agama</label>
                                <select name="agama" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindhu">Hindhu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katholik">Katholik</option>
                                </select>
                                <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-2">
                                <label for="form-control">Asal Negara</label>
                                <select name="asal_negara" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Warga Negara Indonesia">Warga Negara Indonesia</option>
                                    <option value="Warga Negara Asing">Warga Negara Asing</option>
                                </select>
                                <?= form_error('asal_negara', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-2">
                                <label for="form-control">Status Perkawinan</label>
                                <select name="status_nikah" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Belum">Belum</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Duda">Duda</option>
                                    <option value="Janda">Janda</option>
                                </select>
                                <?= form_error('status_nikah', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-3">
                                <label for="form-control">Nama Jabatan</label>
                                <select name="id_kat_jabatan" id="jabatan" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php foreach ($jab as $g) { ?>
                                        <option value="<?= $g->id_kat_jabatan ?>">
                                            <?= $g->nama_jabatan ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <?= form_error('id_kat_jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Grade Jabatan</label>
                                <select name="id_grade" id="grade" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php foreach ($grade as $g) { ?>
                                        <option value="<?= $g->id_grade ?>">
                                            <?= $g->nama_grade ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <?= form_error('id_grade', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Golongan Pegawai</label>
                                <select name="id_kat_golongan" id="subgrade" class="form-control">
                                    <option value="">Pilih</option>
                                </select>
                                <?= form_error('id_kat_golongan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-3">
                                <label for="form-control">Nama Pendidikan</label>
                                <select name="id_pendidikan" id="pend" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php foreach ($pend as $g) { ?>
                                        <option value="<?= $g->id_pendidikan ?>">
                                            <?= $g->nama_pendidikan ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <?= form_error('id_pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                <label for="form-control">Hak Akses</label>
                                <select name="role_id" class="form-control">
                                    <option value="">pilih</option>
                                    <option value="1">pegawai A</option>
                                    <option value="2">pegawai B</option>
                                    <option value="3">pegawai C</option>
                                </select>
                                <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary btn-sm" name="submit" type="submit">Submit form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->