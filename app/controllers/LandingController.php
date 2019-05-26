<?php
class LandingController
{
	private $akun;

	function __construct()
	{
		$this->akun = model('akun');

	}
	function index(){
		return view('landing/index');
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
    function edukasi(){
    	$data = [
    		'title' => 'edukasi'	
    	];
    	return view('landing/edukasi', $data);
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



	function login(){
		checkIfLogin();

		$data = [
			'title' => 'Login',
			'panel' => false
		];
		return view('landing/login', $data);
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
				Session::sess('login', true);
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