<?php
class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('id_user')){
            redirect('/');
        }
        else if($this->session->userdata('akses') != 'Manager')
        {
            redirect('login/logout');
        }
        $this->load->model('manager/M_home');
    }
    public function index()
    {
        $data['kasir'] = $this->M_home->count_kasir();
        $data['barang'] = $this->M_home->count_jenis_barang();
		$data['stok_habis'] = $this->M_home->count_stok_habis();

		// PENGELUARAN BULAN DAN TAHUN INI
		$data['pengeluaran_bulan_1'] = $this->M_home->pengeluaran_bulan_1();
		$data['keluar_januari'] = $data['pengeluaran_bulan_1']->total_pengeluaran;

		$data['pengeluaran_bulan_2'] = $this->M_home->pengeluaran_bulan_2();
		$data['keluar_februari'] = $data['pengeluaran_bulan_2']->total_pengeluaran;

		$data['pengeluaran_bulan_3'] = $this->M_home->pengeluaran_bulan_3();
		$data['keluar_maret'] = $data['pengeluaran_bulan_3']->total_pengeluaran;

		$data['pengeluaran_bulan_4'] = $this->M_home->pengeluaran_bulan_4();
		$data['keluar_april'] = $data['pengeluaran_bulan_4']->total_pengeluaran;

		$data['pengeluaran_bulan_5'] = $this->M_home->pengeluaran_bulan_5();
		$data['keluar_mei'] = $data['pengeluaran_bulan_5']->total_pengeluaran;

		$data['pengeluaran_bulan_6'] = $this->M_home->pengeluaran_bulan_6();
		$data['keluar_juni'] = $data['pengeluaran_bulan_6']->total_pengeluaran;

		$data['pengeluaran_bulan_7'] = $this->M_home->pengeluaran_bulan_7();
		$data['keluar_juli'] = $data['pengeluaran_bulan_7']->total_pengeluaran;

		$data['pengeluaran_bulan_8'] = $this->M_home->pengeluaran_bulan_8();
		$data['keluar_agustus'] = $data['pengeluaran_bulan_8']->total_pengeluaran;

		$data['pengeluaran_bulan_9'] = $this->M_home->pengeluaran_bulan_9();
		$data['keluar_september'] = $data['pengeluaran_bulan_9']->total_pengeluaran;

		$data['pengeluaran_bulan_10'] = $this->M_home->pengeluaran_bulan_10();
		$data['keluar_oktober'] = $data['pengeluaran_bulan_10']->total_pengeluaran;

		$data['pengeluaran_bulan_11'] = $this->M_home->pengeluaran_bulan_11();
		$data['keluar_november'] = $data['pengeluaran_bulan_11']->total_pengeluaran;

		$data['pengeluaran_bulan_12'] = $this->M_home->pengeluaran_bulan_12();
		$data['keluar_desember'] = $data['pengeluaran_bulan_12']->total_pengeluaran;

		// KEUNTUNGAN BULAN DAN TAHUN INI
		$data['keuntungan_bulan_1'] = $this->M_home->keuntungan_bulan_1();
		$data['masuk_januari'] = $data['keuntungan_bulan_1']->harga_jual_barang -
		$data['keuntungan_bulan_1']->harga_beli_barang;

		$data['keuntungan_bulan_2'] = $this->M_home->keuntungan_bulan_2();
		$data['masuk_februari'] = $data['keuntungan_bulan_2']->harga_jual_barang -
		$data['keuntungan_bulan_2']->harga_beli_barang;

		$data['keuntungan_bulan_3'] = $this->M_home->keuntungan_bulan_3();
		$data['masuk_maret'] = $data['keuntungan_bulan_3']->harga_jual_barang -
		$data['keuntungan_bulan_3']->harga_beli_barang;

		$data['keuntungan_bulan_4'] = $this->M_home->keuntungan_bulan_4();
		$data['masuk_april'] = $data['keuntungan_bulan_4']->harga_jual_barang -
		$data['keuntungan_bulan_4']->harga_beli_barang;

		$data['keuntungan_bulan_5'] = $this->M_home->keuntungan_bulan_5();
		$data['masuk_mei'] = $data['keuntungan_bulan_5']->harga_jual_barang -
		$data['keuntungan_bulan_5']->harga_beli_barang;

		$data['keuntungan_bulan_6'] = $this->M_home->keuntungan_bulan_6();
		$data['masuk_juni'] = $data['keuntungan_bulan_6']->harga_jual_barang -
		$data['keuntungan_bulan_6']->harga_beli_barang;

		$data['keuntungan_bulan_7'] = $this->M_home->keuntungan_bulan_7();
		$data['masuk_juli'] = $data['keuntungan_bulan_7']->harga_jual_barang -
		$data['keuntungan_bulan_7']->harga_beli_barang;

		$data['keuntungan_bulan_8'] = $this->M_home->keuntungan_bulan_8();
		$data['masuk_agustus'] = $data['keuntungan_bulan_8']->harga_jual_barang -
		$data['keuntungan_bulan_8']->harga_beli_barang;

		$data['keuntungan_bulan_9'] = $this->M_home->keuntungan_bulan_9();
		$data['masuk_september'] = $data['keuntungan_bulan_9']->harga_jual_barang -
		$data['keuntungan_bulan_9']->harga_beli_barang;
	
		$data['keuntungan_bulan_10'] = $this->M_home->keuntungan_bulan_10();
		$data['masuk_oktober'] = $data['keuntungan_bulan_10']->harga_jual_barang - $data['keuntungan_bulan_10']->harga_beli_barang;

		$data['keuntungan_bulan_11'] = $this->M_home->keuntungan_bulan_11();
		$data['masuk_november'] = $data['keuntungan_bulan_11']->harga_jual_barang -
		$data['keuntungan_bulan_11']->harga_beli_barang;

		$data['keuntungan_bulan_12'] = $this->M_home->keuntungan_bulan_12();
		$data['masuk_desember'] = $data['keuntungan_bulan_12']->harga_jual_barang -
		$data['keuntungan_bulan_12']->harga_beli_barang;
		
		
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/home/tampil',$data);
    }
    public function tampil()
    {
        $select = $this->input->post('pilih');
        $data['hari'] = $this->M_home->count_penjualan_hari();
		$data['bulan'] = $this->M_home->count_penjualan_bulan();
		$data['keuntungan_hari'] = $this->M_home->keuntungan_hari();
		$data['keuntungan_bulan'] = $this->M_home->keuntungan_bulan();
		$untung_hari = $data['keuntungan_hari']->harga_jual_barang - $data['keuntungan_hari']->harga_beli_barang;
		$untung_bulan = $data['keuntungan_bulan']->harga_jual_barang - $data['keuntungan_bulan']->harga_beli_barang;
		$data['pengeluaran_lain_hari'] = $this->M_home->pengeluaran_lain_hari();
		$data['pengeluaran_lain_bulan'] = $this->M_home->pengeluaran_lain_bulan();
		$pengeluaran_hari = $data['pengeluaran_lain_hari']->total_pengeluaran;
		$pengeluaran_bulan = $data['pengeluaran_lain_bulan']->total_pengeluaran;

		// CHART
		// $data['pemasokan_bulan_oktober'] = $this->M_home->pemasokan_bulan_oktober();
        if($select=='hari')
        {
		echo '<a style="color:black" href="'.base_url('laporan_manager').'">
			<div style="margin-bottom: 30px;" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="contact-inner">
					<div class="contact-inner">
						<h4 class="text-right">
							'.$data['hari']->jumlah_hari.'
						</h4>
						<span><strong>Jumlah Transaksi</strong></span>
					</div>
				</div>
			</div>
		</a>
		<a style="color:black" href="'.base_url('laporan_manager').'">
			<div style="margin-bottom: 30px;" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="contact-inner">
					<div class="contact-inner">
						<h4 class="text-right">
							'.rupiah($untung_hari).'
						</h4>
						<span><strong>Pemasukan</strong></span>
					</div>
				</div>
			</div>
		</a>
		<a style="color:black" href="'.base_url('pengeluaran_lain').'">
			<div style="margin-bottom: 30px;" class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="contact-inner">
					<div class="contact-inner">
						<h4 class="text-right">
							'.rupiah($pengeluaran_hari).'
						</h4>
						<span><strong>Pengeluaran</strong></span>
					</div>
				</div>
			</div>
		</a>
		<a style="color:black" href="'.base_url('laporan_manager').'">
			<div style="margin-bottom: 30px;" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="contact-inner">
					<div class="contact-inner">
						<h4 class="text-right">
							'.rupiah($untung_hari - $pengeluaran_hari).'
						</h4>
						<span><strong>Keuntungan Bersih</strong></span>
					</div>
				</div>
			</div>
		</a>';
        } 
		else if ($select=='bulan')
		{
		echo '<a style="color:black" href="'.base_url('laporan_manager').'">
		<div style="margin-bottom: 30px;" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="contact-inner">
				<div class="contact-inner">
					<h4 class="text-right">
						'.$data['bulan']->jumlah_bulan.'
					</h4>
					<span><strong>Jumlah Transaksi</strong></span>
				</div>
			</div>
		</div>
		</a>
		<a style="color:black" href="'.base_url('laporan_manager').'">
		<div style="margin-bottom: 30px;" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="contact-inner">
				<div class="contact-inner">
					<h4 class="text-right">
						'.rupiah($untung_bulan).'
					</h4>
					<span><strong>Pemasukan</strong></span>
				</div>
			</div>
		</div>
		</a>

		<a style="color:black" href="'.base_url('pengeluaran_lain').'">
		<div style="margin-bottom: 30px;" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="contact-inner">
				<div class="contact-inner">
					<h4 class="text-right">
						'.rupiah($pengeluaran_bulan).'
					</h4>
					<span><strong>Pengeluaran</strong></span>
				</div>
			</div>
		</div>
		</a>
		<a style="color:black" href="'.base_url('laporan_manager').'">
			<div style="margin-bottom: 30px;" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="contact-inner">
					<div class="contact-inner">
						<h4 class="text-right">
							'.rupiah($untung_bulan - $pengeluaran_bulan).'
						</h4>
						<span><strong>Keuntungan Bersih</strong></span>
					</div>
				</div>
			</div>
		</a>';
		}
    }
}
