<?php session_start();

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

$options = array ('upload_dir' => dirname(__FILE__) . '/../../comen_incidencia_imgs/'.$_SESSION["xxxaleata_img_deja_comen"].'/');
require_once("../../clases/comen_incidencia_imgs.php");
$comen_incidencia_imgs=new comen_incidencia_imgs();
$maximo=1;
class CustomUploadHandler extends UploadHandler {
	
	protected $imgs_prod2;

    protected function initialize() {
       	$this->imgs_prod2=new comen_incidencia_imgs();
        parent::initialize();
       
    }

    protected function handle_file_upload($uploaded_file, $name, $size, $type, $error,
            $index = null, $content_range = null) {
        $file = parent::handle_file_upload(
            $uploaded_file, $name, $size, $type, $error, $index, $content_range
        );
        if (empty($file->error)) {
			$this->imgs_prod2->id=0;
			$this->imgs_prod2->id_comen=0;
			$this->imgs_prod2->aleta=$_SESSION["xxxaleata_img_deja_comen"];			
			$this->imgs_prod2->ruta=$file->name;
			$this->imgs_prod2->agregar();
        }
        return $file;
    }
}

$upload_handler = new CustomUploadHandler($options,true,null,$maximo);
