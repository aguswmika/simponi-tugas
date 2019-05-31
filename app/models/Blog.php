<?php 
class Blog{
    function getByIdBlog($id){
        try {
            $sql = "SELECT 
                    * 
                    FROM 
                    blog WHERE blog.slug = ?";
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
            $judul = Input::post('judul');
            $deskripsi = Input::post('deskripsi');
            $konten = Input::post('konten');
            $status = Input::post('status');
            $thumbnail_foto = Input::file('foto')->upload('public/uploads');
            $slug = url_slug($judul);

            

            $sql = "INSERT INTO blog(judul, deskripsi, konten, status,thumbnail_foto,slug) VALUES(?, ?, ?, ?, ?,?)";

            $prep = DB::connection()->prepare($sql);
            $prep->execute([$judul, $deskripsi, $konten,$status,str_replace('public/', '', $thumbnail_foto),$slug]);


            if($prep->rowCount()){
                msg('Data berhasil dimasukkan', 'info');
            }else{
                msg('Data gagal dimasukkan', 'danger');
            }

            DB::connection()->commit();
        }catch (PDOException $e){
            DB::connection()->rollBack();
            msg('Kesalahan : '.$e->getMessage(), 'danger');
            redirect('control-panel/blog/add');
        }
    }
    function edit($id){
        try{
            DB::connection()->beginTransaction();
            $judul = Input::post('judul');
            $deskripsi = Input::post('deskripsi');
            $konten = Input::post('konten');
            $status = Input::post('status');
           
            $id = $this->getByIdBlog($id)->id;
            
            $sql = "UPDATE blog SET judul = ?, deskripsi = ?, konten = ?,status=? WHERE id = ?";

            $prep = DB::connection()->prepare($sql);

            if($prep->execute([$judul, $deskripsi, $konten,$status,$id])){
                msg('Data berhasil diedit', 'info');
            }else{
                msg('Data gagal diedit', 'danger');
            }

            DB::connection()->commit();
        }catch (PDOException $e){
            DB::connection()->rollBack();
            msg('Kesalahan : '.$e->getMessage(), 'danger');
            redirect('control-panel/blog/');
        }
    }
    function hapus(){
        try{
            DB::connection()->beginTransaction();

           $id = Input::post('slug');
           
            $sql = "DELETE FROM blog WHERE slug = ?";

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
            redirect('control-panel/blog');
        }
    }

    function getData(){
        try {
            $sql = "SELECT 
                    * 
                    FROM 
                    blog
                    ORDER BY id DESC
                    LIMIT 0,10";
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