<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <h6 class="mb-0 text-uppercase"><?= $title ?></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <?//= form_open_multipart(base_url('admin/pegawai/edit/' . $pegawai->nip)) ?>
                    <div class="row mb-1">
                        <div class="col-md-3">
                            <label for="form-control">NIP</label>
                            <input type="text" class="form-control" name="nip" value="<?//= $pegawai->nip ?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="form-control">Nama Pegawai</label>
                            <input type="text" name="nama_pegawai" class="form-control" value="<?//= $pegawai->nama_pegawai ?>" placeholder="Nama Pegawai">
                            <?= form_error('nama_pegawai', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-3">
                            <label for="form-control">Tempat lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" value="<?//= $pegawai->tempat_lahir ?>" placeholder="Tempat lahir Pegawai">
                            <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-3">
                            <label for="form-control">Tanggal lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="<?//= $pegawai->tanggal_lahir ?>">
                            <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-3">
                            <label for="form-control">Alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Alamat Pegawai" value="<?//= $pegawai->alamat ?>">
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-3">
                            <label for="form-control">Jenis kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="<?= $pegawai->jenis_kelamin ?>">
                                    <?//= $pegawai->jenis_kelamin ?>
                                </option>
                                <?php //if ($pegawai->jenis_kelamin == 'Perempuan') { 
                                ?>
                                <option value="Laki-laki">laki-laki</option>
                                <?php //} elseif ($pegawai->jenis_kelamin == 'Laki-laki') { 
                                ?>
                                <option value="Perempuan">perempuan</option>
                                <?php //} else { 
                                ?>
                                <option value="Laki-laki">laki-laki</option>
                                <option value="Perempuan">perempuan</option>
                                <?php //} 
                                ?>
                            </select>
                            <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-3">
                            <label for="form-control">Agama</label>
                            <select name="agama" class="form-control">
                                <option value="Islam"><?= $pegawai->agama ?></option>
                                <?php //if ($pegawai->agama == 'Islam') { 
                                ?>
                                <option value="Hindhu">Hindhu</option>
                                <option value="Budha">Budha</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katholik">Katholik</option>
                                <?php //} elseif ($pegawai->agama == 'Hindhu') { 
                                ?>
                                <option value="Islam">Islam</option>
                                <option value="Budha">Budha</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katholik">Katholik</option>
                                <?php //} elseif ($pegawai->agama == 'Budha') { 
                                ?>
                                <option value="Islam">Islam</option>
                                <option value="Hindhu">Hindhu</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katholik">Katholik</option>
                                <?php //} elseif ($pegawai->agama == 'Kristen') { 
                                ?>
                                <option value="Islam">Islam</option>
                                <option value="Hindhu">Hindhu</option>
                                <option value="Budha">Budha</option>
                                <option value="Katholik">Katholik</option>
                                <?php //} elseif ($pegawai->agama == 'Katholik') { 
                                ?>
                                <option value="Islam">Islam</option>
                                <option value="Hindhu">Hindhu</option>
                                <option value="Budha">Budha</option>
                                <option value="Kristen">Kristen</option>
                                <?php //} 
                                ?>
                            </select>
                            <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>

                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-3">
                            <label for="form-control">Nomor Telepon</label>
                            <input type="text" name="no_telp" class="form-control" placeholder="Nomor Telepon" value="<?//= $pegawai->no_telp ?>">
                            <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-3">
                            <label for="form-control">Asal Negara</label>
                            <select name="asal_negara" class="form-control">
                                <option value="Warga Negara Indonesia"><?= $pegawai->asal_negara ?></option>
                                <?php //if ($pegawai->asal_negara == 'Warga Negara Indonesia') { 
                                ?>
                                <option value="Warga Negara Asing">Warga Negara Asing</option>
                                <?php //} elseif ($pegawai->asal_negara == 'Warga Negara Asing') { 
                                ?>
                                <option value="Warga Negara Asing">Warga Negara Indonesia</option>
                                <?php //} 
                                ?>
                            </select>
                            <?= form_error('asal_negara', '<small class="text-danger pl-3">', '</small>'); ?>

                        </div>
                        <div class="col-md-3">
                            <label for="form-control">Status Perkawinan</label>
                            <select name="status_nikah" class="form-control">
                                <option value="Belum"><?= $pegawai->status_nikah ?></option>
                                <?php //if ($pegawai->status_nikah == 'Belum') { 
                                ?>
                                <option value="Menikah">Menikah</option>
                                <option value="Duda">Duda</option>
                                <option value="Janda">Janda</option>
                                <?php //} elseif ($pegawai->status_nikah == 'Menikah') { 
                                ?>
                                <option value="Belum">Belum</option>
                                <option value="Duda">Duda</option>
                                <option value="Janda">Janda</option>
                                <?php //} elseif ($pegawai->status_nikah == 'Duda') { 
                                ?>
                                <option value="Belum">Belum</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Janda">Janda</option>
                                <?php //} elseif ($pegawai->status == 'Janda') { 
                                ?>
                                <option value="Belum">Belum</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Duda">Duda</option>
                                <?php //} else { 
                                ?>
                                <option value="Belum">Belum</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Duda">Duda</option>
                                <?php //} 
                                ?>
                            </select>
                            <?= form_error('status_nikah', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-3">
                            <label for="form-control">Nama Jabatan</label>
                            <select name="id_kat_jabatan" id="jabatan" class="form-control">
                                <option value="<?//= $pegawai->id_kat_jabatan ?>">
                                    <?//= $pegawai->nama_jabatan ?>
                                </option>
                                <?php //foreach ($jab as $j) { 
                                ?>
                                <option value="<?//= $j->id_kat_jabatan ?>">
                                    <?//= $j->nama_jabatan ?>
                                </option>
                                <?php //} 
                                ?>
                            </select>
                            <?= form_error('id_kat_jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-3">
                            <label for="form-control">Grade jabatan</label>
                            <select name="id_grade" id="grade" class="form-control">
                                <option value="<?//= $pegawai->id_grade ?>">
                                    <?//= $pegawai->nama_grade ?>
                                </option>
                                <?php //foreach ($grade as $g) { 
                                ?>
                                <option value="<?= $g->id_grade ?>">
                                    <?= $g->nama_grade ?>
                                </option>
                                <?php //} 
                                ?>
                            </select>
                            <?= form_error('id_grade', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-3">
                            <label for="form-control">Golongan Pegawai</label>
                            <select name="id_kat_golongan" id="subgrade" class="form-control">
                                <option value="<?//= $pegawai->id_kat_golongan ?>">
                                    <?//= $pegawai->nama_golongan ?>
                                </option>
                                <option value="">Pilih</option>
                            </select>
                            <?= form_error('id_kat_golongan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-3">
                            <label for="form-control">Nama Pendidikan</label>
                            <select name="id_pendidikan" id="pend" class="form-control">
                                <option value="<?//= $pegawai->id_pendidikan ?>">
                                    <?//= $pegawai->nama_pendidikan ?>
                                </option>
                                <?php //foreach ($pend as $g) { 
                                ?>
                                <option value="<?//= $g->id_pendidikan ?>">
                                    <?//= $g->nama_pendidikan ?>
                                </option>
                                <?php //} 
                                ?>
                            </select>
                            <?= form_error('id_pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>

                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-3">
                            <label for="form-control">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email Pegawai" value="<?//= $pegawai->email ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-3">
                            <label for="form-control">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username Pegawai" value="<?//= $pegawai->username ?>">
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-3">
                            <label for="form-control">Hak akses</label>
                            <select name="role_id" class="form-control">
                                <option value="">pilih</option>
                                <option value="1">Super Admin</option>
                                <option value="2">Admin</option>
                                <option value="3">pegawai</option>
                            </select>
                            <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit"><i class="bx bx-save"></i> Submit form</button>
                    </div>
                    <!-- </form> -->
                    <?//php form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->