<?php

/**
 * 
 */
class M_edit_account extends CI_Model
{

    function ambil_biodata()
    {
        return $this->db->get_where('pimpinan', array('id_user_p' => '1'))->row();
    }
    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function get_data($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
}
