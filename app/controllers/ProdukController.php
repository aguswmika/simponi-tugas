<?php
	class ProdukController{
		private $produk;
		function __construct(){
			checkIfNotLogin();
			$this->produk = model('produk');
		}
		public function index(){
			$tabel = new Table([
				'query' => [
					'sql' => 'SELECT * FROM produk'
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
				return '<a href="'.base_url('kategoriProduk/edit/'.$data['id']).'" class="btn btn-warning btn-xs">Edit</a>';
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
            	'title'     => 'Tambah Produk'
            
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