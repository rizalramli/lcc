<?php 
/**
  * 
  */
class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('id_user')){
            redirect('/');
        }
        else if($this->session->userdata('akses') != 'Pimpinan')
        {
            redirect('login/logout');
        }
        $this->load->model('pimpinan/M_home');
    }
    function index(){
        // Load Toko
        $data['data_toko'] = $this->M_home->tampil_toko();

        // Jumlah Aset LCC
        $barang_lcc = $this->M_home->barang_lcc();
        $aset_lcc = 0;
        foreach($barang_lcc as $row_lcc)
        {
            $total_lcc = $row_lcc->hrg_distributor * $row_lcc->stok;
            $aset_lcc += $total_lcc;
        }
        $data['aset_lcc'] = $aset_lcc;

        // Jumlah Aset CMC
        $barang_cmc = $this->M_home->barang_cmc();
        $aset_cmc = 0;
        foreach($barang_cmc as $row_cmc)
        {
        $total_cmc = $row_cmc->hrg_distributor * $row_cmc->stok;
        $aset_cmc += $total_cmc;
        }
        $data['aset_cmc'] = $aset_cmc;

        // Jumlah Asset Probolinggo
        $barang_probolinggo = $this->M_home->barang_probolinggo();
        $aset_probolinggo = 0;
        foreach($barang_probolinggo as $row_probolinggo)
        {
        $total_probolinggo = $row_probolinggo->hrg_distributor * $row_probolinggo->stok;
        $aset_probolinggo += $total_probolinggo;
        }
        $data['aset_probolinggo'] = $aset_probolinggo;

        
        // TUTUP KEUNTUNGAN TOKO PROBOLINGGO
        $this->template->load('view_1/template/pimpinan', 'view_1/konten/pimpinan/home/tampil',$data);
    }
    function tampil()
    {
        $select_toko = $this->input->post('toko');
        $select_tanggal = $this->input->post('tanggal');
        // KEUNTUNGAN SEMUA TOKO
        // Keuntungan semua toko per hari
        $data['keuntungan_semua_hari'] = $this->M_home->keuntungan_semua_hari();
        $pemasukan_semua_hari = $data['keuntungan_semua_hari']->harga_jual_barang -
        $data['keuntungan_semua_hari']->harga_beli_barang;
        // Keuntungan semua toko per bulan
        $data['keuntungan_semua_bulan'] = $this->M_home->keuntungan_semua_bulan();
        $pemasukan_semua_bulan = $data['keuntungan_semua_bulan']->harga_jual_barang -
        $data['keuntungan_semua_bulan']->harga_beli_barang;
        // TUTUP KEUNTUNGAN SEMUA TOKO

        // KEUNTUNGAN TOKO LCC
        // Keuntungan TOKO LCC per hari
        $data['keuntungan_lcc_hari'] = $this->M_home->keuntungan_lcc_hari();
        $pemasukan_lcc_hari = $data['keuntungan_lcc_hari']->harga_jual_barang -
        $data['keuntungan_lcc_hari']->harga_beli_barang;
        // Keuntungan TOKO LCC per bulan
        $data['keuntungan_lcc_bulan'] = $this->M_home->keuntungan_lcc_bulan();
        $pemasukan_lcc_bulan = $data['keuntungan_lcc_bulan']->harga_jual_barang -
        $data['keuntungan_lcc_bulan']->harga_beli_barang;
        // TUTUP KEUNTUNGAN TOKO LCC

        // KEUNTUNGAN TOKO CMC
        // Keuntungan TOKO CMC per hari
        $data['keuntungan_cmc_hari'] = $this->M_home->keuntungan_cmc_hari();
        $pemasukan_cmc_hari = $data['keuntungan_cmc_hari']->harga_jual_barang -
        $data['keuntungan_cmc_hari']->harga_beli_barang;
        // Keuntungan TOKO CMC per bulan
        $data['keuntungan_cmc_bulan'] = $this->M_home->keuntungan_cmc_bulan();
        $pemasukan_cmc_bulan = $data['keuntungan_cmc_bulan']->harga_jual_barang -
        $data['keuntungan_cmc_bulan']->harga_beli_barang;
        // TUTUP KEUNTUNGAN TOKO CMC

        // KEUNTUNGAN TOKO PROBOLINGGO
        // Keuntungan TOKO PROBOLINGGO per hari
        $data['keuntungan_probolinggo_hari'] = $this->M_home->keuntungan_probolinggo_hari();
        $pemasukan_probolinggo_hari = $data['keuntungan_probolinggo_hari']->harga_jual_barang -
        $data['keuntungan_probolinggo_hari']->harga_beli_barang;
        // Keuntungan TOKO PROBOLINGGO per bulan
        $data['keuntungan_probolinggo_bulan'] = $this->M_home->keuntungan_probolinggo_bulan();
        $pemasukan_probolinggo_bulan = $data['keuntungan_probolinggo_bulan']->harga_jual_barang -
        $data['keuntungan_probolinggo_bulan']->harga_beli_barang;
        // TUTUP KEUNTUNGAN PROBOLINGGO

        // PENGELUARAN SEMUA TOKO
        // PER HARI
        $data['pengeluaran_semua_hari'] = $this->M_home->pengeluaran_semua_hari();
        $pengeluaran_semua_hari = $data['pengeluaran_semua_hari']->total_pengeluaran;
        // PER BULAN
        $data['pengeluaran_semua_bulan'] = $this->M_home->pengeluaran_semua_bulan();
        $pengeluaran_semua_bulan = $data['pengeluaran_semua_bulan']->total_pengeluaran;
        // TUTUP PENGELUARAN SEMUA TOKO

        // PENGELUARAN TOKO LCC
        // PER HARI
        $data['pengeluaran_lcc_hari'] = $this->M_home->pengeluaran_lcc_hari();
        $pengeluaran_lcc_hari = $data['pengeluaran_lcc_hari']->total_pengeluaran;
        // PER BULAN
        $data['pengeluaran_lcc_bulan'] = $this->M_home->pengeluaran_lcc_bulan();
        $pengeluaran_lcc_bulan = $data['pengeluaran_lcc_bulan']->total_pengeluaran;
        // TUTUP PENGELUARAN LCC

        // PENGELUARAN TOKO CMC
        // PER HARI
        $data['pengeluaran_cmc_hari'] = $this->M_home->pengeluaran_cmc_hari();
        $pengeluaran_cmc_hari = $data['pengeluaran_cmc_hari']->total_pengeluaran;
        // PER BULAN
        $data['pengeluaran_cmc_bulan'] = $this->M_home->pengeluaran_cmc_bulan();
        $pengeluaran_cmc_bulan = $data['pengeluaran_cmc_bulan']->total_pengeluaran;
        // TUTUP PENGELUARAN CMC

        // PENGELUARAN TOKO PROBOLINGGO
        // PER HARI
        $data['pengeluaran_probolinggo_hari'] = $this->M_home->pengeluaran_probolinggo_hari();
        $pengeluaran_probolinggo_hari = $data['pengeluaran_probolinggo_hari']->total_pengeluaran;
        // PER BULAN
        $data['pengeluaran_probolinggo_bulan'] = $this->M_home->pengeluaran_probolinggo_bulan();
        $pengeluaran_probolinggo_bulan = $data['pengeluaran_probolinggo_bulan']->total_pengeluaran;
        // TUTUP PENGELUARAN PROBOLINGGO

        if($select_toko == "semua" && $select_tanggal == "hari")
        {
            echo '<div class="row">
                <div style="margin-bottom:16px;" class="col-md-6">
                    <div class="contact-inner" style="height:135px">
                        <h3 class="text-right">
                            '.rupiah($pemasukan_semua_hari).'
                        </h3>
                        <span><strong>Pemasukan</strong></span>
                    </div>
                </div>
                <div style="margin-bottom:16px;" class="col-md-6">
                    <div class="contact-inner" style="height:135px">
                        <h3 class="text-right">
                            '.rupiah($pengeluaran_semua_hari).'
                        </h3>
                        <span><strong>Pengeluaran</strong></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-inner" style="height:135px">
                        <h2 class="text-right">
                            '.rupiah($pemasukan_semua_hari - $pengeluaran_semua_hari).'        </h2>
                        <span><strong>Keuntungan Bersih</strong></span>
                    </div>
                </div>
            </div>
            ';
        }
        else if($select_toko == "semua" && $select_tanggal == "bulan")
        {
            echo '<div class="row">
                <div style="margin-bottom:16px;" class="col-md-6">
                    <div class="contact-inner" style="height:135px">
                        <h3 class="text-right">
                            '.rupiah($pemasukan_semua_bulan).'
                        </h3>
                        <span><strong>Pemasukan</strong></span>
                    </div>
                </div>
                <div style="margin-bottom:16px;" class="col-md-6">
                    <div class="contact-inner" style="height:135px">
                        <h3 class="text-right">
                            '.rupiah($pengeluaran_semua_bulan).'
                        </h3>
                        <span><strong>Pengeluaran</strong></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-inner" style="height:135px">
                        <h2 class="text-right">
                            '.rupiah($pemasukan_semua_bulan - $pengeluaran_semua_bulan).'                            
                        </h2>
                        <span><strong>Keuntungan Bersih</strong></span>
                    </div>
                </div>
            </div>';
        }
        else if($select_toko == "T1" && $select_tanggal=="hari")
        {
            echo '<div class="row">
                <div style="margin-bottom:16px;" class="col-md-6">
                    <div class="contact-inner" style="height:135px">
                        <h3 class="text-right">
                            '.rupiah($pemasukan_lcc_hari).'
                        </h3>
                        <span><strong>Pemasukan</strong></span>
                    </div>
                </div>
                <div style="margin-bottom:16px;" class="col-md-6">
                    <div class="contact-inner" style="height:135px">
                        <h3 class="text-right">
                            '.rupiah($pengeluaran_lcc_hari).'
                        </h3>
                        <span><strong>Pengeluaran</strong></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-inner" style="height:135px">
                        <h2 class="text-right">
                            '.rupiah($pemasukan_lcc_hari - $pengeluaran_lcc_hari).'                            
                        </h2>
                        <span><strong>Keuntungan Bersih</strong></span>
                    </div>
                </div>
            </div>';
        }
        else if($select_toko == "T1" && $select_tanggal=="bulan")
        {
            echo '<div class="row">
                <div style="margin-bottom:16px;" class="col-md-6">
                    <div class="contact-inner" style="height:135px">
                        <h3 class="text-right">
                            '.rupiah($pemasukan_lcc_bulan).'
                        </h3>
                        <span><strong>Pemasukan</strong></span>
                    </div>
                </div>
                <div style="margin-bottom:16px;" class="col-md-6">
                    <div class="contact-inner" style="height:135px">
                        <h3 class="text-right">
                            '.rupiah($pengeluaran_lcc_bulan).'
                        </h3>
                        <span><strong>Pengeluaran</strong></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-inner" style="height:135px">
                        <h2 class="text-right">
                            '.rupiah($pemasukan_lcc_bulan - $pengeluaran_lcc_bulan).'                            
                        </h2>
                        <span><strong>Keuntungan Bersih</strong></span>
                    </div>
                </div>
            </div>';
        }
        else if($select_toko == "T2" && $select_tanggal=="hari")
        {
            echo '<div class="row">
                <div style="margin-bottom:16px;" class="col-md-6">
                    <div class="contact-inner" style="height:135px">
                        <h3 class="text-right">
                            '.rupiah($pemasukan_cmc_hari).'
                        </h3>
                        <span><strong>Pemasukan</strong></span>
                    </div>
                </div>
                <div style="margin-bottom:16px;" class="col-md-6">
                    <div class="contact-inner" style="height:135px">
                        <h3 class="text-right">
                            '.rupiah($pengeluaran_cmc_hari).'
                        </h3>
                        <span><strong>Pengeluaran</strong></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-inner" style="height:135px">
                        <h2 class="text-right">
                            '.rupiah($pemasukan_cmc_hari - $pengeluaran_cmc_hari).'                            
                        </h2>
                        <span><strong>Keuntungan Bersih</strong></span>
                    </div>
                </div>
            </div>';
        }
        else if($select_toko == "T2" && $select_tanggal=="bulan")
        {
            echo '<div class="row">
                <div style="margin-bottom:16px;" class="col-md-6">
                    <div class="contact-inner" style="height:135px">
                        <h3 class="text-right">
                            '.rupiah($pemasukan_cmc_bulan).'
                        </h3>
                        <span><strong>Pemasukan</strong></span>
                    </div>
                </div>
                <div style="margin-bottom:16px;" class="col-md-6">
                    <div class="contact-inner" style="height:135px">
                        <h3 class="text-right">
                            '.rupiah($pengeluaran_cmc_bulan).'
                        </h3>
                        <span><strong>Pengeluaran</strong></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-inner" style="height:135px">
                        <h2 class="text-right">
                            '.rupiah($pemasukan_cmc_bulan - $pengeluaran_cmc_bulan).'                            
                        </h2>
                        <span><strong>Keuntungan Bersih</strong></span>
                    </div>
                </div>
            </div>';
        }
        else if($select_toko == "T3" && $select_tanggal=="hari")
        {
            echo '<div class="row">
                <div style="margin-bottom:16px;" class="col-md-6">
                    <div class="contact-inner" style="height:135px">
                        <h3 class="text-right">
                            '.rupiah($pemasukan_probolinggo_hari).'
                        </h3>
                        <span><strong>Pemasukan</strong></span>
                    </div>
                </div>
                <div style="margin-bottom:16px;" class="col-md-6">
                    <div class="contact-inner" style="height:135px">
                        <h3 class="text-right">
                            '.rupiah($pengeluaran_probolinggo_hari).'
                        </h3>
                        <span><strong>Pengeluaran</strong></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-inner" style="height:135px">
                        <h2 class="text-right">
                            '.rupiah($pemasukan_probolinggo_hari - $pengeluaran_probolinggo_hari).'                            
                        </h2>
                        <span><strong>Keuntungan Bersih</strong></span>
                    </div>
                </div>
            </div>';
        }
        else if($select_toko == "T3" && $select_tanggal=="bulan")
        {
            echo '<div class="row">
                <div style="margin-bottom:16px;" class="col-md-6">
                    <div class="contact-inner" style="height:135px">
                        <h3 class="text-right">
                            '.rupiah($pemasukan_probolinggo_bulan).'
                        </h3>
                        <span><strong>Pemasukan</strong></span>
                    </div>
                </div>
                <div style="margin-bottom:16px;" class="col-md-6">
                    <div class="contact-inner" style="height:135px">
                        <h3 class="text-right">
                            '.rupiah($pengeluaran_probolinggo_bulan).'
                        </h3>
                        <span><strong>Pengeluaran</strong></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-inner" style="height:135px">
                        <h2 class="text-right">
                            '.rupiah($pemasukan_probolinggo_bulan - $pengeluaran_probolinggo_bulan).'                            
                        </h2>
                        <span><strong>Keuntungan Bersih</strong></span>
                    </div>
                </div>
            </div>';
        }
    }
} 
