    <?php

class EdukasiController
{

    private $kategori, $edukasi;

    function __construct()
    {
        checkIfNotLogin();
        $this->kategori = model('kategoripembelajaran');
        $this->edukasi = model('edukasi');
    }

    public function index(){
        $tabel = new Table([
            'query' => [
                'sql' => 'SELECT 
                          pembelajaran.*, kategori_pembelajaran.nama as kategori 
                          FROM 
                          pembelajaran
                          INNER JOIN kategori_pembelajaran ON pembelajaran.id_kategori_pembelajaran = kategori_pembelajaran.id'
            ],
        ]);

        $tabel->addRow('No', function ($data, $index){
            return $index+1;
        })
        ->addRow('Judul', function ($data){
            return (strlen($data['judul']) > 50 ? substr($data['judul'], 0, 50).'...' : $data['judul']);
        })
        ->addRow('Deskripsi', function ($data){
            return (strlen($data['deskripsi']) > 80 ? substr($data['deskripsi'], 0, 80).'...' : $data['deskripsi']);
        })
        ->addRow('Tipe', 'tipe_pembelajaran')
        ->addRow('Kategori', 'kategori')
        ->addRow('Status', function($data){
            return '<label class="badge badge-dark">'.ucfirst($data['status']).'</label>';
        })
        ->addRow('Aksi', function ($data){
            return '
                <a href="'.base_url('control-panel/edukasi/edit/'.$data['slug']).'" class="btn btn-warning btn-xs">Edit</a>
                <form action="'.base_url('control-panel/edukasi/destroy').'" method="post" style="display: inline">
                    <input type="hidden" name="slug" value="'.$data['slug'].'">
                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm(\'Apakah yakin ingin melanjutkan aksi ini?\')">Hapus</button>
                </form>
            ';
        })
        ->search([
            'nama'
        ]);

        $data = [
            'title' => 'Edukasi',
            'tabel' => $tabel->run()
        ];

        return view('admin/edukasi/index', $data);
    }

    public function add(){
        $data = [
            'title'     => 'Tambah Edukasi',
            'kategori'  => $this->kategori->getKategori()
        ];

        return view('admin/edukasi/add', $data);
    }

    public function create(){
        $config = [
            'judul' => [
                'required' => true
            ],
            'deskripsi' => [
                'max' => 255
            ],
            'urutan' => [
                'required' => true,
                'integer'  => true
            ],
            'tipe_pembelajaran' => [
                'required' => true
            ],
            'kategori' => [
                'required' => true
            ]
        ];

        $valid = new Validation($config);

        if($valid->run()){
            $this->edukasi->tambah();

            redirect('control-panel/edukasi/add');
        }else{
            msg($valid->getErrors(), 'danger');
            redirect('control-panel/edukasi/add');
        }
    }
    function edit($id){
        $edukasi = $this->edukasi->getById($id);

        if($edukasi === false){
            abort(404);
        }

        $data = [
            'title' => 'Edit '.$edukasi->judul,
            'item'  => $edukasi,
            'kategori'  => $this->kategori->getKategori()
        ];

        return view('admin/edukasi/edit', $data);
    }
    function update($id){
        $config = [
            'judul' => [
                'required' => true
            ],
            'deskripsi' => [
                'required' => true
            ],
            'konten' => [
                'required' => true
            ],
            'jenis_pembelajaran' => [
                'required' => true
            ],
            'status' => [
                'required' => true
            ],
            'urutan' => [
                'required' => true
            ]
        ];

        $valid = new Validation($config);

        if($valid->run()){
            $this->edukasi->edit($id);

            redirect('control-panel/edukasi/');
        }else{
            msg($valid->getErrors(), 'danger');
            redirect('control-panel/edukasi/');
        }
    }
     function destroy(){
        $config = [
            'slug' => [
                'required' => true
            ]
        ];

        $valid = new Validation($config);

        if($valid->run()){
            $this->edukasi->hapus();

            redirect('control-panel/edukasi');
        }else{
            msg($valid->getErrors(), 'danger');
            redirect('control-panel/edukasi');
        }
    }
}