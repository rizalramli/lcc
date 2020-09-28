<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php date_default_timezone_set("Asia/Jakarta"); ?>
	<title>Laporan-<?= date('F-Y') ?></title>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/notika/css/bootstrap.min.css">
</head>

<body>

	<div class=" container-fluid">
		<div class="row">
			<caption>Laporan Toko <?= $this->session->userdata('nama_toko') ?> Bulan <?= Date('F Y') ?></caption>

			<table width="100%" class="table" border="1">
				<tr>
					<th width="3%" style="text-align: center;background:black;color:white;">No</th>
					<th width="16%" style="text-align: center;background:black;color:white;">Nama Customer</th>
					<th width="18%" style="text-align: center;background:black;color:white;">Nama Barang</th>
					<th width="16%" style="text-align: center;background:black;color:white;">Tanggal & Waktu</th>
					<th width="14%" style="text-align: center;background:black;color:white;">Harga Beli</th>
					<th width="14%" style="text-align: center;background:black;color:white;">Harga Jual</th>
					<th width="5%" style="text-align: center;background:black;color:white;">Qty</th>
					<th width="14%" style="text-align: center;background:black;color:white;">Keuntungan</th>
				</tr>
				<?php 
				$no_bulan = 1;
				$total_bulan=0;
				$harga_jual_bulan=0;
				foreach($bulanan as $row_bulan){ 
					$keuntungan_bulan = $row_bulan->harga_jual * $row_bulan->jumlah_barang -
					$row_bulan->hrg_distributor * $row_bulan->jumlah_barang;
				?>
				<tr>
					<td style="text-align: center;"><?= $no_bulan++; ?></td>
					<td style="text-align: left;"><?= $row_bulan->nama_customer; ?></td>
					<td style="text-align: center;"><?= $row_bulan->nama_barang; ?></td>
					<td style="text-align: center;">
						<?= date('d/m/Y H:i:s', strtotime($row_bulan->tanggal_penjualan)); ?></td>
					<td style="text-align: right;"><?= rupiah($row_bulan->hrg_distributor) ?></td>
					<td style="text-align: right;"><?= rupiah($row_bulan->harga_jual) ?></td>
					<td style="text-align: center;"><?= $row_bulan->jumlah_barang; ?></td>
					<td style="text-align: right;"><?= rupiah($keuntungan_bulan) ?></td>
				</tr>
				<?php 
				$total_bulan += $keuntungan_bulan;
				$harga_jual_bulan += $row_bulan->harga_jual;
				} 
				?>
				<?php 
				if($total_bulan == "")
				{
					echo '
				<tr>
					<td style="text-align:center;" colspan=5>
						<h5><b>TOTAL</b></h5>
					</td>
					<td style="text-align:right;"><h5>0</h5></td>
					<td></td>
					<td style="text-align:right;"><h5>0</h5></td>
				</tr>';
				} else {
					echo '
					<tr>
						<td style="text-align:center;" colspan=5>
							<h5>TOTAL</h5>
						</td>
						<td style="text-align:right;"><h5>'.rupiah($harga_jual_bulan).'</h5></td>
						<td></td>
						<td style="text-align:right;"><h5>'.rupiah($total_bulan).'</h5></td>
					</tr>';
				}
				?>
			</table>
			<table>
				<tr>
					<td>
						<h5>Total Keuntungan : </h5>
					</td>
					<td style="text-align:right">
						<h5><?= rupiah($total_bulan) ?></h5>
					</td>
				</tr>
				<tr>
					<td>
						<h5>Total Pengeluaran : </h5>
					</td>
					<td style="text-align:right">
						<h5><?= rupiah($pengeluaran_bulan) ?></h5>
					</td>
				</tr>
				<tr>
					<td>
						<h5>Keuntungan Bersih : </h5>
					</td>
					<td style="text-align:right">
						<h5><?= rupiah($total_bulan - $pengeluaran_bulan) ?></h5>
					</td>
				</tr>
			</table>
		</div>
	</div>

</body>

</html>
