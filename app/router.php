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
$routes['edukasi'] = 'LandingEdukasiController@index';
$routes['pembelajaran/:slug'] = 'LandingEdukasiController@pembelajaran';
$routes['edukasi/:id'] = 'LandingEdukasiController@detail';
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
$routes['control-panel/edukasi/update/:id'] = 'EdukasiController@update';

// kategori

$routes['control-panel/kategori-edukasi'] = 'KategoriEdukasiController@index';
$routes['control-panel/kategori-edukasi/create'] = 'KategoriEdukasiController@create';
$routes['control-panel/kategori-edukasi/add'] = 'KategoriEdukasiController@add';
$routes['control-panel/kategori-edukasi/edit/:id'] = 'KategoriEdukasiController@edit';
$routes['control-panel/kategori-edukasi/update/:id'] = 'KategoriEdukasiController@update';
$routes['control-panel/kategori-edukasi/destroy'] = 'KategoriEdukasiController@destroy';

//kategori produk
$routes['control-panel/kategori-produk'] = 'KategoriProdukController@index';
$routes['control-panel/kategori-produk/create'] = 'KategoriProdukController@create';
$routes['control-panel/kategori-produk/add'] = 'KategoriProdukController@add';
$routes['control-panel/kategori-produk/edit/:id'] = 'KategoriProdukController@edit';
$routes['control-panel/kategori-produk/destroy'] = 'KategoriProdukController@destroy';
$routes['control-panel/kategori-produk/update/:id'] = 'KategoriProdukController@update';

//produk
$routes['control-panel/produk'] = 'ProdukController@index';
$routes['control-panel/produk/create'] = 'ProdukController@create';
$routes['control-panel/produk/add'] = 'ProdukController@add';
$routes['control-panel/produk/destroy'] = 'ProdukController@destroy';
$routes['control-panel/produk/edit/:id'] = 'ProdukController@edit';
$routes['control-panel/produk/update/:id'] = 'ProdukController@update';

//pengguna
$routes['control-panel/pengguna'] = 'PenggunaController@index';
$routes['control-panel/pengguna/add'] = 'PenggunaController@add';
$routes['control-panel/pengguna/create'] = 'PenggunaController@create';
$routes['control-panel/pengguna/edit/:id'] = 'PenggunaController@edit';
$routes['control-panel/pengguna/update/:id'] = 'PenggunaController@update';
$routes['control-panel/pengguna/destroy'] = 'PenggunaController@destroy';

//blog
$routes['control-panel/blog'] = 'BlogController@index';
$routes['control-panel/blog/add'] = 'BlogController@add';
$routes['control-panel/blog/create'] = 'BlogController@create';
$routes['control-panel/blog/edit/:id'] = 'BlogController@edit';
$routes['control-panel/blog/update/:id'] = 'BlogController@update';
$routes['control-panel/blog/destroy'] = 'BlogController@destroy';

// autentikasi
$routes['login'] = 'LandingController@login';
$routes['dologin'] = 'LandingController@doLogin';
$routes['register'] = 'LandingController@register';
$routes['doregister'] = 'LandingController@doRegister';

$routes['logout'] = 'DashboardController@logout';

