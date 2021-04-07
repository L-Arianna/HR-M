<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">

		<h6 class="mb-0 text-uppercase"><?= $title ?></h6>
		<?= $this->session->flashdata('sukses'); ?>
		<hr />
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="example2" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>NIP</th>
								<th>Nama Pegawai</th>
								<th>Tanggal Keluar</th>
								<th>Keterangan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;
							foreach ($resign as $key) { ?>
								<tr>
									<td><?= $i ?></td>
									<td><?= $key->nip ?></td>
									<td><?= $key->nama_pegawai ?></td>
									<td><?= $key->tgl_resign ?></td>
									<td><?= $key->keterangan ?></td>
									<td>
										<a href="<?= base_url('admin/resign/hapus/' . $key->id_resign) ?>" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="hapus data resign"><i class="bx bx-trash"></i></a>
									</td>
								</tr>
							<?php
								$i++;
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end page wrapper -->