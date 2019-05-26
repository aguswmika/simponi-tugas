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

    function getName($file){
    	return str_replace('.'.$this->getExtension($file), '', $file);
    }

    function getExtension($file){
    	return pathinfo($file, PATHINFO_EXTENSION);
    }

    function upload($path, $new_file = ''){

    	$folder = BASE_PATH.ltrim($path, '/');

        if(!file_exists($folder)){
            mkdir($folder, 0777, true);
        }

        if(is_array($this->file['name'])){
            $arr_url = [];

            for($i = 0; $i< count($this->file['name']); $i++){
                $new_path = $folder.'/'.(empty($new_file[$i]) ? $this->file['name'][$i] : $new_file[$i].$this->getExtension($this->file['name'][$i]));

                if(move_uploaded_file($this->file['tmp_name'][$i], $new_path)){
                    array_push($arr_url, ltrim($path, '/').'/'.(empty($new_file) ? $this->file['name'][$i] : $new_file.$this->getExtension($this->file['name'][$i])));
                }else{
                    foreach ($arr_url as $item) {
                        unlink($item);
                    }

                    return false;
                }
            }

            return $arr_url;
        }else{
            $new_path = $folder.'/'.(empty($new_file) ? $this->file['name'] : $new_file.$this->getExtension($this->file['name']));

            if(move_uploaded_file($this->file['tmp_name'], $new_path)){
                return ltrim($path, '/').'/'.(empty($new_file) ? $this->file['name'] : $new_file.$this->getExtension($this->file['name']));
            }else{
                return false;
            }
        }

    }

}