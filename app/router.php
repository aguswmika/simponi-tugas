<?php 
/*
Contoh menggunakan router


Yang ini kalo mau pake class 
	$routes['admin/:param'] = 'Landing@admin';

Yang ini kalo mau pake prosedural
	$routes['admin/:param'] = function($halo){
		echo $halo;
	};

Yang ini routes default
	$routes['default'] = 'Landing@index';

*/



$routes['default'] = 'LandingController@index';
$routes['why-simponi'] = 'LandingController@whysimponi';
$routes['contact-us'] = 'LandingController@kontak';
$routes['blog'] = 'LandingController@blog';
$routes['edukasi'] = 'LandingController@edukasi';
$routes['marketplace'] = 'LandingController@marketplace';
$routes['product-detail'] = 'LandingController@product_detail';
$routes['shopping-cart'] = 'LandingController@cart';
$routes['forum'] = 'LandingController@forum';

// dashboard
$routes['control-panel'] = 'DashboardController@index';

// edukasi
$routes['control-panel/edukasi'] 		 = 'EdukasiController@index';
$routes['control-panel/edukasi/add']     = 'EdukasiController@add';
$routes['control-panel/edukasi/create']  = 'EdukasiController@create';
$routes['control-panel/edukasi/destroy'] = 'EdukasiController@destroy';
$routes['control-panel/edukasi/edit/:id']	= 'EdukasiController@edit';

// kategori

$routes['control-panel/kategori-edukasi'] = 'KategoriEdukasiController@index';
$routes['control-panel/kategori-edukasi/create'] = 'KategoriEdukasiController@create';
$routes['control-panel/kategori-edukasi/add'] = 'KategoriEdukasiController@add';
$routes['control-panel/kategori-edukasi/edit/:id'] = 'KategoriEdukasiController@edit';
$routes['control-panel/kategori-edukasi/update'] = 'KategoriEdukasiController@update';
$routes['control-panel/kategori-edukasi/destroy'] = 'KategoriEdukasiController@destroy';

//kategori produk
$routes['control-panel/kategori-produk'] = 'KategoriProdukController@index';
$routes['control-panel/kategori-produk/create'] = 'KategoriProdukController@create';
$routes['control-panel/kategori-produk/add'] = 'KategoriProdukController@add';
$routes['control-panel/kategori-produk/edit/:id'] = 'KategoriProdukController@edit';
$routes['control-panel/kategori-produk/destroy'] = 'KategoriProdukController@destroy';

//produk
$routes['control-panel/produk'] = 'ProdukController@index';
$routes['control-panel/produk/create'] = 'ProdukController@create';
$routes['control-panel/produk/add'] = 'ProdukController@add';


//pengguna
$routes['control-panel/pengguna'] = 'PenggunaController@index';
$routes['control-panel/pengguna/add'] = 'PenggunaController@add';
$routes['control-panel/pengguna/create'] = 'PenggunaController@create';
$routes['control-panel/pengguna/edit/:id'] = 'PenggunaController@edit';
$routes['control-panel/pengguna/update/:id'] = 'PenggunaController@update';
$routes['control-panel/pengguna/destroy'] = 'PenggunaController@destroy';

// autentikasi
$routes['login'] = 'LandingController@login';
$routes['dologin'] = 'LandingController@doLogin';
$routes['register'] = 'LandingController@register';
$routes['logout'] = 'DashboardController@logout';

