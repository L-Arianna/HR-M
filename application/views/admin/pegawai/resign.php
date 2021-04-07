<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">

		<h6 class="mb-0 text-uppercase"><?= $title ?></h6>
		<hr />
		<div class="card">
			<div class="card-body">
				<div class="p-4 border rounded">
					<?= form_open_multipart(base_url('admin/pegawai/resign/' . $pegawai->nip)) ?>
					<div class="row mb-1">
						<div class="col-md-3">
							<label for="form-control">NIP</label>
							<input type="text" class="form-control" name="nip" value="<?= $pegawai->nip ?>" readonly>
						</div>
						<div class="col-md-3">
							<label for="form-control">Nama Pegawai</label>
							<input type="text" name="nama_pegawai" class="form-control" value="<?= $pegawai->nama_pegawai ?>" readonly>
						</div>
						<div class="col-md-3">
							<label for="form-control">Tempat lahir</label>
							<input type="text" name="tempat_lahir" class="form-control" value="<?= $pegawai->tempat_lahir ?>" readonly>
						</div>
						<div class="col-md-3">
							<label for="form-control">Tanggal lahir</label>
							<input type="date" name="tanggal_lahir" class="form-control" value="<?= $pegawai->tanggal_lahir ?>" readonly>
						</div>
					</div>
					<div class="row mb-1">
						<div class="col-md-3">
							<label for="form-control">Alamat</label>
							<input type="text" name="alamat" class="form-control" value="<?= $pegawai->alamat ?>" readonly>
						</div>
						<div class="col-md-3">
							<label for="form-control">Jenis kelamin</label>
							<input type="text" name="jenis_kelamin" class="form-control" value="<?= $pegawai->jenis_kelamin ?>" readonly>
						</div>
						<div class="col-md-3">
							<label for="form-control">Agama</label>
							<input type="text" name="agama" class="form-control" value="<?= $pegawai->agama ?>" readonly>
						</div>
					</div>
					<div class="row mb-1">
						<div class="col-md-3">
							<label for="form-control">Nomor Telepon</label>
							<input type="text" name="no_telp" class="form-control" value="<?= $pegawai->no_telp ?>" readonly>
						</div>
						<div class="col-md-3">
							<label for="form-control">Asal Negara</label>
							<input type="text" name="asal_negara" class="form-control" value="<?= $pegawai->asal_negara ?>" readonly>
						</div>
						<div class="col-md-3">
							<label for="form-control">Status Perkawinan</label>
							<input type="text" name="status_nikah" class="form-control" value="<?= $pegawai->status_nikah ?>" readonly>
						</div>
					</div>
					<div class="row mb-1">
						<div class="col-md-3">
							<label for="form-control">Nama Jabatan</label>
							<input type="text" name="id_kat_jabatan" class="form-control" value="<?= $pegawai->nama_jabatan ?>" readonly>
						</div>
						<div class="col-md-3">
							<label for="form-control">Grade jabatan</label>
							<input type="text" name="id_grade" class="form-control" value="<?= $pegawai->nama_grade ?>" readonly>
						</div>
						<div class="col-md-3">
							<label for="form-control">Golongan Pegawai</label>
							<input type="text" name="id_kat_golongan" class="form-control" value="<?= $pegawai->nama_golongan ?>" readonly>
						</div>
						<div class="col-md-3">
							<label for="form-control">Nama Pendidikan</label>
							<input type="text" name="id_pendidikan" class="form-control" value="<?= $pegawai->nama_pendidikan ?>" readonly>
						</div>
					</div>
					<div class="row mb-1">
						<div class="col-md-3">
							<label for="form-control">Email</label>
							<input type="text" name="email" class="form-control" value="<?= $pegawai->email ?>" readonly>
						</div>
						<div class="col-md-3">
							<label for="form-control">Username</label>
							<input type="text" name="username" class="form-control" value="<?= $pegawai->username ?>" readonly>
						</div>
						<div class="col-md-3">
							<label for="form-control">Hak akses</label>
							<input type="text" name="role_id" class="form-control" value="<?php if ($pegawai->role_id == 1) {
																													echo 'Super Admin';
																												} elseif ($pegawai->role_id == 2) {
																													echo 'Admin';
																												} else {
																													echo 'Pegawai';
																												} ?>" readonly>
						</div>
					</div>

					<hr style="height:2px;border-width:0;color:gray;background-color:gray">
					<div class="row mb-1">
						<div class="col-md-4">
							<label for="form-control">Tanggal resign</label>
							<?php $tgl_resign = date('d-m-Y'); ?>
							<input type="text" name="tgl_resign" class="form-control" value="<?= $tgl_resign ?>" readonly>
						</div>
						<div class="col-md-4">
							<label for="form-control">Ganti status pegawai </label>
							<select name="is_active" class="form-control">
								<option>pilih</option>
								<option value="0">Non aktif</option>
								<option disabled="disabled" value="1">Aktif</option>
							</select>
						</div>
					</div>
					<div class="row mb-2">
						<label for="form-control">Keterangan resign pegawai</label>
						<div class="col-md-12">
							<textarea id="mytextarea" class="form-control" name="keterangan"><?= set_value('keterangan') ?></textarea>
						</div>
					</div>
					<div class="col-12">
						<button class="btn btn-primary btn-sm" name="submit" type="submit"><i class="bx bx-save"></i> Submit form</button>
					</div>
					<!-- </form> -->
					<?php form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end page wrapper -->