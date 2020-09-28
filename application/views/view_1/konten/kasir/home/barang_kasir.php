<div class="row">
	<?php
	if (!empty($daftar_barang)) {
		foreach ($daftar_barang as $row) {
			$price = 2000;
			$quantity = 1;
			?>
	<div style="margin-bottom:5px;" class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
		<div class="thumbnail">
			<div class="caption">
				<p class="text-center"><b><?= $row->kode_unik ?></b></p>
				<p style="font-size:14px;text-align:center"><?= $row->nama_barang ?></p>
				<p style="font-size:14px;text-align:center">Stok : <?= $row->qty ?></p>
				<p style="font-size:14px;font-weight:bold;text-align:center"><?= rupiah($row->hrg_distributor) ?></p>
				<p class="text-center">
					<button type="button" class="btn btn-custom add_cart" data-productname="<?= $row->nama_barang ?>"
						data-quantity="<?= $quantity ?>" data-price="<?= $price ?>"
						data-productid="<?= $row->id_stok_b ?>">
						Add to Cart
					</button>
				</p>
			</div>
		</div>
	</div>
	<?php }
	} else { // Jika data tidak ada
		echo '<h3 style="margin-top:10px;" class="text-center">Barang tidak temukan</h3>';
	}
	?>
</div>
