<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Login Register | Notika - Notika Admin notika</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- favicon
		============================================ -->
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>assets/notika/img/favicon.ico">
	<!-- Google Fonts
		============================================ -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/notika/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/notika/css/notika-custom-icon.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/notika/style.css">
</head>

<body>
	<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
	<!-- Login Register area Start-->
	<div class="login-content">
		<!-- Login -->
		<div class="nk-block toggled" id="l-login">
			<h2 style="color:white">SISTEM INFORMASI INVENTORY</h2>
			<br>
			<div class="nk-form">
				<form method="POST" action="<?= base_url(); ?>login/aksi_login">
					<div class="input-group">
						<span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
						<div class="nk-int-st">
							<input autofocus type="text" name="username" class="form-control" placeholder="Username"
								required="" maxlength="50" oninvalid="this.setCustomValidity('Username Wajib Diisi')"
								oninput="setCustomValidity('')">
						</div>
					</div>
					<div class="input-group mg-t-15">
						<span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
						<div class="nk-int-st">
							<input type="password" name="password" class="form-control" placeholder="Password"
								required="" maxlength="60" oninvalid="this.setCustomValidity('Password Wajib Diisi')"
								oninput="setCustomValidity('')">
						</div>
					</div>
					<div style="margin-top:20px">
						<button class="btn btn-custom waves-effect btn-lg btn-block">Login</button>
					</div>
			</div>
			</form>
		</div>
	</div>
	<script src="<?= base_url(); ?>assets/notika/js/bootstrap.min.js"></script>
</body>

</html>
