<?php session_start();

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

$options = array ('upload_dir' => dirname(__FILE__) . '/../../../up/bannerppal/');
require_once("../../clases/bannerppal.php");


$maximo=1;
class CustomUploadHandler extends UploadHandler {
	
	protected $imgs_prod2;

    protected function initialize() {
       	$this->imgs_prod2=new bannerppal();
		
        parent::initialize();
       
    }

    protected function handle_file_upload($uploaded_file, $name, $size, $type, $error,
            $index = null, $content_range = null) {
        $file = parent::handle_file_upload(
            $uploaded_file, $name, $size, $type, $error, $index, $content_range
        );
        if (empty($file->error)) {
			$bannerppal=new bannerppal();
			$bannerppal->borralo('/../../../up/bannerppal/');
			$this->imgs_prod2->id=0;			
			$this->imgs_prod2->ruta=$file->name;
			$this->imgs_prod2->agregar();
        }
        return $file;
    }
}

$upload_handler = new CustomUploadHandler($options,true,null,$maximo);
