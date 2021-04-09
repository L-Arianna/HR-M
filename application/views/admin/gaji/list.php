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
								<option value="3">Per Tahun</option>
							</select>
						</div>
						<div class="col-md-4" id="form-bulan">
							<label for="form-control">Bulan</label>
							<select name="bulan" class="form-control">
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
								<option value="">Pilih</option>
								<?php
								$mulai = date('Y') - 6;
								for ($i = $mulai; $i < $mulai + 100; $i++) {
									$sel = $i == date('Y') ? ' selected = "selected"' : '';
									echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<button type="submit" name="submit" class="btn btn-primary btn-sm">Tampilkan</button>
					<a class="btn btn-info btn-sm" href="<?= base_url('Admin/Gaji') ?>">Reset Filter</a>
				</form>
				<?php
				date_default_timezone_set('Asia/Jakarta');
				if (isset($_POST['submit'])) {

					if ((!empty($_POST['bulan'])) && (!empty($_POST['tahun']))) {
						$bulan          = $_POST['bulan'];
						$tahun          = $_POST['tahun'];
					} elseif (!empty($_POST['bulan'])) {
						$bulan           = $_POST['bulan'];
						$tahun           = date('Y');
					} elseif (!empty($_POST['tahun'])) {
						$bulan          = date('m');
						$tahun          = $_POST['tahun'];
					} else {
						$bulan           = date('m');
						$tahun           = date('Y');
					}
				} else {
					$bulan           = date('m');
					$tahun           = date('Y');
				}
				?>
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
								<!-- <th>Nama Pegawai</th> -->
								<th>NIP</th>
								<th>Nama Jabatan</th>
								<th>Nama Golongan</th>
								<th>Gaji Bulan</th>
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
									<!-- <td><?= $gaji->nama_pegawai ?></td> -->
									<td><?= $gaji->nip ?></td>
									<td><?= $gaji->nama_jabatan ?></td>
									<td><?= $gaji->nama_golongan ?></td>
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
										$j = "SELECT * FROM `tb_gaji` WHERE  nip = $gaji->nip AND month($bulan) AND year($tahun) AND gaji_net = $gaji->gaji_net";
										$num_gaji =  $this->db->query($j)->num_rows();
										$row_gaji = $this->db->query($j)->result_array();
										if ($num_gaji < 1) {
											echo "<center><label class='label label-danger'>Tidak Ada Slip Gaji</label></center>";
										} else { ?>
											<a style="color: black;" class="pull-left">Rp. </a><a style="color: black;" class="pull-right"><?php echo number_format($row_gaji['gaji_net'], 0, "", "."); ?></a>
										<?php
										}
										?>
									</td>
									<td>
										<a href="<?= base_url('admin/gaji/tambah/' . $gaji->id_gaji) ?>" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah data gaji"><i class="bx bx-plus"></i></a>
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