<?php 

if(!function_exists('load')){
	function load($str){
		require BASE_PATH.'app/controllers/'.ucfirst($str).'.php';
	}
}

if(!function_exists('model')){
	function model($str){
		$model = ucfirst($str);
		require BASE_PATH.'app/models/'.$model.'.php';
		return new $model();
	}
}

if(!function_exists('view')){
	function view($str, $data = []){
		extract($data);
		return require BASE_PATH.'app/views/'.$str.'.php';
	}
}

if(!function_exists('redirect')){
	function redirect($str){
		header('location: '.base_url($str)) ;
	}
}

if(!function_exists('base_url')){
	function base_url($str = ""){
		$http = 'http'.((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 's' : '').'://';
		$url  = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
		return $http.$_SERVER['HTTP_HOST'].$url.$str;
	}
}

if(!function_exists('msg')){
	function msg($msg = NULL, $sts = 'info'){
		if(empty($msg)){
			return Session::flash('error');
		}else{
			Session::flash('error','
				<div class="alert alert-'.$sts.' alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					'.$msg.'
				</div>');
		}
	}
}

if(!function_exists('msgCustom')){
	function msgCustom($msg = NULL, $title = NULL, $sts = 'info', $icon = 'check'){
		if(empty($msg)){
			return Session::flash('error');
		}else{
			Session::flash('error','
				<div class="alert alert-'.$sts.' alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-'.$icon.'"></i> '.$title.'</h4>
	                '.$msg.'
              	</div>');
		}
	}
}

if(!function_exists('paginate')){
	function paginate($table, $limit){
		$sql = "SELECT count(*) as count FROM {$table} WHERE del = 0";

		$prep = DB::conn()->prepare($sql);
		$prep->execute();
		$item = $prep->fetch(PDO::FETCH_OBJ);

		$total = ceil($item->count/$limit);


		$start = '<center><ul class="nav-page">';
		$mid   = '';
		$p     = Input::get('p');
		$hal   = empty(Input::get('hal')) ? 1 : Input::get('hal');

		$startnum = $total - 3;

		for ($i=1; $i <= $startnum; $i++) {
			if($hal == $i ){
				$class = 'class="active"';
			}else{
				$class = '';
			}
			$mid .= '<li><a '.$class.' href="?p='.$p.'&hal='.$i.'">'.$i.'</a></li>';
		}

		$end   = '</ul></center>';

		if(empty(Input::get('search'))){
			return $start.$mid.$end;
		}else{
			return NULL;
		}
	}
}

if(!function_exists('checkIfNotLogin')){
	function checkIfNotLogin(){
		if(Session::sess('login') === false || Session::sess('login') === null){
			msg('Anda harus login terlebih dahulu', 'warning');
			redirect('login');
		}
	}
}

if(!function_exists('checkIfLogin')){
	function checkIfLogin(){
		if(Session::sess('login') === true){
			redirect('control-panel');
		}
	}
}

if(!function_exists('old')){
    function old($name){
        $session = Session::flash('old_'.$name);
        return $session;
    }
}

if(!function_exists('abort')){
    function abort($key){
        view('errors/'.$key);
        die();
    }
}

if(!function_exists('url_slug')){
    function url_slug($text='') {
        $text = trim($text);
        if (empty($text)) return '';
            $text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
            $text = strtolower(trim($text));
            $text = str_replace(' ', '-', $text);
            $text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
        return substr($text,0,100);
    }
}
