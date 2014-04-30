<?php
class Expression_model extends CI_Model{
	
	private $CI;
	
	function __construct()
	{
		parent::__construct();
		
		$CI =& get_instance();
		$this->CI = $CI;
	}
	
	function chkAtoZ($str) 
	{
	    if (!preg_match('/^[a-zA-Z]/', $str))
	 	{
			return false;
		} else {
			return true;
		}

	 }
	
	function chkPhone($number)
	{
		//0-3721-7300-4
		if (!preg_match("/^0-3[0-9]{3}-[0-9]{4}-?[0-4]?/", $number))
	 	{
			return false;
		} else {
			return true;
		}
	}
	
	function chkEmail($email)
	{
		if (!preg_match("/^[a-z][a-z0-9\_\.]*@[a-z][a-z0-9\_\-]*(\.[a-z][a-z0-9\_\-]*)+$/", $email))
	 	{
			return false;
		} else {
			return true;
		}
	}
	
	function chkSlug($str)
	{
		return trim(preg_replace('~[^a-z]~iu', " " , $str));
	}
	
}
