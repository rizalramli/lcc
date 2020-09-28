<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php date_default_timezone_set("Asia/Jakarta"); ?>
	<title>Laporan-<?= date('d/m/Y') ?></title>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/notika/css/bootstrap.min.css">
</head>

<body>

	<div class=" container-fluid">
		<div class="row">

			<caption>Laporan Toko <?= $this->session->userdata('nama_toko') ?> Tanggal <?= Date('d F Y') ?></caption>
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
				$no_hari = 1;
				$total_hari=0;
				$harga_jual_hari=0;
				foreach($hari as $row_hari){ 
					$keuntungan_hari = $row_hari->harga_jual * $row_hari->jumlah_barang -
					$row_hari->hrg_distributor * $row_hari->jumlah_barang;
				?>
				<tr>
					<td style="text-align: center;"><?= $no_hari++; ?></td>
					<td style="text-align: left;"><?= $row_hari->nama_customer; ?></td>
					<td style="text-align: center;"><?= $row_hari->nama_barang; ?></td>
					<td style="text-align: center;">
						<?= date('d/m/Y H:i:s', strtotime($row_hari->tanggal_penjualan)); ?></td>
					<td style="text-align: right;"><?= rupiah($row_hari->hrg_distributor) ?></td>
					<td style="text-align: right;"><?= rupiah($row_hari->harga_jual) ?></td>
					<td style="text-align: center;"><?= $row_hari->jumlah_barang; ?></td>
					<td style="text-align: right;"><?= rupiah($keuntungan_hari) ?></td>
				</tr>
				<?php 
				$total_hari += $keuntungan_hari;
				$harga_jual_hari += $row_hari->harga_jual;
				} 
				?>
				<?php 
				if($total_hari == "")
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
						<td style="text-align:right;"><h5>'.rupiah($harga_jual_hari).'</h5></td>
						<td></td>
						<td style="text-align:right;"><h5>'.rupiah($total_hari).'</h5></td>
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
						<h5><?= rupiah($total_hari) ?></h5>
					</td>
				</tr>
				<tr>
					<td>
						<h5>Total Pengeluaran : </h5>
					</td>
					<td style="text-align:right">
						<h5><?= rupiah($pengeluaran_hari) ?></h5>
					</td>
				</tr>
				<tr>
					<td>
						<h5>Keuntungan Bersih : </h5>
					</td>
					<td style="text-align:right">
						<h5><?= rupiah($total_hari - $pengeluaran_hari) ?></h5>
					</td>
				</tr>
			</table>
		</div>
	</div>

</body>

</html>
