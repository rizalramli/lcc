<div class="mobile-menu-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="mobile-menu">
					<nav id="dropdown">
						<ul class="mobile-menu-nav">
							<li><a data-toggle="collapse" data-target="#Charts" href="#">Home</a>
								<ul class="collapse dropdown-header-top">
									<li><a href="<?= base_url('dashboard_manager'); ?>">Dashboard</a></li>
								</ul>
							</li>
							<li><a data-toggle="collapse" data-target="#demoevent" href="#">User</a>
								<ul id="demoevent" class="collapse dropdown-header-top">
									<li><a href="<?= base_url('user_kasir'); ?>">Data Kasir</a></li>
								</ul>
							</li>
							<li><a data-toggle="collapse" data-target="#democrou" href="#">Barang</a>
								<ul id="democrou" class="collapse dropdown-header-top">
									<li><a href="<?= base_url('barang_toko'); ?>">Data Barang</a></li>
									<li><a href="<?= base_url('barang_toko/stok_habis'); ?>">Stok Habis</a></li>
									<li><a href="<?= base_url('barang_toko/trending'); ?>">Barang Trending</a></li>
								</ul>
							</li>
							<li><a data-toggle="collapse" data-target="#demolibra" href="#">Pemasokan</a>
								<ul id="demolibra" class="collapse dropdown-header-top">
									<li><a href="<?= base_url('pemasokan'); ?>">Pemasokan</a></li>
									<li><a href="<?= base_url('pemasokan/daftar_pemasokan'); ?>">Daftar Pemasokan</a></li>
								</ul>
							</li>
							<li><a data-toggle="collapse" data-target="#pengeluaran" href="#">Pengeluaran</a>
								<ul id="pengeluaran" class="collapse dropdown-header-top">
									<li><a href="<?= base_url('pengeluaran_lain'); ?>">Pengeluaran Lain</a></li>
								</ul>
							</li>
							<li><a data-toggle="collapse" data-target="#demodepart" href="#">Barcode</a>
								<ul id="demodepart" class="collapse dropdown-header-top">
									<li><a href="<?= base_url('barang_barcode'); ?>">Barang Barcode</a></li>
								</ul>
							</li>
							<li><a data-toggle="collapse" data-target="#demo" href="#">Laporan</a>
								<ul id="demo" class="collapse dropdown-header-top">
									<li><a href="<?= base_url('laporan_manager'); ?>">Laporan</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>