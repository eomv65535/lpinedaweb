<?php session_start();

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

$options = array ('upload_dir' => dirname(__FILE__) . '/../../../up/imgfondvideo/');
require_once("../../clases/imgfondvideo.php");


$maximo=1;
class CustomUploadHandler extends UploadHandler {
	
	protected $imgs_prod2;

    protected function initialize() {
       	$this->imgs_prod2=new imgfondvideo();
		
        parent::initialize();
       
    }

    protected function handle_file_upload($uploaded_file, $name, $size, $type, $error,
            $index = null, $content_range = null) {
        $file = parent::handle_file_upload(
            $uploaded_file, $name, $size, $type, $error, $index, $content_range
        );
        if (empty($file->error)) {
			$imgfondvideo=new imgfondvideo();
			$imgfondvideo->borralo('/../../../up/imgfondvideo/');
			$this->imgs_prod2->id=0;			
			$this->imgs_prod2->ruta=$file->name;
			$this->imgs_prod2->agregar();
        }
        return $file;
    }
}

$upload_handler = new CustomUploadHandler($options,true,null,$maximo);
