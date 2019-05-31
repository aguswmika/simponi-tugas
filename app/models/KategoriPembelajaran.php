<?php
Class KategoriPembelajaran{
    function getByIdKategoriPembelajaran($id){
        try {
            $sql = "SELECT 
                    * 
                    FROM 
                    kategori_pembelajaran
                    WHERE kategori_pembelajaran.slug = ?";
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
    function edit($id){
        try{
            DB::connection()->beginTransaction();
            $nama = Input::post('nama');
           // $id = Input::url(3);
            $id = $this->getByIdKategoriPembelajaran($id)->id;
            $file = Input::file('icon')->upload('public/uploads');
            $deskripsi = Input::post('deskripsi');
            
             if($file === false){
                $sql = "UPDATE kategori_pembelajaran SET nama = ?, deskripsi = ? WHERE id = ?";

                $prep = DB::connection()->prepare($sql);
                $prep->execute([$nama,$deskripsi,$id]);
             }else{
                $sql = "UPDATE kategori_pembelajaran SET nama = ?, deskripsi = ?, icon = ? WHERE id = ?";

                $prep = DB::connection()->prepare($sql);
                $prep->execute([$nama,$deskripsi,str_replace('public/', '',$file),$id]);
            }
            
            if($prep->rowCount()){
                msg('Data berhasil diedit', 'info');
            }else{
                msg('Data gagal diedit', 'danger');
            }

            DB::connection()->commit();
        }catch (PDOException $e){
            DB::connection()->rollBack();
            msg('Kesalahan : '.$e->getMessage(), 'danger');
            redirect('control-panel/kategori-edukasi/');
        }
    }
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

    public function getBySlug($slug){
        try {

            $sql = "SELECT * FROM kategori_pembelajaran WHERE slug = ?";
            $prep = DB::connection()->prepare($sql);
            $prep->execute([$slug]);

            if($prep->rowCount()){
                return $prep->fetch(PDO::FETCH_OBJ);
            }

            return false;

        } catch (PDOException $e) {
            return false;
        }
    }

    public function getKategori(){
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

    public function hapus(){
        try{

            
            DB::connection()->beginTransaction();

            $id = Input::post('slug');

            $data = $this->getBySlug($id);

            if($data === false){
                return false;
            }

            $sql = "DELETE FROM pembelajaran WHERE id_kategori_pembelajaran = ?";

            $prep = DB::connection()->prepare($sql);
            $prep->execute([$data->id]);
           
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