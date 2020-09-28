<?php 
 
class M_pengeluaran extends CI_Model
{
    function tampil_toko()
    {
        return $this->db->get("toko")->result();
    }

    // Pengeluaran Lain Lain SEMUA TOKO
    function pengeluaran_semua_hari()
    {
        return $this->db->query("SELECT nama_user,deskripsi,tanggal,total,id_toko FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE
        DATE(tanggal) = DATE(now()) ORDER BY tanggal DESC")->result();
    }
    function pengeluaran_semua_bulan()
    {
        return $this->db->query("SELECT nama_user,deskripsi,tanggal,total,id_toko FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE
        MONTH(tanggal) = MONTH(CURRENT_DATE()) ORDER BY tanggal DESC")->result();
    }
    // TUTUP Semua

    // Pengeluaran Lain Lain LCC 
    function pengeluaran_lcc_hari()
    {
        return $this->db->query("SELECT nama_user,deskripsi,tanggal,total,id_toko FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE DATE(tanggal) = DATE(now()) AND id_toko='T1' ORDER BY tanggal DESC")->result();
    }
    function pengeluaran_lcc_bulan()
    {
        return $this->db->query("SELECT nama_user,deskripsi,tanggal,total,id_toko FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE MONTH(tanggal) = MONTH(CURRENT_DATE()) AND id_toko='T1' ORDER BY tanggal DESC")->result();
    }
    // TUTUP LCC

    // Pengeluaran LAIN LAIN CMC
    function pengeluaran_cmc_hari()
    {
        return $this->db->query("SELECT nama_user,deskripsi,tanggal,total,id_toko FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE
        DATE(tanggal) = DATE(now()) AND id_toko='T2' ORDER BY tanggal DESC")->result();
    }
    function pengeluaran_cmc_bulan()
    {
        return $this->db->query("SELECT nama_user,deskripsi,tanggal,total,id_toko FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE
        MONTH(tanggal) = MONTH(CURRENT_DATE()) AND id_toko='T2' ORDER BY tanggal DESC")->result();
    }
    // TUTUP CMC

    // Pengeluaran LAIN LAIN PROBOLINGGO
    function pengeluaran_probolinggo_hari()
    {
        return $this->db->query("SELECT nama_user,deskripsi,tanggal,total,id_toko FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE
        DATE(tanggal) = DATE(now()) AND id_toko='T3' ORDER BY tanggal DESC")->result();
    }
    function pengeluaran_probolinggo_bulan()
    {
        return $this->db->query("SELECT nama_user,deskripsi,tanggal,total,id_toko FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE
        MONTH(tanggal) = MONTH(CURRENT_DATE()) AND id_toko='T3' ORDER BY tanggal DESC")->result();
    }
    // TUTUP PROBOLINGGO


}
