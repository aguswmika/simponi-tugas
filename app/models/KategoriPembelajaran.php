<?php
Class KategoriPembelajaran{
	function tambah(){
	    try{
            $nama = Input::post('nama');
            $deskripsi = Input::post('deskripsi');
            $file = Input::file('foto')->upload('public/uploads');
            $slug = url_slug($nama);

            if($file == false){
                msg('Gambar tidak bisa masuk', 'warning');
                return;
            }
            $sql = "INSERT INTO kategori_pembelajaran(nama,deskripsi,icon,slug) VALUES(?,?,?,?)";

            $prep = DB::connection()->prepare($sql);
            $prep->execute([$nama, $deskripsi,str_replace('public/', '', $file),$slug]);

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

    public function getKategori(){
        try {
<<<<<<< HEAD
            $sql = "SELECT 
                    * 
                    FROM 
                    kategori_pembelajaran";
=======
            $sql = "SELECT * FROM kategori_pembelajaran";
>>>>>>> 55cb348b70e460d0dc06be8f35c1f09ebe301f2d
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

            //belum jadiD
            DB::connection()->beginTransaction();

            $id = Input::post('slug');
           
            $sql = "DELETE FROM kategori_pembelajaran WHERE slug = ?";

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