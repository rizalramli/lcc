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
									<h2>PEMASOKAN BARANG</h2>
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
<div class="form-element-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-element-list">
					<form id="transaksi_form" method="post">

						<div class="basic-tb-hd">
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
										<div class="bootstrap-select fm-cmp-mg">
											<select class="selectpicker" name="id_distributor" data-live-search="true"
												required>
												<option value="">Pilih Distributor</option>
												<?php foreach ($distributor as $d) {  ?>
												<option value="<?php echo $d->id_distributor ?>">
													<?php echo $d->nama ?>
												</option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
										<input type="text" class="form-control rupiah_2 ongkir_update" name="jumlah_pengeluaran"
											id="jumlah_pengeluaran" placeholder="Ongkos Kirim" required>
									</div>
								</div>

								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
										<input type="text" class="form-control" name="total" placeholder="Total"
											id="rupiah" readonly required>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
									<div class="form-group">
										<button type="button" id="add_baris" class="form-control btn btn-success">+
											Tambah Baris</button>
									</div>
								</div>

								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
									<div class="form-group">
										<button id="btn_search" type="button"
											class="form-control btn btn-default notika-btn-default" data-toggle="modal"
											data-target="#myModalthree"><i class="notika-icon notika-search"></i> Cari
											Barang</button>
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"></div>

								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
									<div class="form-group">
										<button onclick="return confirm('Lakukan Pemasokan ?')" id="action"
											type="submit" name="simpan" class="form-control btn btn-primary">Simpan
											Pemasokan</button>
									</div>
								</div>

							</div>
						</div>

						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<label>Kode</label>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<label>Nama</label>
							</div>
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
								<label>Qty</label>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<label>Harga / item</label>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
								<label>Hapus</label>
							</div>
						</div>

						<div id="detail_list">
							<!-- disini isi detail -->

						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Form Element area End-->

<div class="modal fade" id="myModalthree" role="dialog">
	<div style="margin-top:70px;" class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div style="max-height: 450px; overflow-y: auto;" class="modal-body">

				<div class="row">
					<div class="data-table-list">
						<div class="basic-tb-hd">
							<h3>Pencarian Barang</h3>
							<p>*stok barang di toko anda*</p>
						</div>
						<div class="table-responsive">
							<table id="data-table-basic" class="table table-striped table_1">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Opsi</th>
									</tr>
								</thead>
								<tbody id="daftar_barang">
									<!-- isi tabel -->
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<script src="<?= base_url(); ?>assets/vendor/auto_complete/jquery-3.4.1.min.js"></script>

<script>
	$(document).ready(function () {

		auto_complete();

	});

	var count1 = 0;
	tampil_detail();

	// Start add_row
	function tampil_detail() {

		$('#detail_list').append(`

            <div id="row` + count1 + `" class="row">
                <br />
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group ic-cmp-int">
                        <div class="form-ic-cmp">
                            <label><input type="checkbox" class="cekbox" name="` + count1 + `" id="cb` + count1 + `"></label>
                        </div>
                        <input required="" type="text" class="form-control barcode_nya" id="kode_atau_barcode` +
			count1 + `" name="kode_atau_barcode[]" placeholder="SN/IMEI/BARCODE" value="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <input required="" type="text" class="form-control nama_nya" id="nama` + count1 + `" name="nama[]" placeholder="Nama Barang" value="">
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                    <input required="" type="text" class="form-control cek_qty_pemasokan qty" id="qty` + count1 + `" name="qty[]" placeholder="qty" value="">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <input required="" type="text" class="form-control rupiah_2 harga_pemasokan_update" id="hrg_distributor` + count1 + `" name="hrg_distributor[]" placeholder="Harga / item" value="">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <button type="button" id="` + count1 + `" class="remove_baris btn btn-danger"><i class="notika-icon notika-trash"></i></button>
                </div>
            </div>

        `);

		count1 = count1 + 1;

		auto_complete();
	}

	// jika kita tekan tambah / click button
	$('#add_baris').on('click', function () {
		tampil_detail();
	});

	// End add_row

	// jika kita tekan hapus / click button
	$(document).on('click', '.remove_baris', function () {
		var row_no = $(this).attr("id");
		$('#row' + row_no).remove();
		update_total();
	});

	// jika kita tekan cekbox
	$(document).on('click', '.cekbox', function () {
		var row_id = $(this).attr("id");
		var row_name = $(this).attr("name");
		var checkBox = document.getElementById(row_id);

		// If the checkbox is checked, display the output text
		if (checkBox.checked == true) {
			$('#kode_atau_barcode' + row_name).val('KODE GENERATE');
			document.getElementById('kode_atau_barcode' + row_name).setAttribute("readonly", true);
		} else {
			$('#kode_atau_barcode' + row_name).val('');
			document.getElementById('kode_atau_barcode' + row_name).removeAttribute("readonly");
		}
	});


	// Start pencarian
	function search_proses() {

		var table;
		table = $('.table_1').DataTable();

		table.clear();

		$.ajax({
			url: "<?php echo base_url() . 'manager/pemasokan/tampil_daftar_barang'; ?>",
			success: function (hasil) {

				var obj = JSON.parse(hasil);
				let data = obj['tbl_data'];

				if (data != '') {

					var no = 1;

					$.each(data, function (i, item) {
						table.row.add([no, data[i].nama, `<a onclick="myFunction('` + data[i].nama +
							`')" id="` + data[i].kode + `" class="btn btn-danger">Pilih</a>`
						]);
						no = no + 1;
					});
				} else {
					$('.table_1').html('<h3>No data are available</h3>');
				}
				table.draw();

			}
		});
	}

	// jika kita tekan / click button search-button
	$('#btn_search').on('click', function () {
		search_proses();
	});

	function myFunction(nama) {

		$('#detail_list').append(`

            <div id="row` + count1 + `" class="row">
                <br />
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group ic-cmp-int">
                        <div class="form-ic-cmp">
                            <label><input type="checkbox" class="cekbox" name="` + count1 + `" id="cb` + count1 + `"></label>
                        </div>
                        <input required="" type="text" class="form-control barcode_nya" id="kode_atau_barcode` +
			count1 + `" name="kode_atau_barcode[]" placeholder="Kode/Barcode" value="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <input required="" type="text" class="form-control nama_nya" id="nama` + count1 +
			`" name="nama[]" placeholder="Nama Barang" value="` + nama + `">
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                    <input required="" type="number" class="form-control cek_qty_pemasokan" id="qty` + count1 + `" name="qty[]" placeholder="qty" value="" min="1" max="999">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <input required="" type="text" class="form-control rupiah_2 harga_pemasokan_update"  id="hrg_distributor` + count1 + `" name="hrg_distributor[]" placeholder="Harga" value="">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"> 
                    <button type="button" id="` + count1 + `" class="remove_baris btn btn-danger"><i class="notika-icon notika-trash"></i></button>
                </div>
            </div>

        `);

		count1 = count1 + 1;
		$('#myModalthree').modal('hide');

		auto_complete();
	}

	// End pencarian

	// valdasi form
	$(document).on('submit', '#transaksi_form', function (event) {
		event.preventDefault();

		// mengambil nilai di dalam form
		var form_data = $(this).serialize();

		// tambah ke database
		$.ajax({
			url: "<?php echo base_url() . 'manager/pemasokan/input_transaksi_form'; ?>",
			method: "POST",
			data: form_data,
			success: function (data) {
				alert(data);
				location.reload();
			}
		});
		// tambah ke database

	});
	// validasi form

	// codingan untuk autocomplete start

	function auto_complete() {

		$(function () {

			$(".nama_nya").autocomplete({
				source: function (request, response) {
					// Fetch data
					$.ajax({
						url: "<?php echo base_url() . 'manager/pemasokan/get_autocomplete_nama'; ?>",
						type: 'post',
						dataType: "json",
						data: {
							nilai: request.term
						},
						success: function (data) {
							response(data);
						}
					});
				}
			});

		});

	}

	// codingan untuk autocomplete end

	// codingan untuk harga total
    $(document).on('keyup', '.harga_pemasokan_update', function() {
        update_total();
    });

    $(document).on('keyup', '.cek_qty_pemasokan', function() {
        update_total()
    });

	$(document).on('keyup', '.ongkir_update', function() {
        update_total()
    });

	// jumlah_pengeluaran ongkir_update

	function update_total() {
		// mengambil nilai di dalam form
		var form_data = $('#transaksi_form').serialize()

		$.ajax({
			url: "<?php echo base_url() . 'manager/pemasokan/ambil_total_barang'; ?>",
			method: "POST",
			data: form_data,
			success: function(data) {

				if(data==""){
					data = 0;
				}

				var jumlah_pengeluaran = $('#jumlah_pengeluaran').val();
				if(jumlah_pengeluaran==""){
					jumlah_pengeluaran = 0;

					var grand_total = parseInt(data);
					$('#rupiah').val(formatRupiah(grand_total));
				} else{
					var val_jumlah_pengeluaran = parseInt(jumlah_pengeluaran.split('.').join(''));
					var grand_total = parseInt(data)+val_jumlah_pengeluaran;
					$('#rupiah').val(formatRupiah(grand_total));
				}
				
			}
		});
	}

</script>

<script type="text/javascript">
	var rupiah = document.getElementById('rupiah');
	rupiah.addEventListener('keyup', function (e) {
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		rupiah.value = formatRupiah(this.value);
	});

	$(document).on('keyup', '.rupiah_2', function () {
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
