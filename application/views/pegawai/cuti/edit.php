<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<h6 class="mb-0 text-uppercase"><?= $title ?></h6>
		<hr />
		<div class="card">
			<div class="card-body">
				<?php $tanggal = date("Y-m-d H:i:s");

				$j = $this->session->userdata('nip');
				$sql = "SELECT * FROM `tb_detail_cuti` WHERE `nip` = $j  AND `sisa_cuti`";
				$num = $this->db->query($sql)->num_rows();
				$query = $this->db->query($sql)->row_array();
				?>
				<!-- <div class="p-4 border rounded"> -->
				<form action="<?= base_url('Pegawai/Cuti/edit/' . $cuti->id_detail_cuti) ?>" method="post">
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
							<input type="text" class="form-control" name="no_hp_darurat" placeholder="Nomor hp darurat" value="<?= $cuti->no_hp_darurat ?>">
							<?= form_error('no_hp_darurat', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="col-md-3">
							<label for="form-control">Alamat Pegawai</label>
							<input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?= $cuti->alamat ?>">
							<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="row mb-1">
						<div class="col-md-3">
							<label for="form-control">Pilih Jenis Cuti</label>
							<select name="id_kat_cuti" class="form-control" id="all">
								<option value="<?= $cuti->id_kat_cuti ?>"><?php if ($cuti->id_kat_cuti == 1) {
																							echo 'Cuti Tahunan';
																						} ?></option>
							</select>
							<?= form_error('id_kat_cuti', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="col-md-3">
							<label for="form-control">Total Akhir Cuti Pegawai</label>
							<input type="text" name="total" id="jumlah" class="form-control" value="<?php if ($num < 1) {
																																echo '12';
																															} else {
																																echo	$query['sisa_cuti'];
																															} ?>" readonly>
						</div>
						<div class="col-md-3">
							<label for="form-control">Jumlah Cuti Di ambil</label>
							<input type="text" class="form-control" name="jumlah_ambil" placeholder="Jumlah hari cuti" id="harga" value="<?= $cuti->jumlah_ambil ?>" required>
						</div>
						<div class="col-md-3">
							<label for="form-control">Sisa Cuti</label>
							<input type="text" class="form-control" name="sisa_cuti" id="total" placeholder="Sisa Cuti" value="<?= $cuti->sisa_cuti ?>" readonly>
						</div>
					</div>
					<div class="row mb-1">
						<div class="col-md-4">
							<label for="form-control">Tanggal Mulai</label>
							<input type="date" class="form-control" name="tgl_mulai" value="<?= $cuti->tgl_mulai ?>">
							<?= form_error('tgl_mulai', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="col-md-4">
							<label for="form-control">Tanggal Selesai</label>
							<input type="date" class="form-control" name="tgl_selesai" value="<?= $cuti->tgl_selesai ?>">
							<?= form_error('tgl_selesai', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="row mb-1">
						<label for="form-control">Keterangan Cuti pegawai</label>
						<div class="col-md-12">
							<textarea class="form-control" placeholder="Keterangan" name="keterangan"><?= $cuti->keterangan ?></textarea>
						</div>
					</div>

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