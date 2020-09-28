<div class="main-menu-area mg-tb-40">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
					<li <?= $this->uri->segment(1) == 'dashboard_pimpinan' ? 'class="active"' : '' ?>>
						<a data-toggle="tab" href="#Home">
							<i class="glyphicon glyphicon-home"></i> Home
						</a>
					</li>
					<li <?= $this->uri->segment(1) == 'user_manager' ? 'class="active"' : '' ?>>
						<a data-toggle="tab" href="#Home2">
							<i class="glyphicon glyphicon-user"></i> User
						</a>
					</li>
					<li
						<?= $this->uri->segment(1) == 'stok_habis' || $this->uri->segment(1) == 'barang_trending' || $this->uri->segment(1) == 'stok_toko' ? 'class="active"' : '' ?>>
						<a data-toggle="tab" href="#Home3">
							<i class="glyphicon glyphicon-th-large"></i> Barang
						</a>
					</li>
					<li <?= $this->uri->segment(1) == 'distributor' ? 'class="active"' : '' ?>>
						<a data-toggle="tab" href="#Home8">
							<i class="glyphicon glyphicon-plane"></i> Distributor
						</a>
					</li>
					<li <?= $this->uri->segment(1) == 'pengeluaran' ? 'class="active"' : '' ?>>
						<a data-toggle="tab" href="#Home7">
							<i class="glyphicon glyphicon-open-file"></i> Pengeluaran
						</a>
					</li>
					<li <?= $this->uri->segment(1) == 'laporan_pimpinan' ? 'class="active"' : '' ?>>
						<a data-toggle="tab" href="#Home6">
							<i class="glyphicon glyphicon-stats"></i> Laporan
						</a>
					</li>
					<li <?= $this->uri->segment(1) == 'edit_account' ? 'class="active"' : '' ?>>
						<a data-toggle="tab" href="#Home9">
							<i class="glyphicon glyphicon-wrench"></i> Edit Account
						</a>
					</li>

				</ul>
				<div class="tab-content custom-menu-content">
					<div id="Home" class="tab-pane <?= $this->uri->segment(1) == 'dashboard_pimpinan' ? 'active' : '' ?> 
                        in notika-tab-menu-bg animated flipInX">
						<ul class="notika-main-menu-dropdown">
							<li>
								<a href="<?= base_url('dashboard_pimpinan'); ?>">Dashboard</a>
							</li>
						</ul>
					</div>
					<div id="Home2"
						class="tab-pane <?= $this->uri->segment(1) == 'user_manager' ? 'active' : '' ?> in notika-tab-menu-bg animated flipInX">
						<ul class="notika-main-menu-dropdown">
							<li>
								<a href="<?= base_url('user_manager'); ?>">Data Manager</a>
							</li>
						</ul>
					</div>

					<div id="Home3" class="tab-pane
						<?= $this->uri->segment(1) == 'stok_habis' || $this->uri->segment(1) == 'barang_trending' || $this->uri->segment(1) == 'stok_toko'  ? 'active' : '' ?>
						in
						notika-tab-menu-bg animated flipInX">
						<ul class="notika-main-menu-dropdown">
							<li>
								<a href="<?= base_url('stok_habis'); ?>">Stok Habis</a>
							</li>
							<li>
								<a href="<?= base_url('barang_trending'); ?>">Barang Trending</a>
							</li>
							<li>
								<a href="<?= base_url('stok_toko'); ?>">Stok Toko</a>
							</li>
						</ul>
					</div>

					<div id="Home8"
						class="tab-pane <?= $this->uri->segment(1) == 'distributor' ? 'active' : '' ?> in notika-tab-menu-bg animated flipInX">
						<ul class="notika-main-menu-dropdown">
							<li>
								<a href="<?= base_url('distributor'); ?>">Data Distributor</a>
							</li>
						</ul>
					</div>

					<div id="Home7"
						class="tab-pane <?= $this->uri->segment(1) == 'pengeluaran' ? 'active' : '' ?> in notika-tab-menu-bg animated flipInX">
						<ul class="notika-main-menu-dropdown">
							<li>
								<a href="<?= base_url('pengeluaran'); ?>">Data Pengeluaran</a>
							</li>
						</ul>
					</div>

					<div id="Home6"
						class="tab-pane <?= $this->uri->segment(1) == 'laporan_pimpinan' ? 'active' : '' ?> in notika-tab-menu-bg animated flipInX">
						<ul class="notika-main-menu-dropdown">
							<li>
								<a href="<?= base_url('laporan_pimpinan'); ?>">Laporan</a>
							</li>
						</ul>
					</div>

					<div id="Home9"
						class="tab-pane <?= $this->uri->segment(1) == 'edit_account' ? 'active' : '' ?> in notika-tab-menu-bg animated flipInX">
						<ul class="notika-main-menu-dropdown">
							<li>
								<a href="<?= base_url('edit_account'); ?>">Edit Account</a>
							</li>
						</ul>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
