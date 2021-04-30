<div class="page-wrapper">
    <div class="page-content">
        <?= $this->session->flashdata('sukses'); ?>
        <div class="col">
            <button type="button" class="btn btn-primary btn-sm mb-1" data-bs-toggle="modal" onclick="sub_menu_add_ajax()" data-bs-target="#sub_menu_modal_form">Tambah</button>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablesubmenu" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Menu ID</th>
                                    <th>Title</th>
                                    <th>Icon</th>
                                    <th>URL</th>
                                    <th>is_active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>No</th>
                                    <th>Menu ID</th>
                                    <th>Title</th>
                                    <th>Icon</th>
                                    <th>URL</th>
                                    <th>is_active</th>
                                    <th>Action</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="sub_menu_modal_form" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formsubmenu" name="formdata" class="form-horizontal" enctype="multipart/form-data" method="POST">
                            <div class="col-md-12">
                                <input type="hidden" value="" name="idmenu" />
                                <div class="form-group">
                                    <label class="control-label">Menu</label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="menuid">
                                            <option>Pilih</option>
                                            <?php foreach ($menu as $value) {
                                                echo "<option value= $value->id_menu > $value->nama_menu </option>";
                                            } ?>
                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Title</label>
                                    <div class="col-md-12">
                                        <input name="title" placeholder="Title" class="form-control" type="text">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">URL</label>
                                    <div class="col-md-12">
                                        <input name="url" placeholder="URL" class="form-control" type="text">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Icon</label>
                                    <div class="col-md-12">
                                        <input name="icon" placeholder="Icon" class="form-control" type="text">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">is_active</label>
                                    <div class="col-md-12">
                                        <input name="is_active" placeholder="" class="form-control" type="text">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="btnSavesubmenu" onclick="sub_menu_save();" class="btn btn-primary btn-sm">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>