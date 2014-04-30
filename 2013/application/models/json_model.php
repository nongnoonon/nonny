<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Json_model extends CI_Model
{
	private $CI;
	
	function __construct()
	{
		parent::__construct();
		
		$CI =& get_instance();
		$this->CI = $CI;
		
	}
	
    public static function Encode($obj)
    {
        return json_encode($obj);
    }
    
    public static function Decode($json, $toAssoc = false)
    {
        $result = json_decode($json, $toAssoc);
		
		if(function_exists('json_last_error')){
		
			switch(json_last_error())
			{
				case JSON_ERROR_DEPTH:
					$error =  ' - Maximum stack depth exceeded';
					break;
				case JSON_ERROR_CTRL_CHAR:
					$error = ' - Unexpected control character found';
					break;
				case JSON_ERROR_SYNTAX:
					$error = ' - Syntax error, malformed JSON';
					break;
				case JSON_ERROR_NONE:
				default:
					$error = '';                    
			}
			if (!empty($error))
				throw new Exception('JSON Error: '.$error);   
		}
        
        return $result;
    }
}