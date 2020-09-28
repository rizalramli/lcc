<?php

class M_barcode extends CI_Model
{
	function barang_toko_barcode()
	{
		$id_toko = $this->session->userdata('id_toko');
		return $this->db->order_by('id_stok_b', 'DESC')->get_where('barang_toko_barcode', array(
			'id_toko' => $id_toko
		));
	}
	function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
}
