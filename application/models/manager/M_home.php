<?php

class M_home extends CI_Model
{
    function count_kasir()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COUNT(*) as jumlah_kasir FROM user WHERE jenis_akses ='Kasir' AND id_toko='$id_toko'")->row();
    }
    function count_jenis_barang()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(sum(tabel.jumlah_barang),0) AS jenis_barang
        FROM (
        SELECT COUNT(DISTINCT kode) AS jumlah_barang FROM stok_barang JOIN barang_terdaftar USING(kode) JOIN pemasokan
        USING(id_pemasokan) JOIN user USING(id_user) JOIN toko USING (id_toko) WHERE id_toko ='$id_toko' GROUP BY kode
        ) AS tabel")->row();
    }
    function count_stok_habis()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COUNT(*) AS jumlah_habis,id_toko FROM `barang_habis_toko` WHERE id_toko = '$id_toko'")->row();
    }
    function count_penjualan_hari()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COUNT(*) AS jumlah_hari,tanggal,id_toko FROM penjualan JOIN user USING(id_user)
        JOIN toko USING(id_toko) WHERE DATE(tanggal) = DATE(now()) AND id_toko='$id_toko'")->row();
    }
    function count_penjualan_bulan()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COUNT(*) AS jumlah_bulan,tanggal,id_toko FROM penjualan JOIN user USING(id_user)
        JOIN toko USING(id_toko) WHERE MONTH(tanggal) = MONTH(CURDATE()) AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko='$id_toko'")->row();
    }
    function keuntungan_hari()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(hrg_distributor* detail_penjualan.qty),0) AS
        harga_beli_barang,COALESCE(SUM(harga_jual*detail_penjualan.qty),0) AS harga_jual_barang,id_toko,tanggal FROM
        detail_penjualan JOIN stok_barang USING(id_stok_b) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user)
        JOIN toko USING(id_toko) WHERE DATE(tanggal) = DATE(now()) AND id_toko='$id_toko'")->row();
    }
    function keuntungan_bulan()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(hrg_distributor* detail_penjualan.qty),0) AS
        harga_beli_barang,COALESCE(SUM(harga_jual*detail_penjualan.qty),0) AS harga_jual_barang,id_toko,tanggal FROM
        detail_penjualan JOIN stok_barang USING(id_stok_b) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user)
        JOIN toko USING(id_toko) WHERE MONTH(tanggal) = MONTH(CURDATE()) AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko='$id_toko'")->row();
    }
    function pengeluaran_lain_hari()
    {
        // Jika Isi coloum == null REPLACE menjadi 0
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(total),0) as total_pengeluaran,id_toko FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE DATE(tanggal) = DATE(now()) AND id_toko='$id_toko'")->row();
    }
    function pengeluaran_lain_bulan()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(total),0) as total_pengeluaran,id_toko FROM pengeluaran_lain JOIN
        user USING(id_user) JOIN toko USING(id_toko) WHERE MONTH(tanggal) = MONTH(CURDATE()) AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko='$id_toko'")->row();
    }
    function pengeluaran_bulan_1()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(total),0) as total_pengeluaran FROM pengeluaran_lain JOIN user
        USING(id_user) JOIN toko USING(id_toko) WHERE MONTH(tanggal) = 01 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function pengeluaran_bulan_2()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(total),0) as total_pengeluaran FROM pengeluaran_lain JOIN user
        USING(id_user) JOIN toko USING(id_toko) WHERE MONTH(tanggal) = 02 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function pengeluaran_bulan_3()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(total),0) as total_pengeluaran FROM pengeluaran_lain JOIN user
        USING(id_user) JOIN toko USING(id_toko) WHERE MONTH(tanggal) = 03 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function pengeluaran_bulan_4()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(total),0) as total_pengeluaran FROM pengeluaran_lain JOIN user
        USING(id_user) JOIN toko USING(id_toko) WHERE MONTH(tanggal) = 04 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function pengeluaran_bulan_5()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(total),0) as total_pengeluaran FROM pengeluaran_lain JOIN user
        USING(id_user) JOIN toko USING(id_toko) WHERE MONTH(tanggal) = 05 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function pengeluaran_bulan_6()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(total),0) as total_pengeluaran FROM pengeluaran_lain JOIN user
        USING(id_user) JOIN toko USING(id_toko) WHERE MONTH(tanggal) = 06 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function pengeluaran_bulan_7()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(total),0) as total_pengeluaran FROM pengeluaran_lain JOIN user
        USING(id_user) JOIN toko USING(id_toko) WHERE MONTH(tanggal) = 07 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function pengeluaran_bulan_8()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(total),0) as total_pengeluaran FROM pengeluaran_lain JOIN user
        USING(id_user) JOIN toko USING(id_toko) WHERE MONTH(tanggal) = 08 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function pengeluaran_bulan_9()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(total),0) as total_pengeluaran FROM pengeluaran_lain JOIN user
        USING(id_user) JOIN toko USING(id_toko) WHERE MONTH(tanggal) = 09 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function pengeluaran_bulan_10()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(total),0) as total_pengeluaran FROM pengeluaran_lain JOIN user
        USING(id_user) JOIN toko USING(id_toko) WHERE MONTH(tanggal) = 10 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function pengeluaran_bulan_11()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(total),0) as total_pengeluaran FROM pengeluaran_lain JOIN user
        USING(id_user) JOIN toko USING(id_toko) WHERE MONTH(tanggal) = 11 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function pengeluaran_bulan_12()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(total),0) as total_pengeluaran FROM pengeluaran_lain JOIN user
        USING(id_user) JOIN toko USING(id_toko) WHERE MONTH(tanggal) = 12 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function keuntungan_bulan_1()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(hrg_distributor* detail_penjualan.qty),0) AS
        harga_beli_barang,COALESCE(SUM(harga_jual*detail_penjualan.qty),0) AS harga_jual_barang FROM detail_penjualan JOIN
        stok_barang USING(id_stok_b) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko
        USING(id_toko) WHERE MONTH(tanggal) = 01 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function keuntungan_bulan_2()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(hrg_distributor* detail_penjualan.qty),0) AS
        harga_beli_barang,COALESCE(SUM(harga_jual*detail_penjualan.qty),0) AS harga_jual_barang FROM detail_penjualan JOIN
        stok_barang USING(id_stok_b) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko
        USING(id_toko) WHERE MONTH(tanggal) = 02 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function keuntungan_bulan_3()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(hrg_distributor* detail_penjualan.qty),0) AS
        harga_beli_barang,COALESCE(SUM(harga_jual*detail_penjualan.qty),0) AS harga_jual_barang FROM detail_penjualan JOIN
        stok_barang USING(id_stok_b) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko
        USING(id_toko) WHERE MONTH(tanggal) = 03 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function keuntungan_bulan_4()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(hrg_distributor* detail_penjualan.qty),0) AS
        harga_beli_barang,COALESCE(SUM(harga_jual*detail_penjualan.qty),0) AS harga_jual_barang FROM detail_penjualan JOIN
        stok_barang USING(id_stok_b) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko
        USING(id_toko) WHERE MONTH(tanggal) = 04 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function keuntungan_bulan_5()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(hrg_distributor* detail_penjualan.qty),0) AS
        harga_beli_barang,COALESCE(SUM(harga_jual*detail_penjualan.qty),0) AS harga_jual_barang FROM detail_penjualan JOIN
        stok_barang USING(id_stok_b) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko
        USING(id_toko) WHERE MONTH(tanggal) = 05 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function keuntungan_bulan_6()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(hrg_distributor* detail_penjualan.qty),0) AS
        harga_beli_barang,COALESCE(SUM(harga_jual*detail_penjualan.qty),0) AS harga_jual_barang FROM detail_penjualan JOIN
        stok_barang USING(id_stok_b) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko
        USING(id_toko) WHERE MONTH(tanggal) = 06 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function keuntungan_bulan_7()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(hrg_distributor* detail_penjualan.qty),0) AS
        harga_beli_barang,COALESCE(SUM(harga_jual*detail_penjualan.qty),0) AS harga_jual_barang FROM detail_penjualan JOIN
        stok_barang USING(id_stok_b) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko
        USING(id_toko) WHERE MONTH(tanggal) = 07 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function keuntungan_bulan_8()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(hrg_distributor* detail_penjualan.qty),0) AS
        harga_beli_barang,COALESCE(SUM(harga_jual*detail_penjualan.qty),0) AS harga_jual_barang FROM detail_penjualan JOIN
        stok_barang USING(id_stok_b) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko
        USING(id_toko) WHERE MONTH(tanggal) = 08 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function keuntungan_bulan_9()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(hrg_distributor* detail_penjualan.qty),0) AS
        harga_beli_barang,COALESCE(SUM(harga_jual*detail_penjualan.qty),0) AS harga_jual_barang FROM detail_penjualan JOIN
        stok_barang USING(id_stok_b) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko
        USING(id_toko) WHERE MONTH(tanggal) = 09 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function keuntungan_bulan_10()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(hrg_distributor* detail_penjualan.qty),0) AS
        harga_beli_barang,COALESCE(SUM(harga_jual*detail_penjualan.qty),0) AS harga_jual_barang FROM detail_penjualan JOIN
        stok_barang USING(id_stok_b) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko
        USING(id_toko) WHERE MONTH(tanggal) = 10 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function keuntungan_bulan_11()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(hrg_distributor* detail_penjualan.qty),0) AS
        harga_beli_barang,COALESCE(SUM(harga_jual*detail_penjualan.qty),0) AS harga_jual_barang FROM detail_penjualan JOIN
        stok_barang USING(id_stok_b) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko
        USING(id_toko) WHERE MONTH(tanggal) = 11 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
    function keuntungan_bulan_12()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COALESCE(SUM(hrg_distributor* detail_penjualan.qty),0) AS
        harga_beli_barang,COALESCE(SUM(harga_jual*detail_penjualan.qty),0) AS harga_jual_barang FROM detail_penjualan JOIN
        stok_barang USING(id_stok_b) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko
        USING(id_toko) WHERE MONTH(tanggal) = 12 AND YEAR(tanggal) =
        YEAR(CURDATE()) AND id_toko ='$id_toko'")->row();
    }
}
