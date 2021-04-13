<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<h6 class="mb-0 text-uppercase"><?= $title ?></h6>
		<hr />
		<div class="card">
			<div class="card-body">
				<!-- <div class="p-4 border rounded"> -->
				<form action="<?= base_url('pegawai/cuti/tambah') ?>" method="post">
					<div class="form-group row mb-1">
						<div class="col-md-6">
							<label for="form-control">NIP</label>
							<input type="text" class="form-control" name="nip" value="<?= $user['nip'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row mb-1">
						<div class="col-md-6">
							<label for="form-control">Nama Pegawai</label>
							<input type="text" class="form-control" name="nama_pegawai" value="<?= $user['nama_pegawai'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row mb-1">
						<div class="col-md-6">
							<label for="form-control">Tanggal Mulai</label>
							<input type="date" class="form-control" name="tgl_mulai" placeholder="Tanggal Mulai" value="<?= set_value('tgl_mulai') ?>">
							<?= form_error('tgl_mulai', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row mb-1">
						<div class="col-md-6">
							<label for="form-control">Tanggal Selesai</label>
							<input type="date" class="form-control" name="tgl_selesai" placeholder="Tanggal selesai" value="<?= set_value('tgl_selesai') ?>">
							<?= form_error('tgl_selesai', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<?php foreach ($getapprove as $key) { ?>
						<div class="form-group row mb-1">
							<div class="col-md-6">
								<label for="form-control">Approval</label>
								<select name="approval" class="form-control">
									<option value="">Pilih</option>
									<option value="<?= $key->id_user ?>"><?= $key->nama ?></option>
								</select>
								<?= form_error('tgl_selesai', '<small class="text-danger pl-3">', '</small>'); ?>
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