<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">

		<h6 class="mb-0 text-uppercase"><?= $title ?></h6>
		<hr />
		<div class="card">
			<div class="card-body">
				<div class="p-4 border rounded">
					<form class="row g-3" action="<?= base_url('admin/sp/tambah') ?>" method="post">
						<div class="row">
							<div class="col-md-12">
								<label for="nama_cuti" class="form-label">Nama Peringatan</label>
								<input type="text" name="nama_peringatan" placeholder="Nama Peringatan" class="form-control" value="<?= set_value('nama_peringatan') ?>">
								<?= form_error('nama_peringatan', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="validationServer01" class="form-label">Keterangan Peringatan</label>
								<textarea name="keterangan" class="form-control" placeholder="Keterangan"><?= set_value('keterangan') ?></textarea>
								<?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
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