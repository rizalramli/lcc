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
									<h2>GANTI PASSWORD USER KASIR</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
foreach ($user as $data) {
	?>
	<div class="form-element-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-element-list">
						<div class="row">
							<form action="<?php echo base_url("manager/user/update_password") ?>" method="post">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group ic-cmp-int">
										<div class="form-ic-cmp">
										</div>
										<div class="nk-int-st">
											<input type="hidden" name="password_sekarang" value="<?php echo $data->password ?>">
											<input type="hidden" name="id_user" value="<?php echo $data->id_user ?>">
											<label>password lama</label>
											<input type="password" name="password_lama" class="form-control" placeholder="masukkan password lama" required>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group ic-cmp-int">
										<div class="form-ic-cmp">
										</div>
										<div class="nk-int-st">
											<label>password baru</label>
											<input type="password" name="password_baru" placeholder="masukkan password baru" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group ic-cmp-int">
										<div class="form-ic-cmp">
										</div>
										<div class="nk-int-st">
											<label>confirm password</label>
											<input type="password" name="confirm_password" placeholder="confirm password" class="form-control" required>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group ic-cmp-int">
										<div class="form-ic-cmp">
										</div>
										<div class="nk-int-st">
											<button type="submit" class="btn btn-primary">simpan</button>
											<a href="<?php echo base_url('user_kasir'); ?>" class="btn btn-danger">Kembali</a>
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
<?php } ?>