<!-- jquery
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/bootstrap.min.js"></script>
<!-- wow JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/wow.min.js"></script>
<!-- price-slider JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/jquery-price-slider.js"></script>
<!-- owl.carousel JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/owl.carousel.min.js"></script>
<!-- scrollUp JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/jquery.scrollUp.min.js"></script>
<!-- meanmenu JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/meanmenu/jquery.meanmenu.js"></script>
<!-- counterup JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/counterup/jquery.counterup.min.js"></script>
<script src="<?= base_url(); ?>assets/notika/js/counterup/waypoints.min.js"></script>
<script src="<?= base_url(); ?>assets/notika/js/counterup/counterup-active.js"></script>
<!-- mCustomScrollbar JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- sparkline JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/sparkline/jquery.sparkline.min.js"></script>
<script src="<?= base_url(); ?>assets/notika/js/sparkline/sparkline-active.js"></script>
<!-- flot JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/flot/jquery.flot.js"></script>
<script src="<?= base_url(); ?>assets/notika/js/flot/jquery.flot.resize.js"></script>
<script src="<?= base_url(); ?>assets/notika/js/flot/flot-active.js"></script>
<!-- knob JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/knob/jquery.knob.js"></script>
<script src="<?= base_url(); ?>assets/notika/js/knob/jquery.appear.js"></script>
<script src="<?= base_url(); ?>assets/notika/js/knob/knob-active.js"></script>
<!-- Input Mask JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/jasny-bootstrap.min.js"></script>
<!-- icheck JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/icheck/icheck.min.js"></script>
<script src="<?= base_url(); ?>assets/notika/js/icheck/icheck-active.js"></script>
<!-- rangle-slider JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/rangle-slider/jquery-ui-1.10.4.custom.min.js"></script>
<script src="<?= base_url(); ?>assets/notika/js/rangle-slider/jquery-ui-touch-punch.min.js"></script>
<script src="<?= base_url(); ?>assets/notika/js/rangle-slider/rangle-active.js"></script>
<!-- datapicker JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/datapicker/bootstrap-datepicker.js"></script>
<script src="<?= base_url(); ?>assets/notika/js/datapicker/datepicker-active.js"></script>
<!-- bootstrap select JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/bootstrap-select/bootstrap-select.js"></script>
<!--  color-picker JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/color-picker/farbtastic.min.js"></script>
<script src="<?= base_url(); ?>assets/notika/js/color-picker/color-picker.js"></script>
<!--  notification JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/notification/bootstrap-growl.min.js"></script>
<script src="<?= base_url(); ?>assets/notika/js/notification/notification-active.js"></script>
<!--  summernote JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/summernote/summernote-updated.min.js"></script>
<script src="<?= base_url(); ?>assets/notika/js/summernote/summernote-active.js"></script>
<!-- dropzone JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/dropzone/dropzone.js"></script>
<!--  wave JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/wave/waves.min.js"></script>
<script src="<?= base_url(); ?>assets/notika/js/wave/wave-active.js"></script>
<!--  chosen JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/chosen/chosen.jquery.js"></script>
<!--  todo JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/todo/jquery.todo.js"></script>
<!-- plugins JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/plugins.js"></script>
<!-- main JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/main.js"></script>
<!-- Data Table JS
		============================================ -->
<script src="<?= base_url(); ?>assets/notika/js/data-table/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/notika/js/data-table/data-table-act.js"></script>
<script src="<?= base_url(); ?>assets/vendor/auto_complete/jquery-ui/jquery-ui.js"></script>
<script src="<?= base_url(); ?>assets/vendor/js/jquery.mask.js"></script>
<!-- Validasi -->
<!-- validasi inputan rupiah -->
<script type="text/javascript">
	$(document).ready(function () {
		$('.rupiah').mask('000.000.000', {
			reverse: true
		});
		$('.hp').mask('0000-0000-0000-000');
		$('.tgl').mask('00/00/0000');
		$('.qty').mask('000');
	})

</script>
<!-- Validasi hanya karakter -->
<script>
	$('.karakter').keypress(function (e) {
		var regex = new RegExp(/^[a-zA-Z\s]+$/);
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if (regex.test(str)) {
			return true;
		} else {
			e.preventDefault();
			return false;
		}
	});

</script>
<script>
	$('.karakterAngka').keypress(function (e) {
		var regex = new RegExp(/^[a-z0-9\s]+$/i);
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if (regex.test(str)) {
			return true;
		} else {
			e.preventDefault();
			return false;
		}
	});

</script>

<script>
	$('#data-table-basic').DataTable({
		ordering: false
	});

</script>
<script>
	$('#dt_custom1').DataTable({
		ordering: false
	});

</script>
<script>
	$('#dt_custom2').DataTable({
		ordering: false
	});

</script>
<!-- Agar input tidak ada history -->
<script>
	$("form :input").attr("autocomplete", "off");

</script>
