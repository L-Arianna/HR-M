<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<h6 class="mb-1 text-uppercase"><?= $title ?></h6>
		<a href="<?= base_url('admin/sp/tambah') ?>" class="btn btn-primary btn-sm mb-1">Tambah kategori peringatan</a>
		<?= $this->session->flashdata('sukses'); ?>
		<hr />
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="example2" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Peringatan</th>
								<th>Keterangan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($sp as $sp) { ?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $sp->nama_peringatan ?></td>
									<td><?= $sp->keterangan ?></td>
									<td>
										<a href="<?= base_url('admin/sp/edit/' . $sp->id_kat_peringatan) ?>" class="btn btn-warning btn-sm"><i class="bx bx-edit-alt"></i></a>
										<a href="<?= base_url('admin/sp/hapus/' . $sp->id_kat_peringatan) ?>" class="btn btn-danger btn-sm"><i class="bx bx-trash-alt"></i></a>
									</td>
								</tr>
								<?php $no++; ?>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end page wrapper -->