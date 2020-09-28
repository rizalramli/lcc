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
									<h2>BARANG TRENDING</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="data-table-area">
	<div class="container">
		<div class="row" style="margin-bottom:27px;">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="widget-tabs-int">
					<div class="widget-tabs-list">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#home">Minggu Ini</a></li>
							<li><a data-toggle="tab" href="#menu1">Bulan Ini</a></li>
							<li><a data-toggle="tab" href="#menu2">Tahun Ini</a></li>
						</ul>
						<div class="tab-content tab-custom-st">
							<div id="home" class="tab-pane fade in active">
								<div class="tab-ctn">
									<div class="data-table-list">
										<div class="table-responsive">
											<table width="100%" class="table table-striped">
												<thead>
													<tr>
														<th width="5%">No</th>
														<th width="17%">Nama Barang</th>
														<th width="25%">Jumlah Terjual</th>
													</tr>
												</thead>
												<tbody>
													<?php 
                                                    $no_minggu = 1;
                                                    foreach($record_minggu as $row_minggu){
                                                    ?>
													<tr>
														<td><?= $no_minggu++; ?></td>
														<td><?= $row_minggu->nama; ?></td>
														<td><?= $row_minggu->jumlah_terjual; ?></td>
													</tr>
													<?php   
                                                    }
                                                    ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div id="menu1" class="tab-pane fade">
								<div class="tab-ctn">
									<div class="data-table-list">
										<div class="table-responsive">
											<table width="100%" class="table table-striped">
												<thead>
													<tr>
														<th width="5%">No</th>
														<th width="17%">Nama Barang</th>
														<th width="25%">Jumlah Terjual</th>
													</tr>
												</thead>
												<tbody>
													<?php 
                                                    $no_bulan = 1;
                                                    foreach($record_bulan as $row_bulan){
                                                    ?>
													<tr>
														<td><?= $no_bulan++; ?></td>
														<td><?= $row_bulan->nama; ?></td>
														<td><?= $row_bulan->jumlah_terjual; ?></td>
													</tr>
													<?php   
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
											<table width="100%" class="table table-striped">
												<thead>
													<tr>
														<th width="5%">No</th>
														<th width="17%">Nama Barang</th>
														<th width="25%">Jumlah Terjual</th>
													</tr>
												</thead>
												<tbody>
													<?php 
                                                    $no_tahun = 1;
                                                    foreach($record_tahun as $row_tahun){
                                                    ?>
													<tr>
														<td><?= $no_tahun++; ?></td>
														<td><?= $row_tahun->nama; ?></td>
														<td><?= $row_tahun->jumlah_terjual; ?></td>
													</tr>
													<?php   
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
<!-- Breadcomb area End-->
<!-- Data Table area Start-->
