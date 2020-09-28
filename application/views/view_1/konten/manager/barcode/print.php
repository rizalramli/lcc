<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Barcode-<?= $row->nama_barang ?></title>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/notika/css/bootstrap.min.css">
</head>

<body>
	<?php
	echo '<span style="font-size:20px;font-weight:bold;">' . $row->nama_barang . '<span>';
	?>
	<div class=" container-fluid">
		<div class="row">
			<table width="100%" border="1">

				<?php
				for ($i = 1; $i < 8; $i++) {
					?>
					<tr>
						<th width="20%" height="50px" style="text-align:center;vertical-align: bottom;border-bottom: none !important;">
							<?php $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
								echo '<img style="width:120px;height:40px"
							src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->kode_unik, $generator::TYPE_CODE_128)) . '"><br>';
								?>
						</th>
						<th width="20%" height="50px" style="text-align:center;vertical-align: bottom;border-bottom: none !important;">
							<?php $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
								echo '<img style="width:120px;height:40px"
							src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->kode_unik, $generator::TYPE_CODE_128)) . '"><br>';
								?>
						</th>
						<th width="20%" height="50px" style="text-align:center;vertical-align: bottom;border-bottom: none !important;">
							<?php $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
								echo '<img style="width:120px;height:40px"
							src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->kode_unik, $generator::TYPE_CODE_128)) . '"><br>';
								?>
						</th>
						<th width="20%" height="50px" style="text-align:center;vertical-align: bottom;border-bottom: none !important;">
							<?php $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
								echo '<img style="width:120px;height:40px"
							src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->kode_unik, $generator::TYPE_CODE_128)) . '"><br>';
								?>
						</th>
						<th width="20%" height="50px" style="text-align:center;vertical-align: bottom;border-bottom: none !important;">
							<?php $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
								echo '<img style="width:120px;height:40px"
							src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->kode_unik, $generator::TYPE_CODE_128)) . '"><br>';
								?>
						</th>
					</tr>
					<tr>
						<th width="20%" height="30px" style="font-size:12px;text-align:center;vertical-align: top;border-top: none !important;">
							<?= $row->kode_unik ?>
						</th>
						<th width="20%" height="30px" style="font-size:12px;text-align:center;vertical-align: top;border-top: none !important;">
							<?= $row->kode_unik ?>
						</th>
						<th width="20%" height="30px" style="font-size:12px;text-align:center;vertical-align: top;border-top: none !important;">
							<?= $row->kode_unik ?>
						</th>
						<th width="20%" height="30px" style="font-size:12px;text-align:center;vertical-align: top;border-top: none !important;">
							<?= $row->kode_unik ?>
						</th>
						<th width="20%" height="30px" style="font-size:12px;text-align:center;vertical-align: top;border-top: none !important;">
							<?= $row->kode_unik ?>
						</th>
					</tr>
				<?php
				}
				?>
			</table>
		</div>
	</div>

</body>

</html>