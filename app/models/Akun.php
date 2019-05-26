<?php 
class Akun{
	function login($user, $pass){
		try {
			$sql = "SELECT * FROM akun WHERE username = ? AND password = ?";
			$prep = DB::connection()->prepare($sql);
			$prep->execute([$user, $pass]);
			return $prep->rowCount();
		} catch (PDOException $e) {
			msg('Kesalahan : '.$e->getMessage(), 'danger');
			redirect('login');
		}
	}

	function getById($id){
        try {
            $sql = "SELECT 
                    * 
                    FROM 
                    akun
                    LEFT JOIN petani ON petani.id_user = akun.id
                    WHERE akun.username = ?";
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
            $nama_depan = Input::post('nama_depan');
            $nama_belakang = Input::post('nama_belakang');
            $jenis_kelamin = Input::post('jenis_kelamin');
            $tgl_lahir = Input::post('tgl_lahir');
            $email = Input::post('email');
            $username = Input::post('username');
            $password = md5(Input::post('password'));
            $file = Input::file('foto')->upload('public/uploads');

            if($file === false){
                msg('Gambar tidak bisa masuk', 'warning');
                return;
            }


            $sql = "INSERT INTO akun(email, username, password, hak_akses) VALUES(?, ?, ?, 3)";

            $prep = DB::connection()->prepare($sql);
            $prep->execute([$email, $username, $password]);

            $id_user = DB::connection()->lastInsertId();

            $sql = "INSERT INTO petani(nama_depan, nama_belakang, jenis_kelamin, tgl_lahir, foto, id_user) VALUES(?, ?, ?, ?, ?, ?)";

            $prep = DB::connection()->prepare($sql);
            $prep->execute([$nama_depan, $nama_belakang, $jenis_kelamin, $tgl_lahir, str_replace('public/', '', $file), $id_user]);

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