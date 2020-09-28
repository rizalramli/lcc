<div class="header-top-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
				<div class="logo-area">
					<h2 style="color:white;"><?= $this->session->userdata('nama_toko'); ?></h2>
				</div>
			</div>
			<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
				<div class="header-top-menu">
					<ul class="nav navbar-nav notika-top-nav">
						<li class="nav-item">
							<a href="#" class="nav-link dropdown-toggle"><span><?= $this->session->userdata('nama'); ?>
									(<?= $this->session->userdata('akses'); ?>)</span></a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="modal"
								data-target="#myModaltwo"><span><i class="fa fa-power-off"
										aria-hidden="true"></i></span></a>
						</li>

						<div class="modal fade" id="myModaltwo" role="dialog">
							<div class="modal-dialog modal-sm">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
										<h4>Yakin Untuk Melakukan logout ?</h4>
										<br>
									</div>
									<div class="modal-footer">
										<a href="<?= base_url() ?>login/logout" class="btn btn-default">Yes</a>
										<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
									</div>
								</div>
							</div>
						</div>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
