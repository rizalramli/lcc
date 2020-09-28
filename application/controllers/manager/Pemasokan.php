<?php
class Pemasokan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_user')) {
            redirect('/');
        } else if ($this->session->userdata('akses') != 'Manager') {
            redirect('login/logout');
        }
        $this->load->model("manager/M_pemasokan");
    }
    public function index()
    {
        $data['distributor'] = $this->M_pemasokan->tampil_data('distributor')->result();
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/pemasokan/tampil', $data);
    }

    public function daftar_pemasokan()
    {

        $id_toko = $this->session->userdata('id_toko'); // session

        $data_id = array(
            'id_toko' => $id_toko
        );

        $data['pemasokan_list'] = $this->M_pemasokan->get_pemasokan('pemasokan_list', $data_id)->result();

        $this->template->load('view_1/template/manager', 'view_1/konten/manager/pemasokan/daftar_pemasokan', $data);
    }

    public function detail_pemasokan()
    {

        $id_pemasokan = $this->input->get('id_pemasokan');

        $data_id = array(
            'id_pemasokan' => $id_pemasokan
        );

        $data['pemasokan_list_detail'] = $this->M_pemasokan->get_data('pemasokan_list_detail', $data_id)->result();

        $data['pemasokan_list'] = $this->M_pemasokan->get_data('pemasokan_list', $data_id)->result();

        $this->template->load('view_1/template/manager', 'view_1/konten/manager/pemasokan/detail_pemasokan', $data);
    }
    public function tampil_daftar_barang()
    {
        $data_tbl['tbl_data'] = $this->M_pemasokan->tampil_data('barang_terdaftar')->result();

        $data = json_encode($data_tbl);

        echo $data;
    }
    public function get_barang_terdaftar()
    {
        $kode = $this->input->post('kode');
        $data_barang['data'] = $this->M_pemasokan->get_data('barang_terdaftar', $kode)->result();

        $data = json_encode($data_barang);

        echo $data;
    }

    public function ambil_total_barang()
    {
        $sub_total = 0;
        $total = 0;

        if (isset($_POST['kode_atau_barcode']) && isset($_POST['hrg_distributor']) && isset($_POST['qty'])) {

            for ($i = 0; $i < count($this->input->post('kode_atau_barcode')); $i++) {

                $harga_jual_temp = $this->input->post('hrg_distributor')[$i];
                $harga_jual = (int) preg_replace("/[^0-9]/", "", $harga_jual_temp);

                $qty_temp = $this->input->post('qty')[$i];
                $qty = (int) $qty_temp;

                $perhitungan = $harga_jual * $qty;

                $sub_total = $sub_total + $perhitungan;
            }

            $total = $sub_total;
        }

        echo $total;
    }

    public function input_transaksi_form()
    {
        if (isset($_POST['kode_atau_barcode'])) {

            date_default_timezone_set('Asia/Jakarta');

            // data pemasokan 
            $id_pemasokan = $this->M_pemasokan->get_no(); // generate
            $id_user = $this->session->userdata('id_user'); // session
            $id_distributor = $this->input->post('id_distributor');
            $tanggal = date('Y-m-d H:i:s');
            $total_tmp = $this->input->post('total');
            $total = preg_replace("/[^0-9]/", "", $total_tmp);

            $data = array(
                'id_pemasokan' => $id_pemasokan,
                'id_user' => $id_user,
                'id_distributor' => $id_distributor,
                'tanggal' => $tanggal,
                'total' => $total
            );

            $this->M_pemasokan->input_data('pemasokan', $data);
            // end of data pemasokan 

            // data pengeluaran lain
            $id_pengeluaran_l = $this->M_pemasokan->get_no_pengeluaran_lain();
            $id_user = $this->session->userdata('id_user');

            $jumlah_pengeluaran = $this->input->post('jumlah_pengeluaran');
            $harga = preg_replace("/[^0-9]/", "", $jumlah_pengeluaran);
            $total = (int) $harga;
            $ambil_distributor = $this->db->query("SELECT * FROM distributor WHERE id_distributor='$id_distributor'")->result_array();
            $nama_distributor = $ambil_distributor[0]['nama'];
            $deskripsi = 'Ongkos Kirim ' . $nama_distributor;

            $data = array(
                'id_pengeluaran_l' => $id_pengeluaran_l,
                'id_user' => $id_user,
                'tanggal' => $tanggal,
                'total' => $total,
                'deskripsi' => $deskripsi
            );
            $this->M_pemasokan->input_data('pengeluaran_lain', $data);
            // end of data pengeluaran lain

            // tambah detail transaksi
            for ($i = 0; $i < count($this->input->post('kode_atau_barcode')); $i++) {

                $kode = "kosong";
                $nama = $this->input->post('nama')[$i];

                // data stok
                $qty = $this->input->post('qty')[$i];

                $hrg_distributor_temp = $this->input->post('hrg_distributor')[$i];
                $hrg_distributor = preg_replace("/[^0-9]/", "", $hrg_distributor_temp);

                $total_hrg = $qty * $hrg_distributor;
                $kode_unik = $this->input->post('kode_atau_barcode')[$i];

                if ($kode_unik == "KODE GENERATE") {
                    // jika pakai generate kode

                    $id_toko = $this->session->userdata('id_toko'); // session

                    if ($id_toko == "T1") {
                        $kode_unik =  'LCC' . $this->M_pemasokan->get_kode_unik('stok_toko_lcc'); // generate
                    } elseif ($id_toko == "T2") {
                        $kode_unik =  'CMC' . $this->M_pemasokan->get_kode_unik('stok_toko_cmc'); // generate
                    } elseif ($id_toko == "T3") {
                        $kode_unik =  'PBL' . $this->M_pemasokan->get_kode_unik('stok_toko_pbl'); // generate
                    }
                }

                // deteksi apakah ada nama yang sama di database (barang terdaftar)
                $data_nama = array(
                    'nama' => $nama
                );
                $cek = $this->M_pemasokan->get_data("barang_terdaftar", $data_nama)->num_rows();

                if ($cek >= 1) {

                    // jika nama sudah ada maka akan memakai data yang lama

                    // mengambil nama dari barang terdaftar
                    $query = $this->M_pemasokan->get_data("barang_terdaftar", $data_nama);
                    foreach ($query->result_array() as $row) {
                        $kode = $row["kode"];
                    }
                } else {

                    // jika nama belum ada maka akan menambahkan data baru
                    $kode = $this->M_pemasokan->get_no_barang_terdaftar(); // generate

                    $data = array(
                        'kode' => $kode,
                        'nama' => $nama
                    );

                    $this->M_pemasokan->input_data('barang_terdaftar', $data);
                }

                // proses pemasukan ke dalam database stok barang
                $data = array(
                    'id_pemasokan' => $id_pemasokan,
                    'kode' => $kode,
                    'qty' => $qty,
                    'hrg_distributor' => $hrg_distributor,
                    'total_hrg' => $total_hrg,
                    'kode_unik' => $kode_unik
                );

                $this->M_pemasokan->input_data('stok_barang', $data);
            }

            echo "Data berhasil Ditambahkan";
        } else {

            echo "Harus Ada Barang Detail Pemasokan !!";
        }
    }

    function get_autocomplete_nama()
    {
        $nilai = $this->input->post('nilai');

        if (isset($nilai)) {
            $result = $this->M_pemasokan->search_autocomplete('nama', $nilai);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->nama;
                echo json_encode($arr_result);
            }
        }
    }
}
