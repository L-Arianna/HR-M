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
			<a href="<?= base_url('admin/dashboard') ?>">
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
				<li> <a href="<?= base_url('admin/jabatan') ?>"><i class="bx bx-right-arrow-alt"></i>Jabatan</a>
				</li>
				<li> <a href="<?= base_url('admin/grade') ?>"><i class="bx bx-right-arrow-alt"></i>Grade</a>
				</li>
				<li> <a href="<?= base_url('admin/golongan') ?>"><i class="bx bx-right-arrow-alt"></i>Golongan</a>
				</li>
				<li> <a href="<?= base_url('admin/sp') ?>"><i class="bx bx-right-arrow-alt"></i>Peringatan</a>
				</li>
				<li> <a href="<?= base_url('admin/pend') ?>"><i class="bx bx-right-arrow-alt"></i>Pendidikan</a>
				</li>
				<li> <a href="<?= base_url('admin/cuti') ?>"><i class="bx bx-right-arrow-alt"></i>Cuti</a>
				</li>
				<li> <a href="<?= base_url('admin/gaji') ?>"><i class="bx bx-right-arrow-alt"></i>Gaji</a>
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
				<li> <a href="<?= base_url('admin/pegawai') ?>"><i class="bx bx-right-arrow-alt"></i>Data Pegawai</a>
				</li>
				<li> <a href="<?= base_url('admin/resign') ?>"><i class="bx bx-right-arrow-alt"></i>Data Resign Pegawai</a>
				</li>
				<li> <a href="form-input-group.html"><i class="bx bx-right-arrow-alt"></i>Data SP Pegawai</a>
				</li>
				<li> <a href="form-layouts.html"><i class="bx bx-right-arrow-alt"></i>Data Cuti</a>
				</li>
				<li> <a href="form-validations.html"><i class="bx bx-right-arrow-alt"></i>Data Absen</a>
				</li>
				<li> <a href="<?= base_url('admin/user') ?>"><i class="bx bx-right-arrow-alt"></i>Data User</a>
				</li>
		</li>
	</ul>
	<li class="menu-label">Payroll</li>
	<li>
		<a href="<?= base_url('admin/payroll') ?>">
			<div class="parent-icon"><i class='bx bx-home-circle'></i>
			</div>
			<div class="menu-title">Payroll</div>
		</a>
	</li>
	<!--end navigation-->
</div>
<!--end sidebar wrapper -->