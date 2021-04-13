<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<h6 class="mb-1 text-uppercase"><?= $title ?></h6>
		<?= $this->session->flashdata('sukses'); ?>
		<hr />
		<div class="card">
			<div class="card-body">
				<form action="" method="post">
					<div class="row mb-2">
						<div class="col-md-4">
							<label for="form-control">Filter berdasarkan</label>
							<select class="form-control" name="filter" id="filter">
								<option value="">Pilih</option>
								<option value="2">Per Bulan</option>
							</select>
						</div>
						<div class="col-md-4" id="form-bulan">
							<label for="form-control">Bulan</label>
							<select name="bulan" class="form-control" required>
								<option value="">Pilih</option>
								<option value="1">Januari</option>
								<option value="2">Februari</option>
								<option value="3">Maret</option>
								<option value="4">April</option>
								<option value="5">Mei</option>
								<option value="6">Juni</option>
								<option value="7">Juli</option>
								<option value="8">Agustus</option>
								<option value="9">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
						</div>
						<div class="col-md-4" id="form-tahun">
							<label for="form-control">Tahun</label>
							<select class="form-control" name="tahun">
								<?php foreach ($option_tahun as $key) { ?>
									<option value="">Pilih</option>
									<option value="<?= $key->tahun ?>"><?= $key->tahun ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<button type="submit" name="submit" class="btn btn-primary btn-sm">Tampilkan</button>
					<a class="btn btn-info btn-sm" href="<?= base_url('Admin/Payroll') ?>">Reset Filter</a>
				</form>

				<br>
				<label>Bulan : <?php
									if ($bulan == "01") {
										echo "Januari";
									} elseif ($bulan == "02") {
										echo "Februari";
									} elseif ($bulan == "03") {
										echo "Maret";
									} elseif ($bulan == "04") {
										echo "April";
									} elseif ($bulan == "05") {
										echo "Mei";
									} elseif ($bulan == "06") {
										echo "Juni";
									} elseif ($bulan == "07") {
										echo "Juli";
									} elseif ($bulan == "08") {
										echo "Agustus";
									} elseif ($bulan == "09") {
										echo "September";
									} elseif ($bulan == "10") {
										echo "Oktober";
									} elseif ($bulan == "11") {
										echo "November";
									} elseif ($bulan == "12") {
										echo "Desember";
									}
									echo " / " . $tahun; ?></label>
				<hr style="height:2px;border-width:0;color:gray;background-color:gray">
				<div class="table-responsive">
					<table id="example2" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>NIP</th>
								<th>Nama Pegawai</th>
								<th>Gaji Bulan</th>
								<th>Total Gaji</th>
								<th>Status Gaji</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($pegawai as $pegawai) { ?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $pegawai->nip ?></td>
									<td><?= $pegawai->nama_pegawai ?></td>
									<td> <?php
											if ($bulan == "01") {
												echo "Januari";
											} elseif ($bulan == "02") {
												echo "Februari";
											} elseif ($bulan == "03") {
												echo "Maret";
											} elseif ($bulan == "04") {
												echo "April";
											} elseif ($bulan == "05") {
												echo "Mei";
											} elseif ($bulan == "06") {
												echo "Juni";
											} elseif ($bulan == "07") {
												echo "Juli";
											} elseif ($bulan == "08") {
												echo "Agustus";
											} elseif ($bulan == "09") {
												echo "September";
											} elseif ($bulan == "10") {
												echo "Oktober";
											} elseif ($bulan == "11") {
												echo "November";
											} elseif ($bulan == "12") {
												echo "Desember";
											}
											?> <?php echo $tahun; ?></td>
									<td>
										<?php

										$sql = "SELECT * FROM `tb_gaji` WHERE `id_gaji` AND `nip` = $pegawai->nip AND`gaji_net` AND MONTH(tgl) = $bulan AND year(tgl) = $tahun";
										$num_gaji = $this->db->query($sql)->num_rows();
										$start = $this->db->query($sql)->result_array();
										$query = $this->db->query($sql)->row_array();

										if ($num_gaji < 1) {
											echo '<center><span class="badge rounded-pill bg-danger text-white">Tidak ada nominal gaji</span></center>';
										} else { ?>
											<div class="text-center">
												<p class="text-center">Rp. <?php echo number_format($query['gaji_net'], 0, "", "."); ?></p>
											</div>
										<?php
										}
										?>
									</td>
									<td>
										<?php if ($num_gaji < 1) {
											echo '<center><span class="badge rounded-pill bg-danger text-white">Tidak ada nominal gaji</span></center>';
										} else { ?>
											<?php if ($query['status'] == 'belum bayar') { ?>
												<div class="text-center">
													<span class="badge rounded-pill bg-danger text-white"><?= $query['status']; ?></span>
												</div>
											<?php } else { ?>
												<div class="text-center">
													<span class="badge rounded-pill bg-success text-white"><?= $query['status']; ?></span>
												</div>
											<?php } ?>

										<?php
										}
										?>
									</td>
									<td>
										<?php if ($num_gaji < 1) { ?>
											<div class="text-center">
												<span class="badge rounded-pill bg-danger text-white">tidak ada nominal gaji</span>
											</div>
										<?php
										} elseif ($query['status'] == 'belum bayar') { ?>
											<a data-id="<?= $query['id_gaji'] ?>" data-nama="<?= $pegawai->nama_pegawai ?>" data-nip="<?= $pegawai->nip ?>" data-bank="<?= $pegawai->nama_bank ?>" data-an="<?= $pegawai->atas_nama ?>" data-rek="<?= $pegawai->no_rek ?>" title="Add this item" class="open-AddBookDialog btn btn-success btn-sm"><i class="bx bx-check"></i></a>
										<?php } else { ?>
											<a href="<?= base_url('Admin/Payroll/detail/' . $query['id_gaji']) ?>" class="btn btn-primary btn-sm"><i class="bx bx-detail"></i></a>
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


<!-- Modal -->
<div class="modal fade" id="addBookDialog" tabindex="-1" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Selesaikan pembayaran gaji bulan ini</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="" method="post">
				<div class="modal-body">
					<div class="row mb-1">
						<div class="col-md-3">
							<label for="form-control">Nama Pegawai</label>
							<input type="hidden" class="form-control" name="id_gaji" id="id_gaji" value="" />
							<input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai" value="" readonly />
						</div>
						<div class="col-md-3">
							<label for="form-control">NIP Pegawai</label>
							<input type="text" name="nip" class="form-control" id="nip" value="" readonly />
						</div>
					</div>
					<hr style="height:2px;border-width:0;color:gray;background-color:gray">
					<div class="row mb-1">
						<div class="col-md-3">
							<label for="form-control">Nama bank</label>
							<input type="text" name="nama_bank" class="form-control" id="nama_bank" value="" readonly />
						</div>
						<div class="col-md-3">
							<label for="form-control">No Rekening</label>
							<input type="text" name="no_rek" class="form-control" id="no_rek" value="" readonly />
						</div>
						<div class="col-md-3">
							<label for="form-control">Atas Nama</label>
							<input type="text" class="form-control" name="atas_nama" id="atas_nama" value="" readonly />
						</div>
						<div class="col-md-3">
							<label for="form-control">Status Gaji</label>
							<select name="status" class="form-control">
								<option value="bayar">bayar</option>
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