<!-- Breadcomb area Start-->
<div class="breadcomb-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="breadcomb-list">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="breadcomb-wp">
								<div class="breadcomb-icon">
									<i class="notika-icon notika-form"></i>
								</div>
								<div style="margin-top:15px" class="breadcomb-ctn">
									<h2>EDIT ACCOUNT</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="form-element-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-element-list">
					<div class="row">
						<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
							<div class="row">
								<form action="<?php echo base_url("pimpinan/edit_account/ubah_biodata") ?>" method="post">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="form-group">
											<div class="nk-int-st">
												<label>Nama</label>
												<input type="hidden" name="id" value="<?= $id ?>">
												<input type="text" class="form-control karakter" name="nama" value="<?= $nama ?>" required>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="form-group">
											<div class="nk-int-st">
												<label>Username</label>
												<input type="text" class="form-control" name="username" value="<?= $username ?>" required>
											</div>
										</div>
									</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<button type="submit" class="btn btn-warning">Update</button>
									<a onclick=self.history.back() class="btn btn-link">Kembali</a>
								</div>
							</div>
						</div>
						</form>

						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<div class="form-ic-cmp">
										</div>
										<div class="nk-int-st">
											<label>Ganti Password</label>
											<button type="button" class="btn btn-custom" data-toggle="modal" data-target="#myModalone">Ganti Password</button>
											<div class="modal fade" id="myModalone" role="dialog">
												<div class="modal-dialog modals-default">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
														</div>
														<form method="POST" action="<?php echo base_url("pimpinan/edit_account/ubah_password") ?>">
															<div class="modal-body">
																<div class="form-group">
																	<div class="nk-int-st">
																		<label>Password Lama</label>
																		<input type="password" class="form-control" name="confirm_lama" placeholder="Masukan password lama" required>
																	</div>
																</div>
																<div class="form-group">
																	<div class="nk-int-st">
																		<label>Password Baru</label>
																		<input type="password" class="form-control" placeholder="Masukan password baru" name="password_baru" required> 
																	</div>
																</div>
																<div class="form-group">
																	<div class="nk-int-st">
																		<label>Konfirmasi Password Baru</label>
																		<input type="password" class="form-control" name="confirm_password" placeholder="Konfirmasi password baru" required>
																	</div>
																</div>
																<div class="form-group">
																	<div class="nk-int-st">
																		<button type="submit" class="btn btn-primmary">Simpan</button>
																	</div>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>