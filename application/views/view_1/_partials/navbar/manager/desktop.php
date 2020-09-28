<div class="main-menu-area mg-tb-40">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
					<li <?= $this->uri->segment(1) == 'dashboard_manager' ? 'class="active"' : '' ?>>
						<a data-toggle="tab" href="#Home">
							<i class="glyphicon glyphicon-home"></i> Home
						</a>
					</li>
					<li <?= $this->uri->segment(1) == 'user_kasir' ? 'class="active"' : '' ?>>
						<a data-toggle="tab" href="#Home2">
							<i class="glyphicon glyphicon-user"></i> User
						</a>
					</li>
					<li <?= $this->uri->segment(1) == 'barang_toko' ? 'class="active"' : '' ?>>
						<a data-toggle="tab" href="#Home3">
							<i class="glyphicon glyphicon-th-large"></i> Barang
						</a>
					</li>
					<li <?= $this->uri->segment(1) == 'pemasokan' ? 'class="active"' : '' ?>>
						<a data-toggle="tab" href="#Home4">
							<i class="glyphicon glyphicon-circle-arrow-down"></i> Pemasokan
						</a>
					</li>
					<li <?= $this->uri->segment(1) == 'pengeluaran_lain' ? 'class="active"' : '' ?>>
						<a data-toggle="tab" href="#Home7">
							<i class="glyphicon glyphicon-open-file"></i> Pengeluaran
						</a>
					</li>
					<li <?= $this->uri->segment(1) == 'barang_barcode' ? 'class="active"' : '' ?>>
						<a data-toggle="tab" href="#Home5">
							<i class="glyphicon glyphicon-barcode"></i> Barcode
						</a>
					</li>
					<li <?= $this->uri->segment(1) == 'laporan_manager' ? 'class="active"' : '' ?>>
						<a data-toggle="tab" href="#Home6">
							<i class="glyphicon glyphicon-stats"></i> Laporan
						</a>
					</li>

				</ul>
				<div class="tab-content custom-menu-content">
					<div id="Home" class="tab-pane <?= $this->uri->segment(1) == 'dashboard_manager' ? 'active' : '' ?> 
                        in notika-tab-menu-bg animated flipInX">
						<ul class="notika-main-menu-dropdown">
							<li>
								<a href="<?= base_url('dashboard_manager'); ?>">Dashboard</a>
							</li>
						</ul>
					</div>
					<div id="Home2" class="tab-pane <?= $this->uri->segment(1) == 'user_kasir' ? 'active' : '' ?> in notika-tab-menu-bg animated flipInX">
						<ul class="notika-main-menu-dropdown">
							<li>
								<a href="<?= base_url('user_kasir'); ?>">Data Kasir</a>
							</li>
						</ul>
					</div>

					<div id="Home3" class="tab-pane <?= $this->uri->segment(1) == 'barang_toko' ? 'active' : '' ?> in notika-tab-menu-bg animated flipInX">
						<ul class="notika-main-menu-dropdown">
							<li>
								<a href="<?= base_url('barang_toko'); ?>">Data Barang</a>
							</li>
							<li>
								<a href="<?= base_url('barang_toko/stok_habis'); ?>">Stok Habis</a>
							</li>
							<li>
								<a href="<?= base_url('barang_toko/trending'); ?>">Barang Trending</a>
							</li>
						</ul>
					</div>

					<div id="Home4" class="tab-pane <?= $this->uri->segment(1) == 'pemasokan' ? 'active' : '' ?> in notika-tab-menu-bg animated flipInX">
						<ul class="notika-main-menu-dropdown">
							<li>
								<a href="<?= base_url('pemasokan'); ?>">Pemasokan</a>
							</li>
							<li>
								<a href="<?= base_url('pemasokan/daftar_pemasokan'); ?>">Daftar Pemasokan</a>
							</li>
						</ul>
					</div>

					<div id="Home7" class="tab-pane <?= $this->uri->segment(1) == 'pengeluaran_lain' ? 'active' : '' ?> in notika-tab-menu-bg animated flipInX">
						<ul class="notika-main-menu-dropdown">
							<li>
								<a href="<?= base_url('pengeluaran_lain'); ?>">Pengeluaran Lain</a>
							</li>
						</ul>
					</div>

					<div id="Home5" class="tab-pane <?= $this->uri->segment(1) == 'barang_barcode' ? 'active' : '' ?> in notika-tab-menu-bg animated flipInX">
						<ul class="notika-main-menu-dropdown">
							<li>
								<a href="<?= base_url('barang_barcode'); ?>">Barang Barcode</a>
							</li>
						</ul>
					</div>

					<div id="Home6" class="tab-pane <?= $this->uri->segment(1) == 'laporan_manager' ? 'active' : '' ?> in notika-tab-menu-bg animated flipInX">
						<ul class="notika-main-menu-dropdown">
							<li>
								<a href="<?= base_url('laporan_manager'); ?>">Laporan</a>
							</li>
							<li>
								<a href="<?= base_url('laporan_manager/garansi'); ?>">Garansi</a>
							</li>
						</ul>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>