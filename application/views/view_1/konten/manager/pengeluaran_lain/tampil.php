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
									<h2>DAFTAR PENGELUARAN</h2>
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
<!-- Data Table area Start-->
<div class="data-table-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="widget-tabs-int">
					<div class="widget-tabs-list">
						<div class="basic-tb-hd">
							<a class="btn btn-primary" href="<?php echo base_url("pengeluaran_lain/add") ?>">Tambah
								Data</a>
						</div>
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#home">Hari Ini</a></li>
							<li><a data-toggle="tab" href="#menu2">Bulan Ini</a></li>
						</ul>
						<div class="tab-content tab-custom-st">
							<div id="home" class="tab-pane fade in active">
								<div class="tab-ctn">
									<div class="data-table-list">
										<div class="table-responsive">
											<table width="100%" id="dt_custom1" class="table table-striped">
												<thead>
													<tr>
														<th style="text-align:center;" width="5%">No</th>
														<th width="30%">Deskripsi Pengeluaran</th>
														<th style="text-align:center;" width="15%">Tanggal</th>
														<th style="text-align:center;" width="15%">Waktu</th>
														<th style="text-align:center;" width="20%">Jumlah Pengeluaran
														</th>
														<th style="text-align:center;" width="15%">Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php 
													$no = 1;
													$total_pengeluaran_hari = 0;
													foreach($hari as $row_hari){
													$total_pengeluaran_hari += $row_hari->total;
													?>
													<tr>
														<td style="text-align:center;"><?= $no++; ?></td>
														<td><?= $row_hari->deskripsi; ?></td>
														<td style="text-align:center;">
															<?= date('d F Y', strtotime($row_hari->tanggal)) ?>
														</td>
														<td style="text-align:center;">
															<?= date('H:i:s', strtotime($row_hari->tanggal)) ?>
														</td>
														<td style="text-align:right;"><?= rupiah($row_hari->total) ?>
														</td>
														<td style="text-align:center;">
															<a onclick="return confirm('Yakin ingin menghapus data ?')"
																class="btn btn-danger"
																href="<?= base_url() ?>pengeluaran_lain/delete/<?= $row_hari->id_pengeluaran_l ?>"><i
																	class="glyphicon glyphicon-trash"></i></a>
														</td>
													</tr>
													<?php   
													}
													?>
													<?php 
                                                    if($total_pengeluaran_hari == "")
                                                    {
                                                        echo '<h4 style="float:right">Total Pengeluaran : 0</h4>';
                                                    }
                                                    else {
                                                        echo '<h4 style="float: right;">Total Pengeluaran : '.rupiah($total_pengeluaran_hari).'</h4>';
                                                    }
                                                    ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div id="menu2" class="tab-pane fade">
								<div class="tab-ctn">
									<div class="data-table-list">
										<div class="table-responsive">
											<table width="100%" id="dt_custom2" class="table table-striped">
												<thead>
													<tr>
														<th style="text-align:center;" width="5%">No</th>
														<th width="30%">Deskripsi Pengeluaran</th>
														<th style="text-align:center;" width="15%">Tanggal</th>
														<th style="text-align:center;" width="15%">Waktu</th>
														<th style="text-align:center;" width="20%">Jumlah Pengeluaran
														</th>
														<th style="text-align:center;" width="15%">Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php 
													$no = 1;
													$total_pengeluaran_bulan=0;
													foreach($bulan as $row_bulan){
													$total_pengeluaran_bulan +=  $row_bulan->total;
													?>
													<tr>
														<td style="text-align:center;"><?= $no++; ?></td>
														<td><?= $row_bulan->deskripsi; ?></td>
														<td style="text-align:center;">
															<?= date('d F Y', strtotime($row_bulan->tanggal)) ?>
														</td>
														<td style="text-align:center;">
															<?= date('H:i:s', strtotime($row_bulan->tanggal)) ?>
														</td>
														<td style="text-align:right;"><?= rupiah($row_bulan->total) ?>
														</td>
														<td style="text-align:center;">
															<a onclick="return confirm('Yakin ingin menghapus data ?')"
																class="btn btn-danger"
																href="<?= base_url() ?>pengeluaran_lain/delete/<?= $row_bulan->id_pengeluaran_l ?>"><i
																	class="glyphicon glyphicon-trash"></i></a>
														</td>
													</tr>
													<?php   
													}
													?>
													<?php 
                                                    if($total_pengeluaran_bulan == "")
                                                    {
                                                        echo '<h4 style="float:right">Total Pengeluaran : 0</h4>';
                                                    }
                                                    else {
                                                        echo '<h4 style="float: right;">Total Pengeluaran : '.rupiah($total_pengeluaran_bulan).'</h4>';
                                                    }
                                                    ?>
												</tbody>
											</table>
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
