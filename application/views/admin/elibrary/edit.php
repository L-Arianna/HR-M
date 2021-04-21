<div class="page-wrapper">
    <div class="page-content">
        <h3 class="mb-0 text-uppercase"><?= $title ?></h3>
        <?= $this->session->flashdata('sukses'); ?>
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url(); ?>Admin/E_Library/update" id="formbook" name="formdata" class="form-horizontal" enctype="multipart/form-data" method="POST">
                    <div class="col-md-12">
                        <input type="hidden" value="<?= $elib->id_book; ?>" name="idelib" />
                        <div class="form-group">
                            <label class="control-label col-md-6">Judul</label>
                            <div class="col-md-12">
                                <input name="judulbook" placeholder="Judul E-Library" class="form-control" type="text" value="<?= $elib->judul_book; ?>"> </input>
                                <?= form_error('judulbook', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Keterangan</label>
                            <div class="col-md-12">
                                <textarea name="keteranganbook" placeholder="Keterangan E-Library" class="form-control" type="text"><?= $elib->keterangan_book; ?></textarea>
                                <?= form_error('keteranganbook', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Kategori</label>
                            <div class="col-md-12">
                                <select class="form-control" name="kategori">
                                    <option value="">Pilih</option>
                                    <?php foreach ($katelib as $v) {
                                        if ($v->id_kat_book == $elib->kategori_book) {
                                            $select = 'selected';
                                        } else {
                                            $select = '';
                                        }
                                        echo "<option value=$v->id_kat_book $select> $v->nama_kat_book </option>";
                                    ?>

                                    <?php
                                    } ?>
                                </select>
                                <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Nama File E-Library</label>
                            <div class="col-md-12">
                                <div class="multis">
                                </div>
                                <div class="multi hidden">
                                    <div class="control-group">
                                        <!--Multi -->
                                        <input name="filebook[]" placeholder="Filenya nih" class="form-control" type="file" accept="application/pdf"></input>
                                        <button type="button" id="" class="btn btn-danger remove-multi"><i class="lni lni-circle-minus"></i>Kurangi File Upload</button>
                                    </div>
                                </div>
                                </br>
                                <button type="button" id="" onclick="tambahmulti();" class="btn btn-success tambah-multi"><i class="lni lni-circle-plus"></i>Tambah File Upload</button>
                                <br><br>
                            </div>
                        </div>
                        <?php
                        $exp = explode('/', $elib->file_book);
                        unset($exp[count($exp) - 1]);
                        for ($i = 0; $i < count($exp); $i++) {
                        ?>
                            <div class="multi hidden">
                                <div class="control-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" id="filelama[]" name="filelama[]" placeholder="Filenya nih" class="form-control" value="<?= $exp[$i] ?>" readonly></input>
                                            <a type="button" href="<?= base_url('Admin/E_library/hapus/' . $elib->id_book . '/' . $exp[$i]) ?>" onclick="return confirm('yakin mau dihapus?')" onclick="hapusmulti();" class="btn btn-danger remove-multi"><i class="lni lni-circle-minus"></i></a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="<?= base_url() ?>assets/upload-pdf/<?= $exp[$i]; ?>" target="_blank">Cek File</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } ?>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>