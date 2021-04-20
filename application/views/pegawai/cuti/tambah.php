<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<h6 class="mb-0 text-uppercase"><?= $title ?></h6>
		<hr />
		<div class="card">
			<div class="card-body">
				<?php $tanggal = date("Y-m-d H:i:s");
				$jumlah = 12;

				?>
				<!-- <div class="p-4 border rounded"> -->
				<form action="<?= base_url('pegawai/cuti/tambah') ?>" method="post">
					<div class="row mb-1">
						<div class="col-md-3">
							<label for="form-control">NIP</label>
							<input type="text" class="form-control" name="nip" value="<?= $user['nip'] ?>" readonly>
						</div>
						<div class="col-md-3">
							<label for="form-control">Nama Pegawai</label>
							<input type="text" class="form-control" name="nama_pegawai" value="<?= $user['nama_pegawai'] ?>" readonly>
							<input type="hidden" class="form-control" name="tgl" value="<?= $tanggal ?>" readonly>
						</div>
						<div class="col-md-3">
							<label for="form-control">Nomor HP Darurat</label>
							<input type="text" class="form-control" name="no_hp_darurat" placeholder="Nomor hp darurat" value="<?= set_value('no_hp_darurat') ?>">
							<?= form_error('no_hp_darurat', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="col-md-3">
							<label for="form-control">Alamat Pegawai</label>
							<input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?= set_value('alamat') ?>">
							<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="row mb-1">
						<div class="col-md-3">
							<label for="form-control">Pilih Jenis Cuti</label>
							<select name="id_kat_cuti" class="form-control" id="all">
								<option value="">Pilih</option>
								<?php foreach ($getcuti as $key) { ?>
									<option value="<?= $key->id_kat_cuti ?>"><?= $key->nama_cuti ?></option>
								<?php } ?>
							</select>
							<?= form_error('id_kat_cuti', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="col-md-3">
							<label for="form-control">Total Awal Cuti Pegawai</label>
							<input type="hidden" name="jumlah" id="jumlah" class="form-control" value="<?= $jumlah ?>" readonly>
							<input type="text" name="jumlah" class="form-control" value="<?= $jumcuti ?>" readonly>
						</div>
						<div class="col-md-3">
							<label for="form-control">Jumlah Cuti Diambil</label>
							<input type="text" class="form-control" name="ambil" placeholder="Jumlah hari cuti" id="harga" value="<?= set_value('ambil') ?>" required>
						</div>
						<div class="col-md-3">
							<label for="form-control">Sisa Cuti</label>
							<input type="text" class="form-control" name="sisa_cuti" id="total" placeholder="Sisa Cuti" value="<?= set_value('sisa_cuti') ?>" readonly>
						</div>
					</div>
					<div class="row mb-1">
						<div class="col-md-4">
							<label for="form-control">Tanggal Mulai</label>
							<input type="date" class="form-control" name="tgl_mulai" value="<?= set_value('tgl_mulai') ?>">
							<?= form_error('tgl_mulai', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="col-md-4">
							<label for="form-control">Tanggal Selesai</label>
							<input type="date" class="form-control" name="tgl_selesai" value="<?= set_value('tgl_selesai') ?>">
							<?= form_error('tgl_selesai', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="row mb-1">
						<label for="form-control">Keterangan Cuti pegawai</label>
						<div class="col-md-12">
							<textarea class="form-control" placeholder="Keterangan" name="keterangan"><?= set_value('keterangan') ?></textarea>
						</div>
					</div>
					<?php foreach ($getapprove as $key) { ?>
						<div class="row mb-1">
							<div class="col-md-6">
								<label for="form-control">Menyetujui</label>
								<select name="id_user" class="form-control">
									<!-- <option value="">Pilih</option> -->
									<option value="<?= $key->id_user ?>"><?= $key->nama ?></option>
								</select>
								<?= form_error('id_user', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
					<?php } ?>
					<div class="row">
						<div class="col-md-2">
							<button class="btn btn-primary btn-sm" name="submit" type="submit">Submit form</button>
						</div>
					</div>
				</form>
				<!-- </div> -->
			</div>
		</div>
	</div>
</div>
<!--end page wrapper -->