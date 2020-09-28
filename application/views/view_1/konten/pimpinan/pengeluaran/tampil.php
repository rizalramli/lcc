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
									<h2>DATA PENGELUARAN</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="data-table-area">
	<div class="container">
		<div class="row">
			<div style="margin-bottom:27px;" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<form action="" method="post" id="myform">
					<select name="toko" id="toko" class="form-control">
						<option value="semua" selected>Semua Toko</option>
						<?php 
						foreach($data_toko as $row)
						{
						?>
						<option value="<?= $row->id_toko ?>"><?= $row->nama_toko ?></option>
						<?php } ?>
					</select>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<select name="tanggal" id="tanggal" class="form-control">
					<option value="hari">Hari Ini</option>
					<option value="bulan">Bulan Ini</option>
				</select>
				</form>
			</div>
		</div>
		<div class="row" style="margin-bottom:27px;">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div id="muncul"></div>
			</div>
		</div>

	</div>
</div>
<script src="<?= base_url() ?>assets/vendor/auto_complete/jquery-3.4.1.min.js"></script>
<script>
	hari_ini();
	$(document).on('change', '#toko', function (event) {
		event.preventDefault();
		hari_ini();
	});
	$(document).on('change', '#tanggal', function (event) {
		event.preventDefault();
		hari_ini();
	});

	function hari_ini() {
		var form_data = $("#myform").serialize();
		$.ajax({
			url: "<?php echo base_url(); ?>pimpinan/pengeluaran/tampil",
			method: "POST",
			data: form_data,
			success: function (data) {
				$("#muncul").html(data);
				$('#dt_custom1').DataTable({
					ordering: false
				});
				$('#dt_custom2').DataTable({
					ordering: false
				});
			}
		});
	}

</script>
