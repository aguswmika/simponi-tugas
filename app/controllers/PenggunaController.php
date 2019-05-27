<?php

class PenggunaController
{
    private $akun;

    function __construct()
    {
        checkIfNotLogin();
        checkIfNotAdmin();
        $this->akun = model('akun');
    }

    public function index(){
        $tabel = new Table([
            'query' => [
                'sql' => 'SELECT * FROM akun WHERE hak_akses > 1'
            ]
        ]);
        $tabel->addRow('No', function ($data, $index){
                return $index+1;
            })
            ->addRow('Email', 'email')
            ->addRow('Username', 'username')
            ->addRow('Hak Akses', function ($data){
                if($data['hak_akses'] == 1){
                    $hak_akses = 'Admin';
                }else if($data['hak_akses'] == 2){
                    $hak_akses = 'Supplier';
                }else{
                    $hak_akses = 'Petani';
                }

                return '<label class="badge badge-info">'.$hak_akses.'</label>';
            })
            ->addRow('Aksi', function ($data){
                return '
                    <a href="'.base_url('control-panel/pengguna/edit/'.$data['username']).'" class="btn btn-warning btn-xs">Edit</a>
                    <form action="'.base_url('control-panel/pengguna/destroy').'" method="post" style="display: inline">
                        <input type="hidden" name="id" value="'.$data['id'].'">
                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm(\'Apakah yakin ingin melanjutkan aksi ini?\')">Hapus</button>
                    </form>
                ';
            })
            ->search([
                'id',
                'username'
            ]);


        $data = [
            'title' => 'Pengguna',
            'tabel' => $tabel->run()
        ];

        return view('admin/pengguna/index', $data);
    }

    function add(){
        $data = [
            'title' => 'Tambah Pengguna'
        ];

        return view('admin/pengguna/add', $data);
    }

    function create(){
         $config = [
            'nama_depan' => [
                'required' => true
            ],
            'nama_belakang' => [
                'required' => true
            ],
            'jenis_kelamin' => [
                'required' => true
            ],
            'tgl_lahir' => [
                'required' => true
            ],
            'email' => [
                'required' => true
            ],
            'username' => [
                'required' => true
            ],
            'password' => [
                'required' => true
            ],
        ];

        $valid = new Validation($config);

        if($valid->run()){
            $this->akun->tambah();

            redirect('control-panel/pengguna/add');
        }else{
            msg($valid->getErrors(), 'danger');
            redirect('control-panel/pengguna/add');
        }
    }

    function edit($id){
        $akun = $this->akun->getByUsername($id);

        if($akun === false || $akun->hak_akses === 1){
            abort(404);
        }

        $data = [
            'title' => 'Edit Pengguna '.$akun->nama_belakang,
            'item'  => $akun
        ];

        return view('admin/pengguna/edit', $data);
    }

    function update($id){
        $config = [
            'nama_depan' => [
                'required' => true
            ],
            'nama_belakang' => [
                'required' => true
            ],
            'jenis_kelamin' => [
                'required' => true
            ],
            'tgl_lahir' => [
                'required' => true
            ],
            'email' => [
                'required' => true
            ],
            'username' => [
                'required' => true
            ]
        ];

        $valid = new Validation($config);

        if($valid->run()){
            $this->akun->edit($id);

            redirect('control-panel/pengguna/');
        }else{
            msg($valid->getErrors(), 'danger');
            redirect('control-panel/pengguna/');
        }
    }

    function destroy(){
        $config = [
            'id' => [
                'required' => true
            ]
        ];
        
        $valid = new Validation($config);

        if($valid->run()){
            $this->akun->hapus();

            redirect('control-panel/pengguna');
        }else{
            msg($valid->getErrors(), 'danger');
            redirect('control-panel/pengguna');
        }
    }

}