<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
		<div>
			<img src="<?= base_url() ?>assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
		</div>
		<div>
			<h4 class="logo-text">Syndron</h4>
		</div>
		<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
		</div>
	</div>
	<!--navigation-->



	<ul class="metismenu" id="menu">
		<li>
			<a href="<?= base_url('Admin/Dashboard') ?>">
				<div class="parent-icon"><i class='bx bx-home-circle'></i>
				</div>
				<div class="menu-title">Dashboard</div>
			</a>
		</li>
		<li class="menu-label">Core Human Resources</li>
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class='bx bx-cart'></i>
				</div>
				<div class="menu-title">Master Core HR</div>
			</a>
			<ul>
				<li> <a href="<?= base_url('Admin/Jabatan') ?>"><i class="bx bx-right-arrow-alt"></i>Jabatan</a>
				</li>
				<li> <a href="<?= base_url('Admin/Grade') ?>"><i class="bx bx-right-arrow-alt"></i>Grade</a>
				</li>
				<li> <a href="<?= base_url('Admin/Golongan') ?>"><i class="bx bx-right-arrow-alt"></i>Golongan</a>
				</li>
				<li> <a href="<?= base_url('Admin/Sp') ?>"><i class="bx bx-right-arrow-alt"></i>Peringatan</a>
				</li>
				<li> <a href="<?= base_url('Admin/Pend') ?>"><i class="bx bx-right-arrow-alt"></i>Pendidikan</a>
				</li>
				<li> <a href="<?= base_url('Admin/Cuti') ?>"><i class="bx bx-right-arrow-alt"></i>Cuti</a>
				</li>
				<li> <a href="<?= base_url('Admin/Gaji') ?>"><i class="bx bx-right-arrow-alt"></i>Gaji</a>
				</li>
			</ul>
		</li>
		<li class="menu-label">Master Pegawai</li>
		<li>
			<a class="has-arrow" href="javascript:;">
				<div class="parent-icon"><i class='bx bx-message-square-edit'></i>
				</div>
				<div class="menu-title">Data master pegawai</div>
			</a>
			<ul>
				<li> <a href="<?= base_url('Admin/Pegawai') ?>"><i class="bx bx-right-arrow-alt"></i>Data Pegawai</a>
				</li>
				<li> <a href="<?= base_url('Admin/Resign') ?>"><i class="bx bx-right-arrow-alt"></i>Data Resign Pegawai</a>
				</li>
				<li> <a href="form-input-group.html"><i class="bx bx-right-arrow-alt"></i>Data SP Pegawai</a>
				</li>
				<li> <a href="form-layouts.html"><i class="bx bx-right-arrow-alt"></i>Data Cuti</a>
				</li>
				<li> <a href="form-validations.html"><i class="bx bx-right-arrow-alt"></i>Data Absen</a>
				</li>
				<li> <a href="<?= base_url('Admin/User') ?>"><i class="bx bx-right-arrow-alt"></i>Data User</a>
				</li>
		</li>
	</ul>
	<li class="menu-label">Payroll</li>
	<li>
		<a href="<?= base_url('Admin/Payroll') ?>">
			<div class="parent-icon"><i class='bx bx-home-circle'></i>
			</div>
			<div class="menu-title">Payroll</div>
		</a>
	</li>
	<li class="menu-label">Master Analisis Kredit</li>
	<li>
		<a class="has-arrow" href="javascript:;">
			<div class="parent-icon"><i class='bx bx-message-square-edit'></i>
			</div>
			<div class="menu-title">Data master Aplikasi</div>
		</a>
		<ul>

			<li> <a href="<?= base_url(); ?>Admin/Aplikasi"><i class="bx bx-right-arrow-alt"></i>Data Aplikasi</a>
			</li>
			<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Data LPDU 1</a>
			</li>
			<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Data LPDU 2</a>
			</li>
			<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Data LPDU UM</a>
			</li>
			<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Data LPJ Kios</a>
			</li>
			<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Data LPJ Tanah Kosong</a>
			</li>
			<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Data LPJ Tanah & bangunan</a>
			</li>
			<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Data LPJ Deposito</a>
			</li>
			<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Data LPJ Kendaraan</a>
			</li>
			<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Data LPJ MPK</a>
			</li>
		</ul>
	</li>
	<li class="menu-label">Gudang</li>
	<li>
		<a class="has-arrow" href="javascript:;">
			<div class="parent-icon"><i class='bx bx-message-square-edit'></i>
			</div>
			<div class="menu-title">Master Gudang</div>
		</a>
		<ul>

			<li> <a href="<?= base_url(); ?>Gudang/Produk"><i class="bx bx-right-arrow-alt"></i>Manage Produk</a>
			</li>
			<li> <a href="<?= base_url(); ?>Gudang/Produk/pendidikanterakhir"><i class="bx bx-right-arrow-alt"></i>Manage Pendidikan Terakhir</a>
			</li>
			<li> <a href="<?= base_url(); ?>Gudang/Produk/pekerjaan"><i class="bx bx-right-arrow-alt"></i>Manage Pekerjaan</a>
			</li>
			<li> <a href="<?= base_url(); ?>Gudang/Produk/bidang_usaha"><i class="bx bx-right-arrow-alt"></i>Manage Bidang Usaha</a>
			</li>
			<li> <a href="<?= base_url(); ?>Gudang/Produk/status_surat_masuk"><i class="bx bx-right-arrow-alt"></i>Manage Status Surat Masuk</a>
			</li>
			<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Data LPJ Tanah Kosong</a>
			</li>
			<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Data LPJ Tanah & bangunan</a>
			</li>
			<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Data LPJ Deposito</a>
			</li>
			<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Data LPJ Kendaraan</a>
			</li>
			<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Data LPJ MPK</a>
			</li>
		</ul>
	</li>
	<li class="menu-label">Surat Masuk</li>
	<li>
		<a href="<?= base_url(); ?>Admin/Surat_Masuk">
			<div class="parent-icon"><i class='bx bx-message-square-edit'></i>
			</div>
			<div class="menu-title">Surat Masuk</div>
		</a>
	</li>
	<!--end navigation-->
</div>
<!--end sidebar wrapper -->