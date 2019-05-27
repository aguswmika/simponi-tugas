<?php
Class KategoriProduk{
	function tambah(){
	    try{
            $nama = Input::post('nama');
            $sql = "INSERT INTO kategori_produk(nama) VALUES(?)";

            $prep = DB::connection()->prepare($sql);
            $prep->execute([$nama]);

            if($prep->rowCount()){
                msg('Data berhasil dimasukkan', 'info');
            }else{
                msg('Data gagal dimasukkan', 'danger');
            }
        }catch (PDOException $e){
            msg('Kesalahan : '.$e->getMessage(), 'danger');
            redirect('control-panel/kategori-produk/add');
        }
    }

    function ambilData(){
        try {
            $sql = "SELECT 
                    * 
                    FROM 
                    kategori_produk";
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
     public function hapus(){
        try{
            DB::connection()->beginTransaction();

            $id = Input::post('id');
           
            $sql = "DELETE FROM kategori_produk WHERE id = ?";

            $prep = DB::connection()->prepare($sql);
            $prep->execute([$id]);

            if($prep->rowCount()){
                msg('Data berhasil dihapus', 'info');
            }else{
                msg('Data gagal dihapus', 'danger');
            }

            DB::connection()->commit();
        }catch (PDOException $e){
            DB::connection()->rollBack();
            msg('Kesalahan : '.$e->getMessage(), 'danger');
            redirect('control-panel/kategori-produk');
        }
    }
}