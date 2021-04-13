<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->
<footer class="page-footer">
	<p class="mb-0">Copyright © 2021. All right reserved.</p>
</footer>
</div>
<!--end wrapper-->

<!-- Bootstrap JS -->
<script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>assets/js/table-datatable.js"></script>
<script src="<?= base_url() ?>assets/plugins/input-tags/js/tagsinput.js"></script>
<!-- date picker -->
<script src="<?= base_url() ?>assets/plugins/datetimepicker/js/legacy.js"></script>
<script src="<?= base_url() ?>assets/plugins/datetimepicker/js/picker.js"></script>
<script src="<?= base_url() ?>assets/plugins/datetimepicker/js/picker.time.js"></script>
<script src="<?= base_url() ?>assets/plugins/datetimepicker/js/picker.date.js"></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
<script src="<?= base_url() ?>assets/js/form-date-time-pickes.js"></script>
<script src="<?= base_url() ?>assets/js/jquery-ui.min.js"></script>
<!--app JS-->
<script src="<?= base_url() ?>assets/js/app.js"></script>
<script src="<?= base_url() ?>assets/js/penjumlahan.js"></script>
<script src="<?= base_url() ?>assets/js/produk-ajax.js"></script>
<script src="<?= base_url() ?>assets/plugins/select2/js/select2.min.js"></script>
<script src="<?= base_url() ?>assets/js/form-select2.js"></script>
<script src="<?= base_url() ?>assets/js/form-text-editor.js"></script>
<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
</script>





<!-- Chained -->
<script>
	$(document).ready(function() {
		$('.multiple-select2').select2();
	});

	// $('#exampleModal').on('show.bs.modal', function(event) {
	// 	let bookId = $(event.relatedTarget).data('bookid')
	// 	$(this).find('.modal-body input').val(bookId)
	// })

	$(function() {
		$(".open-AddBookDialog").click(function() {
			$('#id_gaji').val($(this).data('id'));
			$('#nama_pegawai').val($(this).data('nama'));
			$('#nip').val($(this).data('nip'));
			$('#nama_bank').val($(this).data('bank'));
			$('#no_rek').val($(this).data('rek'));
			$('#atas_nama').val($(this).data('an'));
			$("#addBookDialog").modal("show");
		});
	});
	$(function() {
		$(".open-modalcuti").click(function() {
			$('#id').val($(this).data('id'));
			$('#nama_pegawai').val($(this).data('nama'));
			$('#nip').val($(this).data('nip'));
			$('#tgl_mulai').val($(this).data('tglmulai'));
			$('#tgl_selesai').val($(this).data('tglselesai'));
			$("#modalcuti").modal("show");
		});
	});
</script>

<script>
	$(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
		produk_ajax();
		// Kita sembunyikan dulu untuk loadingnya
		// $("#loading").hide();

		$("#grade").change(function() { // Ketika user mengganti atau memilih data provinsi
			$("#subgrade").hide(); // Sembunyigol dulu combobox kota nya
			// $("#loading").show(); // Tampilkan loadingnya

			$.ajax({
				type: "POST", // Method pengiriman data bisa dengan GET atau POST
				url: "<?php echo base_url("Admin/Pegawai/listgrade"); ?>", // Isi dengan url/path file php yang dituju
				data: {
					id_grade: $("#grade").val()
				}, // data yang akan dikirim ke file yang dituju
				dataType: "json",
				beforeSend: function(e) {
					if (e && e.overrideMimeType) {
						e.overrideMimeType("Application/json;charset=UTF-8");
					}
				},
				success: function(response) { // Ketika proses pengiriman berhasil
					// $("#loading").hide(); // Sembunyikan loadingnya

					// set isi dari combobox kota
					// lalu munculkan kembali combobox kotanya
					$("#subgrade").html(response.list_grade).show();
				},
				error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
				}
			});
		});
	});
</script>
<!-- End of Chained -->
<script>
	// start fungsi filter
	$(document).ready(function() { // Ketika halaman selesai di load
		$('.input-tanggal').datepicker({
			dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
		});
		$('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
		$('#filter').change(function() { // Ketika user memilih filter
			if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
				$('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
				$('#form-tanggal').show(); // Tampilkan form tanggal
			} else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
				$('#form-tanggal').hide(); // Sembunyikan form tanggal
				$('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
			} else { // Jika filternya 3 (per tahun)
				$('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
				$('#form-tahun').show(); // Tampilkan form tahun
			}
			$('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
		})
	})
	// end fungsi filter
</script>
</body>

</html>