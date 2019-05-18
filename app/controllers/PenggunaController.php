<?php

class PenggunaController
{
    private $akun;

    function __construct()
    {
        checkIfNotLogin();
        $this->akun = model('akun');
    }

    public function index(){
        $tabel = new Table([
            'query' => [
                'sql' => 'SELECT * FROM akun'
            ],
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
                return '<a href="'.base_url('pengguna/edit/'.$data['id']).'" class="btn btn-warning btn-xs">Edit</a>';
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

        print_r(Input::file('foto')->upload('public/uploads'));
        die();

        $valid = new Validation($config);

        if($valid->run()){
            $this->akun->tambah();

            redirect('control-panel/pengguna/add');
        }else{
            msg($valid->getErrors(), 'danger');
            redirect('control-panel/pengguna/add');
        }
    }

}