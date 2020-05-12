<?php session_start();
/*
 * jQuery File Upload Plugin PHP Example 5.14
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

$options = array ('upload_dir' => dirname(__FILE__) . '/../../../up/blog/'.$_SESSION["xxxid"].'/');
require_once("../../clases/database.php");
$maximo=1;
class CustomUploadHandler extends UploadHandler {
	
	protected $imgs_prod2;

    protected function initialize() {

        parent::initialize();
       
    }

    protected function handle_file_upload($uploaded_file, $name, $size, $type, $error,
            $index = null, $content_range = null) {
        $file = parent::handle_file_upload(
            $uploaded_file, $_SESSION["xxxaleata"], $size, $type, $error, $index, $content_range
        );
        return $file;
    }
}

$upload_handler = new CustomUploadHandler($options,true,null,$maximo);
