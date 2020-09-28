<?php 
/**
 * 
 */
class M_laporan extends CI_Model
{
	
	function tampil_toko()
	{
		return $this->db->get("toko")->result();
    }
    function semua_tampil_hari()
    {
        $query = $this->db->query("SELECT barang_terdaftar.nama AS nama_barang,customer.nama AS
        nama_customer,penjualan.tanggal AS tanggal_penjualan,detail_penjualan.qty AS
        jumlah_barang,harga_jual,detail_penjualan.total_hrg AS total_harga,id_toko,hrg_distributor FROM detail_penjualan JOIN stok_barang USING(id_stok_b) JOIN barang_terdaftar USING(kode) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko USING(id_toko)JOIN customer USING(id_customer) WHERE DATE(penjualan.tanggal) = DATE(now())");
        return $query;
    }
    function semua_tampil_bulan()
    {
        $query = $this->db->query("SELECT barang_terdaftar.nama AS nama_barang,customer.nama AS
        nama_customer,penjualan.tanggal AS tanggal_penjualan,detail_penjualan.qty AS
        jumlah_barang,harga_jual,detail_penjualan.total_hrg AS total_harga,id_toko,hrg_distributor FROM detail_penjualan JOIN stok_barang USING(id_stok_b) JOIN barang_terdaftar USING(kode) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko USING(id_toko)JOIN customer USING(id_customer) WHERE MONTH(penjualan.tanggal) = MONTH(CURRENT_DATE())");
        return $query;
    }
    function lcc_tampil_hari()
    {
        $query = $this->db->query("SELECT barang_terdaftar.nama AS nama_barang,customer.nama AS
        nama_customer,penjualan.tanggal AS tanggal_penjualan,detail_penjualan.qty AS
        jumlah_barang,harga_jual,detail_penjualan.total_hrg AS total_harga,id_toko,hrg_distributor FROM detail_penjualan JOIN stok_barang USING(id_stok_b) JOIN barang_terdaftar USING(kode) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko USING(id_toko)JOIN customer USING(id_customer) WHERE DATE(penjualan.tanggal) = DATE(now()) AND id_toko='T1'");
        return $query;
    }
    function lcc_tampil_bulan()
    {
        $query = $this->db->query("SELECT barang_terdaftar.nama AS nama_barang,customer.nama AS
        nama_customer,penjualan.tanggal AS tanggal_penjualan,detail_penjualan.qty AS
        jumlah_barang,harga_jual,detail_penjualan.total_hrg AS total_harga,id_toko,hrg_distributor FROM detail_penjualan JOIN stok_barang USING(id_stok_b) JOIN barang_terdaftar USING(kode) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko USING(id_toko)JOIN customer USING(id_customer) WHERE MONTH(penjualan.tanggal) = MONTH(CURRENT_DATE()) AND id_toko='T1'");
        return $query;
    }
    function cmc_tampil_hari()
    {
        $query = $this->db->query("SELECT barang_terdaftar.nama AS nama_barang,customer.nama AS
        nama_customer,penjualan.tanggal AS tanggal_penjualan,detail_penjualan.qty AS
        jumlah_barang,harga_jual,detail_penjualan.total_hrg AS total_harga,id_toko,hrg_distributor FROM detail_penjualan JOIN stok_barang USING(id_stok_b) JOIN barang_terdaftar USING(kode) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko USING(id_toko)JOIN customer USING(id_customer) WHERE DATE(penjualan.tanggal) = DATE(now()) AND id_toko='T2'");
        return $query;
    }
    function cmc_tampil_bulan()
    {
        $query = $this->db->query("SELECT barang_terdaftar.nama AS nama_barang,customer.nama AS
        nama_customer,penjualan.tanggal AS tanggal_penjualan,detail_penjualan.qty AS
        jumlah_barang,harga_jual,detail_penjualan.total_hrg AS total_harga,id_toko,hrg_distributor FROM detail_penjualan JOIN stok_barang USING(id_stok_b) JOIN barang_terdaftar USING(kode) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko USING(id_toko)JOIN customer USING(id_customer) WHERE MONTH(penjualan.tanggal) = MONTH(CURRENT_DATE()) AND id_toko='T2'");
        return $query;
    }
    function probolinggo_tampil_hari()
    {
        $query = $this->db->query("SELECT barang_terdaftar.nama AS nama_barang,customer.nama AS
        nama_customer,penjualan.tanggal AS tanggal_penjualan,detail_penjualan.qty AS
        jumlah_barang,harga_jual,detail_penjualan.total_hrg AS total_harga,id_toko,hrg_distributor FROM detail_penjualan JOIN stok_barang USING(id_stok_b) JOIN barang_terdaftar USING(kode) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko USING(id_toko)JOIN customer USING(id_customer) WHERE DATE(penjualan.tanggal) = DATE(now()) AND id_toko='T3'");
        return $query;
    }
    function probolinggo_tampil_bulan()
    {
        $query = $this->db->query("SELECT barang_terdaftar.nama AS nama_barang,customer.nama AS
        nama_customer,penjualan.tanggal AS tanggal_penjualan,detail_penjualan.qty AS
        jumlah_barang,harga_jual,detail_penjualan.total_hrg AS total_harga,id_toko,hrg_distributor FROM detail_penjualan JOIN stok_barang USING(id_stok_b) JOIN barang_terdaftar USING(kode) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko USING(id_toko)JOIN customer USING(id_customer) WHERE MONTH(penjualan.tanggal) = MONTH(CURRENT_DATE()) AND id_toko='T3'");
        return $query;
    }
}
