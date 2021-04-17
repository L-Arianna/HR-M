
	//CRUD Dropdown Produk
    var save_method_produk; //for save method string
	var table_produk;

	function produk_ajax() {
		if($('#tableprodukdropdown').length){
			datatable_produk();
		} else if ($('#tablependidikandropdown').length) {
			datatable_pendidikan();
		} else if ($('#tabletipependapatandropdown').length) {
			datatable_tipe_pendapatan();
		} else if ($('#tablebidangusahadropdown').length) {
			datatable_bidang_usaha();
		} else if ($('#tablestatussuratmasukdropdown').length) {
			datatable_status_surat_masuk();
		} else if($('#tablekatlib').length) {
			datatable_kat_lib();
		} else {

		}
	};

	function datatable_produk()
	{
		//datatables Produk
		table_produk = $('#tableprodukdropdown').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.

			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "Produk/ajax_list",
				"type": "POST"
			},

			//Set column definition initialisation properties.
			"columnDefs": [{
				"targets": [-1], //last column
				"orderable": false, //set not orderable
			}, ],

		});

		//set input/textarea/select event when change value, remove class error and remove text help block 
		$("input").change(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
		$("textarea").change(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
		$("select").change(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
	}

	function produk_add_ajax() {
		save_method_produk = 'add';
		$('#formproduk')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form').modal('show'); // show bootstrap modal
		$('.modal-title').text('Add Produk'); // Set Title to Bootstrap modal title
		$('#btnSaveProduk').text('save'); //change button text
		$('#btnSaveProduk').attr('disabled', false); //set button enable 
	}

	function produk_edit_ajax(iddropdownproduk) {
		save_method_produk = 'update';
		$('#formproduk')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		//Ajax Load data from ajax
		$.ajax({
			url: "Produk/ajax_edit/" + iddropdownproduk,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="iddropdownproduk"]').val(data.id_dropdown_produk);
				$('[name="namadropdownproduk"]').val(data.nama_dropdown_produk);
				$('[name="kodedropdownproduk"]').val(data.kode_dropdown_produk);
				//$('[name="dob"]').datepicker('update',data.dob);
				$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
				$('.modal-title').text('Edit Produk'); // Set title to Bootstrap modal title

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function produk_reload_table() {
		table_produk.ajax.reload(null, false); //reload datatable ajax 
	}

	function produk_save() {
		$('#btnSaveProduk').text('saving...'); //change button text
		$('#btnSaveProduk').attr('disabled', true); //set button disable 
		var url;

		if (save_method_produk == 'add') {
			url = "Produk/ajax_add";
		} else {
			url = "Produk/ajax_update";
		}
		var form = document.forms.namedItem('formdata');
		var form_data = new FormData(form);

		$.ajax({
			url: url,
			type: "POST",
			data: form_data,
			dataType: "JSON",
			contentType: false,
			processData: false,
			cache: false,
			success: function(data) {

				if (data.status) //if success close modal and reload ajax table
				{
					$('#btnSaveProduk').text('save'); //change button text
					$('#btnSaveProduk').attr('disabled', false); //set button enable 
					$('#modal_form').modal('hide');
					$('#formproduk')[0].reset();
					produk_reload_table();
				} else {
					for (var i = 0; i < data.inputerror.length; i++) {
						$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
						$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
					}
					$('#btnSaveProduk').text('save'); //change button text
					$('#btnSaveProduk').attr('disabled', false); //set button enable 
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');
				$('#btnSaveProduk').text('save'); //change button text
				$('#btnSaveProduk').attr('disabled', false); //set button enable 

			}
		});
	}

	function delete_produk(iddropdownproduk) {
		if (confirm('Are you sure delete this data?')) {
			// ajax delete data to database
			$.ajax({
				url: "Produk/ajax_delete/" + iddropdownproduk,
				type: "POST",
				dataType: "JSON",
				success: function(data) {
					//if success reload ajax table
					$('#modal_form').modal('hide');
					produk_reload_table();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error deleting data');
				}
			});

		}
	}
	//Ajax Data Pendidikan Terakhir
	
	//CRUD Dropdown Pendidikan
    var save_method_pendidikan; //for save method string
	var table_pendidikan;

	function datatable_pendidikan()
	{
		//datatables Pendidikan
		table_pendidikan = $('#tablependidikandropdown').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.

			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "ajax_list_pendidikan",
				"type": "POST"
			},

			//Set column definition initialisation properties.
			"columnDefs": [{
				"targets": [-1], //last column
				"orderable": false, //set not orderable
			}, ],

		});

		//set input/textarea/select event when change value, remove class error and remove text help block 
		$("input").change(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
		$("textarea").change(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
		$("select").change(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
	}

	function pendidikan_add_ajax() {
		save_method_pendidikan = 'add';
		$('#formpendidikan')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#pendidikan_modal_form').modal('show'); // show bootstrap modal
		$('.modal-title').text('Add Produk'); // Set Title to Bootstrap modal title
		$('#btnSavependidikan').text('save'); //change button text
		$('#btnSavependididkan').attr('disabled', false); //set button enable 
	}

	function pendidikan_edit_ajax(iddropdownpendidikan) {
		save_method_pendidikan = 'update';
		$('#formpendidikan')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		//Ajax Load data from ajax
		$.ajax({
			url: "ajax_edit_pendidikan/" + iddropdownpendidikan,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="iddropdownpendidikan"]').val(data.id_dropdown_pendidikan);
				$('[name="namadropdownpendidikan"]').val(data.nama_dropdown_pendidikan);
				//$('[name="dob"]').datepicker('update',data.dob);
				$('#pendidikan_modal_form').modal('show'); // show bootstrap modal when complete loaded
				$('.modal-title').text('Edit Pendidikan'); // Set title to Bootstrap modal title

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function pendidikan_reload_table() {
		table_pendidikan.ajax.reload(null, false); //reload datatable ajax 
	}

	function pendidikan_save() {
		$('#btnSavependidikan').text('saving...'); //change button text
		$('#btnSavependidikan').attr('disabled', true); //set button disable 
		var url;

		if (save_method_pendidikan == 'add') {
			url = "ajax_add_pendidikan";
		} else {
			url = "ajax_update_pendidikan";
		}
		var form = document.forms.namedItem('formdata');
		var form_data = new FormData(form);

		$.ajax({
			url: url,
			type: "POST",
			data: form_data,
			dataType: "JSON",
			contentType: false,
			processData: false,
			cache: false,
			success: function(data) {

				if (data.status) //if success close modal and reload ajax table
				{
					$('#btnSavependidikan').text('save'); //change button text
					$('#btnSavependidikan').attr('disabled', false); //set button enable 
					$('#pendidikan_modal_form').modal('hide');
					$('#formpendidikan')[0].reset();
					pendidikan_reload_table();
				} else {
					for (var i = 0; i < data.inputerror.length; i++) {
						$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
						$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
					}
					$('#btnSavependidikan').text('save'); //change button text
					$('#btnSavependidikan').attr('disabled', false); //set button enable 
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');
				$('#btnSavependidikan').text('save'); //change button text
				$('#btnSavependidikan').attr('disabled', false); //set button enable 

			}
		});
	}

	function delete_pendidikan(iddropdownpendidikan) {
		if (confirm('Are you sure delete this data?')) {
			// ajax delete data to database
			$.ajax({
				url: "ajax_delete_pendidikan/" + iddropdownpendidikan,
				type: "POST",
				dataType: "JSON",
				success: function(data) {
					//if success reload ajax table
					$('#pendidikan_modal_form').modal('hide');
					pendidikan_reload_table();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error deleting data');
				}
			});

		}
	}

	//CRUD Dropdown Tipe Pendapatan
    var save_method_tipe_pendapatan; //for save method string
	var table_tipe_pendapatan;

	function datatable_tipe_pendapatan()
	{
		//datatables Pendidikan
		table_tipe_pendapatan = $('#tabletipependapatandropdown').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.

			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "ajax_list_tipe_pendapatan",
				"type": "POST"
			},

			//Set column definition initialisation properties.
			"columnDefs": [{
				"targets": [-1], //last column
				"orderable": false, //set not orderable
			}, ],

		});

		//set input/textarea/select event when change value, remove class error and remove text help block 
		$("input").change(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
		$("textarea").change(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
		$("select").change(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
	}

	function tipe_pendapatan_add_ajax() {
		save_method_tipe_pendapatan = 'add';
		$('#formtipependapatan')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#tipe_pendapatan_modal_form').modal('show'); // show bootstrap modal
		$('.modal-title').text('Add Produk'); // Set Title to Bootstrap modal title
		$('#btnSavetipependapatan').text('save'); //change button text
		$('#btnSavetipependapatan').attr('disabled', false); //set button enable 
	}

	function tipe_pendapatan_edit_ajax(iddropdownpekerjaan) {
		save_method_tipe_pendapatan = 'update';
		$('#formtipependapatan')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		//Ajax Load data from ajax
		$.ajax({
			url: "ajax_edit_tipe_pendapatan/" + iddropdownpekerjaan,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="iddropdownpekerjaan"]').val(data.id_dropdown_pekerjaan);
				$('[name="namadropdownpekerjaan"]').val(data.nama_dropdown_pekerjaan);
				//$('[name="dob"]').datepicker('update',data.dob);
				$('#tipe_pendapatan_modal_form').modal('show'); // show bootstrap modal when complete loaded
				$('.modal-title').text('Edit Pendidikan'); // Set title to Bootstrap modal title

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function tipe_pendapatan_reload_table() {
		table_tipe_pendapatan.ajax.reload(null, false); //reload datatable ajax 
	}

	function tipe_pendapatan_save() {
		$('#btnSavepekerjaan').text('saving...'); //change button text
		$('#btnSavepekerjaan').attr('disabled', true); //set button disable 
		var url;

		if (save_method_tipe_pendapatan == 'add') {
			url = "ajax_add_tipe_pendapatan";
		} else {
			url = "ajax_update_tipe_pendapatan";
		}
		var form = document.forms.namedItem('formdata');
		var form_data = new FormData(form);

		$.ajax({
			url: url,
			type: "POST",
			data: form_data,
			dataType: "JSON",
			contentType: false,
			processData: false,
			cache: false,
			success: function(data) {

				if (data.status) //if success close modal and reload ajax table
				{
					$('#btnSavepekerjaan').text('save'); //change button text
					$('#btnSavepekerjaan').attr('disabled', false); //set button enable 
					$('#tipe_pendapatan_modal_form').modal('hide');
					$('#formtipependapatan')[0].reset();
					tipe_pendapatan_reload_table();
				} else {
					for (var i = 0; i < data.inputerror.length; i++) {
						$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
						$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
					}
					$('#btnSavepekerjaan').text('save'); //change button text
					$('#btnSavepekerjaan').attr('disabled', false); //set button enable 
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');
				$('#btnSavepekerjaan').text('save'); //change button text
				$('#btnSavepekerjaan').attr('disabled', false); //set button enable 

			}
		});
	}

	function delete_tipe_pendapatan(iddropdownpekerjaan) {
		if (confirm('Are you sure delete this data?')) {
			// ajax delete data to database
			$.ajax({
				url: "ajax_delete_tipe_pendapatan/" + iddropdownpekerjaan,
				type: "POST",
				dataType: "JSON",
				success: function(data) {
					//if success reload ajax table
					$('#tipe_pendapatan_modal_form').modal('hide');
					tipe_pendapatan_reload_table();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error deleting data');
				}
			});

		}
	}

	//CRUD Bidang Usaha
	var save_method_bidang_usaha; //for save method string
	var table_bidang_usaha;

	function datatable_bidang_usaha()
	{
		//datatables Pendidikan
		table_bidang_usaha = $('#tablebidangusahadropdown').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.

			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "ajax_list_bidang_usaha",
				"type": "POST"
			},

			//Set column definition initialisation properties.
			"columnDefs": [{
				"targets": [-1], //last column
				"orderable": false, //set not orderable
			}, ],

		});

		//set input/textarea/select event when change value, remove class error and remove text help block 
		$("input").change(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
		$("textarea").change(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
		$("select").change(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
	}

	function bidang_usaha_add_ajax() {
		save_method_bidang_usaha = 'add';
		$('#formbidangusaha')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#bidang_usaha_modal_form').modal('show'); // show bootstrap modal
		$('.modal-title').text('Add Bidang Usaha'); // Set Title to Bootstrap modal title
		$('#btnSavebidangusaha').text('save'); //change button text
		$('#btnSavebidangusaha').attr('disabled', false); //set button enable 
	}

	function bidang_usaha_edit_ajax(iddropdownbidangusaha) {
		save_method_bidang_usaha = 'update';
		$('#formbidangusaha')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		//Ajax Load data from ajax
		$.ajax({
			url: "ajax_edit_bidang_usaha/" + iddropdownbidangusaha,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="iddropdownbidangusaha"]').val(data.id_dropdown_bidangusaha);
				$('[name="namadropdownbidangusaha"]').val(data.nama_dropdown_bidangusaha);
				//$('[name="dob"]').datepicker('update',data.dob);
				$('#bidang_usaha_modal_form').modal('show'); // show bootstrap modal when complete loaded
				$('.modal-title').text('Edit Bidang Usaha'); // Set title to Bootstrap modal title

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function bidang_usaha_reload_table() {
		table_bidang_usaha.ajax.reload(null, false); //reload datatable ajax 
	}

	function bidang_usaha_save() {
		$('#btnSavebidangusaha').text('saving...'); //change button text
		$('#btnSavebidangusaha').attr('disabled', true); //set button disable 
		var url;

		if (save_method_bidang_usaha == 'add') {
			url = "ajax_add_bidang_usaha";
		} else {
			url = "ajax_update_bidang_usaha";
		}
		var form = document.forms.namedItem('formdata');
		var form_data = new FormData(form);

		$.ajax({
			url: url,
			type: "POST",
			data: form_data,
			dataType: "JSON",
			contentType: false,
			processData: false,
			cache: false,
			success: function(data) {

				if (data.status) //if success close modal and reload ajax table
				{
					$('#btnSavebidangusaha').text('save'); //change button text
					$('#btnSavebidangusaha').attr('disabled', false); //set button enable 
					$('#bidang_usaha_modal_form').modal('hide');
					$('#formbidangusaha')[0].reset();
					bidang_usaha_reload_table();
				} else {
					for (var i = 0; i < data.inputerror.length; i++) {
						$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
						$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
					}
					$('#btnSavebidangusaha').text('save'); //change button text
					$('#btnSavebidangusaha').attr('disabled', false); //set button enable 
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');
				$('#btnSavebidangusaha').text('save'); //change button text
				$('#btnSavebidangusaha').attr('disabled', false); //set button enable 

			}
		});
	}

	function delete_bidang_usaha(iddropdownbidangusaha) {
		if (confirm('Are you sure delete this data?')) {
			// ajax delete data to database
			$.ajax({
				url: "ajax_delete_bidang_usaha/" + iddropdownbidangusaha,
				type: "POST",
				dataType: "JSON",
				success: function(data) {
					//if success reload ajax table
					$('#bidang_usaha_modal_form').modal('hide');
					bidang_usaha_reload_table();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error deleting data');
				}
			});

		}
	}
	//CRUD Surat Masuk
	var save_method_status_surat_masuk; //for save method string
	var table_status_surat_masuk;

	function datatable_status_surat_masuk()
	{
		//datatables Pendidikan
		table_status_surat_masuk = $('#tablestatussuratmasukdropdown').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.

			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "ajax_list_status_surat_masuk",
				"type": "POST"
			},

			//Set column definition initialisation properties.
			"columnDefs": [{
				"targets": [-1], //last column
				"orderable": false, //set not orderable
			}, ],

		});

		//set input/textarea/select event when change value, remove class error and remove text help block 
		$("input").change(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
		$("textarea").change(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
		$("select").change(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
	}

	function status_surat_masuk_add_ajax() {
		save_method_status_surat_masuk = 'add';
		$('#formstatussuratmasuk')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#statussuratmasuk_modal_form').modal('show'); // show bootstrap modal
		$('.modal-title').text('Add Bidang Usaha'); // Set Title to Bootstrap modal title
		$('#btnSavestatussuratmasuk').text('save'); //change button text
		$('#btnSavestatussuratmasuk').attr('disabled', false); //set button enable 
	}

	function status_surat_masuk_edit_ajax(iddropdownstatussuratmasuk) {
		save_method_status_surat_masuk = 'update';
		$('#formstatussuratmasuk')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		//Ajax Load data from ajax
		$.ajax({
			url: "ajax_edit_status_surat_masuk/" + iddropdownstatussuratmasuk,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="iddropdownstatussuratmasuk"]').val(data.id_dropdown_statussuratmasuk);
				$('[name="namadropdownstatussuratmasuk"]').val(data.nama_dropdown_statussuratmasuk);
				//$('[name="dob"]').datepicker('update',data.dob);
				$('#status_surat_masuk_modal_form').modal('show'); // show bootstrap modal when complete loaded
				$('.modal-title').text('Edit Bidang Usaha'); // Set title to Bootstrap modal title

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function status_surat_masuk_reload_table() {
		table_status_surat_masuk.ajax.reload(null, false); //reload datatable ajax 
	}

	function status_surat_masuk_save() {
		$('#btnSavestatussuratmasuk').text('saving...'); //change button text
		$('#btnSavestatussuratmasuk').attr('disabled', true); //set button disable 
		var url;

		if (save_method_status_surat_masuk == 'add') {
			url = "ajax_add_status_surat_masuk";
		} else {
			url = "ajax_update_status_surat_masuk";
		}
		var form = document.forms.namedItem('formdata');
		var form_data = new FormData(form);

		$.ajax({
			url: url,
			type: "POST",
			data: form_data,
			dataType: "JSON",
			contentType: false,
			processData: false,
			cache: false,
			success: function(data) {

				if (data.status) //if success close modal and reload ajax table
				{
					$('#btnSavestatussuratmasuk').text('save'); //change button text
					$('#btnSavestatussuratmasuk').attr('disabled', false); //set button enable 
					$('#status_surat_masuk_modal_form').modal('hide');
					$('#formstatussuratmasuk')[0].reset();
					status_surat_masuk_reload_table();
				} else {
					for (var i = 0; i < data.inputerror.length; i++) {
						$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
						$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
					}
					$('#btnSavestatussuratmasuk').text('save'); //change button text
					$('#btnSavestatussuratmasuk').attr('disabled', false); //set button enable 
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');
				$('#btnSavestatussuratmasuk').text('save'); //change button text
				$('#btnSavestatussuratmasuk').attr('disabled', false); //set button enable 

			}
		});
	}

	function delete_status_surat_masuk(iddropdownstatussuratmasuk) {
		if (confirm('Are you sure delete this data?')) {
			// ajax delete data to database
			$.ajax({
				url: "ajax_delete_status_surat_masuk/" + iddropdownstatussuratmasuk,
				type: "POST",
				dataType: "JSON",
				success: function(data) {
					//if success reload ajax table
					$('#status_surat_masuk_modal_form').modal('hide');
					status_surat_masuk_reload_table();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error deleting data');
				}
			});

		}
	}
	//CRUD Kategori E-Library
	var save_method_kat_lib; //for save method string
	var table_kat_lib;

	function datatable_kat_lib()
	{
		//datatables Pendidikan
		table_kat_lib = $('#tablekatlib').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.

			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "ajax_list_kat_lib",
				"type": "POST"
			},

			//Set column definition initialisation properties.
			"columnDefs": [{
				"targets": [-1], //last column
				"orderable": false, //set not orderable
			}, ],

		});

		//set input/textarea/select event when change value, remove class error and remove text help block 
		$("input").change(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
		$("textarea").change(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
		$("select").change(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
	}

	function kat_lib_add_ajax() {
		save_method_kat_lib = 'add';
		$('#formkatlib')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#katlib_modal_form').modal('show'); // show bootstrap modal
		$('.modal-title').text('Add Bidang Usaha'); // Set Title to Bootstrap modal title
		$('#btnSavekatlib').text('save'); //change button text
		$('#btnSavekatlib').attr('disabled', false); //set button enable 
	}

	function kat_lib_edit_ajax(idkatbook) {
		save_method_kat_lib = 'update';
		$('#formkatlib')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		//Ajax Load data from ajax
		$.ajax({
			url: "ajax_edit_kat_lib/" + idkatbook,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="idkatbook"]').val(data.id_kat_book);
				$('[name="namakatbook"]').val(data.nama_kat_book);
				//$('[name="dob"]').datepicker('update',data.dob);
				$('#kat_lib_modal_form').modal('show'); // show bootstrap modal when complete loaded
				$('.modal-title').text('Edit Kategori E-Library'); // Set title to Bootstrap modal title

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function kat_lib_reload_table() {
		table_kat_lib.ajax.reload(null, false); //reload datatable ajax 
	}

	function kat_lib_save() {
		$('#btnSavekatlib').text('saving...'); //change button text
		$('#btnSavekatlib').attr('disabled', true); //set button disable 
		var url;

		if (save_method_kat_lib == 'add') {
			url = "ajax_add_kat_lib";
		} else {
			url = "ajax_update_kat_lib";
		}
		var form = document.forms.namedItem('formdata');
		var form_data = new FormData(form);

		$.ajax({
			url: url,
			type: "POST",
			data: form_data,
			dataType: "JSON",
			contentType: false,
			processData: false,
			cache: false,
			success: function(data) {

				if (data.status) //if success close modal and reload ajax table
				{
					$('#btnSavekatlib').text('save'); //change button text
					$('#btnSavekatlib').attr('disabled', false); //set button enable 
					$('#kat_lib_modal_form').modal('hide');
					$('#formkatlib')[0].reset();
					kat_lib_reload_table();
				} else {
					for (var i = 0; i < data.inputerror.length; i++) {
						$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
						$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
					}
					$('#btnSavekatlib').text('save'); //change button text
					$('#btnSavekatlib').attr('disabled', false); //set button enable 
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');
				$('#btnSavekatlib').text('save'); //change button text
				$('#btnSavekatlib').attr('disabled', false); //set button enable 

			}
		});
	}

	function delete_kat_lib(idkatbook) {
		if (confirm('Are you sure delete this data?')) {
			// ajax delete data to database
			$.ajax({
				url: "ajax_delete_kat_lib/" + idkatbook,
				type: "POST",
				dataType: "JSON",
				success: function(data) {
					//if success reload ajax table
					$('#kat_lib_modal_form').modal('hide');
					kat_lib_reload_table();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error deleting data');
				}
			});

		}
	}
