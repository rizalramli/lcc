<?php
require('./assets/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('id_user')) {
      redirect('/');
    } else if ($this->session->userdata('akses') != 'Manager') {
      redirect('login/logout');
    }
    $this->load->model('manager/M_laporan');
  }

  public function index()
  {
    $data['hari'] = $this->M_laporan->tampil_hari()->result();
    $data['bulanan'] = $this->M_laporan->tampil_bulan()->result();
    $this->template->load('view_1/template/manager', 'view_1/konten/manager/laporan/v_laporan_penjualan', $data);
  }
  public function custom()
  {
    $tgl1 = date('Y-m-d', strtotime($this->input->post('tgl_mulai')));
    $tgl2 = date('Y-m-d', strtotime($this->input->post('tgl_akhir')));
    $tgl_mulai = $tgl1 . " 00:00:01";
    $tgl_akhir = $tgl2 . " 23:59:59";
    $data['custom'] = $this->M_laporan->tampil_data2($tgl_mulai, $tgl_akhir)->result();
    $data['tgl_mulai'] = $this->input->post('tgl_mulai');
    $data['tgl_akhir'] = $this->input->post('tgl_akhir');
    $data['custom'] = $this->M_laporan->tampil_data2($tgl_mulai, $tgl_akhir)->result();
    $pengeluaran_custom = $this->M_laporan->pengeluaran_custom($tgl_mulai, $tgl_akhir)->result();
    $total_pengeluaran_custom = 0;
    foreach ($pengeluaran_custom as $row) {
      $total_pengeluaran_custom += $row->total;
    }
    $data['pengeluaran_custom'] = $total_pengeluaran_custom;
    $html = $this->load->view('view_1/konten/manager/laporan/print_laporan', $data, true);
    $this->dompdf->PdfGenerator($html, 'coba', 'A4', 'landscape');
  }
  public function custom_excel()
  {
    $tgl1 = date('Y-m-d', strtotime($this->input->post('tgl_mulai')));
    $tgl2 = date('Y-m-d', strtotime($this->input->post('tgl_akhir')));
    $tgl_mulai = $tgl1 . " 00:00:01";
    $tgl_akhir = $tgl2 . " 23:59:59";
    $nama_toko = $this->session->userdata('nama_toko');
    date_default_timezone_set("Asia/Jakarta");
    $data = $this->M_laporan->tampil_data2($tgl_mulai, $tgl_akhir)->result();
    $data2 = $this->M_laporan->pengeluaran_custom($tgl_mulai, $tgl_akhir)->result();
    $mulai = date('d F Y', strtotime($tgl1));
    $akhir =  date('d F Y', strtotime($tgl2));
    $spreadsheet = new Spreadsheet;
    // Mengatur Lebar Kolom
    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(25);
    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(14);
    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(14);
    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(5);
    $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(14);
    $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(30);
    $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(20);
    $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(14);
    // $spreadsheet->getActiveSheet()->getColumnDimension('A1')->setWidth(200);
    // Mengatur Tinggi Kolom
    $spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(35);
    $spreadsheet->getActiveSheet()->getRowDimension('2')->setRowHeight(25);
    // Atur Warna background color dan text
    $spreadsheet->getActiveSheet()->getStyle('A2:H2')
      ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
    $spreadsheet->getActiveSheet()->getStyle('A2:H2')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setARGB('006400');
    $spreadsheet->getActiveSheet()->getStyle('I2:K2')
      ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
    $spreadsheet->getActiveSheet()->getStyle('I2:K2')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setARGB('8B0000');
    // Tutup

    // Atur alignment JUDUL
    $spreadsheet->getActiveSheet()->getStyle('A2:K2')->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle('A2:K2')->getAlignment()->setHorizontal('center');
    $spreadsheet->getActiveSheet()->getStyle('A2:K2')
      ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('A2:K2')
      ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

    // Border
    $spreadsheet->getActiveSheet()->getStyle('A2:K2')->getBorders()->getallBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK)->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);;

    // Atur JUDUL
    $spreadsheet->getActiveSheet()->getStyle('A1:K1')->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle("A1:K1")->getFont()->setSize(20);
    $spreadsheet->getActiveSheet()->getStyle('A1:K1')
      ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
    $spreadsheet->getActiveSheet()->mergeCells("A1:K1");
    $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'Laporan Toko ' . $nama_toko . ' Tanggal ' . $mulai . ' - ' . $akhir);
    $spreadsheet->getActiveSheet()->getStyle('A1:K1')->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle('A1:K1')->getAlignment()->setHorizontal('center');
    $spreadsheet->getActiveSheet()->getStyle('A1:K1')
      ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('A1:K1')
      ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('A2', 'No')
      ->setCellValue('B2', 'Nama Customer')
      ->setCellValue('C2', 'Nama Barang')
      ->setCellValue('D2', 'Tanggal & Waktu')
      ->setCellValue('E2', 'Harga Beli')
      ->setCellValue('F2', 'Harga Jual')
      ->setCellValue('G2', 'Qty')
      ->setCellValue('H2', 'Keuntungan')
      ->setCellValue('I2', 'Deskripsi')
      ->setCellValue('J2', 'Tanggal & Waktu')
      ->setCellValue('K2', 'Jumlah');

    $kolom = 3;
    $nomor = 1;
    $total_harga_jual = 0;
    $total_keuntungan = 0;
    foreach ($data as $row) {
      $keuntungan = $row->harga_jual *
        $row->jumlah_barang -
        $row->hrg_distributor * $row->jumlah_barang;

      $total_harga_jual += $row->harga_jual;
      $total_keuntungan += $keuntungan;

      $spreadsheet->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal('right');
      $spreadsheet->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal('right');
      $spreadsheet->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal('right');
      $spreadsheet->getActiveSheet()->getStyle('J')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('K')->getAlignment()->setHorizontal('right');



      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $kolom, $nomor)
        ->setCellValue('B' . $kolom, $row->nama_customer)
        ->setCellValue('C' . $kolom, $row->nama_barang)
        ->setCellValue('D' . $kolom, date('d/m/Y H:i:s', strtotime($row->tanggal_penjualan)))
        ->setCellValue('E' . $kolom, number_format($row->hrg_distributor, 0, ".", ","))
        ->setCellValue('F' . $kolom, number_format($row->harga_jual, 0, ".", ","))
        ->setCellValue('G' . $kolom, $row->jumlah_barang)
        ->setCellValue('H' . $kolom, number_format($keuntungan, 0, ".", ","));
      $kolom++;
      $nomor++;
    }

    $kolom2 = 3;
    $total_pengeluaran = 0;
    foreach ($data2 as $row2) {
      $total_pengeluaran += $row2->total;
      $spreadsheet->getActiveSheet()->getStyle('J')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('K')->getAlignment()->setHorizontal('right');

      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('I' . $kolom2, $row2->deskripsi)
        ->setCellValue('J' . $kolom2, date('d/m/Y H:i:s', strtotime($row2->tanggal)))
        ->setCellValue('K' . $kolom2, number_format($row2->total, 0, ".", ","));
      $kolom2++;
    }

    // TOTAL
    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('F' . $kolom, number_format($total_harga_jual, 0, ".", ","))
      ->setCellValue('H' . $kolom, number_format($total_keuntungan, 0, ".", ","))
      ->setCellValue('K' . $kolom, number_format($total_pengeluaran, 0, ".", ","));
    $spreadsheet->getActiveSheet()->getStyle('E' . $kolom . ':K' . $kolom)->getFont()->setBold(true);



    $spreadsheet->getActiveSheet()->getStyle('A' . $kolom . ':K' . $kolom)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK)->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);;


    $spreadsheet->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal('center');
    $spreadsheet->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal('right');

    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('B' . ((int) $kolom + 3), 'Total Keuntungan')
      ->setCellValue('C' . ((int) $kolom + 3), number_format($total_keuntungan, 0, ".", ","));
    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('B' . ((int) $kolom + 4), 'Total Pengeluaran')
      ->setCellValue('C' . ((int) $kolom + 4), number_format($total_pengeluaran, 0, ".", ","));
    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('B' . ((int) $kolom + 5), 'Keuntungan Bersih')
      ->setCellValue('C' . ((int) $kolom + 5), number_format($total_keuntungan - $total_pengeluaran, 0, ".", ","));

    $spreadsheet->getActiveSheet()->getStyle('B' . ((int) $kolom + 3) . ':C' . ((int) $kolom + 3))->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle('B' . ((int) $kolom + 4) . ':C' . ((int) $kolom + 4))->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle('B' . ((int) $kolom + 5) . ':C' . ((int) $kolom + 5))->getFont()->setBold(true);



    $writer = new Xlsx($spreadsheet);

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $nama_toko . ' Custom' . '.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
  }
  public function cetak_hari()
  {
    $data['hari'] = $this->M_laporan->tampil_hari()->result();
    $pengeluaran_hari = $this->M_laporan->pengeluaran_hari()->result();
    $total_pengeluaran_hari = 0;
    foreach ($pengeluaran_hari as $row) {
      $total_pengeluaran_hari += $row->total;
    }
    $data['pengeluaran_hari'] = $total_pengeluaran_hari;
    $html = $this->load->view('view_1/konten/manager/laporan/print_per_hari', $data, true);
    $tanggal = date('d/m/Y');
    $this->dompdf->PdfGenerator($html, 'laporan-' . $tanggal, 'A4', 'landscape');
  }
  public function cetak_bulan()
  {
    $data['bulanan'] = $this->M_laporan->tampil_bulan()->result();
    $pengeluaran_bulan = $this->M_laporan->pengeluaran_bulan()->result();
    $total_pengeluaran_bulan = 0;
    foreach ($pengeluaran_bulan as $row) {
      $total_pengeluaran_bulan += $row->total;
    }
    $data['pengeluaran_bulan'] = $total_pengeluaran_bulan;
    $html = $this->load->view('view_1/konten/manager/laporan/print_per_bulan', $data, true);
    $tanggal = date('F-Y');
    $this->dompdf->PdfGenerator($html, 'laporan' . $tanggal, 'A4', 'landscape');
  }
  public function excel_hari()
  {
    $nama_toko = $this->session->userdata('nama_toko');
    date_default_timezone_set("Asia/Jakarta");
    $data = $this->M_laporan->tampil_hari()->result();
    $data2 = $this->M_laporan->pengeluaran_hari()->result();
    $tanggal = date('d F Y');
    $tanggal_title = date('d-m-Y');
    $spreadsheet = new Spreadsheet;
    // Mengatur Lebar Kolom
    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(25);
    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(14);
    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(14);
    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(5);
    $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(14);
    $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(30);
    $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(20);
    $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(14);
    // $spreadsheet->getActiveSheet()->getColumnDimension('A1')->setWidth(200);
    // Mengatur Tinggi Kolom
    $spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(35);
    $spreadsheet->getActiveSheet()->getRowDimension('2')->setRowHeight(25);
    // Atur Warna background color dan text
    $spreadsheet->getActiveSheet()->getStyle('A2:H2')
      ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
    $spreadsheet->getActiveSheet()->getStyle('A2:H2')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setARGB('006400');
    $spreadsheet->getActiveSheet()->getStyle('I2:K2')
      ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
    $spreadsheet->getActiveSheet()->getStyle('I2:K2')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setARGB('8B0000');
    // Tutup

    // Atur alignment JUDUL
    $spreadsheet->getActiveSheet()->getStyle('A2:K2')->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle('A2:K2')->getAlignment()->setHorizontal('center');
    $spreadsheet->getActiveSheet()->getStyle('A2:K2')
      ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('A2:K2')
      ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

    // Border
    $spreadsheet->getActiveSheet()->getStyle('A2:K2')->getBorders()->getallBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK)->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);;

    // Atur JUDUL
    $spreadsheet->getActiveSheet()->getStyle('A1:K1')->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle("A1:K1")->getFont()->setSize(20);
    $spreadsheet->getActiveSheet()->getStyle('A1:K1')
      ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
    $spreadsheet->getActiveSheet()->mergeCells("A1:K1");
    $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'Laporan Toko ' . $nama_toko . " Tanggal " . $tanggal);
    $spreadsheet->getActiveSheet()->getStyle('A1:K1')->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle('A1:K1')->getAlignment()->setHorizontal('center');
    $spreadsheet->getActiveSheet()->getStyle('A1:K1')
      ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('A1:K1')
      ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('A2', 'No')
      ->setCellValue('B2', 'Nama Customer')
      ->setCellValue('C2', 'Nama Barang')
      ->setCellValue('D2', 'Tanggal & Waktu')
      ->setCellValue('E2', 'Harga Beli')
      ->setCellValue('F2', 'Harga Jual')
      ->setCellValue('G2', 'Qty')
      ->setCellValue('H2', 'Keuntungan')
      ->setCellValue('I2', 'Deskripsi')
      ->setCellValue('J2', 'Tanggal & Waktu')
      ->setCellValue('K2', 'Jumlah');

    $kolom = 3;
    $nomor = 1;
    $total_harga_jual = 0;
    $total_keuntungan = 0;
    foreach ($data as $row) {
      $keuntungan = $row->harga_jual *
        $row->jumlah_barang -
        $row->hrg_distributor * $row->jumlah_barang;

      $total_harga_jual += $row->harga_jual;
      $total_keuntungan += $keuntungan;

      $spreadsheet->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal('right');
      $spreadsheet->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal('right');
      $spreadsheet->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal('right');
      $spreadsheet->getActiveSheet()->getStyle('J')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('K')->getAlignment()->setHorizontal('right');



      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $kolom, $nomor)
        ->setCellValue('B' . $kolom, $row->nama_customer)
        ->setCellValue('C' . $kolom, $row->nama_barang)
        ->setCellValue('D' . $kolom, date('d/m/Y H:i:s', strtotime($row->tanggal_penjualan)))
        ->setCellValue('E' . $kolom, number_format($row->hrg_distributor, 0, ".", ","))
        ->setCellValue('F' . $kolom, number_format($row->harga_jual, 0, ".", ","))
        ->setCellValue('G' . $kolom, $row->jumlah_barang)
        ->setCellValue('H' . $kolom, number_format($keuntungan, 0, ".", ","));
      $kolom++;
      $nomor++;
    }

    $kolom2 = 3;
    $total_pengeluaran = 0;
    foreach ($data2 as $row2) {
      $total_pengeluaran += $row2->total;
      $spreadsheet->getActiveSheet()->getStyle('J')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('K')->getAlignment()->setHorizontal('right');

      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('I' . $kolom2, $row2->deskripsi)
        ->setCellValue('J' . $kolom2, date('d/m/Y H:i:s', strtotime($row2->tanggal)))
        ->setCellValue('K' . $kolom2, number_format($row2->total, 0, ".", ","));
      $kolom2++;
    }

    // TOTAL
    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('F' . $kolom, number_format($total_harga_jual, 0, ".", ","))
      ->setCellValue('H' . $kolom, number_format($total_keuntungan, 0, ".", ","))
      ->setCellValue('K' . $kolom, number_format($total_pengeluaran, 0, ".", ","));
    $spreadsheet->getActiveSheet()->getStyle('D' . $kolom . ':J' . $kolom)->getFont()->setBold(true);



    $spreadsheet->getActiveSheet()->getStyle('A' . $kolom . ':K' . $kolom)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK)->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);;


    $spreadsheet->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal('center');
    $spreadsheet->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal('right');

    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('B' . ((int) $kolom + 3), 'Total Keuntungan')
      ->setCellValue('C' . ((int) $kolom + 3), number_format($total_keuntungan, 0, ".", ","));
    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('B' . ((int) $kolom + 4), 'Total Pengeluaran')
      ->setCellValue('C' . ((int) $kolom + 4), number_format($total_pengeluaran, 0, ".", ","));
    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('B' . ((int) $kolom + 5), 'Keuntungan Bersih')
      ->setCellValue('C' . ((int) $kolom + 5), number_format($total_keuntungan - $total_pengeluaran, 0, ".", ","));

    $spreadsheet->getActiveSheet()->getStyle('B' . ((int) $kolom + 3) . ':C' . ((int) $kolom + 3))->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle('B' . ((int) $kolom + 4) . ':C' . ((int) $kolom + 4))->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle('B' . ((int) $kolom + 5) . ':C' . ((int) $kolom + 5))->getFont()->setBold(true);



    $writer = new Xlsx($spreadsheet);

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $nama_toko . " " . $tanggal_title . '.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
  }
  public function excel_bulan()
  {
    $nama_toko = $this->session->userdata('nama_toko');
    date_default_timezone_set("Asia/Jakarta");
    $data = $this->M_laporan->tampil_bulan()->result();
    $data2 = $this->M_laporan->pengeluaran_bulan()->result();
    $tanggal = date('F Y');
    $tanggal_title = date('F Y');
    $spreadsheet = new Spreadsheet;
    // Mengatur Lebar Kolom
    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(25);
    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(14);
    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(14);
    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(5);
    $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(14);
    $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(30);
    $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(20);
    $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(14);
    // $spreadsheet->getActiveSheet()->getColumnDimension('A1')->setWidth(200);
    // Mengatur Tinggi Kolom
    $spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(35);
    $spreadsheet->getActiveSheet()->getRowDimension('2')->setRowHeight(25);
    // Atur Warna background color dan text
    $spreadsheet->getActiveSheet()->getStyle('A2:H2')
      ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
    $spreadsheet->getActiveSheet()->getStyle('A2:H2')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setARGB('006400');
    $spreadsheet->getActiveSheet()->getStyle('I2:K2')
      ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
    $spreadsheet->getActiveSheet()->getStyle('I2:K2')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setARGB('8B0000');
    // Tutup

    // Atur alignment JUDUL
    $spreadsheet->getActiveSheet()->getStyle('A2:K2')->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle('A2:K2')->getAlignment()->setHorizontal('center');
    $spreadsheet->getActiveSheet()->getStyle('A2:K2')
      ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('A2:K2')
      ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

    // Border
    $spreadsheet->getActiveSheet()->getStyle('A2:K2')->getBorders()->getallBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK)->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);;

    // Atur JUDUL
    $spreadsheet->getActiveSheet()->getStyle('A1:K1')->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle("A1:K1")->getFont()->setSize(20);
    $spreadsheet->getActiveSheet()->getStyle('A1:K1')
      ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);

    $spreadsheet->getActiveSheet()->mergeCells("A1:K1");

    $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'Laporan Toko ' . $nama_toko . " Bulan " . $tanggal);
    $spreadsheet->getActiveSheet()->getStyle('A1:K1')->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle('A1:K1')->getAlignment()->setHorizontal('center');
    $spreadsheet->getActiveSheet()->getStyle('A1:K1')
      ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('A1:K1')
      ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('A2', 'No')
      ->setCellValue('B2', 'Nama Customer')
      ->setCellValue('C2', 'Nama Barang')
      ->setCellValue('D2', 'Tanggal & Waktu')
      ->setCellValue('E2', 'Harga Beli')
      ->setCellValue('F2', 'Harga Jual')
      ->setCellValue('G2', 'Qty')
      ->setCellValue('H2', 'Keuntungan')
      ->setCellValue('I2', 'Deskripsi')
      ->setCellValue('J2', 'Tanggal & Waktu')
      ->setCellValue('K2', 'Jumlah');

    $kolom = 3;
    $nomor = 1;
    $total_harga_jual = 0;
    $total_keuntungan = 0;
    foreach ($data as $row) {
      $keuntungan = $row->harga_jual *
        $row->jumlah_barang -
        $row->hrg_distributor * $row->jumlah_barang;

      $total_harga_jual += $row->harga_jual;
      $total_keuntungan += $keuntungan;

      $spreadsheet->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal('right');
      $spreadsheet->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal('right');
      $spreadsheet->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal('right');
      $spreadsheet->getActiveSheet()->getStyle('J')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('K')->getAlignment()->setHorizontal('right');


      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $kolom, $nomor)
        ->setCellValue('B' . $kolom, $row->nama_customer)
        ->setCellValue('C' . $kolom, $row->nama_barang)
        ->setCellValue('D' . $kolom, date('d/m/Y H:i:s', strtotime($row->tanggal_penjualan)))
        ->setCellValue('E' . $kolom, number_format($row->hrg_distributor, 0, ".", ","))
        ->setCellValue('F' . $kolom, number_format($row->harga_jual, 0, ".", ","))
        ->setCellValue('G' . $kolom, $row->jumlah_barang)
        ->setCellValue('H' . $kolom, number_format($keuntungan, 0, ".", ","));
      $kolom++;
      $nomor++;
    }




    $kolom2 = 3;
    $total_pengeluaran = 0;
    foreach ($data2 as $row2) {
      $total_pengeluaran += $row2->total;
      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('I' . $kolom2, $row2->deskripsi)
        ->setCellValue('J' . $kolom2, date('d/m/Y H:i:s', strtotime($row2->tanggal)))
        ->setCellValue('K' . $kolom2, number_format($row2->total, 0, ".", ","));
      $kolom2++;
    }

    // TOTAL
    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('F' . $kolom, number_format($total_harga_jual, 0, ".", ","))
      ->setCellValue('H' . $kolom, number_format($total_keuntungan, 0, ".", ","))
      ->setCellValue('K' . $kolom, number_format($total_pengeluaran, 0, ".", ","));
    $spreadsheet->getActiveSheet()->getStyle('E' . $kolom . ':K' . $kolom)->getFont()->setBold(true);


    $spreadsheet->getActiveSheet()->getStyle('A' . $kolom . ':K' . $kolom)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK)->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);;


    $spreadsheet->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal('center');
    $spreadsheet->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal('right');

    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('B' . ((int) $kolom + 3), 'Total Keuntungan')
      ->setCellValue('C' . ((int) $kolom + 3), number_format($total_keuntungan, 0, ".", ","));
    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('B' . ((int) $kolom + 4), 'Total Pengeluaran')
      ->setCellValue('C' . ((int) $kolom + 4), number_format($total_pengeluaran, 0, ".", ","));
    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('B' . ((int) $kolom + 5), 'Keuntungan Bersih')
      ->setCellValue('C' . ((int) $kolom + 5), number_format($total_keuntungan - $total_pengeluaran, 0, ".", ","));

    $spreadsheet->getActiveSheet()->getStyle('B' . ((int) $kolom + 3) . ':C' . ((int) $kolom + 3))->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle('B' . ((int) $kolom + 4) . ':C' . ((int) $kolom + 4))->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle('B' . ((int) $kolom + 5) . ':C' . ((int) $kolom + 5))->getFont()->setBold(true);


    $writer = new Xlsx($spreadsheet);

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $nama_toko . " " . $tanggal_title . '.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
  }

  public function garansi()
  {
    $id_toko = $this->session->userdata('id_toko'); // session

    $data_id = array(
      'id_toko' => $id_toko
    );

    $data['record'] = $this->M_laporan->get_data('barang_garansi', $data_id)->result();
    $this->template->load('view_1/template/manager', 'view_1/konten/manager/laporan/v_garansi', $data);
  }
}
