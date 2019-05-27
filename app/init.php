<?php
require_once BASE_PATH.'app/functions/Default.php';

spl_autoload_register(function($str){
	require_once BASE_PATH.'app/functions/'.$str.'.php';
});


// kalo gak ada config.php, ganti aja nama config.example.php
// baru ubah variable config di config.php untuk setting databasenya
require_once BASE_PATH.'app/config.php';

// konfigurasi database
DB::getInstance($config['host'], $config['user'], $config['pass'], $config['dbname']);