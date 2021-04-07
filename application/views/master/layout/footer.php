<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>


<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>assets/js/demo/datatables-demo.js"></script>


<script>
    function angka(evt) {
        var charcode = (evt.which) ? evt.which : event.keycode
        if (charcode > 31 && (charcode < 48 || charcode > 57)) {
            return false;
        }
        return true;
    };
</script>

<script type="text/javascript">
    /* Tunjangan */


    function sum() {
        //tunjangan
        var gapok = document.getElementById('gapok').value;
        var gaji_jabatan = document.getElementById('gaji_jabatan').value;
        var gaji_gol = document.getElementById('gaji_gol').value;
        var gaji_pend = document.getElementById('gaji_pend').value;
        var makan = document.getElementById('makan').value;
        var pulsa = document.getElementById('pulsa').value;
        var transport = document.getElementById('transport').value;
        // input potongan
        var input_k = document.getElementById('input_k').value;

        var tun_lain = document.getElementById('tun_lain').value;

        //
        var bpjs_k = document.getElementById('bpjs_k').value;


        // total tunjangan
        // tunjangan gapok
        if (gapok == "") {
            var gapok_k = 0;
        } else {
            var gapok_k = parseInt(gapok.split(".").join(""));
        }

        // tunjangan jabatan
        if (gaji_jabatan == "") {
            var gaji_jabatan_k = 0;
        } else {
            var gaji_jabatan_k = parseInt(gaji_jabatan.split(".").join(""));
        }


        // gaji golongan
        if (gaji_gol == "") {
            var gaji_gol_k = 0;
        } else {
            var gaji_gol_k = parseInt(gaji_gol.split(".").join(""));
        }

        // gaji pend
        if (gaji_pend == "") {
            var gaji_pend_k = 0;
        } else {
            var gaji_pend_k = parseInt(gaji_pend.split(".").join(""));
        }

        // tunjangan makan
        if (makan == "") {
            var makan_k = 0;
        } else {
            var makan_k = parseInt(makan.split(".").join(""));
        }

        // tunjangan makan
        if (tun_lain == "") {
            var tun_lain = 0;
        } else {
            var tun_lain = parseInt(tun_lain.split(".").join(""));
        }

        //tunjangan pulsa
        if (pulsa == "") {
            var pulsa_k = 0;
        } else {
            var pulsa_k = parseInt(pulsa.split(".").join(""));
        }
        // tunjangan transport
        if (transport == "") {
            var transport_k = 0;
        } else {
            var transport_k = parseInt(transport.split(".").join(""));
        }


        // total potongan
        //potongan pajak
        if (bpjs_k == "") {
            var bpjs_k = 0;
        } else {
            var bpjs_k = parseInt(bpjs_k.split(".").join(""));
        }



        //input potongan karyawan bpjs
        if (input_k == "") {
            var input_k = 0;
        } else {
            var input_k = parseInt(input_k.split(".").join(""));
        }



        // Gaji Kotor
        var kotor = makan_k + pulsa_k + transport_k + gaji_pend_k + gaji_gol_k + gaji_jabatan_k + gapok_k + tun_lain;
        if (!isNaN(kotor)) {
            document.getElementById('g_kotor').value = kotor.toString();
        }

        // Total Potongan
        var pot = (gapok_k * input_k) / 100
        if (!isNaN(pot)) {
            document.getElementById('jml_pot').value = pot.toString();
        }


        // Input pot kesehatan karyawan
        var pot_kes = (gapok_k * input_k) / 100;
        if (!isNaN(pot_kes)) {
            document.getElementById('bpjs_k').value = pot_kes.toString();
        }


        // Input pot kesehatan karyawan



        // gaji bersih
        var jml_total = parseInt(kotor) - parseInt(pot);
        if (!isNaN(jml_total)) {
            document.getElementById('g_bersih').value = jml_total.toString();
        }
    }
</script>

<!-- CHAINED SELECT -->
<script>
    $(document).ready(function() {
        $("#jabatan").change(function() {
            // $("#gapok").hide();
            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/gaji/listgapok'); ?>",
                data: {
                    id_kat_jabatan: $("#jabatan").val()
                },
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) {
                    $("#gapok").html(response.list_jab).show();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#jabatan").change(function() {
            // $("#gaji_jabatan").hide();
            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/gaji/listgaja'); ?>",
                data: {
                    id_kat_jabatan: $("#jabatan").val()
                },
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) {
                    $("#gaji_jabatan").html(response.list_gaja).show();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#gol").change(function() {
            // $("#gaji_gol").hide();
            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/gaji/listgol'); ?>",
                data: {
                    id_kat_golongan: $("#gol").val()
                },
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) {
                    $("#gaji_gol").html(response.list_gol).show();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#pend").change(function() {
            // $("#gaji_pend").hide();
            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/gaji/listpend'); ?>",
                data: {
                    id_pendidikan: $("#pend").val()
                },
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) {
                    $("#gaji_pend").html(response.list_pend).show();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>


<script>
    $(document).ready(function() {
        $("#jabatan").change(function() {
            // $("#gapok").hide();
            $.ajax({
                type: "POST",
                url: "<?= base_url('master/pegawai/listgolongan'); ?>",
                data: {
                    id_gaji: $("#jabatan").val()
                },
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) {
                    $("#golongan").html(response.list_golongan).show();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#jabatan").change(function() {
            // $("#gapok").hide();
            $.ajax({
                type: "POST",
                url: "<?= base_url('master/pegawai/listpendidikan'); ?>",
                data: {
                    id_gaji: $("#jabatan").val()
                },
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) {
                    $("#pend").html(response.list_pendidikan).show();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#jabatan").change(function() {
            // $("#gapok").hide();
            $.ajax({
                type: "POST",
                url: "<?= base_url('master/pegawai/listgapok'); ?>",
                data: {
                    id_gaji: $("#jabatan").val()
                },
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) {
                    $("#gapok").html(response.list_gapok).show();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>
<!-- END CHAINED SELECT -->

</body>

</html>