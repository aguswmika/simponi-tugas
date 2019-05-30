<?php
class LandingController
{
	private $akun, $kategoriPembelajaran;

	function __construct()
	{
		$this->akun = model('akun');
		$this->kategoriPembelajaran = model('kategoripembelajaran');
	}
	function index(){
		$data = [

		];
		return view('landing/index', $data);
	}

	function whysimponi(){
	    $data = [
	        'title' => 'Kenapa milih simponi. ?'
        ];
	    return view('landing/whysimponi', $data);
    }
    function kontak(){
    	$data = [
    		'title' => 'Kontak Kami'
    	];
    	return view('landing/kontakkami', $data);
    }
    function blog(){
    	$data = [
    		'title' => 'blog'
    	];
    	return view('landing/blog', $data);
    }

    function marketplace(){
    	$data = [
    		'title' => 'marketplace'
    	];
    	return view('landing/marketplace',$data);
    }
    function product_detail(){
    	$data = [
    		'title' => 'product-detail'
    	];
    	return view('landing/product-detail',$data);
    }
    function cart(){
    	$data = [
    		'title' => 'shopping-cart'
    	];
    	return view('landing/shopping-cart',$data);
    }
    function forum(){
    	$data = [
    		'title' => 'forum'
    	];
    	return view('landing/forum',$data);
    }



	function login(){
		checkIfLogin();

		$data = [
			'title' => 'Login',
			'panel' => false
		];
		return view('landing/login', $data);
	}

	function doRegister(){
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
			'username' => [
				'required' => true
			],
			'password' => [
				'required' => true
			]
		];

		$valid = new Validation($config);

		if($valid->run()){
            $this->akun->register();

            redirect('register');
        }else{
            msg($valid->getErrors(), 'danger');
            redirect('register');
        }
	}

	function doLogin(){
		checkIfLogin();
		
		$user = Input::post('username');
		$pass = md5(Input::post('password'));


		$config = [
			'username' => [
				'required' => true
			],
			'password' => [
				'required' => true
			]
		];

		$valid = new Validation($config);

		if($valid->run()){
			if($this->akun->login($user, $pass)){
				redirect('control-panel');
			}else{
				msg('Username atau password Anda salah!', 'danger');
				redirect('login');
			}
		}else{
			msg($valid->getErrors(), 'danger');
			redirect('login');
		}
	}

	function register(){
		
        checkIfLogin();

        $data = [
            'title' => 'Register',
            'panel' => false
        ];

        return view('landing/register', $data);
    }
}