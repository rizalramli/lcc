<div class="mobile-menu-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="mobile-menu">
					<nav id="dropdown">
						<ul class="mobile-menu-nav">
							<li><a data-toggle="collapse" data-target="#Charts" href="#">Home</a>
								<ul class="collapse dropdown-header-top">
									<li><a href="<?= base_url('dashboard_pimpinan'); ?>">Dashboard</a></li>
								</ul>
							</li>
							<li><a data-toggle="collapse" data-target="#demoevent" href="#">User</a>
								<ul id="demoevent" class="collapse dropdown-header-top">
									<li><a href="<?= base_url('user_manager'); ?>">Data Kasir</a></li>
								</ul>
							</li>
							<li><a data-toggle="collapse" data-target="#democrou" href="#">Barang</a>
								<ul id="democrou" class="collapse dropdown-header-top">
									<li><a href="<?= base_url('stok_habis'); ?>">Stok Habis</a>
									<li><a href="<?= base_url('barang_trending'); ?>">Barang Trending</a>
									<li><a href="<?= base_url('stok_toko'); ?>">Stok Toko</a>
								</ul>
							</li>
							<li><a data-toggle="collapse" data-target="#distributor" href="#">Distributor</a>
								<ul id="distributor" class="collapse dropdown-header-top">
									<li><a href="<?= base_url('stok_habis'); ?>">Data Distributor</a>
								</ul>
							</li>
							<li><a data-toggle="collapse" data-target="#pengeluaran" href="#">Pengeluaran</a>
								<ul id="pengeluaran" class="collapse dropdown-header-top">
									<li><a href="<?= base_url('pengeluaran'); ?>">Data Pengeluaran</a></li>
								</ul>
							</li>
							<li><a data-toggle="collapse" data-target="#demo" href="#">Laporan</a>
								<ul id="demo" class="collapse dropdown-header-top">
									<li><a href="<?= base_url('laporan_pimpinan'); ?>">Laporan</a></li>
								</ul>
							</li>
							<li><a data-toggle="collapse" data-target="#account" href="#">Edit Account</a>
								<ul id="account" class="collapse dropdown-header-top">
									<li><a href="<?= base_url('edit_account'); ?>">Edit Account</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
