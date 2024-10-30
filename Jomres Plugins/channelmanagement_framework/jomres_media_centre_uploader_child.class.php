<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################


class jomres_media_centre_uploader_child extends UploadHandler
{
	public $options;
	
	public function get_server_var($id) {
		return @$_SERVER[$id];
	}
	
	public function get_file_type($file_path) {
		switch (strtolower(pathinfo($file_path, PATHINFO_EXTENSION))) {
			case 'jpeg':
			case 'jpg':
				return 'image/jpeg';
			case 'png':
				return 'image/png';
			case 'gif':
				return 'image/gif';
			default:
				return '';
		}
	}
	

	public function handle_file_upload($uploaded_file, $name, $size, $type, $error,
			$index = null, $content_range = null) {
		$file = new stdClass();
		$file->name = $this->get_file_name($uploaded_file, $name, $size, $type, $error,
			$index, $content_range);
		$file->name = str_replace( array ( " ","(" , ")" , "'" ) , "_" , $file->name );
		$file->size = $this->fix_integer_overflow((int)$size);
		$file->type = $type;
		if ($this->validate($uploaded_file, $file, $error, $index)) {
			$this->handle_form_data($file, $index);
			$upload_dir = $this->get_upload_path();
			if (!is_dir($upload_dir)) {
				mkdir($upload_dir, $this->options['mkdir_mode'], true);
			}
			$file_path = $this->get_upload_path($file->name);
			$append_file = $content_range && is_file($file_path) &&
				$file->size > $this->get_file_size($file_path);
			if ($uploaded_file && is_uploaded_file($uploaded_file)) {
				// multipart/formdata uploads (POST method uploads)
				if ($append_file) {
					file_put_contents(
						$file_path,
						fopen($uploaded_file, 'r'),
						FILE_APPEND
					);
				} else {
					move_uploaded_file($uploaded_file, $file_path);
				}
			} else {
				// Non-multipart uploads (PUT method support)
				file_put_contents(
					$file_path,
					fopen($this->options['input_stream'], 'r'),
					$append_file ? FILE_APPEND : 0
				);
			}
			$file_size = $this->get_file_size($file_path, $append_file);
			if ($file_size === $file->size) {
				$file->url = $this->get_download_url($file->name);
				if ($this->is_valid_image_file($file_path)) {
					$this->handle_image_file($file_path, $file);
				}
			} else {
				$file->size = $file_size;
				if (!$content_range && $this->options['discard_aborted_uploads']) {
					unlink($file_path);
					$file->error = $this->get_error_message('abort');
				}
			}
			$this->set_additional_file_properties($file);
		}
		return $file;
	}
	
	public function get_upload_data($file) {
		$size = filesize ($file);
		return array("size" => $size );
	}
}
