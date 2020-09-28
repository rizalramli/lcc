<div class="contact-info-area mg-t-30">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
				<div style="margin-bottom:20px;overflow-y: scroll; height:585px; width: auto;" class="contact-inner">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div style="margin-bottom:20px;">
								<input autofocus id="keyword" type="text" class="form-control" placeholder="Cari Barang...">
							</div>
						</div>
					</div>
					<div id="view">
						<?php
						$this->load->view('view_1/konten/kasir/home/barang_kasir', array('daftar_barang' => $daftar_barang));
						?>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
				<form action="<?php echo base_url(); ?>kasir/home/store" method="POST" id="transaksi_form">
					<div class="contact-inner">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<h4 class="text-center">Customer</h4>
								<div style="padding-left:20px;padding-right:20px;" class="row">
									<div class="form-horizontal">
										<div class="form-group">
											<label class="col-sm-2 control-label">Nama</label>
											<div class="col-sm-10">
												<input type="text" name="nama_customer" class="form-control karakter" placeholder="Masukan nama customer" required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">No.HP</label>
											<div class="col-sm-10">
												<input type="text" name="no_hp_customer" class="form-control hp" placeholder="Masukan nomor hp customer" required>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="margin-top:20px;" class="contact-inner">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<h4 class="text-center">Keranjang Belanja</h4>
								<div class="table-responsive">
									<div id="cart_details"></div>
								</div>
							</div>
						</div>
					</div>
					<div style="margin-top:20px;" class="contact-inner">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<h4 class="text-center">Pembayaran</h4>
								<div style="padding-left:20px;padding-right:20px;" class="row">
									<div class="form-horizontal">
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label">Total</label>
											<div class="col-sm-10">
												<input type="text" name="total" readonly class="form-control text-right total_harga" id="total_harga" placeholder="Jumlah Total">
											</div>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label">Bayar</label>
											<div class="col-sm-10">
												<input type="text" name="bayar" class="form-control text-right bayar rupiah_2" id="bayar" placeholder="Masukan Jumlah Bayar" onkeyup="update_kembalian()" required>

											</div>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label">Kembali</label>
											<div class="col-sm-10">
												<input type="text" name="kembalian" readonly class="form-control text-right" id="kembalian" placeholder="Jumlah Kembalian" required>
											</div>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label"></label>
											<div class="col-sm-10">
												<button type="submit" class="btn btn-custom">Simpan</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url() ?>assets/vendor/auto_complete/jquery-3.4.1.min.js"></script>
<script>
	$(document).ready(function() {

		// untuk button menambah cart
		$('.add_cart').click(function() {
			var product_id = $(this).data("productid");
			var product_name = $(this).data("productname");
			var product_price = $(this).data("price");
			var quantity = $(this).data("quantity");
			$.ajax({
				url: "<?php echo base_url(); ?>kasir/home/add_cart",
				method: "POST",
				data: {
					product_id: product_id,
					product_name: product_name,
					product_price: product_price,
					quantity: quantity
				},
				success: function(data) {
					$('#cart_details').html(data);
					$("#keyword").val('');
					$("#keyword").focus();
				}
			});
		});

		// mengeload detail kerangjang / cart
		$('#cart_details').load("<?php echo base_url(); ?>kasir/home/load");

		// untuk menghapus detail keranjang / cart
		$(document).on('click', '.remove_inventory', function() {
			var row_id = $(this).attr("id");
			$.ajax({
				url: "<?php echo base_url(); ?>kasir/home/delete_cart",
				method: "POST",
				data: {
					row_id: row_id
				},
				success: function(data) {
					$('#cart_details').html(data);
					$("#keyword").val('');
					$("#keyword").focus();
					update_total();
				}
			});
		});
	});

	function update_total() {
		// mengambil nilai di dalam form
		var form_data = $('#transaksi_form').serialize()

		$.ajax({
			url: "<?php echo base_url() . 'kasir/home/ambil_total'; ?>",
			method: "POST",
			data: form_data,
			success: function(data) {
				$('#total_harga').val(formatRupiah(data));
				update_kembalian();
			}
		});
	}

	function update_kembalian() {
		var total_harga = document.getElementById("total_harga");
		var bayar = document.getElementById("bayar");
		var kembalian = document.getElementById("kembalian");

		// parsing dan perhitungan formatRupiah(temp_kembalian)
		var value_total_harga = total_harga.value;
		var value_bayar = bayar.value;

		if (value_total_harga != "" && value_bayar != "") {
			var temp_total_harga = value_total_harga.match(/\d/g);
			var temp_bayar = value_bayar.match(/\d/g);

			temp_total_harga = temp_total_harga.join("");
			temp_bayar = temp_bayar.join("");

			var v_total_harga = parseInt(temp_total_harga);
			var v_bayar = parseInt(temp_bayar);

			if (v_bayar >= v_total_harga) {
				var temp_kembalian = v_bayar - v_total_harga;
				$('#kembalian').val(formatRupiah(temp_kembalian));
			} else {
				kembalian.value = "";
			}
		}
	}
</script>
<script>
	$(document).ready(function() {

		// pencarian start

		$("#keyword").keypress(function() { // Ketika tombol simpan di klik
			// Ubah text tombol search menjadi SEARCHING...
			// Dan tambahkan atribut disable pada tombol nya agar tidak bisa diklik lagi
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if (keycode == '13') {
				$(this).html("SEARCHING...").attr("disabled", "disabled");
				$.ajax({
					url: "<?php echo base_url(); ?>kasir/home/cari",
					type: 'POST', // Tentukan type nya POST atau GET
					data: {
						keyword: $("#keyword").val()
					}, // Set data yang akan dikirim
					dataType: "json",
					beforeSend: function(e) {
						if (e && e.overrideMimeType) {
							e.overrideMimeType("application/json;charset=UTF-8");
						}
					},
					success: function(response) {

						// Ketika proses pengiriman berhasil
						// Ubah kembali text button search menjadi SEARCH
						// Dan hapus atribut disabled untuk meng-enable kembali button search nya
						$("#keyword").html("SEARCH").removeAttr("disabled");
						$("#keyword").val('');
						$("#keyword").focus();

						// Ganti isi dari div view dengan view yang diambil dari controller
						$("#view").html(response.hasil);

						// untuk button menambah cart
						$('.add_cart').click(function() {
							var product_id = $(this).data("productid");
							var product_name = $(this).data("productname");
							var product_price = $(this).data("price");
							var quantity = $(this).data("quantity");
							$.ajax({
								url: "<?php echo base_url(); ?>kasir/home/add_cart",
								method: "POST",
								data: {
									product_id: product_id,
									product_name: product_name,
									product_price: product_price,
									quantity: quantity
								},
								success: function(data) {
									$('#cart_details').html(data);
									$("#keyword").val('');
									$("#keyword").focus();
								}
							});
						});

						// mengeload detail kerangjang / cart
						$('#cart_details').load("<?php echo base_url(); ?>kasir/home/load");

						// untuk menghapus detail keranjang / cart
						$(document).on('click', '.remove_inventory', function() {
							var row_id = $(this).attr("id");
							$.ajax({
								url: "<?php echo base_url(); ?>kasir/home/delete_cart",
								method: "POST",
								data: {
									row_id: row_id
								},
								success: function(data) {
									$('#cart_details').html(data);
									$("#keyword").val('');
									$("#keyword").focus();
									update_total();
								}
							});
						});
					},
					error: function(xhr, ajaxOptions, thrownError) { // Ketika terjadi error
						alert(xhr.responseText); // munculkan alert
					}
				});
			}
		});
	});
</script>

<script type="text/javascript">
	$(document).on('keyup', '.rupiah_2', function() {
		var row_id = $(this).attr("id");
		var rupiah_2 = document.getElementById(row_id);

		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		rupiah_2.value = formatRupiah(this.value);
	});

	/* Fungsi formatRupiah */
	function formatRupiah(angka, prefix) {
		var number_string = angka.toString().replace(/[^,\d]/g, ''),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);
		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? +rupiah : '');
	}
</script>