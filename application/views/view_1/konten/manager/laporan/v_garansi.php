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
                                    <h2>LAPORAN DATA GARANSI</h2>
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
<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                    <div class="table-responsive">
                        <table width="100%" id="data-table-basic" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama pelanggan</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>SN / Imei</th>
                                    <th>Garansi Telah Berjalan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($record as $row) {
                                    ?>

                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row->nama_customer; ?></td>
                                        <td><?= $row->nama_barang; ?></td>
                                        <td><?= date('d F Y',strtotime($row->tanggal)); ?></td>
                                        <td><?= date('H:i:s',strtotime($row->tanggal)); ?></td>
                                        <td><?= $row->kode_unik; ?></td>
                                        <td><?= $row->garansi_berjalan . ' Hari'; ?></td>
                                    </tr>

                                <?php
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