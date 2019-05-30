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
    function getByIdKategoriProduk($id){
        try {
            $sql = "SELECT 
                    * 
                    FROM 
                    kategori_produk
                    WHERE kategori_produk.id = ?";
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
    function edit($id){
        try{
            DB::connection()->beginTransaction();
            $nama = Input::post('nama');
            $id = Input::url(3);
           
            $sql = "UPDATE kategori_produk SET nama = ? WHERE id = ?";

            $prep = DB::connection()->prepare($sql);
            $prep->execute([$nama, $id]);


            if($prep->rowCount()){
                msg('Data berhasil diedit', 'info');
            }else{
                msg('Data gagal diedit', 'danger');
            }

            DB::connection()->commit();
        }catch (PDOException $e){
            DB::connection()->rollBack();
            msg('Kesalahan : '.$e->getMessage(), 'danger');
            redirect('control-panel/pengguna/');
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