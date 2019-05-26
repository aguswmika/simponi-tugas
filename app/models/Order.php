<?php

class Order{
	function tambah(){
	    try{
            $nama = Input::post('nama');
            $jumlah = Input::post('jumlah');

            $sql = "INSERT INTO order(nama, jumlah) VALUES(?, ?)";

            $prep = DB::connection()->prepare($sql);
            $prep->execute([$nama, $deskripsi]);

            if($prep->rowCount()){
                msg('Data berhasil dimasukkan', 'info');
            }else{
                msg('Data gagal dimasukkan', 'danger');
            }
        }catch (PDOException $e){
            msg('Kesalahan : '.$e->getMessage(), 'danger');
            redirect('control-panel/kategoriedukasi/add');
        }
    }
}