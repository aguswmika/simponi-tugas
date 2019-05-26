<?php 

class Input
{

	private $file;

	static function post($str){
		return isset($_POST[$str]) ? $_POST[$str] : null;
	}

	static function get($str){
		return isset($_GET[$str]) ? $_GET[$str] : null;
	}

	static function url($index){
        $urls = explode('/', trim(filter_var(str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['PHP_SELF']), FILTER_SANITIZE_URL), "/"));
        if(isset($urls[$index]))
            return $urls[$index];
        else return null;
    }

    static function file($str){
    	$obj = new Input();

    	$obj->setFile(isset($_FILES[$str]) ? $_FILES[$str] : null);

    	return $obj;
    }

    function setFile($file){
    	$this->file = $file;
    }

    function getName(){
    	return str_replace('.'.$this->getExtension(), '', $this->file['name']);
    }

    function getExtension(){
    	return pathinfo($this->file['name'], PATHINFO_EXTENSION);
    }

    function upload($path, $new_file = ''){

    	$folder = BASE_PATH.$path;

    	$new_path = ''.ltrim($folder, '/').'/'.(empty($new_file) ? $this->file['name'] : $new_file.$this->getExtension);

		if(!file_exists($folder)){
			mkdir($folder, 0777, true);
		}
		if(move_uploaded_file($this->file['tmp_name'], $new_path)){

    		return ltrim($path, '/').'/'.(empty($new_file) ? $this->file['name'] : $new_file.$this->getExtension);
    	}else{
    		return false;
    	}
    }

}