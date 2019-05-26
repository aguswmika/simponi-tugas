<?php 
class Produk{
	function getById($id){
        try {
            $sql = "SELECT 
                    * 
                    FROM 
                    produk
                    WHERE produk.id = ?";
            $prep = DB::connection()->prepare($sql);
            $prep->execute([$id]);

            if($prep->rowCount()){
                return $prep->fetch(PDO::FETCH_OBJ);
            }

            return false;

        } catch (PDOException $e) {
            return false;
        }
    }

	function tambah(){
	    try{
            DB::connection()->beginTransaction();
            $nama = Input::post('nama');
            $harga_jual = Input::post('harga_jual');
            $harga_beli = Input::post('harga_beli');
            $stok       = Input::post('stok');
            $thumbnail_foto = Input::file('thumbnail_foto')->upload('public/uploads');
           // $gallery_foto = Input::file('gallery_foto')->upload('public/uploads');

            if($thumbnail_foto === false && $gallery_foto==false){
                msg('Gambar tidak bisa masuk', 'warning');
                return;
            }


            if($prep->rowCount()){
                msg('Data berhasil dimasukkan', 'info');
            }else{
                msg('Data gagal dimasukkan', 'danger');
            }

            DB::connection()->commit();
        }catch (PDOException $e){
            DB::connection()->rollBack();
            msg('Kesalahan : '.$e->getMessage(), 'danger');
            redirect('control-panel/pengguna/add');
        }
    }

    function hapus(){
	    try{
            DB::connection()->beginTransaction();

            $id = Input::post('id');

            $sql = "DELETE FROM petani WHERE id_user = ?";

            $prep = DB::connection()->prepare($sql);
            $prep->execute([$id]);

            $sql = "DELETE FROM akun WHERE id = ?";

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
            redirect('control-panel/pengguna');
        }
    }
}