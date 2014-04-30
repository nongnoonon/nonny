<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Someupload_model extends CI_Model{
	
	private $CI;
	
	private $upload_path;
	private $source;
	
	private $root;
	
	private $path;
	private $fullpath;
	
	function __construct()
	{
		parent::__construct();
		
		$CI =& get_instance();
		$this->CI = $CI;
		
		$this->root = "./assets/modules/control/";
	}
	
	function upload(  $path = NULL , $allowed_types = 'pdf' , $tagName = 'files' )
	{
		$this->path = "{$path}";
		$this->upload_path = ($path == NULL)? "{$this->root}" : "{$this->root}{$this->path}/";
		
		$this->source = array('upload_path' => $this->upload_path,
								'allowed_types' => $allowed_types,
								'max_size'	=> '100048576',
								'remove_spaces' => TRUE,
								'encrypt_name' => TRUE,
								'overwrite' => FALSE
								);
		
		$this->load->library('upload', $this->source);
		
		$this->upload->initialize($this->source);
		
		if( !empty($_FILES["is_{$tagName}"]['name']))
		{
			if(! $this->CI->upload->do_upload("is_{$tagName}"))
			{
				$error = array('error' => $this->upload->display_errors());
				return $error;
			}
			else
			{
				$files[] = $this->CI->upload->data();
				return $files;
			}
		}
		else
		{
			$data['upload_message'] = "not files.";
			return $this->CI->load->vars($data);
		}
	}
	
}