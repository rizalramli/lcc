<!doctype html>
<html class="no-js" lang="en">

<head>
	<!-- head start -->
	<?php $this->load->view('view_1/_partials/head.php'); ?>
	<!-- head end -->
</head>

<body>
	<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
	<!-- Start Header Top Area -->
	<?php $this->load->view('view_1/_partials/header.php'); ?>
	<!-- End Header Top Area -->

	<!-- Mobile Menu start -->
	<?php $this->load->view('view_1/_partials/navbar/pimpinan/mobile.php'); ?>
	<!-- Mobile Menu end -->

	<!-- Desktop Menu area start-->
	<?php $this->load->view('view_1/_partials/navbar/pimpinan/desktop.php'); ?>
	<!-- Desktop Menu area End-->

	<!-- konten start -->
	<?php echo $contents; ?>
	<!-- konten end -->

	<!-- Footer Start-->
	<?php $this->load->view('view_1/_partials/footer.php'); ?>
	<!-- Footer End-->

	<!-- js start -->
	<?php $this->load->view('view_1/_partials/js/manager/js.php'); ?>
	<!-- js end -->

</body>

</html>
