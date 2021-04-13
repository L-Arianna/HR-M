<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">

		<h6 class="mb-0 text-uppercase"><?= $title ?></h6>
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
								<th>Jenis Cuti</th>
								<th>Tanggal Cuti</th>
								<th>Keterangan</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;
							foreach ($cuti as $key) { ?>
								<tr>
									<td><?= $i ?></td>
									<td><?= $key->nip ?></td>
									<td><?= $key->nama_pegawai ?></td>
									<td><?= $key->nama_cuti ?></td>
									<td><strong><?= $key->tgl_mulai ?></strong> S/d <strong><?= $key->tgl_selesai ?></strong></td>
									<td><?= $key->keterangan ?></td>
									<td><?php if ($key->status == 0) { ?>
											<span class="badge rounded-pill bg-warning text-dark">Not approved</span>
										<?php } else { ?>
											<span class="badge rounded-pill bg-success">Approved</span>
										<?php }  ?>
									</td>
									<td>
										<?php if ($key->status == 0) { ?>
											<a data-id="<?= $key->id ?>" data-nama="<?= $key->nama_pegawai ?>" data-nip="<?= $key->nip ?>" data-tglmulai="<?= $key->tgl_mulai ?>" data-tglselesai="<?= $key->tgl_selesai ?>" class="open-modalcuti btn btn-primary btn-sm"><i class="bx bx-check"></i></a>
										<?php } else { ?>
											<span class="badge rounded-pill bg bg-success">sukses</span>
										<?php } ?>
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



<!-- Modal -->
<div class="modal fade" id="modalcuti" tabindex="-1" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Acc Pengajuan Cuti Pegawai</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="" method="post">
				<div class="modal-body">
					<div class="row mb-1">
						<div class="col-md-3">
							<label for="form-control">NIP Pegawai</label>
							<input type="hidden" class="form-control" name="id" id="id" value="" />
							<input type="text" name="nip" class="form-control" id="nip" value="" readonly />
						</div>
						<div class="col-md-3">
							<label for="form-control">Tanggal Mulai Cuti</label>
							<input type="text" name="tgl_mulai" class="form-control" id="tgl_mulai" value="" readonly />
						</div>
						<div class="col-md-3">
							<label for="form-control">Tanggal Selesai Cuti</label>
							<input type="text" name="tgl_selesai" class="form-control" id="tgl_selesai" value="" readonly />
						</div>
						<div class="col-md-3">
							<label for="form-control">Status</label>
							<select name="status" class="form-control" id="status">
								<option value="0">Not Approve</option>
								<option value="1">Approve</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" name="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--end page wrapper -->