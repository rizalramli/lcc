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
									<h2>TAMBAH USER MANAGER</h2>
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
						<form action="<?php echo base_url("pimpinan/user/insert_data") ?>" method="post">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group ">
									<label>Nama</label>
									<input type="text" class="form-control karakter" placeholder="Masukan Nama" name="nama_user" required>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group">
									<label>Username</label>
									<input type="text" class="form-control" placeholder="Masukan Username" name="username" required>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" placeholder="Masukan password" name="password" required>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group">
									<label>Toko</label>
									<select name="id_toko" class="form-control" required>
										<option value="">pilih</option>
										<?php
										foreach ($toko as $data) {
											?>
											<option value="<?php echo $data->id_toko ?>"><?php echo $data->nama_toko ?>
											</option>
										<?php } ?>
									</select>
								</div>
							</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="form-group ic-cmp-int">
								<div class="nk-int-st">
									<button type="submit" class="btn btn-primary">Simpan</button>
									<a href="<?php echo base_url('user_manager'); ?>" class="btn btn-link">Kembali</a>
								</div>
							</div>
						</div>
					</div><br>

				</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Form Element area End-->