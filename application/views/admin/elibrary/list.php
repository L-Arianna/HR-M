<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <hr />
            <?php foreach ($data->result() as $value) {
            ?>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills nav-pills-danger mb-3" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="pill" href="#danger-pills-home" role="tab" aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-book font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title"><?= $value->nama_kat_book; ?></div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="danger-pills-tabContent">
                                <div class="tab-pane fade show active" id="danger-pills-home" role="tabpanel">

                                    <?php foreach ($lib as $v) {
                                        if ($v->kategori_book == $value->id_kat_book) {
                                    ?>
                                            <?= $v->judul_book; ?>
                                            </br>
                                            <div class="row">
                                                <?php $exp = explode("/", $v->file_book);
                                                unset($exp[count($exp) - 1]);
                                                for ($i = 0; $i < count($exp); $i++) {
                                                ?>
                                                    <div class="col-md-3">
                                                        <p><a href="<?= base_url(); ?>Admin/E_Library/download/<?= $exp[$i]; ?>"><?= $v->judul_book; ?></a></p>
                                                    </div>
                                                <?php
                                                } ?>
                                            </div>
                                    <?php
                                        }
                                    } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
        </div>
        <div class="row">
            <div class="col">
                <!--Tampilkan pagination-->
                <?php echo $pagination; ?>
            </div>
        </div>
    </div>
</div>