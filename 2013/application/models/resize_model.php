<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Resize_model extends CI_Model{
	
	private $CI;
	
	private $upload_path;
	private $source;
	
	private $root;
	
	private $path;
	private $filepath;
	private $fullpath;
	private $imageFullSize;
	private $width;
	private $height;
	private $image_name;
	private $image_width;
	private $image_height;
	private $thumb_width;
	private $thumb_height;
	
	function __construct()
	{
		parent::__construct();
		
		$CI =& get_instance();
		$this->CI = $CI;
		
		$this->root = "assets/modules/control/image/";
	}
	
	function resizeImages( $path = NULL , $width = 500 , $height = 500 , $thumb_width = 100 , $thumb_height = 100 , $tagName = 'files')
	{
		$this->width = $width;
		$this->height = $height;
		$this->thumb_width = $thumb_width;
		$this->thumb_height = $thumb_height;
		$this->path = "{$path}";
		$this->upload_path = ($path == NULL)? "{$this->root}" : "{$this->root}{$this->path}/";
		
		$this->source = array('upload_path' => $this->upload_path,
								'allowed_types' => 'png|jpg|jpeg|gif',
								'remove_spaces' => TRUE,
								'encrypt_name' => TRUE,
								'overwrite' => FALSE
								);
								
		$this->load->library('upload', $this->source);
		
		$errors = FALSE;

		if(!empty($_FILES["is_{$tagName}"]['name']))
		{
			
			if(!$this->CI->upload->do_upload("is_{$tagName}"))
			{   
				//print_r($_FILES);
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);
					
				$errors = TRUE;
				
				$files[] = $this->CI->upload->data();
			}
			else
			{
				// Build a file array from all uploaded files
				$files[] = $this->CI->upload->data();
				$this->filepath = $files[0]['file_path'];
				$this->fullpath = $files[0]['full_path'];
				$this->image_name = $files[0]['file_name'];
				$this->image_width = $files[0]['image_width'];
				$this->image_height = $files[0]['image_height'];
				
				$isFile = "{$this->filepath}/fullsize/{$this->image_name}";
				
				/*
				echo br();
				echo "<pre>";
				print_r($files);
				echo "</pre>";
				*/
				
				$this->imageFullSize = $isFile;
				
				$this->imageResize();
				$this->imageCrop();
				$this->createThumb();
				
				@unlink($this->fullpath);
				
				unset($this->source);
			}
		}

		
		if($errors)
		{                    
		    @unlink($this->fullpath);                 
		}
		else
		{
		    return $files;
		}
		
	}
	
	function imageResize()
	{
		
		$config['image_library'] = 'gd2';
		$config['source_image'] = $this->fullpath;
		$config['new_image'] = "{$this->root}{$this->path}/fullsize/";
		$config['maintain_ratio'] = TRUE;
		
		$getWidth = round(($this->height * $this->image_width) / $this->image_height);
		$getHeight = round(($this->width * $this->image_height) / $this->image_width);
		
		if($this->image_width > $this->image_height){
			if($getHeight < $this->height){
				$config['height'] = 	$this->height;	
				$config['width'] = $getWidth;
			} else {
				$config['width'] = $this->width;
				$config['height'] = $getHeight;
			}
		}
		
		if($this->image_width < $this->image_height){
			if($getHeight < $this->height){
				$config['height'] = $this->height;	
				$config['width'] = $getWidth;
			} else {
				$config['width'] = $this->width;
				$config['height'] = $getHeight;
			}
		}
		
		$this->image_lib->initialize($config);
		if ( ! $this->image_lib->resize()){echo $this->image_lib->display_errors();}
		$this->image_lib->clear();
		
	}
	
	function imageCrop()
	{
		$imageSize = getimagesize($this->imageFullSize);
		
		$axisX = round(($imageSize[0] - $this->width) / 2);
		$axisY = round(($imageSize[1] - $this->height) / 2);
		
		$config['image_library'] = 'gd2';
		$config['source_image'] = $this->imageFullSize;
		$config['maintain_ratio'] = false;
		$config['width'] = $this->width;
		$config['height'] = $this->height;
		$config['x_axis'] = $axisX;
		$config['y_axis'] = $axisY;
		
		$this->image_lib->initialize($config);
		
		if ( ! $this->image_lib->crop()){echo $this->image_lib->display_errors();}
		$this->image_lib->clear();
		
	}
	
	function createThumb()
	{
		
		$config['image_library'] = 'gd2';
		$config['source_image'] = $this->imageFullSize;
		$config['new_image'] = "{$this->root}{$this->path}/thumb/";
		$config['maintain_ratio'] = TRUE;
		$config['width'] = $this->thumb_width;
		$config['height'] = $this->thumb_height;
		
		$this->image_lib->initialize($config);
		if ( ! $this->image_lib->resize()){echo $this->image_lib->display_errors();}
		$this->image_lib->clear();
	}
	
}