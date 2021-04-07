<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">

		<h6 class="mb-0 text-uppercase"><?= $title ?></h6>

		<a href="<?= base_url('admin/grade/tambah') ?>" class="btn btn-primary btn-sm mb-1">Tambah grade jabatan</a>
		<?= $this->session->flashdata('sukses'); ?>
		<hr />
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="example2" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Grade</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							foreach ($grade as $key) { ?>
								<tr>
									<td><?= $i ?></td>
									<td><?= $key->nama_grade ?></td>
									<td>
										<a href="<?= base_url('admin/grade/edit/' . $key->id_grade) ?>" class="btn btn-warning btn-sm"><i class="bx bx-edit-alt"></i></a>
										<a href="<?= base_url('admin/grade/hapus/' . $key->id_grade) ?>" class="btn btn-danger btn-sm"><i class="bx bx-trash-alt"></i></a>
									</td>
								</tr>
							<?php $i++;
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end page wrapper -->