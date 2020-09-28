<?php

/**
 * 
 */
class M_distributor extends CI_Model
{

    public function tampil()
    {
        $query = $this->db->get("distributor");
        return $query->result();
    }
    function get_no()
    {
        $field = "id_distributor";
        $tabel = "distributor";
        $digit = "2";
        $kode = "D";
        $q = $this->db->query("SELECT MAX(RIGHT($field,$digit)) AS kd_max FROM $tabel");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = $kode . sprintf('%0' . $digit . 's',  $tmp);
            }
        } else {
            $kd = "D01";
        }
        return $kd;
    }
    function input($data)
    {
        return $this->db->insert('distributor', $data);
    }
    function edit($where, $table)
    {
        return $this->db->get_where($table, $where)->result();
    }
    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
