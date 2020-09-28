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
									<h2>DASHBOARD PIMPINAN</h2>
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
<div class="container">
	<div class="row">
		<a style="color:black" href="">
			<div style="margin-bottom: 30px;" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="contact-inner">
					<div id="piechart" style="width:100%; height: 300px;"></div>
				</div>
			</div>
		</a>

		<div style="margin-bottom: 30px;" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="row">
				<div style="margin-bottom:20px;" class="col-md-6">
					<form action="" method="post" id="myform">
						<select name="toko" id="toko" class="form-control">
							<option value="semua" selected>Semua Toko</option>
							<?php
							foreach ($data_toko as $row) {
							?>
								<option value="<?= $row->id_toko ?>"><?= $row->nama_toko ?></option>
							<?php } ?>
						</select>
				</div>
				<div style="margin-bottom:20px;" class="col-md-6">
					<select name="tanggal" id="tanggal" class="form-control">
						<option value="hari">Hari Ini</option>
						<option value="bulan">Bulan Ini</option>
					</select>
					</form>

				</div>
			</div>
			<div id="muncul"></div>
		</div>
	</div>
</div>
<script src="<?= base_url() ?>assets/vendor/auto_complete/jquery-3.4.1.min.js"></script>
<script>
	hari_ini();
	$(document).on('change', '#toko', function(event) {
		event.preventDefault();
		hari_ini();
	});
	$(document).on('change', '#tanggal', function(event) {
		event.preventDefault();
		hari_ini();
	});

	function hari_ini() {
		var form_data = $("#myform").serialize();
		$.ajax({
			url: "<?php echo base_url(); ?>pimpinan/home/tampil",
			method: "POST",
			data: form_data,
			success: function(data) {
				$("#muncul").html(data);
			}
		});
	}
</script>
<script type="text/javascript" src="<?= base_url(); ?>assets/vendor/js/loader.js"></script>
<script type="text/javascript">
	google.charts.load('current', {
		'packages': ['corechart']
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
		var aset_lcc = parseInt("<?php echo $aset_lcc  ?>");
		var aset_cmc = parseInt("<?php echo $aset_cmc  ?>");
		var aset_probolinggo = parseInt("<?php echo $aset_probolinggo  ?>");
		var total = aset_lcc + aset_cmc + aset_probolinggo;
		var data = google.visualization.arrayToDataTable([
			['Task', 'Hours per Day'],
			['LCC Komputer', aset_lcc],
			['CMC Komputer', aset_cmc],
			['Paradox Komputer', aset_probolinggo],
		]);

		var options = {
			title: 'Total Aset Semua Toko : ' + 'Rp ' + formatRupiah(total) + ',00'

		};

		var chart = new google.visualization.PieChart(document.getElementById('piechart'));

		chart.draw(data, options);
	}

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