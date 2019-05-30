<?php
	class BlogController{
		private $blog;
		function __construct(){
            checkIfNotLogin();
            checkIfNotAdmin();
			$this->blog = model('blog');
		}
		public function index(){
			$tabel = new Table([
				'query' => [
					'sql' => '
						SELECT 
                          *
						FROM
						blog
					'
				]
			]);
			$tabel->addRow('No',function($data,$index){
				return $index+1;
			})
			->addRow('Judul', function ($data){
            	return (strlen($data['judul']) > 50 ? substr($data['judul'], 0, 50).'...' : $data['judul']);
        	})
        	->addRow('Deskripsi', function ($data){
            	return (strlen($data['deskripsi']) > 80 ? substr($data['deskripsi'], 0, 80).'...' : $data['deskripsi']);
        	})
			->addRow('Konten', function ($data){
            	return (strlen($data['konten']) > 80 ? substr($data['konten'], 0, 80).'...' : $data['konten']);
        	})
			->addRow('Status', function($data){
            	return '<label class="badge badge-dark">'.ucfirst($data['status']).'</label>';
        	})
			->addRow('Aksi',function($data){
				return '
					<a href="'.base_url('control-panel/blog/edit/'.$data['slug']).'" class="btn btn-warning btn-xs">Edit</a>
                    <form action="'.base_url('control-panel/blog/destroy').'" method="post" style="display: inline">
                        <input type="hidden" name="id" value="'.$data['slug'].'">
                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm(\'Apakah yakin ingin melanjutkan aksi ini?\')">Hapus</button>
                    </form>

				';
			})
			->search([
				'id',
				'judul',
				'slug'
				
			]);
			$data = [
				'title' => 'Blog',
				'tabel' => $tabel->run()
			];

			return view('admin/blog/index',$data);
		}
	
		public function add(){
        	$data = [
            	'title'     => 'Tambah Blog'
            	
        	];

       		return view('admin/blog/add', $data);
    	}
    	public function edit($id){
			$blog = $this->blog->getByIdBlog($id);

	        if($blog === false){

	            abort(404);
	        }

	        $data = [
	            'title' => 'Edit Produk',
	            'item'  => $blog
	            
	        ];

	        return view('admin/blog/edit', $data);
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
	            'status' => [
	                'required' => true
	            ]
	        ];

	        $valid = new Validation($config);

	        if($valid->run()){
	            $this->blog->edit($id);

	            redirect('control-panel/blog/edit/'.$id);
	        }else{
	            msg($valid->getErrors(), 'danger');
	            redirect('control-panel/blog/edit/'.$id);
	        }
    	}
    	public function create(){
	         $config = [
	            'judul' => [

	                'required' => true
	            ],
	            'deskripsi' => [
	            	'required'  => true,
	            ],
	            'konten' => [
	            	'required'  => true,
	            ],
	            
	        ];

	        $valid = new Validation($config);

	        if($valid->run()){
	            $this->blog->tambah();

	            redirect('control-panel/blog/add');
	        }else{
	            msg($valid->getErrors(), 'danger');
	            redirect('control-panel/blog/add');
	        }
   		}
 }
?>