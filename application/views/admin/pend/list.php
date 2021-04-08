<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<h6 class="mb-1 text-uppercase"><?= $title ?></h6>
		<a href="<?= base_url('admin/pend/tambah') ?>" class="btn btn-primary btn-sm mb-1">Tambah kategori pendidikan</a>
		<?= $this->session->flashdata('sukses'); ?>
		<hr />
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="example2" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Pendidikan</th>
								<th>Gaji Pendidikan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($pend as $pend) { ?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $pend->nama_pendidikan ?></td>
									<td>Rp. <?= number_format($pend->gaji_pend) ?></td>
									<td>
										<a href="<?= base_url('admin/pend/edit/' . $pend->id_pendidikan) ?>" class="btn btn-warning btn-sm"><i class="bx bx-edit-alt"></i></a>
										<a href="<?= base_url('admin/pend/hapus/' . $pend->id_pendidikan) ?>" class="btn btn-danger btn-sm"><i class="bx bx-trash-alt"></i></a>
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