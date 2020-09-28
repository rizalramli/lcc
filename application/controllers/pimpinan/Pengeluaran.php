<?php 
/**
  * 
  */
class Pengeluaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('id_user')){
            redirect('/');
        }
        else if($this->session->userdata('akses') != 'Pimpinan')
        {
            redirect('login/logout');
        }
        $this->load->model('pimpinan/M_pengeluaran');
    }
    function index(){
        $data['data_toko'] = $this->M_pengeluaran->tampil_toko();
        $this->template->load('view_1/template/pimpinan', 'view_1/konten/pimpinan/pengeluaran/tampil',$data);
    }
    function tampil()
    {
        $select_toko = $this->input->post('toko');
        $select_tanggal = $this->input->post('tanggal');

        // Pengeluaran Semua
        $pengeluaran_semua_hari = $this->M_pengeluaran->pengeluaran_semua_hari();
        $pengeluaran_semua_bulan = $this->M_pengeluaran->pengeluaran_semua_bulan();
        // Pengeluaran LCC
        $pengeluaran_lcc_hari = $this->M_pengeluaran->pengeluaran_lcc_hari();
        $pengeluaran_lcc_bulan = $this->M_pengeluaran->pengeluaran_lcc_bulan();
        // Pengeluaran CMC
        $pengeluaran_cmc_hari = $this->M_pengeluaran->pengeluaran_cmc_hari();
        $pengeluaran_cmc_bulan = $this->M_pengeluaran->pengeluaran_cmc_bulan();
        // Pengeluaran probolinggo
        $pengeluaran_probolinggo_hari = $this->M_pengeluaran->pengeluaran_probolinggo_hari();
        $pengeluaran_probolinggo_bulan = $this->M_pengeluaran->pengeluaran_probolinggo_bulan();
        if($select_toko=="semua" && $select_tanggal=="hari")
        {
        echo '<div class="data-table-list">
                <div class="table-responsive">
                    <table id="dt_custom2" width="100%" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center;" width="5%">No</th>
                                <th width="15">Nama User</th>
                                <th width="25%">Deskripsi Pengeluaran</th>
                                <th style="text-align:center;" width="20%">Tanggal</th>
                                <th style="text-align:center;" width="20%">Waktu</th>
                                <th style="text-align:center;" width="15%">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $no_keluar_semua_hari = 1;
                            $grand_pengeluaran_semua_hari = 0;
                            foreach($pengeluaran_semua_hari as $keluar_semua_hari)
                            {
                            $grand_pengeluaran_semua_hari += $keluar_semua_hari->total;
                            echo '
                            <tr>
                                <td style="text-align: center;">'.$no_keluar_semua_hari++.'</td>
                                <td>'.$keluar_semua_hari->nama_user.'</td>
                                <td>'.$keluar_semua_hari->deskripsi.'</td>
                                <td style="text-align: center;">'.date('d F Y',
                                    strtotime($keluar_semua_hari->tanggal)).'</td>
                                <td style="text-align: center;">'.date('H:i:s',
                                    strtotime($keluar_semua_hari->tanggal)).'</td>
                                <td style="text-align: right;">'.rupiah($keluar_semua_hari->total).'</td>
                            </tr>
                            ';
                            }
                            if($grand_pengeluaran_semua_hari == 0)
                            {
                            echo '<h4 style="float:right">Total Pengeluaran : 0</h4>';
                            }
                            else {
                            echo '<h4 style="float: right;">Total Pengeluaran :
                                '.rupiah($grand_pengeluaran_semua_hari).'
                            </h4>';
                            }
                            echo '
                        </tbody>
                        <tfoot>
                            <th style="text-align:center;" width="5%">No</th>
                            <th width="15">Nama User</th>
                            <th width="25%">Deskripsi Pengeluaran</th>
                            <th style="text-align:center;" width="20%">Tanggal</th>
                            <th style="text-align:center;" width="20%">Waktu</th>
                            <th style="text-align:center;" width="15%">Total</th>
                        </tfoot>
                    </table>
                </div>
            </div>';
        }
        else if($select_toko=="semua" && $select_tanggal=="bulan")
        {
        echo '<div class="data-table-list">
                <div class="table-responsive">
                    <table id="dt_custom2" width="100%" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center;" width="5%">No</th>
                                <th width="15">Nama User</th>
                                <th width="25%">Deskripsi Pengeluaran</th>
                                <th style="text-align:center;" width="20%">Tanggal</th>
                                <th style="text-align:center;" width="20%">Waktu</th>
                                <th style="text-align:center;" width="15%">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $no_keluar_semua_bulan = 1;
                            $grand_pengeluaran_semua_bulan = 0;
                            foreach($pengeluaran_semua_bulan as $keluar_semua_bulan)
                            {
                            $grand_pengeluaran_semua_bulan += $keluar_semua_bulan->total;
                            echo '
                            <tr>
                                <td style="text-align: center;">'.$no_keluar_semua_bulan++.'</td>
                                <td>'.$keluar_semua_bulan->nama_user.'</td>
                                <td>'.$keluar_semua_bulan->deskripsi.'</td>
                                <td style="text-align: center;">'.date('d F Y',
                                    strtotime($keluar_semua_bulan->tanggal)).'</td>
                                <td style="text-align: center;">'.date('H:i:s',
                                    strtotime($keluar_semua_bulan->tanggal)).'</td>
                                <td style="text-align: right;">'.rupiah($keluar_semua_bulan->total).'</td>
                            </tr>
                            ';
                            }
                            if($grand_pengeluaran_semua_bulan == 0)
                            {
                            echo '<h4 style="float:right">Total Pengeluaran : 0</h4>';
                            }
                            else {
                            echo '<h4 style="float: right;">Total Pengeluaran :
                                '.rupiah($grand_pengeluaran_semua_bulan).'
                            </h4>';
                            }
                            echo '
                        </tbody>
                        <tfoot>
                            <th style="text-align:center;" width="5%">No</th>
                            <th width="15">Nama User</th>
                            <th width="25%">Deskripsi Pengeluaran</th>
                            <th style="text-align:center;" width="20%">Tanggal</th>
                            <th style="text-align:center;" width="20%">Waktu</th>
                            <th style="text-align:center;" width="15%">Total</th>
                        </tfoot>
                    </table>
                </div>
            </div>';
        }
        else if($select_toko=="T1" && $select_tanggal=="hari")
        {
        echo '<div class="data-table-list">
                <div class="table-responsive">
                    <table id="dt_custom2" width="100%" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center;" width="5%">No</th>
                                <th width="15">Nama User</th>
                                <th width="25%">Deskripsi Pengeluaran</th>
                                <th style="text-align:center;" width="20%">Tanggal</th>
                                <th style="text-align:center;" width="20%">Waktu</th>
                                <th style="text-align:center;" width="15%">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $no_keluar_lcc_hari = 1;
                            $grand_pengeluaran_lcc_hari = 0;
                            foreach($pengeluaran_lcc_hari as $keluar_lcc_hari)
                            {
                            $grand_pengeluaran_lcc_hari += $keluar_lcc_hari->total;
                            echo '
                            <tr>
                                <td style="text-align: center;">'.$no_keluar_lcc_hari++.'</td>
                                <td>'.$keluar_lcc_hari->nama_user.'</td>
                                <td>'.$keluar_lcc_hari->deskripsi.'</td>
                                <td style="text-align: center;">'.date('d F Y',
                                    strtotime($keluar_lcc_hari->tanggal)).'</td>
                                <td style="text-align: center;">'.date('H:i:s',
                                    strtotime($keluar_lcc_hari->tanggal)).'</td>
                                <td style="text-align: right;">'.rupiah($keluar_lcc_hari->total).'</td>
                            </tr>
                            ';
                            }
                            if($grand_pengeluaran_lcc_hari == 0)
                            {
                            echo '<h4 style="float:right">Total Pengeluaran : 0</h4>';
                            }
                            else {
                            echo '<h4 style="float: right;">Total Pengeluaran :
                                '.rupiah($grand_pengeluaran_lcc_hari).'
                            </h4>';
                            }
                            echo '
                        </tbody>
                        <tfoot>
                            <th style="text-align:center;" width="5%">No</th>
                            <th width="15">Nama User</th>
                            <th width="25%">Deskripsi Pengeluaran</th>
                            <th style="text-align:center;" width="20%">Tanggal</th>
                            <th style="text-align:center;" width="20%">Waktu</th>
                            <th style="text-align:center;" width="15%">Total</th>
                        </tfoot>
                    </table>
                </div>
            </div>';
        }
        else if($select_toko=="T1" && $select_tanggal=="bulan")
        {
        echo '<div class="data-table-list">
                <div class="table-responsive">
                    <table id="dt_custom2" width="100%" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center;" width="5%">No</th>
                                <th width="15">Nama User</th>
                                <th width="25%">Deskripsi Pengeluaran</th>
                                <th style="text-align:center;" width="20%">Tanggal</th>
                                <th style="text-align:center;" width="20%">Waktu</th>
                                <th style="text-align:center;" width="15%">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $no_keluar_lcc_bulan = 1;
                            $grand_pengeluaran_lcc_bulan = 0;
                            foreach($pengeluaran_lcc_bulan as $keluar_lcc_bulan)
                            {
                            $grand_pengeluaran_lcc_bulan += $keluar_lcc_bulan->total;
                            echo '
                            <tr>
                                <td style="text-align: center;">'.$no_keluar_lcc_bulan++.'</td>
                                <td>'.$keluar_lcc_bulan->nama_user.'</td>
                                <td>'.$keluar_lcc_bulan->deskripsi.'</td>
                                <td style="text-align: center;">'.date('d F Y',
                                    strtotime($keluar_lcc_bulan->tanggal)).'</td>
                                <td style="text-align: center;">'.date('H:i:s',
                                    strtotime($keluar_lcc_bulan->tanggal)).'</td>
                                <td style="text-align: right;">'.rupiah($keluar_lcc_bulan->total).'</td>
                            </tr>
                            ';
                            }
                            if($grand_pengeluaran_lcc_bulan == 0)
                            {
                            echo '<h4 style="float:right">Total Pengeluaran : 0</h4>';
                            }
                            else {
                            echo '<h4 style="float: right;">Total Pengeluaran :
                                '.rupiah($grand_pengeluaran_lcc_bulan).'
                            </h4>';
                            }
                            echo '
                        </tbody>
                        <tfoot>
                            <th style="text-align:center;" width="5%">No</th>
                            <th width="15">Nama User</th>
                            <th width="25%">Deskripsi Pengeluaran</th>
                            <th style="text-align:center;" width="20%">Tanggal</th>
                            <th style="text-align:center;" width="20%">Waktu</th>
                            <th style="text-align:center;" width="15%">Total</th>
                        </tfoot>
                    </table>
                </div>
            </div>';
        }
        else if($select_toko=="T2" && $select_tanggal=="hari")
        {
        echo '<div class="data-table-list">
                <div class="table-responsive">
                    <table id="dt_custom2" width="100%" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center;" width="5%">No</th>
                                <th width="15">Nama User</th>
                                <th width="25%">Deskripsi Pengeluaran</th>
                                <th style="text-align:center;" width="20%">Tanggal</th>
                                <th style="text-align:center;" width="20%">Waktu</th>
                                <th style="text-align:center;" width="15%">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $no_keluar_cmc_hari = 1;
                            $grand_pengeluaran_cmc_hari = 0;
                            foreach($pengeluaran_cmc_hari as $keluar_cmc_hari)
                            {
                            $grand_pengeluaran_cmc_hari += $keluar_cmc_hari->total;
                            echo '
                            <tr>
                                <td style="text-align: center;">'.$no_keluar_cmc_hari++.'</td>
                                <td>'.$keluar_cmc_hari->nama_user.'</td>
                                <td>'.$keluar_cmc_hari->deskripsi.'</td>
                                <td style="text-align: center;">'.date('d F Y',
                                    strtotime($keluar_cmc_hari->tanggal)).'</td>
                                <td style="text-align: center;">'.date('H:i:s',
                                    strtotime($keluar_cmc_hari->tanggal)).'</td>
                                <td style="text-align: right;">'.rupiah($keluar_cmc_hari->total).'</td>
                            </tr>
                            ';
                            }
                            if($grand_pengeluaran_cmc_hari == 0)
                            {
                            echo '<h4 style="float:right">Total Pengeluaran : 0</h4>';
                            }
                            else {
                            echo '<h4 style="float: right;">Total Pengeluaran :
                                '.rupiah($grand_pengeluaran_cmc_hari).'
                            </h4>';
                            }
                            echo '
                        </tbody>
                        <tfoot>
                            <th style="text-align:center;" width="5%">No</th>
                            <th width="15">Nama User</th>
                            <th width="25%">Deskripsi Pengeluaran</th>
                            <th style="text-align:center;" width="20%">Tanggal</th>
                            <th style="text-align:center;" width="20%">Waktu</th>
                            <th style="text-align:center;" width="15%">Total</th>
                        </tfoot>
                    </table>
                </div>
            </div>';
        }
        else if($select_toko=="T2" && $select_tanggal=="bulan")
        {
        echo '<div class="data-table-list">
                <div class="table-responsive">
                    <table id="dt_custom2" width="100%" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center;" width="5%">No</th>
                                <th width="15">Nama User</th>
                                <th width="25%">Deskripsi Pengeluaran</th>
                                <th style="text-align:center;" width="20%">Tanggal</th>
                                <th style="text-align:center;" width="20%">Waktu</th>
                                <th style="text-align:center;" width="15%">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $no_keluar_cmc_bulan = 1;
                            $grand_pengeluaran_cmc_bulan = 0;
                            foreach($pengeluaran_cmc_bulan as $keluar_cmc_bulan)
                            {
                            $grand_pengeluaran_cmc_bulan += $keluar_cmc_bulan->total;
                            echo '
                            <tr>
                                <td style="text-align: center;">'.$no_keluar_cmc_bulan++.'</td>
                                <td>'.$keluar_cmc_bulan->nama_user.'</td>
                                <td>'.$keluar_cmc_bulan->deskripsi.'</td>
                                <td style="text-align: center;">'.date('d F Y',
                                    strtotime($keluar_cmc_bulan->tanggal)).'</td>
                                <td style="text-align: center;">'.date('H:i:s',
                                    strtotime($keluar_cmc_bulan->tanggal)).'</td>
                                <td style="text-align: right;">'.rupiah($keluar_cmc_bulan->total).'</td>
                            </tr>
                            ';
                            }
                            if($grand_pengeluaran_cmc_bulan == 0)
                            {
                            echo '<h4 style="float:right">Total Pengeluaran : 0</h4>';
                            }
                            else {
                            echo '<h4 style="float: right;">Total Pengeluaran :
                                '.rupiah($grand_pengeluaran_cmc_bulan).'
                            </h4>';
                            }
                            echo '
                        </tbody>
                        <tfoot>
                            <th style="text-align:center;" width="5%">No</th>
                            <th width="15">Nama User</th>
                            <th width="25%">Deskripsi Pengeluaran</th>
                            <th style="text-align:center;" width="20%">Tanggal</th>
                            <th style="text-align:center;" width="20%">Waktu</th>
                            <th style="text-align:center;" width="15%">Total</th>
                        </tfoot>
                    </table>
                </div>
            </div>';
        }
        else if($select_toko=="T3" && $select_tanggal=="hari")
        {
        echo '<div class="data-table-list">
                <div class="table-responsive">
                    <table id="dt_custom2" width="100%" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center;" width="5%">No</th>
                                <th width="15">Nama User</th>
                                <th width="25%">Deskripsi Pengeluaran</th>
                                <th style="text-align:center;" width="20%">Tanggal</th>
                                <th style="text-align:center;" width="20%">Waktu</th>
                                <th style="text-align:center;" width="15%">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $no_keluar_probolinggo_hari = 1;
                            $grand_pengeluaran_probolinggo_hari = 0;
                            foreach($pengeluaran_probolinggo_hari as $keluar_probolinggo_hari)
                            {
                            $grand_pengeluaran_probolinggo_hari += $keluar_probolinggo_hari->total;
                            echo '
                            <tr>
                                <td style="text-align: center;">'.$no_keluar_probolinggo_hari++.'</td>
                                <td>'.$keluar_probolinggo_hari->nama_user.'</td>
                                <td>'.$keluar_probolinggo_hari->deskripsi.'</td>
                                <td style="text-align: center;">'.date('d F Y',
                                    strtotime($keluar_probolinggo_hari->tanggal)).'</td>
                                <td style="text-align: center;">'.date('H:i:s',
                                    strtotime($keluar_probolinggo_hari->tanggal)).'</td>
                                <td style="text-align: right;">'.rupiah($keluar_probolinggo_hari->total).'</td>
                            </tr>
                            ';
                            }
                            if($grand_pengeluaran_probolinggo_hari == 0)
                            {
                            echo '<h4 style="float:right">Total Pengeluaran : 0</h4>';
                            }
                            else {
                            echo '<h4 style="float: right;">Total Pengeluaran :
                                '.rupiah($grand_pengeluaran_probolinggo_hari).'
                            </h4>';
                            }
                            echo '
                        </tbody>
                        <tfoot>
                            <th style="text-align:center;" width="5%">No</th>
                            <th width="15">Nama User</th>
                            <th width="25%">Deskripsi Pengeluaran</th>
                            <th style="text-align:center;" width="20%">Tanggal</th>
                            <th style="text-align:center;" width="20%">Waktu</th>
                            <th style="text-align:center;" width="15%">Total</th>
                        </tfoot>
                    </table>
                </div>
            </div>';
        }
        else if($select_toko=="T3" && $select_tanggal=="bulan")
        {
        echo '<div class="data-table-list">
                <div class="table-responsive">
                    <table id="dt_custom2" width="100%" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center;" width="5%">No</th>
                                <th width="15">Nama User</th>
                                <th width="25%">Deskripsi Pengeluaran</th>
                                <th style="text-align:center;" width="20%">Tanggal</th>
                                <th style="text-align:center;" width="20%">Waktu</th>
                                <th style="text-align:center;" width="15%">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $no_keluar_probolinggo_bulan = 1;
                            $grand_pengeluaran_probolinggo_bulan = 0;
                            foreach($pengeluaran_probolinggo_bulan as $keluar_probolinggo_bulan)
                            {
                            $grand_pengeluaran_probolinggo_bulan += $keluar_probolinggo_bulan->total;
                            echo '
                            <tr>
                                <td style="text-align: center;">'.$no_keluar_probolinggo_bulan++.'</td>
                                <td>'.$keluar_probolinggo_bulan->nama_user.'</td>
                                <td>'.$keluar_probolinggo_bulan->deskripsi.'</td>
                                <td style="text-align: center;">'.date('d F Y',
                                    strtotime($keluar_probolinggo_bulan->tanggal)).'</td>
                                <td style="text-align: center;">'.date('H:i:s',
                                    strtotime($keluar_probolinggo_bulan->tanggal)).'</td>
                                <td style="text-align: right;">'.rupiah($keluar_probolinggo_bulan->total).'
                                </td>
                            </tr>
                            ';
                            }
                            if($grand_pengeluaran_probolinggo_bulan == 0)
                            {
                            echo '<h4 style="float:right">Total Pengeluaran : 0</h4>';
                            }
                            else {
                            echo '<h4 style="float: right;">Total Pengeluaran :
                                '.rupiah($grand_pengeluaran_probolinggo_bulan).'
                            </h4>';
                            }
                            echo '
                        </tbody>
                        <tfoot>
                            <th style="text-align:center;" width="5%">No</th>
                            <th width="15">Nama User</th>
                            <th width="25%">Deskripsi Pengeluaran</th>
                            <th style="text-align:center;" width="20%">Tanggal</th>
                            <th style="text-align:center;" width="20%">Waktu</th>
                            <th style="text-align:center;" width="15%">Total</th>
                        </tfoot>
                    </table>
                </div>
            </div>';
        }
    }
} 
