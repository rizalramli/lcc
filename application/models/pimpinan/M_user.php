<?php 
/**
 * 
 */
class M_user extends CI_Model
{
	
	function get_toko()
	{
		$query = $this->db->get("toko");
		return $query->result();
	}
	function tampil(){
        return $this->db->query("SELECT * FROM user JOIN toko USING(id_toko) WHERE jenis_akses='Manager' ")->result();
	}
	function get_no()
    {
        $field = "id_user";
        $tabel = "user";
        $digit = "2";
        $kode = "U";
        $q = $this->db->query("SELECT MAX(RIGHT($field,$digit)) AS kd_max FROM $tabel");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = $kode . sprintf('%0' . $digit . 's',  $tmp);
            }
        } else {
            $kd = "U01";
        }
        return $kd;
    }
     function ambil_data($nama_user)
    {
        $this->db->select('*');
        $this->db->from('user u');

        $where = "u.nama_user ='" . $nama_user . "'";
        $this->db->where($where);
        $this->db->order_by('u.nama_user', 'ASC');

        return $this->db->get();
    }
    function input($data){
    	return $this->db->insert('user', $data);
    }
    function edit($where,$table){
    	return $this->db->get_where($table,$where)->result();
    }
    function update($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}