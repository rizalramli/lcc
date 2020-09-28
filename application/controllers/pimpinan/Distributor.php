<?php

/**
 * 
 */
class Distributor extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect('/');
		} else if ($this->session->userdata('akses') != 'Pimpinan') {
			redirect('login/logout');
		}
		$this->load->model('kasir/M_distributor');
	}
	function index()
	{
		$data['distributor'] = $this->M_distributor->tampil();
		$this->template->load('view_1/template/pimpinan', 'view_1/konten/pimpinan/distributor/tampil', $data);
	}
	function insert()
	{
		$this->template->load('view_1/template/pimpinan', 'view_1/konten/pimpinan/distributor/input');
	}
	function insert_data()
	{
		$kode = $this->M_distributor->get_no();
		$no_hp = str_replace("-", "", $this->input->post('no_hp'));
		$data = array(
			'id_distributor' => $kode,
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $no_hp
		);
		$input = $this->M_distributor->input($data);
		redirect("pimpinan/distributor");
	}
	function edit($id)
	{
		$where = array('id_distributor' => $id);
		$data['distributor'] = $this->M_distributor->edit($where, 'distributor');
		$this->template->load('view_1/template/pimpinan', 'view_1/konten/pimpinan/distributor/edit', $data);
	}
	function update()
	{
		$no_hp = str_replace("-", "", $this->input->post('no_hp'));
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$id_distributor = $this->input->post('id_distributor');
		$data = array(
			'nama'  => $nama,
			'alamat' => $alamat,
			'no_hp' => $no_hp
		);
		$where = array(
			'id_distributor' => $id_distributor
		);
		$this->M_distributor->update($where, $data, 'distributor');
		redirect('pimpinan/distributor');
		
	}
	function hapus($id)
	{
		$where = array('id_distributor' => $id);
		$this->M_distributor->hapus_data($where, 'distributor');
		redirect('distributor');
	}
}
