<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<h6 class="mb-1 text-uppercase"><?= $title ?></h6>
		<a href="<?= base_url('admin/golongan/tambah') ?>" class="btn btn-primary btn-sm mb-1">Tambah kategori golongan</a>
		<?= $this->session->flashdata('sukses'); ?>
		<hr />
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="example2" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Golongan</th>
								<th>Gaji Golongan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($gol as $g) { ?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $g->nama_golongan ?></td>
									<td>Rp. <?= number_format($g->gaji_gol) ?></td>
									<td>
										<a href="<?= base_url('admin/golongan/edit/' . $g->id_kat_golongan) ?>" class="btn btn-warning btn-sm"><i class="bx bx-edit-alt"></i></a>
										<a href="<?= base_url('admin/golongan/hapus/' . $g->id_kat_golongan) ?>" class="btn btn-danger btn-sm"><i class="bx bx-trash-alt"></i></a>
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