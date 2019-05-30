<?php
	class ProdukController{
		private $produk, $satuan, $kategoriProduk;
		function __construct(){
            checkIfNotLogin();
            checkIfNotAdmin();

			$this->produk = model('produk');

        	$this->satuan = model('satuan');
        	$this->kategoriProduk= model('kategoriproduk');
		}
		public function index(){
			$tabel = new Table([
				'query' => [
					'sql' => '
						SELECT 
                          *
						FROM
						produk
					'
				]
			]);
			$tabel->addRow('No',function($data,$index){
				return $index+1;
			})
			->addRow('Nama','nama')
			->addRow('Harga Jual', function ($data){
			    return 'Rp '.number_format($data['harga_jual'], 0, ',', '.');
            })
			->addRow('Harga Beli',function ($data){
                return 'Rp '.number_format($data['harga_beli'], 0, ',', '.');
            })
			->addRow('Deskripsi', function ($data){
            	return (strlen($data['deskripsi']) > 80 ? substr($data['deskripsi'], 0, 80).'...' : $data['deskripsi']);
        	})
			->addRow('Konten', function ($data){
            	return (strlen($data['konten']) > 80 ? substr($data['konten'], 0, 80).'...' : $data['konten']);
        	})
			->addRow('Stok','stok')
			->addRow('Aksi',function($data){
				return '
					<a href="'.base_url('control-panel/produk/edit/'.$data['slug']).'" class="btn btn-warning btn-xs">Edit</a>
                    <form action="'.base_url('control-panel/produk/destroy').'" method="post" style="display: inline">
                        <input type="hidden" name="slug" value="'.$data['slug'].'">
                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm(\'Apakah yakin ingin melanjutkan aksi ini?\')">Hapus</button>
                    </form>

				';
			})
			->search([
				'id',
				'nama',
				'stok'
			]);
			$data = [
				'title' => 'Produk',
				'tabel' => $tabel->run()
			];

			return view('admin/produk/index',$data);
		}
	
		public function add(){
        	$data = [
            	'title'     => 'Tambah Produk',
            	'satuan'  => $this->satuan->getSatuan(),
            	'kategoriproduk' => $this->kategoriProduk->ambilData()
        	];

       		return view('admin/produk/add', $data);
    	}
    	public function edit($id){
			$produk = $this->produk->getByIdProduk($id);

	        if($produk === false){

	            abort(404);
	        }

	        $data = [
	            'title' => 'Edit Produk',
	            'item'  => $produk,
	            'satuan'  => $this->satuan->getSatuan(),
	            'kategoriproduk' => $this->kategoriProduk->ambilData()
	        ];

	        return view('admin/produk/edit', $data);
		}
		function update($id){
	        $config = [
	            'nama' => [
	                'required' => true
	            ],
	            'harga_jual' => [
	                'required' => true
	            ],
	            'harga_beli' => [
	                'required' => true
	            ],
	            'stok' => [
	                'required' => true
	            ]
	        ];

	        $valid = new Validation($config);

	        if($valid->run()){
	            $this->produk->edit($id);

	            redirect('control-panel/produk/edit/'.$id);
	        }else{
	            msg($valid->getErrors(), 'danger');
	            redirect('control-panel/produk/edit/'.$id);
	        }
    	}
    	public function create(){
	         $config = [
	            'nama' => [

	                'required' => true
	            ],
	            'harga_jual' => [
	            	'integer'  => true,
	            ],
	            'harga_beli' => [
	            	'integer'  => true,
	            ],
	            'stok' => [
	            	'integer'  => true,
	            	'required' => true
	            ],
	            
	            'satuan' => [
	            	'required' => true
	            ],
	            'kategoriproduk' => [
	            	'required' => true
	            ]
	        ];

	        $valid = new Validation($config);

	        if($valid->run()){
	            $this->produk->tambah();

	            redirect('control-panel/produk/add');
	        }else{
	            msg($valid->getErrors(), 'danger');
	            redirect('control-panel/produk/add');
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
	            $this->produk->hapus();

	            redirect('control-panel/produk');
	        }else{
	            msg($valid->getErrors(), 'danger');
	            redirect('control-panel/produk');
	        }
   		 }
 }
?>