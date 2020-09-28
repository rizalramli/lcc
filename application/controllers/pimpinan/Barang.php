<?php

/**
 * 
 */
class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_user')) {
            redirect('/');
        } else if ($this->session->userdata('akses') != 'Pimpinan') {
            redirect('login/logout');
        }
        $this->load->model('pimpinan/M_barang');
    }
    function index()
    {
        $this->template->load('view_1/template/pimpinan', 'view_1/konten/pimpinan/home/tampil');
    }

    function stok_habis()
    {
        $data['data_toko'] = $this->M_barang->tampil_toko();
        $this->template->load('view_1/template/pimpinan', 'view_1/konten/pimpinan/barang/stok_habis', $data);
    }

    function tampil_stok()
    {
        $select = $this->input->post('pilih');
        $record_lcc = $this->M_barang->stok_habis_lcc()->result();
        $record_cmc = $this->M_barang->stok_habis_cmc()->result();
        $record_probolinggo = $this->M_barang->stok_habis_probolinggo()->result();
        if ($select == "T1") {
            echo '
            <div class="table-responsive">
                <table width="100%" id="dt_custom1" class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="17%">Nama Barang</th>
                            <th width="25%">Stok Tersisa</th>
                        </tr>
                    </thead>
                    <tbody>';
            $no_lcc = 1;
            foreach ($record_lcc as $row_lcc) {
                echo '  
                    <tr>
                        <td>' . $no_lcc++ . '</td>
                        <td>' . $row_lcc->nama . '</td>
                        <td>' . $row_lcc->stok . '</td>
                    </tr>
                    ';
            }
            echo '
                    </tbody>
                </table>
            </div>';
        } else if ($select == "T2") {
            echo '
            <div class="table-responsive">
                <table width="100%" id="dt_custom1" class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="17%">Nama Barang</th>
                            <th width="25%">Stok Tersisa</th>
                        </tr>
                    </thead>
                    <tbody>';
            $no_cmc = 1;
            foreach ($record_cmc as $row_cmc) {
                echo '
                        <tr>
                            <td>' . $no_cmc++ . '</td>
                            <td>' . $row_cmc->nama . '</td>
                            <td>' . $row_cmc->stok . '</td>
                        </tr>
                        ';
            }
            echo '
                    </tbody>
                </table>
            </div>';
        } else if ($select == "T3") {
            echo '
            <div class="table-responsive">
                <table width="100%" id="dt_custom1" class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="17%">Nama Barang</th>
                            <th width="25%">Stok Tersisa</th>
                        </tr>
                    </thead>
                    <tbody>';
            $no_probolinggo = 1;
            foreach ($record_probolinggo as $row_probolinggo) {
                echo '
                        <tr>
                            <td>' . $no_probolinggo++ . '</td>
                            <td>' . $row_probolinggo->nama . '</td>
                            <td>' . $row_probolinggo->stok . '</td>
                        </tr>
                        ';
            }
            echo '
                    </tbody>
                </table>
            </div>';
        }
    }

    function barang_terlaris()
    {
        $data['data_toko'] = $this->M_barang->tampil_toko();
        $this->template->load('view_1/template/pimpinan', 'view_1/konten/pimpinan/barang/barang_terlaris', $data);
    }
    function tampil_trending()
    {
        // Semua
        $best_semua_minggu = $this->M_barang->best_semua_minggu()->result();
        $best_semua_bulan = $this->M_barang->best_semua_bulan()->result();
        $best_semua_tahun = $this->M_barang->best_semua_tahun()->result();
        // LCC 
        $best_lcc_minggu = $this->M_barang->best_lcc_minggu()->result();
        $best_lcc_bulan = $this->M_barang->best_lcc_bulan()->result();
        $best_lcc_tahun = $this->M_barang->best_lcc_tahun()->result();
        // CMC
        $best_cmc_minggu = $this->M_barang->best_cmc_minggu()->result();
        $best_cmc_bulan = $this->M_barang->best_cmc_bulan()->result();
        $best_cmc_tahun = $this->M_barang->best_cmc_tahun()->result();
        // Probolinggo
        $best_probolinggo_minggu = $this->M_barang->best_probolinggo_minggu()->result();
        $best_probolinggo_bulan = $this->M_barang->best_probolinggo_bulan()->result();
        $best_probolinggo_tahun = $this->M_barang->best_probolinggo_tahun()->result();
        $select = $this->input->post('pilih');
        if ($select == "semua") {
            echo '<div class="widget-tabs-int">
                <div class="widget-tabs-list">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Minggu Ini</a></li>
                        <li><a data-toggle="tab" href="#menu1">Bulan Ini</a></li>
                        <li><a data-toggle="tab" href="#menu2">Tahun Ini</a></li>
                    </ul>
                    <div class="tab-content tab-custom-st">
                        <div id="home" class="tab-pane fade in active">
                            <div class="tab-ctn">
                                <div class="data-table-list">
                                    <div class="table-responsive">
                                        <table width="100%" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="17%">Nama Barang</th>
                                                    <th width="25%">Jumlah Terjual</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
            $no_semua_minggu = 1;
            foreach ($best_semua_minggu as $semua_minggu) {
                echo '                                              
                                            <tr>
                                                <td>' . $no_semua_minggu++ . '</td>
                                                <td>' . $semua_minggu->nama . '</td>
                                                <td>' . $semua_minggu->jumlah_terjual . '</td>
                                            </tr>
                                            ';
            }
            echo '
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>';
            echo '
                        <div id="menu1" class="tab-pane fade">
                            <div class="tab-ctn">
                                <div class="data-table-list">
                                    <div class="table-responsive">
                                        <table width="100%" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="17%">Nama Barang</th>
                                                    <th width="25%">Jumlah Terjual</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
            $no_semua_bulan = 1;
            foreach ($best_semua_bulan as $semua_bulan) {
                echo '
                                                <tr>
                                                    <td>' . $no_semua_bulan++ . '</td>
                                                    <td>' . $semua_bulan->nama . '</td>
                                                    <td>' . $semua_bulan->jumlah_terjual . '</td>
                                                </tr>
                                                ';
            }
            echo '
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>';
            echo '
                        <div id="menu2" class="tab-pane fade">
                            <div class="tab-ctn">
                                <div class="data-table-list">
                                    <div class="table-responsive">
                                        <table width="100%" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="17%">Nama Barang</th>
                                                    <th width="25%">Jumlah Terjual</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
            $no_semua_tahun = 1;
            foreach ($best_semua_tahun as $semua_tahun) {
                echo '
                                                <tr>
                                                    <td>' . $no_semua_tahun++ . '</td>
                                                    <td>' . $semua_tahun->nama . '</td>
                                                    <td>' . $semua_tahun->jumlah_terjual . '</td>
                                                </tr>
                                                ';
            }
            echo '
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        } else if ($select == "T1") {
            echo '<div class="widget-tabs-int">
                <div class="widget-tabs-list">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Minggu Ini</a></li>
                        <li><a data-toggle="tab" href="#menu1">Bulan Ini</a></li>
                        <li><a data-toggle="tab" href="#menu2">Tahun Ini</a></li>
                    </ul>
                    <div class="tab-content tab-custom-st">
                        <div id="home" class="tab-pane fade in active">
                            <div class="tab-ctn">
                                <div class="data-table-list">
                                    <div class="table-responsive">
                                        <table width="100%" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="17%">Nama Barang</th>
                                                    <th width="25%">Jumlah Terjual</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
            $no_lcc_minggu = 1;
            foreach ($best_lcc_minggu as $lcc_minggu) {
                echo '
                                                <tr>
                                                    <td>' . $no_lcc_minggu++ . '</td>
                                                    <td>' . $lcc_minggu->nama . '</td>
                                                    <td>' . $lcc_minggu->jumlah_terjual . '</td>
                                                </tr>
                                                ';
            }
            echo '
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>';
            echo '
                        <div id="menu1" class="tab-pane fade">
                            <div class="tab-ctn">
                                <div class="data-table-list">
                                    <div class="table-responsive">
                                        <table width="100%" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="17%">Nama Barang</th>
                                                    <th width="25%">Jumlah Terjual</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
            $no_lcc_bulan = 1;
            foreach ($best_lcc_bulan as $lcc_bulan) {
                echo '
                                                <tr>
                                                    <td>' . $no_lcc_bulan++ . '</td>
                                                    <td>' . $lcc_bulan->nama . '</td>
                                                    <td>' . $lcc_bulan->jumlah_terjual . '</td>
                                                </tr>
                                                ';
            }
            echo '
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>';
            echo '
                        <div id="menu2" class="tab-pane fade">
                            <div class="tab-ctn">
                                <div class="data-table-list">
                                    <div class="table-responsive">
                                        <table width="100%" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="17%">Nama Barang</th>
                                                    <th width="25%">Jumlah Terjual</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
            $no_lcc_tahun = 1;
            foreach ($best_lcc_tahun as $lcc_tahun) {
                echo '
                                                <tr>
                                                    <td>' . $no_lcc_tahun++ . '</td>
                                                    <td>' . $lcc_tahun->nama . '</td>
                                                    <td>' . $lcc_tahun->jumlah_terjual . '</td>
                                                </tr>
                                                ';
            }
            echo '
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        } else if ($select == "T2") {
            echo '<div class="widget-tabs-int">
                <div class="widget-tabs-list">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Minggu Ini</a></li>
                        <li><a data-toggle="tab" href="#menu1">Bulan Ini</a></li>
                        <li><a data-toggle="tab" href="#menu2">Tahun Ini</a></li>
                    </ul>
                    <div class="tab-content tab-custom-st">
                        <div id="home" class="tab-pane fade in active">
                            <div class="tab-ctn">
                                <div class="data-table-list">
                                    <div class="table-responsive">
                                        <table width="100%" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="17%">Nama Barang</th>
                                                    <th width="25%">Jumlah Terjual</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
            $no_cmc_minggu = 1;
            foreach ($best_cmc_minggu as $cmc_minggu) {
                echo '
                                                <tr>
                                                    <td>' . $no_cmc_minggu++ . '</td>
                                                    <td>' . $cmc_minggu->nama . '</td>
                                                    <td>' . $cmc_minggu->jumlah_terjual . '</td>
                                                </tr>
                                                ';
            }
            echo '
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>';
            echo '
                        <div id="menu1" class="tab-pane fade">
                            <div class="tab-ctn">
                                <div class="data-table-list">
                                    <div class="table-responsive">
                                        <table width="100%" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="17%">Nama Barang</th>
                                                    <th width="25%">Jumlah Terjual</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
            $no_cmc_bulan = 1;
            foreach ($best_cmc_bulan as $cmc_bulan) {
                echo '
                                                <tr>
                                                    <td>' . $no_cmc_bulan++ . '</td>
                                                    <td>' . $cmc_bulan->nama . '</td>
                                                    <td>' . $cmc_bulan->jumlah_terjual . '</td>
                                                </tr>
                                                ';
            }
            echo '
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>';
            echo '
                        <div id="menu2" class="tab-pane fade">
                            <div class="tab-ctn">
                                <div class="data-table-list">
                                    <div class="table-responsive">
                                        <table width="100%" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="17%">Nama Barang</th>
                                                    <th width="25%">Jumlah Terjual</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
            $no_cmc_tahun = 1;
            foreach ($best_cmc_tahun as $cmc_tahun) {
                echo '
                                                <tr>
                                                    <td>' . $no_cmc_tahun++ . '</td>
                                                    <td>' . $cmc_tahun->nama . '</td>
                                                    <td>' . $cmc_tahun->jumlah_terjual . '</td>
                                                </tr>
                                                ';
            }
            echo '
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        } else if ($select == "T3") {
            echo '<div class="widget-tabs-int">
                <div class="widget-tabs-list">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Minggu Ini</a></li>
                        <li><a data-toggle="tab" href="#menu1">Bulan Ini</a></li>
                        <li><a data-toggle="tab" href="#menu2">Tahun Ini</a></li>
                    </ul>
                    <div class="tab-content tab-custom-st">
                        <div id="home" class="tab-pane fade in active">
                            <div class="tab-ctn">
                                <div class="data-table-list">
                                    <div class="table-responsive">
                                        <table width="100%" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="17%">Nama Barang</th>
                                                    <th width="25%">Jumlah Terjual</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
            $no_probolinggo_minggu = 1;
            foreach ($best_probolinggo_minggu as $probolinggo_minggu) {
                echo '
                                                <tr>
                                                    <td>' . $no_probolinggo_minggu++ . '</td>
                                                    <td>' . $probolinggo_minggu->nama . '</td>
                                                    <td>' . $probolinggo_minggu->jumlah_terjual . '</td>
                                                </tr>
                                                ';
            }
            echo '
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>';
            echo '
                        <div id="menu1" class="tab-pane fade">
                            <div class="tab-ctn">
                                <div class="data-table-list">
                                    <div class="table-responsive">
                                        <table width="100%" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="17%">Nama Barang</th>
                                                    <th width="25%">Jumlah Terjual</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
            $no_probolinggo_bulan = 1;
            foreach ($best_probolinggo_bulan as $probolinggo_bulan) {
                echo '
                                                <tr>
                                                    <td>' . $no_probolinggo_bulan++ . '</td>
                                                    <td>' . $probolinggo_bulan->nama . '</td>
                                                    <td>' . $probolinggo_bulan->jumlah_terjual . '</td>
                                                </tr>
                                                ';
            }
            echo '
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>';
            echo '
                        <div id="menu2" class="tab-pane fade">
                            <div class="tab-ctn">
                                <div class="data-table-list">
                                    <div class="table-responsive">
                                        <table width="100%" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="17%">Nama Barang</th>
                                                    <th width="25%">Jumlah Terjual</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
            $no_probolinggo_tahun = 1;
            foreach ($best_probolinggo_tahun as $probolinggo_tahun) {
                echo '
                                                <tr>
                                                    <td>' . $no_probolinggo_tahun++ . '</td>
                                                    <td>' . $probolinggo_tahun->nama . '</td>
                                                    <td>' . $probolinggo_tahun->jumlah_terjual . '</td>
                                                </tr>
                                                ';
            }
            echo '
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }
    }

    function stok_toko()
    {
        $data['data_toko'] = $this->M_barang->tampil_toko();
        $this->template->load('view_1/template/pimpinan', 'view_1/konten/pimpinan/barang/stok_toko', $data);
    }

    function tampil_stok_toko()
    {
        $select = $this->input->post('pilih');
        $record_lcc = $this->M_barang->stok_ada_lcc()->result();
        $record_cmc = $this->M_barang->stok_ada_cmc()->result();
        $record_probolinggo = $this->M_barang->stok_ada_probolinggo()->result();
        if ($select == "T1") {
            echo '
            <div class="table-responsive">
                <table width="100%" id="dt_custom1" class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="17%">Nama Barang</th>
                            <th width="25%">Stok Tersisa</th>
                        </tr>
                    </thead>
                    <tbody>';
            $no_lcc = 1;
            foreach ($record_lcc as $row_lcc) {
                echo '  
                    <tr>
                        <td>' . $no_lcc++ . '</td>
                        <td>' . $row_lcc->nama . '</td>
                        <td>' . $row_lcc->stok . '</td>
                    </tr>
                    ';
            }
            echo '
                    </tbody>
                </table>
            </div>';
        } else if ($select == "T2") {
            echo '
            <div class="table-responsive">
                <table width="100%" id="dt_custom1" class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="17%">Nama Barang</th>
                            <th width="25%">Stok Tersisa</th>
                        </tr>
                    </thead>
                    <tbody>';
            $no_cmc = 1;
            foreach ($record_cmc as $row_cmc) {
                echo '
                        <tr>
                            <td>' . $no_cmc++ . '</td>
                            <td>' . $row_cmc->nama . '</td>
                            <td>' . $row_cmc->stok . '</td>
                        </tr>
                        ';
            }
            echo '
                    </tbody>
                </table>
            </div>';
        } else if ($select == "T3") {
            echo '
            <div class="table-responsive">
                <table width="100%" id="dt_custom1" class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="17%">Nama Barang</th>
                            <th width="25%">Stok Tersisa</th>
                        </tr>
                    </thead>
                    <tbody>';
            $no_probolinggo = 1;
            foreach ($record_probolinggo as $row_probolinggo) {
                echo '
                        <tr>
                            <td>' . $no_probolinggo++ . '</td>
                            <td>' . $row_probolinggo->nama . '</td>
                            <td>' . $row_probolinggo->stok . '</td>
                        </tr>
                        ';
            }
            echo '
                    </tbody>
                </table>
            </div>';
        }
    }
}
