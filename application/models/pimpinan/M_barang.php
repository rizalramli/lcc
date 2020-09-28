<?php

class M_barang extends CI_Model
{
    function tampil_toko()
    {
        return $this->db->get("toko")->result();
    }
    function data_barang()
    {
        // Nanti didapat dari session
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->get_where('barang_toko', array(
            'id_toko' => $id_toko,
            'qty >' => '0'
        ));
    }
    function stok_habis_lcc()
    {
        return $this->db->get_where('barang_habis_toko', array(
            'id_toko' => 'T1',
            'stok <=' => '2'
        ));
    }
    function stok_habis_cmc()
    {
        return $this->db->get_where('barang_habis_toko', array(
            'id_toko' => 'T2',
            'stok <=' => '2'
        ));
    }
    function stok_habis_probolinggo()
    {
        return $this->db->get_where('barang_habis_toko', array(
            'id_toko' => 'T3',
            'stok <=' => '2'
        ));
    }
    function best_semua_minggu()
    {
        $limit = 10;
        return $this->db->get('best_sell_minggu', $limit);
    }
    function best_semua_bulan()
    {
        $limit = 10;
        return $this->db->get('best_sell_bulan', $limit);
    }
    function best_semua_tahun()
    {
        $limit = 10;
        return $this->db->get('best_sell_tahun', $limit);
    }

    function best_lcc_minggu()
    {
        $limit = 10;
        return $this->db->get_where('best_sell_minggu', array(
            'id_toko' => 'T1'
        ), $limit);
    }
    function best_lcc_bulan()
    {
        $limit = 10;
        return $this->db->get_where('best_sell_bulan', array(
            'id_toko' => 'T1'
        ), $limit);
    }
    function best_lcc_tahun()
    {
        $limit = 10;
        return $this->db->get_where('best_sell_tahun', array(
            'id_toko' => 'T1'
        ), $limit);
    }

    function best_cmc_minggu()
    {
        $limit = 10;
        return $this->db->get_where('best_sell_minggu', array(
            'id_toko' => 'T2'
        ), $limit);
    }
    function best_cmc_bulan()
    {
        $limit = 10;
        return $this->db->get_where('best_sell_bulan', array(
            'id_toko' => 'T2'
        ), $limit);
    }
    function best_cmc_tahun()
    {
        $limit = 10;
        return $this->db->get_where('best_sell_tahun', array(
            'id_toko' => 'T2'
        ), $limit);
    }

    function best_probolinggo_minggu()
    {
        $limit = 10;
        return $this->db->get_where('best_sell_minggu', array(
            'id_toko' => 'T3'
        ), $limit);
    }
    function best_probolinggo_bulan()
    {
        $limit = 10;
        return $this->db->get_where('best_sell_bulan', array(
            'id_toko' => 'T3'
        ), $limit);
    }
    function best_probolinggo_tahun()
    {
        $limit = 10;
        return $this->db->get_where('best_sell_tahun', array(
            'id_toko' => 'T3'
        ), $limit);
    }


    function stok_ada_lcc()
    {
        return $this->db->get_where('barang_toko', array(
            'id_toko' => 'T1',
            'stok >' => '0'
        ));
    }
    function stok_ada_cmc()
    {
        return $this->db->get_where('barang_toko', array(
            'id_toko' => 'T2',
            'stok >' => '0'
        ));
    }
    function stok_ada_probolinggo()
    {
        return $this->db->get_where('barang_toko', array(
            'id_toko' => 'T3',
            'stok >' => '0'
        ));
    }
}
