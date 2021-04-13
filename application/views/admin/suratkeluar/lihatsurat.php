<div class="page-wrapper">
    <div class="page-content">
        <?php $lokasi = base_url('assets/upload-pdf'); ?>
        <div class="embed-responsive embed-responsive-16by9 col-md-12 col-lg-12 col-xs-12">
            <iframe class="embed-responsive-item" width="1200" height="800" src="<?= $lokasi . "/" . $surat_keluar->file_surat_keluar; ?>.pdf" allowfullscreen></iframe>
        </div>
    </div>
</div>