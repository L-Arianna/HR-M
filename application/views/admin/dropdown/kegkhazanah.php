<div class="page-wrapper">
    <div class="page-content">
        <div class="col">
            <!-- Button trigger modal -->
            <a type="button" class="btn btn-primary btn-sm" href="<?= base_url(); ?>Gudang/Produk/tambah_keg_khazanah">Tambah Kegiatan Khazanah</a>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Id Buku</th>
                                    <th>Nomor Buku</th>
                                    <th>Stok</th>
                                    <th>Tujuan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($kegiatan as $value) {
                                    $exp = explode(",", $value->tujuan_keg_khazanah);
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $value->jenis_keg_khazanah; ?></td>
                                        <td><?= $value->idbuku_keg_khazanah; ?></td>
                                        <td><?= $value->nobuku_keg_khazanah; ?></td>
                                        <td><?= $value->stok_keg_khazanah; ?></td>
                                        <td><?php foreach ($tujuan as $v) {
                                                if (array_search($v->id_tujuan_khazanah, $exp) !== false) {
                                                    echo "<span class='badge rounded-pill bg-warning text-dark'>" . "[" . $v->nama_tujuan_khazanah . "] " . "</span";
                                                }
                                            } ?></td>
                                        <td><a href="<?= base_url('Gudang/Produk/edit_keg_khazanah/' . $value->id_keg_khazanah) ?>" class="btn btn-warning btn-sm"><i class="bx bx-edit-alt"></i></a>
                                            <a href="<?= base_url('Gudang/Produk/delete_keg_khazanah/' . $value->id_keg_khazanah) ?>" onclick="return confirm('yakin mau dihapus?')" class="btn btn-danger btn-sm"><i class="bx bx-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>