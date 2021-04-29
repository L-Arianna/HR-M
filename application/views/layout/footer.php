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
<!-- Vector map JavaScript -->
<script src="<?= base_url() ?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- highcharts js -->
<script src="<?= base_url() ?>assets/plugins/highcharts/js/highcharts.js"></script>
<script src="<?= base_url() ?>assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/chartjs/js/Chart.min.js"></script>
<!--app JS-->
<script src="<?= base_url() ?>assets/js/app.js"></script>
<script src="<?= base_url() ?>assets/js/penjumlahan.js"></script>
<script src="<?= base_url() ?>assets/js/produk-ajax.js"></script>
<script src="<?= base_url() ?>assets/plugins/select2/js/select2.min.js"></script>
<script src="<?= base_url() ?>assets/js/form-select2.js"></script>
<script src="<?= base_url() ?>assets/js/form-text-editor.js"></script>
<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
</script>

<script type="text/javascript">
	$(document).ready(function() {
		if ($('#jam').length) {
			startTime();
		}
	});

	function startTime() {
		<?php if (empty($statusnol) || empty($statussatu) || empty($statusdua) || empty($listingjam)) {
			$statusnol = array();
			$statussatu = array();
			$statusdua = array();
			$listingjam = array();
			$start1 = "00:00:00";
			$start2 = "00:00:00";
			$end1 = "00:00:00";
			$end2 = "00:00:00";
			$snol = 0;
			$ssatu = 1;
			$sdua = 2;
		}
		?>
		<?php foreach ($statusdua as $v) {
			$sdua = $v->jumlah;
		}
		foreach ($statussatu as $va) {
			$ssatu = $va->jumlah;
		}
		foreach ($statusnol as $val) {
			$snol = $val->jumlah;
		}
		foreach ($listingjam as $value) {
			//json_encode($value);
			if ($value->status_jam_khazanah == 0) {
				$start0 = $value->start_jam_khazanah;
				$end0 = $value->end_jam_khazanah;
			}
			if ($value->status_jam_khazanah == 1) {
				$start1 = $value->start_jam_khazanah;
				$end1 = $value->end_jam_khazanah;
			}
			if ($value->status_jam_khazanah == 2) {
				$start2 = $value->start_jam_khazanah;
				$end2 = $value->end_jam_khazanah;
			}
		}
		$tgl = date_create();
		$b = date_format($tgl, 'Y-m-d H:i:s');
		foreach ($kemarin as $value) {
			if ($value->tgl < $b) {
				$a[] = $value->tgl;
			}
		}
		$jumlahkemarin = count($a);
		?>
		var today = new Date();
		var h = today.getHours();
		var m = today.getMinutes();
		var s = today.getSeconds();
		var bulan = today.getMonth();
		var tahun = today.getFullYear();
		var tanggal = today.getDate();
		var notif = document.getElementById('notif');
		var notif2 = document.getElementById('notif2');
		var jam = document.getElementById('jam');
		m = checkTime(m);
		s = checkTime(s);
		h = checkTime(h);
		//jam.innerHTML =	h + ":" + m + ":" + s;
		var t = setTimeout(startTime, 500);

		var z = "08:00:00";
		var x = h + ":" + m + ":" + s;

		var lastkeluar = <?= '"' . $end0 . '"'; ?>;
		var firstkeluar = <?= '"' . $start0 . '"'; ?>;
		if (z < x && x < lastkeluar && x > firstkeluar) {
			notif0.innerHTML = "<div class='alert alert-warning border-0 bg-warning alert-dismissible fade show py-2'><div class = 'd-flex align-items-center'><div class = 'font-35 text-white' ><i class = bx bxs-message-square-x></i> </div> <div class = 'ms-3' ><h6 class = 'mb-0' >" + <?= $snol; ?> + " Data Belum ACC</h6> <div class = '' > ------------------------------ </div> </div> </div> <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close' > </button> </div>";
		} else {

		}
		var lastmasuk = <?= '"' . $end1 . '"'; ?>;
		var firtsmasuk = <?= '"' . $start1 . '"'; ?>;
		if (z < x && x < lastmasuk && x > firtsmasuk) {
			notif1.innerHTML = "<div class='alert alert-info border-0 bg-info alert-dismissible fade show py-2'><div class = 'd-flex align-items-center'><div class = 'font-35 text-white' ><i class = bx bxs-message-square-x></i> </div> <div class = 'ms-3' ><h6 class = 'mb-0 text-white' >" + <?= $ssatu; ?> + " Belum Selesai</h6> <div class = 'text-white' > ------------------------------ </div> </div> </div> <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close' > </button> </div>";
		} else {

		}
		var lastkeluar = <?= '"' . $end2 . '"'; ?>;
		var firstkeluar = <?= '"' . $start2 . '"'; ?>;
		if (z < x && x < lastkeluar && x > firstkeluar) {
			notif2.innerHTML = "<div class='alert alert-success border-0 bg-success alert-dismissible fade show py-2'><div class = 'd-flex align-items-center'><div class = 'font-35 text-white' ><i class = bx bxs-message-square-x></i> </div> <div class = 'ms-3' ><h6 class = 'mb-0 text-white' >" + <?= $sdua; ?> + " Data Selesai</h6> <div class = 'text-white' > ------------------------------ </div> </div> </div> <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close' > </button> </div>";
		} else {

		}

		var kemarin = <?= '"' . $jumlahkemarin . '"'; ?>;
		if (kemarin > 0) {
			notif3.innerHTML = "<div class='alert alert-danger border-0 bg-danger alert-dismissible fade show py-2'><div class = 'd-flex align-items-center'><div class = 'font-35 text-white' ><i class = bx bxs-message-square-x></i> </div> <div class = 'ms-3' ><h6 class = 'mb-0 text-white' >" + <?= $jumlahkemarin; ?> + " Data Kemarin</h6> <div class = 'text-white' > ------------------------------ </div> </div> </div> <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close' > </button> </div>";
		} else {

		}


	}

	function checkTime(i) {
		if (i < 10) {
			i = "0" + i
		}; // add zero in front of numbers < 10
		return i;
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		if ($('#passwordKhazanah').length) {
			$('#passwordKhazanah').on('show.bs.modal', function(e) {
				// get information to update quickly to modal view as loading begins
				var opener = e.relatedTarget; //this holds the element who called the modal

				//we get details from attributes
				var firstname = $(opener).attr('data-id');
				var tujuan = $(opener).attr('data-tujuan');

				//set what we got to our form
				$('#formkhazanah').find('[name="id"]').val(firstname);
				$('#tujuan').val(tujuan);

			});
		} else {
			return;
		}
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		if ($('#kegiatan').length) {
			callajax();
		}
	});

	function callajax() {
		$("#kegiatan").change(function() {
			$.ajax({
				type: "POST",
				url: "<?= base_url("Gudang/Produk/listkegiatan"); ?>",
				data: {
					id_keg: $("#kegiatan").val()
				},
				dataType: "json",
				beforeSend: function(e) {
					if (e && e.overrideMimeType) {
						e.overrideMimeType("Application/json;charset=UTF-8");
					}
				},
				success: function(response) {
					$("#tujuan").html(response.list_grade).show();
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
				}
			});
		});
	}
</script>
<script type="text/javascript">
	//Multi
	function tambahmulti() {
		var html = $(".multi").html();
		$(".multis").after(html);
	}

	function hapusmulti() {
		$(this).parents(".control-group").remove();
	}
</script>

<script type="text/javascript">
	$(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
		$("#check-all").click(function() { // Ketika user men-cek checkbox all
			if ($(this).is(":checked")) // Jika checkbox all diceklis
				$(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
			else // Jika checkbox all tidak diceklis
				$(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
		});

	});
</script>
<!-- Chained -->
<script>
	$(document).ready(function() {
		$('.multiple-select2').select2();
		$('#date-time-2').bootstrapMaterialDatePicker({
			format: 'YYYY-MM-DD HH:mm'
		});
	});

	// $('#exampleModal').on('show.bs.modal', function(event) {
	// let bookId = $(event.relatedTarget).data('bookid')
	// $(this).find('.modal-body input').val(bookId)
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