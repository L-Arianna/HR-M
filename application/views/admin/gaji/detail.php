<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <h6 class="mb-0 text-uppercase"><?= $title ?></h6>
        <hr />
        <div class="card">
            <div class="card-header bg-primary">
                <label for="form-control" class="d-flex justify-content-end text-white">Nama pegawai : <?= $gaji->nama_pegawai ?></label>
            </div>
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" action="<?= base_url('admin/gaji/detail/' . $gaji->id_gaji) ?>" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="d-flex justify-content-start">Data Gaji Tanggal <?= $gaji->tgl ?> || Nip Pegawai :<?= $gaji->nip ?>
                                </h5>
                            </div>
                        </div>
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="form-control">Jabatan Pegawai</label>
                                <input type="text" name="nama_jabatan" class="form-control" value="<?= $gaji->nama_jabatan ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="form-control">Gaji Pokok Pegawai</label>
                                <input type="text" name="gapok" class="form-control" value="<?= number_format($gaji->gapok) ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="form-control">Tunjangan Jabatan Pegawai</label>
                                <input type="text" name="gaji_jabatan" class="form-control" value="<?= number_format($gaji->gaji_jabatan) ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="form-control">Grade Pegawai</label>
                                <input type="text" name="id_grade" class="form-control" value="<?= $gaji->nama_grade ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="form-control">Golongan Pegawai</label>
                                <input type="text" name="nama_golongan" class="form-control" value="<?= $gaji->nama_golongan ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="form-control">Gaji Golongan Pegawai</label>
                                <input type="text" name="gaji_gol" class="form-control" value="<?= number_format($gaji->gaji_gol) ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="form-control">Pendidikan Pegawai</label>
                                <input type="text" name="gaji_pend" class="form-control" value="<?= $gaji->nama_pendidikan ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="form-control">Gaji Pendidikan</label>
                                <input type="text" name="gaji_pend" class="form-control" value="<?= number_format($gaji->gaji_pend) ?>" readonly>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="h5 mb-1 text-gray-900">Tunjangan Pegawai</h5>
                            </div>
                            <div class="col-md-4">
                                <h5 class="h5 mb-1 text-gray-900">Potongan Pegawai</h5>
                            </div>
                        </div>
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                        <div class="row mb-2">
                            <!-- Tunjangan uang makan -->
                            <div class="col-md-4">
                                <label for="form-control">Tunjangan Makan</label>
                                <input type="text" id="makan" name="makan" class="form-control" value="<?= number_format($gaji->makan) ?>" readonly>
                            </div>
                            <!-- End Tunjangan uang makan -->

                            <!-- POTONGAN PEGAWAI BPJS PEGAWAI -->
                            <div class="col-md-4">
                                <label for="form-control">Kesehatan Pegawai</label>
                                <input type="text" id="bpjs_k" name="kesehatan_k" class="form-control" value="<?= number_format($gaji->kesehatan_k) ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="form-control">Total Kesehatan Dibayar Perusahaan</label>
                                <input type="text" id="input_k" name="input_k" class="form-control" value="<?= $gaji->tot_pot_bpjs ?> %" readonly>
                            </div>
                        </div>
                        <!-- END POTONGAN BPJS PEGAWAI -->

                        <!-- Tunjangan Uang Pulsa -->
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label for="form-control">Tunjangan Pulsa</label>
                                <input type="text" id="pulsa" name="pulsa" class="form-control" value="<?= number_format($gaji->pulsa) ?>" readonly>
                            </div>
                            <!-- End Tunjangan uang pulsa -->

                        </div>
                        <!-- END POTONGAN BPJS PEGAWAI -->
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label for="form-control">Tunjangan Transport</label>
                                <input type="text" id="transport" name="transport" class="form-control" value="<?= number_format($gaji->transport) ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label for="form-control">Tunjangan Lainnya</label>
                                <input type="text" id="tun_lain" name="tunj_lainnya" class="form-control" value="<?= number_format($gaji->tunj_lainnya) ?>" readonly>
                            </div>
                        </div>
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label for="form-control">Jumlah Gaji Kotor</label>
                                <input type="text" id="g_kotor" name="gaji_kotor" class="form-control" value="<?= number_format($gaji->gaji_kotor) ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="form-control">Total Potongan</label>
                                <input type="text" id="jml_pot" name="jml_potongan" class="form-control" value="<?= number_format($gaji->jml_potongan) ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="form-control">Jumlah Gaji Bersih</label>
                                <input type="text" id="g_bersih" name="gaji_net" class="form-control" value="<?= number_format($gaji->gaji_net) ?>" readonly>
                            </div>
                        </div>
                        <!-- BUTTON SUBMIT -->
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!--end page wrapper -->