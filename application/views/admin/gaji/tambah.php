<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <h6 class="mb-0 text-uppercase"><?= $title ?></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" action="<?= base_url('admin/gaji/tambah/' . $pegawai->nip) ?>" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Masukan tanggal gaji pegawai</label>
                                <input class="result form-control" name="tgl" type="text" id="date" placeholder="Tanggal">
                                <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="form-control">Nama Pegawai</label>
                                <input type="text" name="nama_pegawai" class="form-control" value="<?= $pegawai->nama_pegawai ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="form-control">NIP Pegawai</label>
                                <input type="text" name="nip" class="form-control" value="<?= $pegawai->nip ?>" readonly>
                            </div>
                        </div>
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="hidden" name="id_kat_jabatan" class="form-control" value="<?= $pegawai->id_kat_jabatan ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <input type="hidden" name="id_grade" class="form-control" value="<?= $pegawai->id_grade ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <input type="hidden" name="id_kat_golongan" class="form-control" value="<?= $pegawai->id_kat_golongan ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <input type="hidden" name="id_pendidikan" class="form-control" value="<?= $pegawai->id_pendidikan ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-4">
                                <label for="form-control">Gaji Pokok Pegawai</label>
                                <input type="text" name="gapok" id="gapok" class="form-control" value="<?= $pegawai->gapok ?>" readonly onkeyup="sum();">
                            </div>
                            <div class="col-md-4">
                                <label for="form-control">Tunjangan Jabatan Pegawai</label>
                                <input type="text" name="gaji_jabatan" id="gaji_jabatan" class="form-control" value="<?= $pegawai->gaji_jabatan ?>" readonly onkeyup="sum();">
                            </div>
                            <div class="col-md-4">
                                <label for="form-control">Gaji Golongan Pegawai</label>
                                <input type="text" name="gaji_gol" id="gaji_gol" class="form-control" value="<?= $pegawai->gaji_gol ?>" readonly onkeyup="sum();">
                            </div>
                            <div class="col-md-4">
                                <label for="form-control">Gaji Pendidikan</label>
                                <input type="text" name="gaji_pend" id="gaji_pend" class="form-control" value="<?= $pegawai->gaji_pend ?>" readonly onkeyup="sum();">
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
                                <input type="text" id="makan" name="makan" class="form-control" value="<?= set_value('makan') ?>" onkeyup="sum();">
                                <?= form_error('makan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <!-- End Tunjangan uang makan -->
                            <!-- POTONGAN PEGAWAI BPJS PEGAWAI -->
                            <div class="col-md-4">
                                <label for="form-control">Kesehatan Pegawai</label>
                                <input type="text" id="bpjs_k" name="kesehatan_k" class="form-control" value="<?= set_value('kesehatan_k') ?>" onkeyup="sum();" readonly>
                                <?= form_error('kesehatan_k', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label for="form-control">Total Kesehatan Dibayar Perusahaan</label>
                                <input type="text" id="input_k" name="tot_pot_bpjs" class="form-control" placeholder="tanpa tanda %" value="<?= set_value('tot_pot_bpjs') ?>" onkeyup="sum();">
                                <?= form_error('tot_pot_bpjs', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <!-- END POTONGAN BPJS PEGAWAI -->
                        <!-- Tunjangan Uang Pulsa -->
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label for="form-control">Tunjangan Pulsa</label>
                                <input type="text" id="pulsa" name="pulsa" class="form-control" value="<?= set_value('pulsa') ?>" onkeyup="sum();">
                                <?= form_error('pulsa', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <!-- End Tunjangan uang pulsa -->
                        </div>
                        <!-- END POTONGAN BPJS PEGAWAI -->
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label for="form-control">Tunjangan Transport</label>
                                <input type="text" id="transport" name="transport" class="form-control" value="<?= set_value('transport') ?>" onkeyup="sum();">
                                <?= form_error('transport', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label for="form-control">Tunjangan Lainnya</label>
                                <input type="text" id="tun_lain" name="tunj_lainnya" class="form-control" value="<?= set_value('tunj_lainnya') ?>" onkeyup="sum();">
                                <?= form_error('tunj_lainnya', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label for="form-control">Jumlah Gaji Kotor</label>
                                <input type="text" id="g_kotor" name="gaji_kotor" class="form-control" value="<?= set_value('gaji_kotor') ?>" onkeyup="sum();">
                                <?= form_error('gaji_kotor', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label for="form-control">Total Potongan</label>
                                <input type="text" id="jml_pot" name="jml_potongan" class="form-control" value="<?= set_value('jml_potongan') ?>" onkeyup="sum();">
                                <?= form_error('jml_potongan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label for="form-control">Jumlah Gaji Bersih</label>
                                <input type="text" id="g_bersih" name="gaji_net" class="form-control" value="<?= set_value('gaji_net') ?>" onkeyup="sum();">
                                <?= form_error('gaji_net', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <!-- BUTTON SUBMIT -->
                        <!-- <div class="row"> -->
                        <div class="col-sm-4">
                            <div class="btn-group btn-sm" role="group" aria-label="First group">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit">
                                    <i class="bx bx-save"></i> Simpan
                                </button>
                            </div>
                            <button class="btn btn-danger btn-sm" name="reset" type="reset">
                                <i class="bx bx-reset"></i> Reset
                            </button>
                        </div>
                        <!-- </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--end page wrapper -->