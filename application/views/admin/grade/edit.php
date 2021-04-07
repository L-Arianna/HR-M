<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">

		<h6 class="mb-0 text-uppercase"><?= $title ?></h6>
		<hr />
		<div class="card col-md-6">
			<div class="card-body">
				<div class="p-4 border rounded">
					<form class="row g-3" action="<?= base_url('admin/grade/edit/' . $grade->id_grade) ?>" method="post">
						<div class="row mb-2">
							<div class="col-md">
								<label for="nama_grade">Nama Grade</label>
								<input type="text" class="form-control" name="nama_grade" value="<?= $grade->nama_grade ?>">
								<?= form_error('nama_grade', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<!-- <div class="col-md-6">
								<label for="gaji_grade">Gaji Grade</label>
								<input type="text" class="form-control" name="gaji_grade" value="<?= $grade->gaji_grade ?>">
								<?= form_error('gaji_grade', '<small class="text-danger pl-3">', '</small>'); ?>
							</div> -->
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