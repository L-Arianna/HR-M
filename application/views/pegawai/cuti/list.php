<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<h6 class="mb-1 text-uppercase"><?= $title ?></h6>
		<a href="<?= base_url('pegawai/cuti/tambah') ?>" class="btn btn-primary btn-sm mb-1">Tambah pengajuan cuti</a>
		<?= $this->session->flashdata('sukses'); ?>
		<hr />
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="example2" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>NIP</th>
								<th>Jenis Cuti</th>
								<th>Tanggal Mulai Cuti</th>
								<th>Tanggal Selesai Cuti</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;
							foreach ($getall as $key) { ?>
								<tr>
									<td><?= $i ?></td>
									<td><?= $key->nama_pegawai ?></td>
									<td><?= $key->nip ?></td>
									<td><?= $key->nama_cuti ?></td>
									<td><?= $key->tgl_mulai ?></td>
									<td><?= $key->tgl_selesai ?></td>
									<td><?php if ($key->status == 'pending') { ?>
											<span class="badge bg-warning text-white"><?= $key->status ?></span>
										<?php } elseif ($key->status == 'setuju') { ?>
											<span class="badge bg-success text-white"><?= $key->status ?></span>
										<?php } else { ?>
											<span class="badge bg-danger text-white"><?= $key->status ?></span>
										<?php } ?>
									</td>
									<td>
										<a href="<?= base_url('Pegawai/Cuti/edit/' . $key->id_detail_cuti) ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Pengajuan Cuti"><i class="bx bx-edit"></i></a>

										<a href="<?= base_url('Pegawai/Cuti/hapus/' . $key->id_detail_cuti) ?>" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Pengajuan Cuti"><i class="bx bx-trash-alt"></i></a>
									</td>
								</tr>
							<?php $i++;
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end page wrapper -->