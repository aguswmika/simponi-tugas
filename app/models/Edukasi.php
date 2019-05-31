<?php

class Edukasi{
    public function tambah(){
        try{
            DB::connection()->beginTransaction();
            $judul = Input::post('judul');
            $deskripsi = Input::post('deskripsi');
            $tipe_pembelajaran = Input::post('jenis_pembelajaran');
            if($tipe_pembelajaran ===  'text'){
                $konten = Input::post('konten');
                $deskripsi = null;
            }else if($tipe_pembelajaran === 'video'){
                $konten = Input::post('video');
            }else{
                $konten = '';

            }

            $urutan = Input::post('urutan');
            $slug = url_slug($judul);

            $id_kategori_pembelajaran = Input::post('kategori');
            $status = 'aktif';

            $sql = "INSERT INTO pembelajaran(judul, deskripsi, konten, tipe_pembelajaran, status, id_kategori_pembelajaran, urutan, slug) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";

            $prep = DB::connection()->prepare($sql);
            $prep->execute([$judul, $deskripsi, $konten, $tipe_pembelajaran, $status, $id_kategori_pembelajaran, $urutan, $slug]);


            if($prep->rowCount()){
                msg('Data berhasil dimasukkan', 'info');
            }else{
                msg('Data gagal dimasukkan', 'danger');
            }

            DB::connection()->commit();
        }catch (PDOException $e){
            DB::connection()->rollBack();
            msg('Kesalahan : '.$e->getMessage(), 'danger');
            redirect('control-panel/edukasi/add');
        }
    }
    function getById($id){
        try {
            $sql = "SELECT 
                    * 
                    FROM 
                    pembelajaran
                    WHERE pembelajaran.slug = ?";
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

    function getByCategory($id){
        try {
            $sql = "SELECT 
                    * 
                    FROM 
                    pembelajaran
                    WHERE id_kategori_pembelajaran  = ?
                    ORDER BY urutan ASC";
            $prep = DB::connection()->prepare($sql);
            $prep->execute([$id]);

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
                    * 
                    FROM 
                    pembelajaran
                    WHERE slug = ?";
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

    function hapus(){
        try{
            DB::connection()->beginTransaction();

            $id = Input::post('slug');

            $data = $this->getBySlug($id);

            if($data === false){
                return false;
            }

            $sql = "DELETE FROM lihat_pembelajaran WHERE id_pembelajaran = ?";

            $prep = DB::connection()->prepare($sql);
            $prep->execute([$data->id]);

            $sql = "DELETE FROM pembelajaran WHERE slug = ?";

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
            redirect('control-panel/edukasi');
        }
    }
    function edit($id){
        try{
            DB::connection()->beginTransaction();
            $judul = Input::post('judul');
            $deskripsi = Input::post('deskripsi');
            $tipe_pembelajaran = Input::post('jenis_pembelajaran');
            $kategori = Input::post('kategori');
            $status = Input::post('status');
            $urutan = Input::post('urutan');
            $id = $this->getById($id)->id;
            if($tipe_pembelajaran ===  'text'){
                $konten = Input::post('konten');
                $deskripsi = null;
            }else if($tipe_pembelajaran === 'video'){
                $konten = Input::post('video');
            }else{
                $konten = '';

            }   

            $sql = "UPDATE pembelajaran SET judul = ?, deskripsi = ?, konten = ?,tipe_pembelajaran=?,status=?,urutan = ?, id_kategori_pembelajaran = ? WHERE id = ?";

            $prep = DB::connection()->prepare($sql);
            //$prep->execute([$judul, $deskripsi, $konten, $tipe_pembelajaran,$status,$urutan,$kategori,$id]);

           

            if($prep->execute([$judul, $deskripsi, $konten, $tipe_pembelajaran,$status,$urutan,$kategori,$id])){
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

    function getProgress($id_petani, $id_kategori_pembelajaran){
        try {
            $sql = "SELECT 
                    *
                    FROM 
                    lihat_pembelajaran
                    WHERE id_petani = ? AND id_pembelajaran IN (SELECT id FROM pembelajaran WHERE id_kategori_pembelajaran = ?)";
            $prep = DB::connection()->prepare($sql);
            $prep->execute([$id_petani, $id_kategori_pembelajaran]);


            return $prep->fetchAll(PDO::FETCH_OBJ);


        } catch (PDOException $e) {
            return false;
        }
    }

    function checkProgress($id_petani, $id_pembelajaran){
        try{
            DB::connection()->beginTransaction();

            $sql = "SELECT * FROM lihat_pembelajaran WHERE id_pembelajaran = ? AND id_petani = ?";

            $prep = DB::connection()->prepare($sql);
            $prep->execute([$id_pembelajaran, $id_petani]);


            if($prep->rowCount() === 0){
                $sql = "INSERT INTO lihat_pembelajaran(id_pembelajaran, id_petani) VALUES(?, ?)";

                $prep = DB::connection()->prepare($sql);
                $prep->execute([$id_pembelajaran, $id_petani]);
            }

            DB::connection()->commit();

            return true;
        }catch (PDOException $e){
            DB::connection()->rollBack();
            return false;
        }
    }
}