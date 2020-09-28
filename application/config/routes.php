<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = true;

$route['kasir'] = 'kasir/home';

// MANAGER
$route['dashboard_manager'] = 'manager/home';
$route['barang_barcode'] = 'manager/barcode';
$route['barang_barcode/(:any)'] = 'manager/barcode/print_barcode/$1';

$route['laporan_manager'] = 'manager/laporan';
$route['laporan_manager/custom'] = 'manager/laporan/custom';
$route['laporan_manager/custom_excel'] = 'manager/laporan/custom_excel';
$route['laporan_manager/hari_ini'] = 'manager/laporan/cetak_hari';
$route['laporan_manager/minggu_ini'] = 'manager/laporan/cetak_minggu';
$route['laporan_manager/bulan_ini'] = 'manager/laporan/cetak_bulan';
$route['laporan_manager/excel_hari'] = 'manager/laporan/excel_hari';
$route['laporan_manager/excel_bulan'] = 'manager/laporan/excel_bulan';
$route['laporan_manager/garansi'] = 'manager/laporan/garansi';

$route['user_kasir'] = 'manager/user';
$route['user_kasir/add'] = 'manager/user/insert';
$route['user_kasir/edit/(:any)'] = 'manager/user/edit/$1';
$route['user_kasir/hapus/(:any)'] = 'manager/user/hapus/$1';
$route['user_kasir/ganti_password/(:any)'] = 'manager/user/ganti_password/$1';

$route['barang_toko'] = 'manager/barang';
$route['barang_toko/stok_habis'] = 'manager/barang/stok_habis';
$route['barang_toko/trending'] = 'manager/barang/barang_terlaris';

$route['pemasokan'] = 'manager/pemasokan';
$route['pemasokan/daftar_pemasokan'] = 'manager/pemasokan/daftar_pemasokan';
$route['pemasokan/detail_pemasokan'] = 'manager/pemasokan/detail_pemasokan';

$route['pengeluaran_lain'] = 'manager/pengeluaran_lain';
$route['pengeluaran_lain/add'] = 'manager/pengeluaran_lain/add';
$route['pengeluaran_lain/delete/(:any)'] = 'manager/pengeluaran_lain/delete/$1';
// TUTUP MANAGER

// PIMPINAN
$route['dashboard_pimpinan'] = 'pimpinan/home';

$route['user_manager'] = 'pimpinan/user';
$route['user_manager/add'] = 'pimpinan/user/insert';
$route['user_manager/edit/(:any)'] = 'pimpinan/user/edit/$1';
$route['user_manager/hapus/(:any)'] = 'pimpinan/user/hapus/$1';
$route['user_manager/ganti_password/(:any)'] = 'pimpinan/user/ganti_password/$1';

$route['stok_habis'] = 'pimpinan/barang/stok_habis';
$route['barang_trending'] = 'pimpinan/barang/barang_terlaris';
$route['stok_toko'] = 'pimpinan/barang/stok_toko';

$route['pengeluaran'] = 'pimpinan/pengeluaran';
$route['laporan_pimpinan'] = 'pimpinan/laporan';

$route['distributor'] = 'pimpinan/distributor';
$route['distributor/add'] = 'pimpinan/distributor/insert';
$route['distributor/edit/(:any)'] = 'pimpinan/distributor/edit/$1';
$route['distributor/hapus/(:any)'] = 'pimpinan/distributor/hapus/$1';

$route['edit_account'] = 'pimpinan/edit_account';
/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
