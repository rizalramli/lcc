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
									<h2>DETAIL PEMASOKAN</h2>
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

<?php
foreach ($pemasokan_list as $row) {
	$nama_distributor = $row->nama;
	$nama_manager = $row->nama_user;
	$a = $row->tanggal;
	$tanggal = date('d/m/Y H:i:s', strtotime($a));
	$id_pemasokan =  $row->id_pemasokan;
	$total = $row->total;
} ?>

<!-- Form Element area Start-->
<div class="data-table-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="data-table-list">

					<div style="margin-bottom: 20px;">
						<a onclick="window.history.back();" class="btn btn-primary btn-lg">Kembali</a>
					</div>
					<table class="table table-borderless" width="100">
						<tr>
							<th width="11%">Distributor</th>
							<th width="1%">:</th>
							<th><?= $nama_distributor; ?></th>
							<th width="11%">Manager</th>
							<th width="1%">:</th>
							<th><?= $nama_manager; ?></th>
						</tr>
						<tr>
							<th>Tanggal</th>
							<th>:</th>
							<th><?= $tanggal; ?></th>
							<th>Kode</th>
							<th>:</th>
							<th><?= $id_pemasokan; ?></th>
						</tr>
					</table>
					<table class="table table-sm table-borderless" width="100%">
						<thead>
							<tr>
								<th width="7%" scope="col">NO</th>
								<th width="25%" scope="col">NAMA BARANG</th>
								<th width="15%">KODE UNIK</th>
								<th width="8%" scope="col">QTY</th>
								<th width="15%" scope="col">HARGA BARANG</th>
								<th width="15%" style="text-align:center" scope="col">TOTAL HARGA</th>
							</tr>

						</thead>
						<tbody>
							<?php
							$no = 1;
							$total_harga_barang = 0;
							foreach ($pemasokan_list_detail as $row) {
								$total_harga_barang += $row->total_hrg;
							?>
								<tr>
									<td width="7%" scope="row"><?= $no; ?></td>
									<td width="25%"><?= $row->nama; ?></td>
									<td width="15%"><?= $row->kode_unik; ?></td>
									<td width="8%"><?= ($row->total_hrg / $row->hrg_distributor); ?></td>
									<td width="15%" style="text-align:right"><?= rupiah($row->hrg_distributor) ?></td>
									<th width="15%" style="text-align:right"><?= rupiah($row->total_hrg) ?></th>
								</tr>
							<?php $no = $no + 1;
							} ?>
						</tbody>
					</table>
					<table class="table table-sm table-borderless">
						<tr>
							<th width="7%"></th>
							<th width="59%"></th>
							<th style="text-align:right" width="22%">Ongkos Kirim</th>
							<th style="text-align:right"><?= rupiah($total - $total_harga_barang) ?></th>
						</tr>
						<tr>
							<th width="7%"></th>
							<th width="59%"></th>
							<th style="text-align:right" width="22%">Grand Total</th>
							<th style="text-align:right"><?= rupiah($total) ?></th>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Form Element area End-->

<script src="<?= base_url(); ?>assets/vendor/auto_complete/jquery-3.4.1.min.js"></script>