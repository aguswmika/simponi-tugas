<?php 
class Produk{
	function getById($id){
        try {
            $sql = "SELECT 
                    * 
                    FROM 
                    produk";
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



            $nama           = Input::post('nama');
            $harga_jual     = Input::post('harga_jual');
            $harga_beli     = Input::post('harga_beli');
            $stok           = Input::post('stok');
            $thumbnail_foto = Input::file('foto')->upload('public/uploads');
            $id_satuan      = Input::post('satuan');
            $id_kategori_produk = Input::post('kategoriproduk');

            if($thumbnail_foto === false){
                msg('Gambar thumbnail tidak bisa masuk', 'warning');
                return;
            }

            $gallery_foto   = Input::file('gallery')->upload('public/uploads');

            if($gallery_foto === false){
                msg('Gambar gallery tidak bisa masuk', 'warning');
                return;
            }

            for ($i = 0; $i < count($gallery_foto); $i++){
                $gallery_foto[$i] = str_replace('public/', '', $gallery_foto[$i]);
            }

            $gallery_foto = json_encode($gallery_foto);

            $sql = "INSERT INTO produk(nama, harga_jual, harga_beli, thumbnail_foto, gallery_foto, stok, id_satuan, id_kategori_produk) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";

            $prep = DB::connection()->prepare($sql);
            $prep->execute([$nama, $harga_jual, $harga_beli, str_replace('public/', '', $thumbnail_foto), $gallery_foto, $stok, $id_satuan, $id_kategori_produk]);

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