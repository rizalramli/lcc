<?php
foreach ($edit as $data) {
	?>
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
									<h2>EDIT USER KASIR</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcomb area End-->

<!-- Form Element area Start-->
<div class="form-element-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-element-list">
					<div class="row">
						<form action="<?php echo base_url("manager/user/update") ?>" method="post">
							<input type="hidden" name="id_user" value="<?php echo $data->id_user ?>">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Nama</label>
									<input type="text" class="form-control karakter"
										value="<?php echo $data->nama_user ?>" name="nama_user" required>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Username</label>
									<input type="text" class="form-control" value="<?php echo $data->username ?>"
										name="username" required>
								</div>
							</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="form-group ic-cmp-int">
								<div class="nk-int-st">
									<button type="submit" class="btn btn-warning">Update</button>
									<a href="<?php echo base_url('user_kasir'); ?>" class="btn btn-link">Kembali</a>
								</div>
							</div>
						</div><br>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<!-- Form Element area End
