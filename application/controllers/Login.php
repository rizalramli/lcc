<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('login/M_login');
    }
    public function index()
    {
        $this->load->view('view_1/login/login');
    }
    public function aksi_login()
    {
        $userpass = $this->input->post('password');
        $cek = $this->M_login->cek_login();
        $cek_pimpinan = $this->M_login->cek_pimpinan();
        if ($cek_pimpinan->num_rows() > 0) {
            foreach ($cek_pimpinan->result() as $row_pimpinan) {
                $id_user_pimpinan = $row_pimpinan->id_user_p;
                $username_pimpinan = $row_pimpinan->username;
                $nama_pimpinan = $row_pimpinan->nama;
                $akses_pimpinan = $row_pimpinan->jenis_akses;
                $password_pimpinan = $row_pimpinan->password;
            }
            if (password_verify($userpass, $password_pimpinan)) {
                $data_session = array(
                    'id_user' => $id_user_pimpinan,
                    'username' => $username_pimpinan,
                    'nama' => $nama_pimpinan,
                    'akses' => $akses_pimpinan,
                    'password' => $password_pimpinan,
                    'nama_toko' => 'Inventory Management'
                );
                $this->session->set_userdata($data_session);
                if ($row_pimpinan->jenis_akses == 'Pimpinan') {
                    redirect(base_url("dashboard_pimpinan"));
                }
            }
        } else {
            echo "<script>
            	alert('Username Atau Password Anda Salah');
            	window.location = '" . base_url("/") . "';
            </script>";
        }
        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row) {
                $id_user = $row->id_user;
                $username = $row->username;
                $nama = $row->nama_user;
                $akses = $row->jenis_akses;
                $password = $row->password;
                $id_toko = $row->id_toko;
                $nama_toko = $row->nama_toko;
            }
            if (password_verify($userpass, $password)) {
                $data_session = array(
                    'id_user' => $id_user,
                    'username' => $username,
                    'nama' => $nama,
                    'akses' => $akses,
                    'password' => $password,
                    'id_toko' => $id_toko,
                    'nama_toko' => $nama_toko
                );
                $this->session->set_userdata($data_session);
                if ($row->jenis_akses == 'Manager') {
                    redirect(base_url("dashboard_manager"));
                } else if ($row->jenis_akses == 'Kasir') {
                    redirect(base_url("kasir"));
                }
            }
        } else {
            echo "<script>
            	alert('Username Atau Password Anda Salah');
            	window.location = '" . base_url("/") . "';
            </script>";
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('/'));
    }
}
