<div class="page-wrapper">
    <div class="page-content">
        <?= $this->session->flashdata('sukses'); ?>
        <div class="col">
            <!-- Button trigger modal 
            <button type="button" class="btn btn-primary btn-sm mb-1" data-bs-toggle="modal" onclick="jam_khazanah_add_ajax()" data-bs-target="#jam_khazanah_modal_form">Tambah Jam Khazanah</button>
            -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablejamkhazanah" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>No</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="jam_khazanah_modal_form" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formjamkhazanah" name="formdata" class="form-horizontal" enctype="multipart/form-data" method="POST">
                            <div class="col-md-12">
                                <input type="hidden" value="" name="id" />
                                <div class="form-group">
                                    <label class="control-label col-md-6">Start Waktu</label>
                                    <div class="col-md-12">
                                        <input name="start" placeholder="Start Waktu" class="form-control" type="time">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-6">End Waktu </label>
                                    <div class="col-md-12">
                                        <input name="end" placeholder="End Waktu" class="form-control" type="time">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-6">Status </label>
                                    <div class="col-md-12">
                                        <select name="status" class="form-control">
                                            <option value="">Pilih</option>
                                            <option value="0">Belum Acc</option>
                                            <option value="1">Sudah Acc</option>
                                            <option value="2">Selesai</option>
                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="btnSavejamkhazanah" onclick="jam_khazanah_save();" class="btn btn-primary btn-sm">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>