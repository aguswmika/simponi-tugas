<?php 
class Produk{
    function getByIdProduk($id){
        try {
            $sql = "SELECT 
                    * 
                    FROM 
                    produk WHERE produk.slug = ?";
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
    function getDataByRand($limit = 2){
        try {
            $sql = "SELECT 
                    produk.*, kategori_produk.nama as kategori, satuan.nama as satuan
                    FROM 
                    produk
                    INNER JOIN kategori_produk ON produk.id_kategori_produk = kategori_produk.id
                    INNER JOIN satuan ON satuan.id = produk.id_satuan 
                    ORDER BY RAND() LIMIT 0,$limit";
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


    function getBySlug($id){
        try {
            $sql = "SELECT 
                    produk.*, kategori_produk.nama as kategori, satuan.nama as satuan
                    FROM 
                    produk
                    INNER JOIN kategori_produk ON produk.id_kategori_produk = kategori_produk.id
                    INNER JOIN satuan ON satuan.id = produk.id_satuan 
                    WHERE produk.slug = ?";
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

    function getData(){
        try {
            $sql = "SELECT 
                    * 
                    FROM 
                    produk ORDER BY id DESC";
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

    function tambah(){
        try{
            DB::connection()->beginTransaction();
            $nama           = Input::post('nama');
            $harga_jual     = Input::post('harga_jual');
            $harga_beli     = Input::post('harga_beli');
            $stok           = Input::post('stok');
            $konten         = Input::post('konten');
            $deskripsi      = Input::post('deskripsi');
            $thumbnail_foto = Input::file('foto')->upload('public/uploads');
            $id_satuan      = Input::post('satuan');
            $id_kategori_produk = Input::post('kategoriproduk');
            $slug = url_slug($nama);
            if($thumbnail_foto === false){
                msg('Gambar thumbnail tidak bisa masuk', 'warning');
                return;
            }

            // gallery foto
            $gallery_foto   = Input::file('gallery')->upload('public/uploads');
            if($gallery_foto === false){
                msg('Gambar gallery tidak bisa masuk', 'warning');
                return;
            }
            for ($i = 0; $i < count($gallery_foto); $i++){
                $gallery_foto[$i] = str_replace('public/', '', $gallery_foto[$i]);
            }
            $gallery_foto = json_encode($gallery_foto);


            $sql = "INSERT INTO produk(nama,deskripsi,konten, harga_jual, harga_beli, thumbnail_foto, gallery_foto, stok, slug, id_satuan, id_kategori_produk) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
            $prep = DB::connection()->prepare($sql);

            $prep->execute([$nama, $deskripsi, $konten,$harga_jual, $harga_beli, str_replace('public/', '', $thumbnail_foto), $gallery_foto, $stok,$slug, $id_satuan, $id_kategori_produk]);

            if($prep->rowCount()){
                msg('Data berhasil dimasukkan', 'info');
            }else{
                msg('Data gagal dimasukkan', 'danger');
            }
            DB::connection()->commit();
        }catch (PDOException $e){
            DB::connection()->rollBack();
            msg('Kesalahan : '.$e->getMessage(), 'danger');
            redirect('control-panel/produk/add');
        }
    }
    function hapus(){
        try{
            DB::connection()->beginTransaction();
            $id = Input::post('slug');
            $sql = "DELETE FROM produk WHERE slug = ?";
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
            redirect('control-panel/produk');
        }
    }
     function edit($id){
        try{
            DB::connection()->beginTransaction();
            $nama           = Input::post('nama');
            $konten         = Input::post('konten');
            $deskripsi      = Input::post('deskripsi');
            $harga_jual     = Input::post('harga_jual');
            $harga_beli     = Input::post('harga_beli');
            $stok           = Input::post('stok');
            $thumbnail_foto = Input::file('foto')->upload('public/uploads');
            $id_satuan      = Input::post('satuan');
            $id_kategori_produk = Input::post('kategoriproduk');
            $id = $this->getByIdProduk($id)->id;
             if($thumbnail_foto === false){
                msg('Gambar thumbnail tidak bisa masuk', 'warning');
                return;
            }

            // gallery foto
            $gallery_foto   = Input::file('gallery')->upload('public/uploads');
            if($gallery_foto === false){
                msg('Gambar gallery tidak bisa masuk', 'warning');
                return;
            }
            for ($i = 0; $i < count($gallery_foto); $i++){
                $gallery_foto[$i] = str_replace('public/', '', $gallery_foto[$i]);
            }
            $gallery_foto = json_encode($gallery_foto);


            $sql = "UPDATE produk SET nama = ?,deskripsi = ? , konten = ?,  harga_jual = ?, harga_beli = ?,thumbnail_foto=?, gallery_foto = ?,stok=?,id_satuan = ?, id_kategori_produk = ? WHERE id = ?";
            $prep = DB::connection()->prepare($sql);

            

            if($prep->execute([$nama,$deskripsi ,$konten ,$harga_jual, $harga_beli, str_replace('public/', '', $thumbnail_foto), $gallery_foto, $stok, $id_satuan, $id_kategori_produk,$id])){
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

    function getKeranjangByIdProdukAndIdPetani($id, $id_petani){
        try {
            $sql = "SELECT 
                    * 
                    FROM 
                    keranjang WHERE id_produk = ? AND id_petani = ?";
            $prep = DB::connection()->prepare($sql);
            $prep->execute([$id, $id_petani]);
            if($prep->rowCount()){
                return $prep->fetch(PDO::FETCH_OBJ);
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }

    function tambahKeranjang($slug){
        try{
            DB::connection()->beginTransaction();
            $data = $this->getBySlug($slug);

            if ($data === false){
                return false;
            }

            $id_petani = Akun::getLogin()->id;

            $keranjang = $this->getKeranjangByIdProdukAndIdPetani($data->id, $id_petani);
            $id_produk = $data->id;
            $jumlah = Input::post('jumlah');
            $harga = $data->harga_jual;
            $status = 'aktif';

            if($keranjang === false){
                $sql = "INSERT INTO keranjang(id_produk, id_petani, jumlah, harga, status) VALUES (?, ?, ?, ?, ?)";

                $prep = DB::connection()->prepare($sql);
                $prep->execute([$id_produk, $id_petani, $jumlah, $harga, $status]);
            }else{
                $sql = "UPDATE keranjang SET jumlah = jumlah + ? WHERE id = ?";

                $prep = DB::connection()->prepare($sql);
                $prep->execute([$jumlah, $keranjang->id]);
            }


            DB::connection()->commit();
            return true;
        }catch (PDOException $e){
            DB::connection()->rollBack();
            return false;
        }
    }

    function getJmlKeranjang($id_petani){
        try {
            $sql = "SELECT 
                    count(id) as jml
                    FROM 
                    keranjang WHERE id_petani = ?";
            $prep = DB::connection()->prepare($sql);
            $prep->execute([$id_petani]);

            if($prep->rowCount()){
                return $prep->fetch(PDO::FETCH_OBJ);
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }
    function getKeranjang($id_petani){
        try {
            $sql = "SELECT 
                    keranjang.*, produk.*, satuan.nama as satuan
                    FROM 
                    keranjang
                    INNER JOIN produk ON produk.id = keranjang.id_produk 
                    INNER JOIN satuan ON satuan.id = produk.id_satuan
                    WHERE id_petani = ?";
            $prep = DB::connection()->prepare($sql);
            $prep->execute([$id_petani]);

            if($prep->rowCount()){
                return $prep->fetchAll(PDO::FETCH_OBJ);
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }
}