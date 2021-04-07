<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">

		<h6 class="mb-0 text-uppercase"><?= $title ?></h6>
		<hr />
		<div class="card">
			<div class="card-body">
				<div class="p-4 border rounded">
					<form class="row g-3" action="<?= base_url('admin/golongan/edit/' . $gol->id_kat_golongan) ?>" method="post">
						<div class="row mb-2">
							<div class="col-md-6">
								<label for="nama_golongan">Nama Golongan</label>
								<input type="text" class="form-control" name="nama_golongan" placeholder="Nama Golongan" value="<?= $gol->nama_golongan ?>" readonly>
								<?= form_error('nama_golongan', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<input type="hidden" class="form-control" name="id_grade" placeholder="Nama Golongan" value="<?= $gol->id_grade ?>" readonly>
							<?= form_error('nama_golongan', '<small class="text-danger pl-3">', '</small>'); ?>
							<div class="col-md-6">
								<label for="gaji_gol">Gaji Golongan</label>
								<input type="text" class="form-control" name="gaji_gol" placeholder="Gaji Golongan" value="<?= $gol->gaji_gol ?>">
								<?= form_error('gaji_gol', '<small class="text-danger pl-3">', '</small>'); ?>
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