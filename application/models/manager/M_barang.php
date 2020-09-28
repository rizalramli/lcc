<?php 
 
class M_barang extends CI_Model
{
	function data_barang()
	{
        // Nanti didapat dari session
		$id_toko = $this->session->userdata('id_toko');
		return $this->db->query("SELECT kode,id_stok_b,qty,kode_unik,barang_terdaftar.nama AS nama_barang,id_toko,hrg_distributor,tanggal,distributor.nama AS nama_distributor FROM stok_barang JOIN barang_terdaftar USING(kode) JOIN pemasokan
		USING(id_pemasokan) JOIN distributor USING(id_distributor) JOIN user USING(id_user) JOIN toko USING (id_toko) WHERE id_toko='$id_toko' AND qty > 0");
	}
	function stok_habis()
	{
		$id_toko = $this->session->userdata('id_toko');
		return $this->db->get_where('barang_habis_toko', array(
		'id_toko' => $id_toko,
		'stok <=' => '2'
		));
	}
	function best_sell_minggu()
	{
		$id_toko = $this->session->userdata('id_toko');
		$limit = 10;
		return $this->db->get_where('best_sell_minggu', array(
		'id_toko' => $id_toko),$limit);
	}
	function best_sell_bulan()
	{
		$id_toko = $this->session->userdata('id_toko');
		$limit = 10;
		return $this->db->get_where('best_sell_bulan', array(
		'id_toko' => $id_toko),$limit);
	}
	function best_sell_tahun()
	{
		$id_toko = $this->session->userdata('id_toko');
		$limit = 10;
		return $this->db->get_where('best_sell_tahun', array(
		'id_toko' => $id_toko),$limit);
	}
}
