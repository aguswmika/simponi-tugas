<?php
	class KategoriProdukController{
		private $kategori_produk;
		function __construct(){
			checkIfNotLogin();
			$this->kategori_produk = model('kategoriproduk');
		}

		public function index(){
			$tabel = new Table([
				'query' => [
					'sql' => 'SELECT * FROM kategori_produk'
				]

			]);

			$tabel->addRow('No',function($data,$index){
				return $index+1;
			})
			->addRow('ID','id')
			->addRow('Nama','nama')
			->addRow('Aksi',function($data){
				return '
					<a href="'.base_url('control-panel/kategori-produk/edit/'.$data['id']).'" class="btn btn-warning btn-xs">Edit</a>
                    <form action="'.base_url('control-panel/kategori-produk/destroy').'" method="post" style="display: inline">
                        <input type="hidden" name="id" value="'.$data['id'].'">
                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm(\'Apakah yakin ingin melanjutkan aksi ini?\')">Hapus</button>
                    </form>

				';
			})
			->search([
				'id',
				'nama'
			]);

			$data = [
				'title' => 'Kategori Produk',
				'tabel' => $tabel->run()
			];

			return view('admin/kategoriProduk/index',$data);
		}

		public function add(){
			$data = [
            	'title' => 'Tambah Kategori Produk'
        	];

        	return view('admin/kategoriProduk/add', $data);
		}
		public function create(){
	         $config = [
	            'nama' => [
	                'required' => true
	            ]
	            
	        ];

	        $valid = new Validation($config);

	        if($valid->run()){
	            $this->kategori_produk->tambah();

	            redirect('control-panel/kategori-produk/add');
	        }else{
	            msg($valid->getErrors(), 'danger');
	            redirect('control-panel/kategori-produk/add');
	        }
    		
	}
	public function edit($id){
		$kategori_produk = $this->kategori_produk->getById($id);

        if($kategori_produk === false){
            abort(404);
        }

        $data = [
            'title' => 'Edit Kategori Produk',
            'item'  => $kategori_produk
        ];

        return view('admin/kategoriProduk/edit', $data);
	}
	public function destroy(){
        $config = [
            'id' => [
                'required' => true
            ]
        ];
        
        $valid = new Validation($config);

        if($valid->run()){
            $this->kategori_produk->hapus();
            redirect('control-panel/kategori-produk');
        }else{
            msg($valid->getErrors(), 'danger');
            redirect('control-panel/kategori-produk');
        }
    }

}
	
?>