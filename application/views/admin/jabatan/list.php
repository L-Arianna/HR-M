<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<h6 class="mb-1 text-uppercase"><?= $title ?></h6>
		<a href="<?= base_url('admin/jabatan/tambah') ?>" class="btn btn-primary btn-sm mb-1">Tambah kategori jabatan</a>
		<?= $this->session->flashdata('sukses'); ?>
		<hr />
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="example2" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Jabatan</th>
								<th>Gaji Pokok</th>
								<th>Gaji Jabatan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($jabatan as $jabatan) { ?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $jabatan->nama_jabatan ?></td>
									<td>Rp. <?= number_format($jabatan->gapok) ?></td>
									<td>Rp. <?= number_format($jabatan->gaji_jabatan) ?></td>
									<td>
										<a href="<?= base_url('admin/jabatan/edit/' . $jabatan->id_kat_jabatan) ?>" class="btn btn-warning btn-sm"><i class="bx bx-edit-alt"></i></a>
										<a href="<?= base_url('admin/jabatan/hapus/' . $jabatan->id_kat_jabatan) ?>" class="btn btn-danger btn-sm"><i class="bx bx-trash-alt"></i></a>
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