<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<h6 class="mb-0 text-uppercase"><?= $title ?></h6>
		<?= $this->session->flashdata('suksess');
		?>
		<hr />
		<div class="row">
			<div class="col-lg-3">
				<div class="card">
					<div class="card-body">
						<div class="d-flex flex-column align-items-center text-center">
							<img src="<?= base_url() ?>assets/images/avatars/avatar-2.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
							<div class="mt-3">
								<h4></h4>
								<p class="text-muted font-size-sm"></p>
								<button class="btn btn-primary">Follow</button>
								<button class="btn btn-outline-primary">Message</button>
							</div>
						</div>
						<hr class="my-4" />
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="card">
					<div class="card-body">
						<ul class="nav nav-tabs nav-primary" role="tablist">
							<li class="nav-item" role="presentation">
								<a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class='bx bx-user font-18 me-1'></i>
										</div>
										<div class="tab-title">Personal account</div>
									</div>
								</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
										</div>
										<div class="tab-title">Profile</div>
									</div>
								</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab" aria-selected="false">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
										</div>
										<div class="tab-title">Contact</div>
									</div>
								</a>
							</li>
						</ul>
						<div class="tab-content py-3">
							<div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
								<form action="<?= base_url('profile') ?>" method="post">
									<div class="row mb-1">
										<div class="col-md-6">
											<label for="current_password">current password</label>
											<input type="password" class="form-control" id="current_password" name="current_password">
											<?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="col-md-6">
											<label for="new_password1">new password</label>
											<input type="password" class="form-control" id="new_password1" name="new_password1">
											<?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="col-md-6">
											<label for="new_password2">repeat password</label>
											<input type="password" class="form-control" id="new_password2" name="new_password2">
											<?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="col-12 mt-2">
											<button class="btn btn-primary btn-sm" name="submit" type="submit"><i class="bx bx-save"></i> Submit form</button>
										</div>
									</div>
								</form>
							</div>
							<div class="tab-pane fade" id="primaryprofile" role="tabpanel">
								<form action="<?= base_url('profile/edit/') ?>" method="post">
									<div class="row">
										<div class="col-md-4">
											<label for="form-control">NIP</label>
											<input type="text" name="nip" class="form-control" value="<?= $personal->nip ?>">
										</div>
									</div>
								</form>
							</div>
							<div class="tab-pane fade" id="primarycontact" role="tabpanel">
								<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end page wrapper -->