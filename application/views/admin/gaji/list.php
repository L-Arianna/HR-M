<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<h6 class="mb-1 text-uppercase"><?= $title ?></h6>
		<?= $this->session->flashdata('sukses'); ?>
		<hr />
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="example2" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Pegawai</th>
								<th>NIP</th>
								<th>Nama Jabatan</th>
								<th>Nama Golongan</th>
								<th>Total Gaji</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($gaji as $gaji) { ?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $gaji->nama_pegawai ?></td>
									<td><?= $gaji->nip ?></td>
									<td><?= $gaji->nama_jabatan ?></td>
									<td><?= $gaji->nama_golongan ?></td>
									<td><?php if ($gaji->gaji_net == 0) {
												echo '<span class="badge rounded-pill bg-warning text-dark">Tidak ada nominal gaji</span>';
											} else {
												echo 'Rp. ', number_format($gaji->gaji_net, '0', ',', '.');
											} ?></td>
									<td>
										<?php if ($gaji->gaji_net == 0) { ?>
											<a href="<?= base_url('admin/gaji/tambah/' . $gaji->id_gaji) ?>" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah data gaji"><i class="bx bx-plus"></i></a>
										<?php } elseif ($gaji->gaji_net >= 1) { ?>
											<a href="<?= base_url('admin/gaji/detail/' . $gaji->id_gaji) ?>" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail data gaji"><i class="bx bx-detail"></i></a>
											<a href="<?= base_url('admin/gaji/edit/' . $gaji->id_gaji) ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="edit data gaji"><i class="bx bx-edit-alt"></i></a>
										<?php } ?>
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