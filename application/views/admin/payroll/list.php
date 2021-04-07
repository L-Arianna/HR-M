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
								<th>Jabatan</th>
								<th>Grade</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;
							foreach ($gaji as $gaji) { ?>
								<tr>
									<td><?= $i ?></td>
									<td><?= $gaji->nip ?></td>
									<td><?= $gaji->nama_pegawai ?></td>
									<td><?= $gaji->nama_jabatan ?></td>
									<td><?= $gaji->nama_grade ?></td>
									<form action="<?= base_url('admin/payroll/bayar/' . $gaji->id_gaji) ?>" method="post">
										<td>
											<?php if ($gaji->gaji_net == 0) {
												echo '<span class="badge rounded-pill bg-warning text-dark">Tidak ada nominal gaji</span>';
											} else { ?>
												<select name="status" class="form-control">
													<option value="<?= $gaji->status ?>"><?= $gaji->status ?></option>
													<?php if ($gaji->status == 'bayar') { ?>
														<option disabled="disabled" value="bayar">belum bayar</option>
													<?php } elseif ($gaji->status == 'belum bayar') { ?>
														<option value="bayar">bayar</option>
													<?php } ?>
												</select>
											<?php } ?>
										</td>
										<td>
											<?php if ($gaji->status == 'belum bayar') { ?>
												<button name="submit" type="submit" class="btn btn-primary btn-sm"><i class="bx bx-save"></i></button>
											<?php } ?>
										</td>
									</form>
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