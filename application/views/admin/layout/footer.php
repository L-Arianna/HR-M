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
	$(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
		// Kita sembunyikan dulu untuk loadingnya
		// $("#loading").hide();
		produk_ajax();
		$("#golongan").change(function() { // Ketika user mengganti atau memilih data provinsi
			$("#gaji_gol").hide(); // Sembunyigol dulu combobox kota nya
			// $("#loading").show(); // Tampilkan loadingnya

			$.ajax({
				type: "POST", // Method pengiriman data bisa dengan GET atau POST
				url: "<?php echo base_url("admin/gaji/listgol"); ?>", // Isi dengan url/path file php yang dituju
				data: {
					id_kat_golongan: $("#golongan").val()
				}, // data yang akan dikirim ke file yang dituju
				dataType: "json",
				beforeSend: function(e) {
					if (e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response) { // Ketika proses pengiriman berhasil
					// $("#loading").hide(); // Sembunyikan loadingnya

					// set isi dari combobox kota
					// lalu munculkan kembali combobox kotanya
					$("#gaji_gol").html(response.list_gol).show();
				},
				error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
				}
			});
		});
	});


	$(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
		// Kita sembunyikan dulu untuk loadingnya
		// $("#loading").hide();

		$("#grade").change(function() { // Ketika user mengganti atau memilih data provinsi
			$("#subgrade").hide(); // Sembunyigol dulu combobox kota nya
			// $("#loading").show(); // Tampilkan loadingnya

			$.ajax({
				type: "POST", // Method pengiriman data bisa dengan GET atau POST
				url: "<?php echo base_url("admin/pegawai/listgrade"); ?>", // Isi dengan url/path file php yang dituju
				data: {
					id_grade: $("#grade").val()
				}, // data yang akan dikirim ke file yang dituju
				dataType: "json",
				beforeSend: function(e) {
					if (e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
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
</body>

</html>