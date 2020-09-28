<!-- Breadcomb area Start-->
<?php
foreach ($distributor as $data) {
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
										<h2>EDIT DATA DISTRIBUTOR</h2>
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
							<form action="<?php echo base_url("pimpinan/distributor/update") ?>" method="post">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
										<div class="nk-int-st">
											<label>Nama</label>
											<input type="hidden" name="id_distributor" value="<?php echo $data->id_distributor ?>">
											<input type="text" class="form-control karakter" value="<?php echo $data->nama ?>" name="nama" required>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
										<div class="nk-int-st">
											<label>Alamat</label>
											<input type="text" class="form-control" value="<?php echo $data->alamat ?>" name="alamat" required>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
										<div class="nk-int-st">
											<label>No Hp</label>
											<input type="text" class="form-control hp" value="<?php echo noHp($data->no_hp) ?>" name="no_hp" required>
										</div>
									</div>
								</div>
						</div>
						<button type="submit" class="btn btn-warning">Update</button>
						<a href="<?php echo base_url('distributor'); ?>" class="btn btn-link">Kembali</a>

					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<!-- Form Element area End-->