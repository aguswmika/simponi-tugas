<?php
Class KategoriPembelajaran{
	function tambah(){
	    try{
            $nama = Input::post('nama');
            $deskripsi = Input::post('deskripsi');

            $sql = "INSERT INTO kategori_pembelajaran(nama, deskripsi) VALUES(?, ?)";

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

    function getKategori(){
        try {
            $sql = "SELECT * FROM kategori_pembelajaran";
            $prep = DB::connection()->prepare($sql);
            $prep->execute();

            if($prep->rowCount()){
                return $prep->fetchAll(PDO::FETCH_OBJ);
            }

            return false;

        } catch (PDOException $e) {
            return false;
        }
    }
}