<?php
class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('id_user')){
            redirect('/');
        }
        else if($this->session->userdata('akses') != 'Manager')
        {
            redirect('login/logout');
        }
        $this->load->model('manager/M_barang');
    }
    public function index()
    {
        $data['record'] = $this->M_barang->data_barang()->result();
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/barang/daftar_barang',$data);
    }
    public function stok_habis()
    {
        $data['record'] = $this->M_barang->stok_habis()->result();
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/barang/stok_habis',$data);
        
    }
    public function barang_terlaris()
    {
        $data['record_minggu'] = $this->M_barang->best_sell_minggu()->result();
        $data['record_bulan'] = $this->M_barang->best_sell_bulan()->result();
        $data['record_tahun'] = $this->M_barang->best_sell_tahun()->result();
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/barang/barang_terlaris',$data);
    }
}
