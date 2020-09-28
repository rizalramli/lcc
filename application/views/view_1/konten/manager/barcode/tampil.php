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
									<h2>DAFTAR BARANG BARCODE</h2>
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
				<div class="data-table-list">
					<div class="table-responsive">
						<table width="100%" id="data-table-basic" class="table table-striped">
							<thead>
								<tr>
									<th width="5%">No</th>
									<th width="22%">Nama Barang</th>
									<th width="17%">Nama Distributor</th>
									<th style="text-align:center" width="13%">Tanggal</th>
									<th style="text-align:center" width="12%">Harga Beli</th>
									<th width="10%">Barcode</th>
									<th width="5%">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                                $no = 1;
                                foreach($record as $row){
                                ?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $row->nama_barang; ?></td>
									<td><?= $row->nama_distributor; ?></td>
									<td style="text-align:center;">
										<?= date('d F Y', strtotime($row->tanggal)); ?>
									</td>
									<td style="text-align:right;">
										<?= rupiah($row->hrg_distributor); ?>
									</td>
									<td><?= $row->kode_unik; ?></td>
									<td>
										<a class="btn btn-custom" target="_blank"
											href="<?= base_url(); ?>barang_barcode/<?= $row->kode_unik ?>">Print</a>
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
