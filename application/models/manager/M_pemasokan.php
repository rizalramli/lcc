<?php
class M_pemasokan extends CI_Model
{
    function tampil_data($data)
    {
        return $this->db->get($data);
    }

    function input_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function hapus_data($table, $where)
    {
        // idnya
        $this->db->where($where);

        // tabelnya
        $this->db->delete($table);
    }

    function get_data($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function get_pemasokan($table, $where)
    {
        return $this->db->order_by('id_pemasokan', 'DESC')->get_where($table, $where);
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // autogenerate kode / ID
    function get_no_barang_terdaftar()
    {
        $field = "kode";
        $tabel = "barang_terdaftar";
        $digit = "5";
        $kode = "B";

        $q = $this->db->query("SELECT MAX(RIGHT($field,$digit)) AS kd_max FROM $tabel");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = $kode . sprintf('%0' . $digit . 's',  $tmp);
            }
        } else {
            $kd = "B00001";
        }

        return $kd;
    }

    function get_no()
    {
        date_default_timezone_set('Asia/Jakarta');
        $field = "id_pemasokan";
        $tabel = "pemasokan";
        $digit = "2";
        $ymd = date('ymd');

        $q = $this->db->query("SELECT MAX(RIGHT($field,$digit)) AS kd_max FROM $tabel WHERE SUBSTR($field, 2, 6) = $ymd LIMIT 1");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "01";
        }

        return 'M' . date('ymd') . $kd;
    }

    function get_kode_unik($tabel)
    {
        date_default_timezone_set('Asia/Jakarta');
        $field = "kode_unik";
        $digit = "3";
        $ymd = date('ymd');

        $q = $this->db->query("SELECT MAX(RIGHT($field,$digit)) AS kd_max FROM $tabel WHERE SUBSTR($field, 4, 6) = $ymd LIMIT 1");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "001";
        }

        return date('ymd') . $kd;
    }

    function search_autocomplete($field, $data)
    {
        $this->db->like($field, $data, 'both');
        $this->db->order_by($field, 'ASC');
        $this->db->limit(10);
        return $this->db->get('barang_terdaftar')->result();
    }

    function get_no_pengeluaran_lain()
    {
        date_default_timezone_set('Asia/Jakarta');
        $field = "id_pengeluaran_l";
        $tabel = "pengeluaran_lain";
        $digit = "2";
        $ymd = date('ymd');

        $q = $this->db->query("SELECT MAX(RIGHT($field,$digit)) AS kd_max FROM $tabel WHERE SUBSTR($field, 2, 6) = $ymd LIMIT 1");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "01";
        }

        return 'L' . date('ymd') . $kd;
    }
}
