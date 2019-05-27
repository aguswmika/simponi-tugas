<?php
class KategoriEdukasiController{
	private $KategoriPembelajaran;
	function __construct(){
		checkIfNotLogin();
		$this->KategoriPembelajaran = model('KategoriPembelajaran');
	}

	public function index(){
		$tabel = new Table([
			'query' => [
				'sql' => 'SELECT * FROM kategori_pembelajaran'
			]
		]);

		$tabel->addRow('No',function($data,$index){
			return $index+1;
		})
		->addRow('Nama','nama')
		->addRow('Deskripsi',function ($data){
            return (strlen($data['deskripsi']) > 80 ? substr($data['deskripsi'], 0, 80).'...' : $data['deskripsi']);
        })
		->addRow('Aksi',function($data){
			return '
				<a href="'.base_url('control-panel/kategori-edukasi/edit/'.$data['slug']).'" class="btn btn-warning btn-xs">Edit</a>
                    <form action="'.base_url('control-panel/kategori-edukasi/destroy').'" method="post" style="display: inline">
                        <input type="hidden" name="slug" value="'.$data['slug'].'">
                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm(\'Apakah yakin ingin melanjutkan aksi ini?\')">Hapus</button>
                    </form>

			';
		})
		->search([
			'id',
			'nama',
			'slug'
		]);
		$data = [
				'title' => 'Kategori Edukasi',
				'tabel' => $tabel->run()
		];

		return view('admin/kategoriedukasi/index',$data);
	}

	function add(){
        $data = [
            'title' => 'Tambah Kategori Edukasi'
        ];

        return view('admin/kategoriedukasi/add', $data);
    }
	public function create(){
		$config = [
			'nama' => [
				'required' => true
			],
			'deskripsi' => [
				'required' => true
			],
		];

		$valid = new Validation($config);
		if($valid->run()){
            $this->KategoriPembelajaran->tambah();

            redirect('control-panel/kategori-edukasi/add');
        }else{
            msg($valid->getErrors(), 'danger');
            redirect('control-panel/kategori-edukasi/add');
        }
	}
	public function destroy(){
		$config = [
            'slug' => [
                'required' => true
            ]
        ];

        $valid = new Validation($config);

        if($valid->run()){
            $this->KategoriPembelajaran->hapus();

            redirect('control-panel/kategori-edukasi');
        }else{
            msg($valid->getErrors(), 'danger');
            redirect('control-panel/kategori-edukasi');
        }
    
	}
}
?>