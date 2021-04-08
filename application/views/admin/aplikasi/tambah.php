<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <h6 class="mb-0 text-uppercase"><?= $title ?></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <?= form_open_multipart(base_url('Admin/Aplikasi/tambah')) ?>
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <label for="form-control">Produk</label>
                            <select id="produk" name="produk" class="form-control">
                                <?php if (empty($dropdownproduk)) { ?>
                                    <option readonly>Data Kosong</option>
                                    <?php } else {
                                    echo "<option>Pilih</option>";
                                    foreach ($dropdownproduk as $value) {
                                    ?>
                                        <option value="<?= $value->id_dropdown_produk; ?>"><?= $value->nama_dropdown_produk; ?> | <?= $value->kode_dropdown_produk; ?></option>
                                    <?php
                                    } ?>
                                <?php } ?>
                            </select>
                            <?= form_error('produk', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <!-- <div class="col-md-2">
                            <label for="form-control"></label>
                            <input type="text" name="nilaiproduk" class="form-control" placeholder="Nilai Produk">
                            <?//= form_error('nilaiproduk', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div> -->
                        <div class="col-md-5">
                            <label for="form-control">Plafon Pinjaman Yang Di minta</label>
                            <input type="text" name="plafonpinjaman" class="form-control" placeholder="Plafon Pinjaman">
                            <?= form_error('plafonpinjaman', '<small class="text-danger pl-3">', '</small>'); ?>

                            <div class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="Jangka Waktu Pinjaman" aria-label="Jangka Waktu Pinjaman" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Tahun</span>
                                    <?= form_error('jangkawaktupinjaman', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="row mb-1">
                        <div class="col-md-6">
                            <h3 for="form-control">Data Pemohon</h3>
                            <div class="form-group">
                                <label for="form-control">Nama (Sesuai KTP)</label>
                                <input type="text" name="namapemohon" class="form-control" placeholder="Nama Pemohon">
                                <?= form_error('namapemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">Nama Panggilan</label>
                                <input type="text" name="panggilanpemohon" class="form-control" placeholder="Nama Panggialan">
                                <?= form_error('panggilanpemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">Jenis Kelamin</label>
                                <select class="form-control">
                                    <option>Pilih</option>
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
                                </select>
                                <?= form_error('jenkelpemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">No. KTP Pemohon</label>
                                <input type="text" name="ktppemohon" class="form-control" placeholder="No. KTP Pemohon">
                                <?= form_error('ktppemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">KTP Berlaku Sampai</label>
                                <input type="text" name="masaktppemohon" class="form-control" placeholder="KTP Berlaku Sampai" value="selamanya">
                                <?= form_error('masaktppemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">Tanggal Lahir Pemohon</label>
                                <input type="date" name="tgllahirpemohon" class="form-control">
                                <?= form_error('tgllahirpemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">Tempat Lahir Pemohon</label>
                                <input type="text" name="tempatlahirpemohon" class="form-control" placeholder="Tempat Lahir Pemohon">
                                <?= form_error('tempatlahirpemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">Pendidikan Terakhir</label>
                                <select class="form-control">
                                    <option value="0">Pilih</option>
                                    <option value="1">SD</option>
                                    <option value="2">SMP</option>
                                    <option value="3">SMK</option>
                                    <option value="4">D3</option>
                                    <option value="5">S1</option>
                                    <option value="6">S2</option>
                                </select>
                                <?= form_error('pendidikanpemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">Status Perkawinan</label>
                                <input type="text" name="statuspemohon" class="form-control" placeholder="Status Perkawinan Pemohon">
                                <?= form_error('statuspemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">Nama Istri/Suami</label>
                                <input type="text" name="pasanganpemohon" class="form-control" placeholder="Nama Istri/Suami">
                                <?= form_error('pasanganpemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">Jumlah Tanggungan</label>
                                <input type="text" name="tanggunganpemohon" class="form-control" placeholder="Jumlah Tanggunan">
                                <?= form_error('tanggunganpemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            </br>
                            <h3 for="form-control">Keterangan Tempat Tinggal</h3>
                            </br>
                            <div class="form-group">
                                <label for="form-control">Alamat Tinggal Saat Ini</label>
                                <input type="text" name="alamattinggalpemohon" class="form-control" placeholder="Alamat Tinggal Saat Ini">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form-control">RT</label>
                                        <input type="text" name="rtpemohon" class="form-control" placeholder="RT Pemohon">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-control">Kelurahan</label>
                                        <input type="text" name="keluarahanpemohon" class="form-control" placeholder="Kelurahan Saat Ini">
                                        <?= form_error('kelurahanpemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="form-control">Telepon/Fax</label>
                                        <input type="text" name="teleponpemohon" class="form-control" placeholder="Nomor Telepon/Fax">
                                        <?= form_error('teleponpemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="form-control">Status Tempat Tinggal Saat Ini</label>
                                        <select class="form-control" name="statustinggalpemohon">
                                            <option value="0">Pilih</option>
                                            <option value="1">Milik Sendiri</option>
                                            <option value="2">Warisan</option>
                                            <option value="3">Kontrak</option>
                                            <option value="4">Kost</option>
                                            <option value="5">Lainnya</option>
                                        </select>
                                        <?= form_error('statustinggalpemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form-control">RW</label>
                                        <input type="text" name="rwpemohon" class="form-control" placeholder="RW Pemohon">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-control">Kecamatan</label>
                                        <input type="text" name="kecamatanpemohon" class="form-control" placeholder="Kecamatan Saat Ini">
                                        <?= form_error('kecamatanpemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="form-control">No. HP</label>
                                        <input type="text" name="nohppemohon" class="form-control" placeholder="Nomor HP Yang Bisa DI Hubungi">
                                        <?= form_error('nohppemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="form-control">Lama Menempati Rumah</label>
                                        <input type="text" name="lamarumahpemohon" class="form-control" placeholder="Lama Menempati Rumah Saat Ini">
                                        <?= form_error('lamarumahpemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            </br>
                            <h5>Data Sesuai KTP</h5>
                            <div class="form-group">
                                <label for="form-control">Alamat Sesuai KTP</label>
                                <input type="text" name="alamatktppemohon" class="form-control" placeholder="Alamat Tinggal Sesuai KTP">
                                <?= form_error('alamatktppemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form-control">RT</label>
                                        <input type="text" name="rtktppemohon" class="form-control" placeholder="RT KTP Pemohon">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-control">Kelurahan</label>
                                        <input type="text" name="keluarahanktppemohon" class="form-control" placeholder="Kelurahan KTP Saat Ini">
                                        <?= form_error('kelurahanktppemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form-control">RW</label>
                                        <input type="text" name="rwktppemohon" class="form-control" placeholder="RW KTP Pemohon">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-control">Kecamatan</label>
                                        <input type="text" name="kecamatanktppemohon" class="form-control" placeholder="Kecamatan KTP Saat Ini">
                                        <?= form_error('kecamatanktppemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3 for="form-control">Informasi Pekerjaan dan Keuangan</h3>
                            <div class="form-group">
                                <label for="form-control">Tipe Pendapatan</label>
                                <select class="form-control" name="pendapatpemohon">
                                    <option value="0">Pilih</option>
                                    <option value="1">Wiraswasta</option>
                                    <option value="2">Pegawai/Karyawan</option>
                                </select>
                                <?= form_error('pendapatpemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">Nama Perusahaan</label>
                                <input type="text" name="perusahaanpemohon" class="form-control" placeholder="Nama Perusahaan">
                                <?= form_error('perusahaanpemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">Bidang Usaha</label>
                                <select class="form-control" name="usahapemohon">
                                    <option value="0">Pilih</option>
                                    <option value="1">Perdagangan</option>
                                    <option value="2">Perindustrian</option>
                                    <option value="3">Jasa</option>
                                    <option value="4">Pertanian</option>
                                    <option value="5">Nelayan</option>
                                    <option value="6">Lainnya</option>
                                </select>
                                <?= form_error('usahapemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">Alamat Usaha</label>
                                <input type="text" name="alamatusahapemohon" class="form-control" placeholder="Alamat Usaha Pemohon">
                                <?= form_error('alamatusahapemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">Telepon/Fax</label>
                                <input type="text" name="teleponusahapemohon" class="form-control" placeholder="Telepon/Fax">
                                <?= form_error('teleponusahapemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">No. NPWP</label>
                                <input type="text" name="npwpusahapemohon" class="form-control" placeholder="Nomor NPWP Usaha">
                                <?= form_error('npwpusahapemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">Lama Usaha ini</label>
                                <input type="text" name="lamausahapemohon" class="form-control" placeholder="Lama Usaha Ini">
                                <?= form_error('lamausahapemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">Omzet Rata Rata per Bulan</label>
                                <input type="text" name="omzetusahapemohon" class="form-control" placeholder="Omzet Rata Rata per Bulan">
                                <?= form_error('omzetusahapemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">Keuntungan Rata Rata per Bulan</label>
                                <input type="text" name="untungusahapemohon" class="form-control" placeholder="Keuntungan Rata Rata per Bulan">
                                <?= form_error('untungusahapemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            </br>
                            <h5>Informasi Lainnya</h5>
                            </br>
                            <div class="form-group">
                                <label for="form-control">Saya ingin menggunakan fasilitas Cash Pick-UP</label>
                                <select class="form-control" name="fasilitascashpickup">
                                    <option value="0">Pilih</option>
                                    <option value="1">YA</option>
                                    <option value="2">Tidak</option>
                                </select>
                                <?= form_error('fasilitascashpickup', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">Frekuensi Cash Pick-Up</label>
                                <select class="form-control" name="cashpickuppemohon">
                                    <option value="0">Pilih</option>
                                    <option value="1">Harian</option>
                                    <option value="2">Mingguan</option>
                                    <option value="3">Dwi Mingguan</option>
                                    <option value="4">Bulanan</option>
                                </select>
                                <?= form_error('cashpickuppemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">Apakah Anda Memiliki Rekening Tabungan</label>
                                <select class="form-control" name="cekrekeningpemohon">
                                    <option value="0">Pilih</option>
                                    <option value="1">YA</option>
                                    <option value="2">Tidak</option>
                                </select>
                                <?= form_error('cekrekeningpemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form-control">Sejak Tahun</label>
                                        <input type="text" name="tahunrekeningpemohon" class="form-control" placeholder="Sejak Tahun Rekening Pemohon">
                                        <?= form_error('tahunrekeningpemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form-control">Saldo Rata Rata</label>
                                        <input type="text" name="saldopemohon" class="form-control" placeholder="Saldo Rata Rata">
                                        <?= form_error('saldopemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            </br>
                            <h5>Tujuan Peruntukan</h5>
                            <div class="form-group">
                                <label for="form-control">Tujuan Pengajuan Pinjaman</label>
                                <input type="text" name="tujuanpemohon" class="form-control" placeholder="Tujuan Pengajuan Pinjaman">
                                <?= form_error('tujuanpemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            </br>
                            <p>Dengan Menandatangani aplikasi ini, Saya menyatakan bahwa keterangan dalam aplikasi ini adalah lengkap dan benar.
                                Saya mengetahui bahwa saya tidak berkewajiban untuk memberi imbalan dalam bentuk apapun kepada pihak Bank atau pihak
                                ketiga jika permohonan ini disetujui</p>
                            <div class="row mb-1">
                                <div class="col-md-6">
                                    <br><br><br>
                                    <h6>(...........................)</h6>
                                    <p>Tanggal (<?= date('d/m/Y'); ?>)</p>
                                </div>
                                <div class="col-md-6">
                                    <br><br><br>
                                    <h6>(...........................)</h6>
                                    <p>Nama Pemohon</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Penutup ROW -->
                    <br><br>
                    <h5>DIISI OLEH BANK</h5>
                    <div class="row mb-1">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-control">Tanggal Diisi</label>
                                <input type="date" name="tglaplikasi" class="form-control" placeholder="Tanggal Diisi">
                                <?= form_error('tglaplikasi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">No. Aplikasi</label>
                                <input type="text" name="noaplikasi" class="form-control" placeholder="Nomor Aplikasi">
                                <?= form_error('noaplikasi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">KP/CB/KK</label>
                                <input type="text" name="kkaplikasi" class="form-control" placeholder="KP/CB/KK">
                                <?= form_error('kkaplikasi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="form-control">Nama/Kode AO</label>
                                <input type="text" name="namaaplikasi" class="form-control" placeholder="Nama atau Kode AO">
                                <?= form_error('namaaplikasi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-control">Bagaimana Perkenalan Terjadi</label>
                                <input type="text" name="perkenalanaplikasi" class="form-control" placeholder="Bagaimana Perkenalan Terjadi">
                                <?= form_error('perkenalanaplikasi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-8">
                                    <br>
                                    <h6>Dengan menandatangani formulir ini, Saya menyatakan bahwa Saya telah melakukan verifikasi dan konfirmasi
                                        terhadap kelayakan data Pemohon Saya merekomendasikan agar aplikasi ini</h6>
                                    <select class="form-control" name="verifikasiaplikasi">
                                        <option value="0">Pilih</option>
                                        <option value="1">Yes</option>
                                        <option value="2">NO</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <br><br><br><br><br><br>
                                    <p>Paraf AO</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit"><i class="bx bx-save"></i> Submit form</button>
                    </div>
                    <!-- </form> -->
                    <?//php form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->