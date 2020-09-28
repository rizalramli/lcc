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
									<h2>DATA USER MANAGER</h2>
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
<div class="data-table-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="data-table-list">
					<div class="basic-tb-hd">
						<a class="btn btn-primary" href="<?php echo base_url("user_manager/add") ?>">Tambah</a>
					</div>
					<div class="table-responsive">
						<table width="100%" id="data-table-basic" class="table table-striped">
							<thead>
								<tr>
									<th width="5%">No</th>
									<th width="15%">Nama User</th>
									<th width="15%">Username</th>
									<th width="15%">Jenis Akses</th>
									<th width="15%">Toko</th>
									<th width="15%" class="text-center">Ganti Password</th>
									<th width="20%" class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($user as $data) {
									?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $data->nama_user ?></td>
										<td><?php echo $data->username ?></td>
										<td><?php echo $data->jenis_akses ?></td>
										<td><?php echo $data->nama_toko ?></td>
										<td class="text-center">
										<a class="btn btn-info" href="<?php echo base_url("user_manager/ganti_password/" . $data->id_user) ?>">Ganti Password</a>
										</td>
										<td class="text-center">
											<div class="table-actions">
												<a class="btn btn-primary" href="<?php echo base_url("user_manager/edit/" . $data->id_user) ?>">Edit</a>
												<a class="btn btn-danger" onclick="return confirm('anda yakin ingin menghapus data ?')" href="<?php echo base_url("user_manager/hapus/" . $data->id_user) ?>">Hapus</a>
											</div>
										</td>
									</tr>
								<?php  } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>