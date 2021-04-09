<form action="<?= base_url('admin/payroll/bayar/' . $gaji->id_gaji) ?>" method="post">
	<td>
		<?php if ($gaji->gaji_net == 0) {
			echo '<span class="badge rounded-pill bg-warning text-dark">Tidak ada nominal gaji</span>';
		} else { ?>
			<select name="status" class="form-control">
				<option value=""><?= $gaji->status ?></option>
				<option value="bayar">bayar</option>
				<?php if ($gaji->status == 'bayar') { ?>
					<option disabled="disabled" value="belum bayar">belum bayar</option>
				<?php } elseif ($gaji->status == 'belum bayar') { ?>
					<option value="bayar">bayar</option>
				<?php } ?>
			</select>
		<?php } ?>
	</td>
	<td>
		<?php if ($gaji->status == 'belum bayar') { ?>
			<button name="submit" type="submit" class="btn btn-primary btn-sm"><i class="bx bx-save"></i></button>
		<?php  } elseif ($gaji->status == 'bayar') { ?>
			<span class="badge rounded-pill bg-success text-white">Sudah terbayar</span>
		<?php } elseif ($gaji->gaji_net == 0) { ?>
			<span class="badge rounded-pill bg-danger text-white">silahkan input nominal gaji</span>
		<?php } ?>
	</td>
</form>