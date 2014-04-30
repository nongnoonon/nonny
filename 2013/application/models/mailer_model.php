<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mailer_model extends CI_Model{
	
	private $CI;
	
	function __construct()
	{
		parent::__construct();
		
		$CI =& get_instance();
		$this->CI = $CI;
		
		$this->load->library('email');
	}
	
	function mailActivationCode( $mail , $code )
	{
		$config['mailtype'] = "html";
		$config['wordwrap'] = TRUE;
		
		$this->email->initialize($config);
		
		$message = "<p style=\"color:#f00;\">Testing the email class {$mail}.</p> " . anchor($this->CI->Option_model->getURL('chkActiveMember', array('code'=>$code)), $code);
		
		$this->email->from('keattisak@connextstudio.com', 'Your Name');
		$this->email->to( $mail );
		
		$this->email->subject('IPTV by Gokiri');
		$this->email->message($message);	
		
		return $this->email->send();
		
		$this->email->print_debugger();
	}
	
	function mailForgotPassword( $mail , $code )
	{
		$config['mailtype'] = "html";
		$config['wordwrap'] = TRUE;
		
		$this->email->initialize($config);
		
		$message = "<p style=\"color:#f00;\">Mail for new password {$mail}.</p> new password : " . $code;
		
		$this->email->from('keattisak@connextstudio.com', 'Your Name');
		$this->email->to( $mail );
		
		$this->email->subject('New password');
		$this->email->message($message);	
		
		return $this->email->send();
		
		$this->email->print_debugger();
	}
	
}
