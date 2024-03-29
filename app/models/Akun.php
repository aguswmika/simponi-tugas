<?php

class Akun{
    private static $userData = null;

    static function getLogin(){
        if(!isset(self::$userData)){
            $akun = new Akun();
            self::$userData = $akun->getByField('token', Session::sess('token'));
        }

        return self::$userData;
    }

    function login($user, $pass){
		try {
		    DB::connection()->beginTransaction();
			$sql = "SELECT * FROM akun WHERE username = ? AND password = ?";
			$prep = DB::connection()->prepare($sql);
			$prep->execute([$user, $pass]);

            $count = $prep->rowCount();

            if($count === 0){
                return false;
            }

			$data = $prep->fetch(PDO::FETCH_OBJ);
            $token = null;

			if(empty($data->token)){
                $token = substr(bin2hex(openssl_random_pseudo_bytes(16)), 0, 100);

                $sql = "UPDATE akun SET token = ? WHERE username = ?";
                $prep1 = DB::connection()->prepare($sql);
                $prep1->execute([$token, $data->username]);
            }else{
			    $token = $data->token;
            }

            Session::sess('token', $token);
            Session::sess('loggedIn', true);

            DB::connection()->commit();
			return $count;
		} catch (PDOException $e) {
            DB::connection()->rollBack();
			msg('Kesalahan : '.$e->getMessage(), 'danger');
			redirect('login');
		}
	}

	function getByUsername($id){
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

    function getByField($field, $id){
        try {
            $sql = "SELECT 
                    *, akun.id 
                    FROM 
                    akun
                    LEFT JOIN petani ON petani.id_user = akun.id
                    WHERE $field = ?";
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

            $username = Input::post('username');
            $check = $this->getByUsername($username);
            if($check === false){
                msg('Username sudah dipakai', 'warning');
                return;
            }

            $nama_depan = Input::post('nama_depan');
            $nama_belakang = Input::post('nama_belakang');
            $jenis_kelamin = Input::post('jenis_kelamin');
            $tgl_lahir = Input::post('tgl_lahir');
            $email = Input::post('email');

            $check = $this->getByField('akun.email', $email);
            if($check === false){
                msg('Email sudah dipakai', 'warning');
                return;
            }

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

    function edit($inpUsername){
        try{
            DB::connection()->beginTransaction();

            $username = Input::post('username');
            $id_user = $this->getByUsername($inpUsername)->id_user;
            $nama_depan = Input::post('nama_depan');
            $nama_belakang = Input::post('nama_belakang');
            $jenis_kelamin = Input::post('jenis_kelamin');
            $tgl_lahir = Input::post('tgl_lahir');
            $email = Input::post('email');
            $password = md5(Input::post('password'));

            $file = Input::file('foto')->upload('public/uploads');


            $sql = "UPDATE akun SET email = ?, username = ?, password = ? WHERE id = ?";

            $prep = DB::connection()->prepare($sql);
            $prep->execute([$email, $username, $password, $id_user]);

            if($file === false){
                $sql = "UPDATE petani SET nama_depan = ?, nama_belakang = ?, jenis_kelamin = ?, tgl_lahir = ? WHERE id_user = ?";

                $prep2 = DB::connection()->prepare($sql);
                $prep2->execute([$nama_depan, $nama_belakang, $jenis_kelamin, $tgl_lahir, $id_user]);
            }else{
                $sql = "UPDATE petani SET nama_depan = ?, nama_belakang = ?, jenis_kelamin = ?, tgl_lahir = ?, foto = ? WHERE id_user = ?";

                $prep2 = DB::connection()->prepare($sql);
                $prep2->execute([$nama_depan, $nama_belakang, $jenis_kelamin, $tgl_lahir, str_replace('public/', '', $file), $id_user]);
            }


            if($prep->rowCount() || $prep2->rowCount()){
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

    function register(){
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
                msg('Selamat Anda sudah terdaftar, silahkan Login', 'info');
            }else{
                msg('Ups... tidak dapat terdaftar', 'danger');
            }

            DB::connection()->commit();
        }catch (PDOException $e){
            DB::connection()->rollBack();
            msg('Kesalahan : '.$e->getMessage(), 'danger');
            redirect('register');
        }
    }
}