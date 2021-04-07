<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">

		<h6 class="mb-0 text-uppercase"><?= $title ?></h6>
		<hr />
		<div class="card">
			<div class="card-body">
				<div class="p-4 border rounded">
					<form class="row g-3" action="<?= base_url('admin/cuti/edit/' . $cuti->id_kat_cuti) ?>" method="post">
						<div class="row">
							<div class="col-md-6">
								<label for="nama_cuti" class="form-label">Nama Cuti</label>
								<input type="text" name="nama_cuti" placeholder="Nama cuti" class="form-control" value="<?= $cuti->nama_cuti ?>">
								<?= form_error('nama_cuti', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="col-md-6">
								<label for="validationServer01" class="form-label">Jumlah Hari</label>
								<input type="text" name="jumlah_hari" class="form-control" placeholder="Jumlah hari" value="<?= $cuti->jumlah_hari ?>">
								<?= form_error('jumlah_hari', '<small class="text-danger pl-3">', '</small>'); ?>
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