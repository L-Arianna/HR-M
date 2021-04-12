<?php
$sql = "SELECT * FROM `tb_gaji` WHERE `id_gaji` AND `nip` = $pegawai->nip AND`gaji_net` AND `status` = 'belum bayar' AND MONTH(tgl) = $bulan AND year(tgl) = $tahun";
$num_gaji = $this->db->query($sql)->num_rows();
$query = $this->db->query($sql)->row_array();
?>
<form action="<?= base_url('admin/payroll/bayar/' . $pegawai->nip) ?>" method="post">
	<div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modal title</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<h6><?= $query['nip'] ?></h6>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</form>