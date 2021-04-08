<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<h6 class="mb-0 text-uppercase"><?= $title ?></h6>

		<!-- Button trigger modal -->
		<a href="<?= base_url('Admin/User') ?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal">Tambah user</a>
		<?= $this->session->flashdata('suksess'); ?>
		<!-- Modal -->
		<div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Tambah data user</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="" method="post">
						<div class="modal-body">
							<div class="row">
								<div class="col-md-3">
									<label for="form-control">Nama lengkap</label>
									<input type="text" name="nama" class="form-control" placeholder="nama lengkap" value="<?= set_value('nama') ?>">
									<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="col-md-3">
									<label for="form-control">Username</label>
									<input type="text" name="username" class="form-control" placeholder="Username" value="<?= set_value('username') ?>">
									<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="col-md-3">
									<label for="form-control">Password</label>
									<input type="password" name="password" class="form-control" placeholder="Password" value="<?= set_value('password') ?>">
									<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="col-md-3">
									<label for="form-control">Hak akses</label>
									<select name="role_id" class="form-control">
										<option value="">Pilih</option>
										<option value="1">Super admin</option>
										<option value="2">Admin</option>
									</select>
									<?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
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
		<hr />
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="example2" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Username</th>
								<th>Status Aktif</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							foreach ($usr as $key) { ?>
								<tr>
									<td><?= $i ?></td>
									<td><?= $key->username ?></td>
									<td><?php if ($key->is_active == 1) { ?>
											<span class="badge bg-success">Aktif</span>
										<?php	} else { ?>
											<span class="badge bg-danger">Non Aktif</span>
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
<!--end page wrapper -->