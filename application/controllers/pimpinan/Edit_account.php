<?php

/**
 * 
 */
class Edit_account extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_user')) {
            redirect('/');
        } else if ($this->session->userdata('akses') != 'Pimpinan') {
            redirect('login/logout');
        }
        $this->load->model('pimpinan/M_edit_account');
    }
    function index()
    {

        $id_user_p = $this->session->userdata('id_user'); // session

        $data_id = array(
            'id_user_p' => $id_user_p
        );

        $query = $this->M_edit_account->get_data('pimpinan', $data_id);
        foreach ($query->result_array() as $row) {
            $data['id'] = $row["id_user_p"];
            $data['nama'] = $row["nama"];
            $data['username'] = $row["username"];
        }

        $this->template->load('view_1/template/pimpinan', 'view_1/konten/pimpinan/edit_account/tampil', $data);
    }
    function ubah_biodata()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $data = array(
            'nama' => $nama,
            'username' => $username
        );
        $where = array(
            'id_user_p' => $id
        );
        $this->M_edit_account->update($where, $data, 'pimpinan');
        echo "<script>
        	alert('Sukses Ubah Biodata');
        	window.location = '" . base_url("edit_account") . "';
        </script>";
    }
    function ubah_password()
    {
        $id_user_p = $this->session->userdata('id_user'); // session
        $data_id = array(
            'id_user_p' => $id_user_p
        );

        $query = $this->M_edit_account->get_data('pimpinan', $data_id);
        foreach ($query->result_array() as $row) {
            $password_lama = $row["password"];
        }

        $confirm_lama = $this->input->post('confirm_lama');
        $password_baru = $this->input->post('password_baru');
        $confirm_password = $this->input->post('confirm_password');

        if (password_verify($confirm_lama, $password_lama)) {
            if ($password_baru == $confirm_password) {
                $where = array('id_user_p' => $id_user_p);
                $data = array(
                    'password' => password_hash($password_baru, PASSWORD_DEFAULT)
                );
                $this->M_edit_account->update($where, $data, 'pimpinan');
                echo "<script>
                	alert('Sukses Ubah Password');
                	window.location = '" . base_url("edit_account") . "';
                </script>";
            } else {
                echo "<script>
                	alert('Password baru dan confirmasi tidak cocok');
                	window.location = '" . base_url("edit_account") . "';
                </script>";
            }
        } else {
            echo "<script>
            	alert('Password lama tidak cocok');
            	window.location = '" . base_url("edit_account") . "';
            </script>";
        }
    }
}
