<?php
class M_home extends CI_Model
{

    function barang_kasir()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->get_where('barang_kasir', array('id_toko' => $id_toko, 'qty >' => 0))->result();
    }
    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function id_customer()
    {
        $field = "id_customer";
        $tabel = "customer";
        $digit = "3";
        $ymd = date('ymd');

        $q = $this->db->query("SELECT MAX(RIGHT($field,$digit)) AS kd_max FROM $tabel WHERE SUBSTR($field, 2, 6) = $ymd LIMIT 1");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'C' . date('ymd') . $kd;
    }
    function id_penjualan()
    {
        $field = "id_penjualan";
        $tabel = "penjualan";
        $digit = "3";
        $ymd = date('ymd');

        $q = $this->db->query("SELECT MAX(RIGHT($field,$digit)) AS kd_max FROM $tabel WHERE SUBSTR($field, 2, 6) = $ymd LIMIT 1");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'P' . date('ymd') . $kd;
    }
    public function search($keyword)
    {
        $id_toko = $this->session->userdata('id_toko');
        $this->db->select('*');
        $this->db->from('barang_kasir bk');

        $where = "(bk.nama_barang like '%" . $keyword . "%' OR bk.kode_unik like '%" . $keyword . "%') && bk.id_toko = '" . $id_toko . "' && bk.qty > 0";
        $this->db->where($where);
        $this->db->order_by('bk.nama_barang', 'ASC');

        return $this->db->get()->result();
    }

    function barang_qty_db($id_stok_b)
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->get_where('barang_kasir', array('id_toko' => $id_toko, 'qty >' => 0, 'id_stok_b' => $id_stok_b))->row();
    }
}
