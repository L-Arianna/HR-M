<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">

		<h6 class="mb-0 text-uppercase"><?= $title ?></h6>
		<hr />
		<div class="card">
			<div class="card-body">
				<div class="p-4 border rounded">
					<form class="row g-3" action="<?= base_url('admin/jabatan/edit/' . $jabatan->id_kat_jabatan) ?>" method="post">
						<div class="row mb-2">
							<div class="col-md-4">
								<label for="nama_jabatan">Nama Jabatan</label>
								<input type="text" class="form-control" name="nama_jabatan" placeholder="Nama jabatan" value="<?= $jabatan->nama_jabatan ?>" readonly>
								<?= form_error('nama_jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="col-md-4">
								<label for="gapok">Gaji Pokok</label>
								<input type="text" class="form-control" name="gapok" placeholder="Gaji Pokok" value="<?= $jabatan->gapok ?>">
								<?= form_error('gapok', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="col-md-4">
								<label for="gaji_jabatan">Gaji Jabatan</label>
								<input type="text" class="form-control" name="gaji_jabatan" placeholder="Gaji jabatan" value="<?= $jabatan->gaji_jabatan ?>">
								<?= form_error('gaji_jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="col-12">
							<button class="btn btn-primary" name="submit" type="submit">Submit form</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end page wrapper -->