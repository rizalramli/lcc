<?php
class Barcode extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_user')) {
            redirect('/');
        } else if ($this->session->userdata('akses') != 'Manager') {
            redirect('login/logout');
        }
        $this->load->model('manager/M_barcode');
    }
    public function index()
    {
        $data['record'] = $this->M_barcode->barang_toko_barcode()->result();
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/barcode/tampil', $data);
    }
    public function print_barcode($id)
    {
        $where = array('kode_unik' => $id);
        $data['row'] = $this->M_barcode->edit_data($where, 'barang_toko_barcode')->row();
        $html = $this->load->view('view_1/konten/manager/barcode/print', $data, true);
        $this->dompdf->PdfGenerator($html, 'Barcode-' . $data['row']->nama_barang, 'A4', 'landscape');
    }
}
