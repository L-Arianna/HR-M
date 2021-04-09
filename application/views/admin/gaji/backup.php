<td><?php if ($gaji->gaji_net == 0) {
			echo '<span class="badge rounded-pill bg-warning text-dark">Tidak ada nominal gaji</span>';
		} else {
			echo 'Rp. ', number_format($gaji->gaji_net, '0', ',', '.');
		} ?></td>
<td>
	<?php if ($gaji->gaji_net == 0) { ?>
		<a href="<?= base_url('admin/gaji/tambah/' . $gaji->id_gaji) ?>" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah data gaji"><i class="bx bx-plus"></i></a>
	<?php } elseif ($gaji->gaji_net >= 1) { ?>
		<a href="<?= base_url('admin/gaji/detail/' . $gaji->id_gaji) ?>" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail data gaji"><i class="bx bx-detail"></i></a>
		<a href="<?= base_url('admin/gaji/edit/' . $gaji->id_gaji) ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="edit data gaji"><i class="bx bx-edit-alt"></i></a>
	<?php } ?>
</td>