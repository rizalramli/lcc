    <div class="breadcomb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="notika-icon notika-form"></i>
                                </div>
                                <div style="margin-top:15px" class="breadcomb-ctn">
                                    <h2>LAPORAN DATA PENJUALAN</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="data-table-area">
    <div class="container">
        <h4>Laporan Periode</h4>
        <div class="row">
                <div style="margin-bottom: 30px;" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div style="padding:10px" class="contact-inner">
                        <div class="datepicker-int">
                            <form action="<?php echo base_url('laporan_manager/custom') ?>" method="post" target="_blank">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                    <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                        <label>Tanggal Mulai</label>
                                        <div class="input-group date nk-int-st">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control tgl" name="tgl_mulai" placeholder="Masukan tanggal mulai" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                    <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                        <label>Tanggal Akhir</label>
                                        <div class="input-group date nk-int-st">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control tgl" name="tgl_akhir" placeholder="Masukan tanggal akhir" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group nk-datapk-ctm form-elet-mg" id="data_3">
                                        <label>&nbsp</label>
                                        <button type="submit" class="btn btn-primary btn-block">PDF</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div style="margin-bottom: 30px;" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div style="padding:10px" class="contact-inner">
                        <div class="datepicker-int">
                            <form action="<?php echo base_url('laporan_manager/custom_excel') ?>" method="post">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                        <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                            <label>Tanggal Mulai</label>
                                            <div class="input-group date nk-int-st">
                                                <span class="input-group-addon"></span>
                                                <input type="text" class="form-control tgl" name="tgl_mulai" placeholder="Masukan tanggal mulai" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                        <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                            <label>Tanggal Akhir</label>
                                            <div class="input-group date nk-int-st">
                                                <span class="input-group-addon"></span>
                                                <input type="text" class="form-control tgl" name="tgl_akhir" placeholder="Masukan tanggal akhir" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <div class="form-group nk-datapk-ctm form-elet-mg" id="data_3">
                                            <label>&nbsp</label>
                                            <button type="submit" class="btn btn-success btn-block">Excel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            
        </div>
        
        <div class="row" style="margin-bottom:27px;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="widget-tabs-int">
                    <div class="widget-tabs-list">

                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Hari Ini</a></li>
                            <li><a data-toggle="tab" href="#menu2">Bulan Ini</a></li>
                        </ul>
                        <div class="tab-content tab-custom-st">
                            <div id="home" class="tab-pane fade in active">
                                <div class="tab-ctn">
                                    <div class="data-table-list">
                                        <div class="row">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a style="margin-right:20px" target="_blank" class="btn btn-primary"
                                                            href="<?php echo base_url().'laporan_manager/hari_ini' ?>"><i
                                                                class="glyphicon glyphicon-search"></i> PDF</a>
                                                            <a class="btn btn-success"
                                                                href="<?php echo base_url().'laporan_manager/excel_hari' ?>"><i
                                                                    class="glyphicon glyphicon-print"></i> Excel</a>
                                                    </span>
                                                </div><!-- /input-group -->
                                        </div>
                                        <div class="table-responsive">
                                            <table width="100%" id="dt_custom1" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">No</th>
                                                        <th style="text-align: center;">Nama Customer</th>
                                                        <th style="text-align: center;">Nama Barang</th>
                                                        <th style="text-align: center;">Tanggal & Waktu</th>
                                                        <th style="text-align: center;">Harga Beli</th>
                                                        <th style="text-align: center;">Harga Jual</th>
                                                        <th style="text-align: center;">Qty</th>
                                                        <th style="text-align: center;">Keuntungan</th>
                                                    </tr>
                                                </thead>
                                                    <tbody>
                                                    <?php 
                                                    $no_hari = 1;
                                                    $total_hari=0;
                                                    $harga_jual_hari = 0;
                                                    foreach($hari as $row_hari){
                                                    $keuntungan_hari = $row_hari->harga_jual *
                                                    $row_hari->jumlah_barang -
                                                    $row_hari->hrg_distributor * $row_hari->jumlah_barang;
                                                    ?>
                                                        <tr>
                                                            <td style="text-align: center;"><?= $no_hari++; ?></td>
                                                            <td><?= $row_hari->nama_customer; ?></td>
                                                            <td style="text-align: center;">
                                                                <?= $row_hari->nama_barang; ?></td>
                                                            <td style="text-align:center;"><?= date('d/m/Y H:i:s', strtotime($row_hari->tanggal_penjualan)); ?>
                                                            </td>
                                                            <td style="text-align: right;"><?= rupiah($row_hari->hrg_distributor) ?>
                                                            </td>
                                                            <td style="text-align: right;">
                                                                <?= rupiah($row_hari->harga_jual) ?>
                                                            </td>
                                                            <td style="text-align: center;"><?= $row_hari->jumlah_barang; ?></td>
                                                            <td style="text-align: right;"><?= rupiah($keuntungan_hari) ?>
                                                            </td>
                                                        </tr>
                                                        <?php 
                                                        $total_hari += $keuntungan_hari; 
                                                        $harga_jual_hari += $row_hari->harga_jual; 
                                                        }
                                                        ?>
                                                        <?php 
                                                        if($total_hari == "")
                                                        {
                                                            echo '<h4 style="float: right;margin-left:50px">Total Keuntungan :
                                                                0 </h4>
                                                            <h4 style="float:right">Total Harga Jual : 0</h4>';
                                                        }
                                                        else {
                                                            echo '<h4 style="float: right;margin-left:50px">Total Keuntungan :
                                                                '.rupiah($total_hari).'</h4>
                                                            <h4 style="float: right;">Total Harga Jual :
                                                                '.rupiah($harga_jual_hari).'</h4>';
                                                        }
                                                        ?>

                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <div class="tab-ctn">
                                    <div class="data-table-list">
                                        <div class="row">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a style="margin-right:20px" target="_blank" class="btn btn-primary"
                                                        href="<?php echo base_url().'laporan_manager/bulan_ini' ?>"><i
                                                            class="glyphicon glyphicon-search"></i> PDF</a>
                                                    <a class="btn btn-success"
                                                        href="<?php echo base_url().'laporan_manager/excel_bulan' ?>"><i
                                                            class="glyphicon glyphicon-print"></i> Excel</a>
                                                </span>
                                            </div><!-- /input-group -->
                                        </div>
                                        <div class="table-responsive">
                                            <table width="100%" id="dt_custom2" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">No</th>
                                                        <th style="text-align: center;">Nama Customer</th>
                                                        <th style="text-align: center;">Nama Barang</th>
                                                        <th style="text-align: center;">Tanggal & Waktu</th>
                                                        <th style="text-align: center;">Harga Beli</th>
                                                        <th style="text-align: center;">Harga Jual</th>
                                                        <th style="text-align: center;">Qty</th>
                                                        <th style="text-align: center;">Keuntungan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $no_bulan = 1;
                                                    $total_bulan=0;
                                                    $harga_jual_bulan=0;
                                                    foreach($bulanan as $row_bulan){
                                                    $keuntungan_bulan = $row_bulan->harga_jual *
                                                    $row_bulan->jumlah_barang -
                                                    $row_bulan->hrg_distributor * $row_bulan->jumlah_barang;
                                                    ?>
                                                    <tr>
                                                        <td style="text-align: center;"><?= $no_bulan++; ?></td>
                                                        <td><?= $row_bulan->nama_customer; ?></td>
                                                        <td style="text-align: center;"><?= $row_bulan->nama_barang; ?>
                                                        </td>
                                                        <td style="text-align:center;">
                                                            <?= date('d/m/Y H:i:s', strtotime($row_bulan->tanggal_penjualan)); ?>
                                                        </td>
                                                        <td style="text-align: right;">
                                                            <?= rupiah($row_bulan->hrg_distributor) ?>
                                                        </td>
                                                        <td style="text-align: right;">
                                                            <?= rupiah($row_bulan->harga_jual) ?>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <?= $row_bulan->jumlah_barang; ?>
                                                        </td>
                                                        <td style="text-align: right;">
                                                            <?= rupiah($keuntungan_bulan) ?>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                    $total_bulan += $keuntungan_bulan; 
                                                    $harga_jual_bulan += $row_bulan->harga_jual; 
                                                    }
                                                    ?>
                                                    <?php 
                                                    if($total_bulan == "")
                                                    {
                                                        echo '<h4 style="float: right;margin-left:50px">Total Keuntungan :
                                                            0 </h4>
                                                        <h4 style="float:right">Total Harga Jual : 0</h4>';
                                                    }
                                                    else {
                                                        echo '<h4 style="float: right;margin-left:50px">Total Keuntungan :
                                                            '.rupiah($total_bulan).'</h4>
                                                        <h4 style="float: right;">Total Harga Jual :
                                                            '.rupiah($harga_jual_bulan).'</h4>';
                                                    }
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- Breadcomb area End-->
    <!-- Data Table area Start-->
