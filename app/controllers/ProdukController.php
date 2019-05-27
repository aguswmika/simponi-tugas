<?php
	class ProdukController{
		private $produk,$satuan,$kategoriProduk;
		function __construct(){
			checkIfNotLogin();
			$this->produk = model('produk');
<<<<<<< HEAD
        	$this->satuan = model('satuan');
        	$this->kategoriProduk= model('kategoriproduk');
=======
>>>>>>> 55cb348b70e460d0dc06be8f35c1f09ebe301f2d
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
			->addRow('Harga Jual','harga_jual')
			->addRow('Harga Beli','harga_beli')
			->addRow('Stok','stok')
			->addRow('Aksi',function($data){
				return '<a href="'.base_url(''.$data['id']).'" class="btn btn-warning btn-xs">Edit</a>';
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
<<<<<<< HEAD
	                'required' => true
	            ],
	            'thumbnail_foto' => [
	            	'required' => true
	            ],
	            'id_satuan' => [
	            	'required' => true
	            ],
	            'id_kategori_produk' => [
	            	'required' => true
=======
>>>>>>> 55cb348b70e460d0dc06be8f35c1f09ebe301f2d
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
 }
?>