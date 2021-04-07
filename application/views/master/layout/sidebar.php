		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Core Hr
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#data_master" aria-expanded="true">
					<i class="fas fa-fw fa-cog"></i>
					<span>Data Master</span>
				</a>
				<div id="data_master" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?= base_url('admin/jabatan') ?>">Jabatan</a>
						<a class="collapse-item" href="<?= base_url('admin/golongan') ?>">Golongan</a>
						<a class="collapse-item" href="<?= base_url('admin/promosi') ?>">Promosi</a>
						<a class="collapse-item" href="<?= base_url('admin/sp') ?>">Peringatan</a>
						<a class="collapse-item" href="<?= base_url('admin/pend') ?>">Pendidikan</a>
						<a class="collapse-item" href="<?= base_url('admin/cuti') ?>">Cuti</a>
						<a class="collapse-item" href="<?= base_url('admin/gaji') ?>">Gaji</a>
					</div>
				</div>
			</li>
			<!-- Divider -->
			<hr class="sidebar-divider">
			<!-- Heading -->
			<div class="sidebar-heading">
				Master pegawai
			</div>
			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fas fa-fw fa-cog"></i>
					<span>Data Master Pegawai</span>
				</a>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?= base_url('master/pegawai') ?>">Data Pegawai</a>
						<a class="collapse-item" href="#">Data Peringatan Pegawai</a>
						<a class="collapse-item" href="#">Data Cuti</a>
						<a class="collapse-item" href="#">Data Absen</a>
						<a class="collapse-item" href="#">Data User</a>
					</div>
				</div>
			</li>
			<hr class="sidebar-divider">
			<!-- Heading -->
			<div class="sidebar-heading">
				Gaji pegawai
			</div>
			<!-- Nav Item - Tables -->
			<li class="nav-item">
				<a class="nav-link" href="#">
					<i class="fas fa-fw fa-file-invoice"></i>
					<span>Payroll</span></a>
			</li>

			<hr class="sidebar-divider">
			<!-- Nav Item - Tables -->
			<li class="nav-item">
				<a class="nav-link" href="#">
					<i class="fas fa-fw fa-sign-out-alt"></i>
					<span>Logout</span></a>
			</li>
			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->