<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<h6 class="mb-0 text-uppercase"><?= $title ?></h6>
		<?= $this->session->flashdata('sukses'); ?>
		<hr />

		<div class="card">
			<div class="card-body">
				<form action="" method="get">
					<div class="row mb-2">
						<div class="col-md-3">
							<label for="form-control">Filter berdasarkan</label>
							<select class="form-control" name="filter" id="filter">
								<option value="">Pilih</option>
								<option value="1">Per Tanggal</option>
								<option value="2">Per Bulan</option>
								<option value="3">Per Tahun</option>
							</select>
						</div>
						<div class="col-md-3" id="form-tanggal">
							<label for="form-control">Tanggal</label>
							<input type="" name="tanggal" class="form-control input-tanggal" />
						</div>
						<div class="col-md-3" id="form-bulan">
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
						<div class="col-md-3" id="form-tahun">
							<label for="form-control">Tahun</label>
							<select class="form-control" name="tahun">
								<option value="">Pilih</option>
								<?php
								foreach ($option_tahun as $data) { // Ambil data tahun dari model yang dikirim dari controller
									echo '<option value="' . $data->tahun . '">' . $data->tahun . '</option>';
								}
								?>
							</select>
						</div>
					</div>

					<button type="submit" name="submit" class="btn btn-primary btn-sm">Tampilkan</button>
					<a class="btn btn-info btn-sm" href="<?= base_url('Admin/Payroll') ?>">Reset Filter</a>
				</form>
				<hr style="height:2px;border-width:0;color:gray;background-color:gray">

				<span class="badge rounded-pill bg-success text-white mb-2"><?= $ket; ?></span>


				<div class="table-responsive">
					<table id="example2" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Tanggal</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (!empty($gaji)) { ?>
								<?php $i = 1;
								foreach ($gaji as $gaji) {
									$tgl = date('d-m-Y', strtotime($gaji->tgl));  ?>
									<tr>
										<td><?= $i ?></td>

										<td><?= $tgl ?></td>

									</tr>
							<?php $i++;
								}
							} ?>


						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end page wrapper -->