<?php session_start();

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

$options = array ('upload_dir' => dirname(__FILE__) . '/../../../up/audios/');
require_once("../../clases/audios.php");
$audios=new audios();
$maximo=1;
class CustomUploadHandler extends UploadHandler {
	
	protected $imgs_prod2;

    protected function initialize() {
       	$this->imgs_prod2=new audios();
        parent::initialize();
       
    }

protected function handle_form_data($file, $index) {
       
    }

    protected function handle_file_upload($uploaded_file, $name, $size, $type, $error,
            $index = null, $content_range = null) {
        $file = parent::handle_file_upload(
            $uploaded_file, $name, $size, $type, $error, $index, $content_range
        );
        if (empty($file->error)) {
			$this->imgs_prod2->id=0;
			$this->imgs_prod2->aleata=$_SESSION["xxxaleata"];			
			$this->imgs_prod2->ruta_img=$file->name;
			$this->imgs_prod2->agregar();
        }
        return $file;
    }
}

$upload_handler = new CustomUploadHandler($options,true,null,$maximo);
