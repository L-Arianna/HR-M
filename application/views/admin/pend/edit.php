<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">

		<h6 class="mb-0 text-uppercase"><?= $title ?></h6>
		<hr />
		<div class="card">
			<div class="card-body">
				<div class="p-4 border rounded">
					<form class="row g-3" action="<?= base_url('admin/pend/edit/' . $pend->id_pendidikan) ?>" method="post">
						<div class="row mb-2">
							<div class="col-md-6">
								<label for="nama_pendidikan">Nama Pendidikan</label>
								<input type="text" class="form-control" name="nama_pendidikan" placeholder="Nama Pendidikan" value="<?= $pend->nama_pendidikan ?>" readonly>
								<?= form_error('nama_pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="col-md-6">
								<label for="gaji_pend">Gaji Pendidikan</label>
								<inPut type="text" class="form-control" name="gaji_pend" placeholder="Gaji Pendidikan" value="<?= $pend->gaji_pend ?>">
								<?= form_error('gaji_pend', '<small class="text-danger pl-3">', '</small>'); ?>
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