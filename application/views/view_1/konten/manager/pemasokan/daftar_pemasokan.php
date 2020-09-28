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
									<h2>DAFTAR PEMASOKAN</h2>
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
<div class="data-table-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="data-table-list">
					<div class="basic-tb-hd">

					</div>
					<div class="table-responsive">
						<table id="data-table-basic" class="table table-striped">
							<thead>
								<tr>
									<th>Kode</th>
									<th>Distributor</th>
									<th style="text-align:center">Tanggal</th>
									<th style="text-align:center">Waktu</th>
									<th style="text-align:center">Total</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($pemasokan_list as $row) {
									?>
								<tr>
									<td><?= $row->id_pemasokan; ?></td>
									<td><?= $row->nama; ?></td>
									<td style="text-align:center"><?= date('d F Y', strtotime($row->tanggal)) ?></td>
									<td style="text-align:center"><?= date('H:i:s', strtotime($row->tanggal)) ?></td>
									<td style="text-align:right"><?= rupiah($row->total) ?></td>
									<td>
										<div class="table-actions">
											<a class="btn btn-primary fa fa-search"
												href="<?php echo base_url("pemasokan/detail_pemasokan?id_pemasokan=" . $row->id_pemasokan) ?>"></a>
										</div>
									</td>
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
