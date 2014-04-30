<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Option_model extends CI_Model{
	
	private $CI;
	
	private $is_logged_in;
	private $is_userName;
	
	function __construct()
	{
		parent::__construct();
		
		$CI =& get_instance();
		$this->CI = $CI;
		
		$this->is_logged_in = $this->session->userdata('is_logged_in');
		$this->is_userName = $this->session->userdata('email');
	}
	
	function get_adminInfo()
	{
	     if($this->is_logged_in == true)
	    {
		$getInfo = $this->crud_model->readRecordRow('employee', array('email'=>$this->is_userName));
		return $getInfo->disp_name;
	    }
	}
	
	function validate()
	{
		$chkMember = $this->CI->crud_model->countRecord('employee', array('email'=>$this->input->post('email')));
		//, 'password'=>md5($this->input->post('password'))
		if($chkMember == 1)
		{

		    $record = $this->CI->crud_model->readRecordRow('employee', array('email'=>$this->input->post('email')));
		    $password = md5($this->input->post('password') . $record->gen_time);
		    $chkPass = $this->CI->crud_model->countRecord('employee', array('email'=>$this->input->post('email') , 'password'=>$password));
		    
		    if($chkPass == 1)
			return true;
		}
		else
		{
			return false;
		}
		
	}	
	
	function createMember()
	{
		
		$new_member_insert_data = array(
			'email_address' => $this->input->post('email_address'),			
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password') . date('Y-m-d H:i:s')),
			'gen_time'=> date('Y-m-d H:i:s'),						
		);
		
		return $this->db->insert('member', $new_member_insert_data);
	}
	
	function getURL( $view = NULL, $query = NULL, $class = NULL , $changLang = "NO" , $anchor = NULL )
	{	
	
		if($changLang === "YES"){
			
			$myLang = $this->CI->lang->lang();
			
			switch ($myLang){
				case 'th':
					$myLang = "en/";
				break;
				
				case 'en':
					$myLang = "th/";
				break;
			}
		} else {
			$myLang = "";	
		}
		
		$url_suffix = $this->CI->config->item('url_suffix');
		$method = (empty($class))? $this->router->class : $class;
		
		if(! empty($query)){
			
			$countQuery = count($query);
			$isLoop = 1;
			
			foreach($query as $key => $value){
				$isItem = 	$key . "=" . $value;
				$isQuery[] = ($countQuery > $isLoop)? $isItem . "&" : $isItem;
				$isLoop = $isLoop + 1;
			}
			
			$oParameter = implode($isQuery);
		}
		
		$anchor = (! empty($anchor))? "#{$anchor}" : ""; 
		
		if(empty($view) and !empty($query)){
			return base_url() . "{$myLang}{$method}{$url_suffix}?{$oParameter}{$anchor}";
		}elseif(empty($view) and empty($query)){
			return base_url() . "{$myLang}{$method}{$url_suffix}{$anchor}";
		}elseif(empty($query)){
			return base_url() . "{$myLang}{$method}/{$view}{$url_suffix}{$anchor}";
		} else {
			return base_url() . "{$myLang}{$method}/{$view}{$url_suffix}?{$oParameter}{$anchor}";
		}
	}
	
	
	function getURLFromId( $menuId )
	{
		$menuRecord = $this->CI->crud_model->readRecordRow('tb_menu', array('id'=>$menuId));
		
		if($menuRecord->type == "main" or $menuRecord->type == "special"){
			$mainPageRecord = $this->CI->crud_model->readRecordRow('tb_main_page', array('menu_id'=>$menuId));
			return $this->getURL(NULL, NULL, $mainPageRecord->meta_slug);
		} else {
			$subPageRecord = $this->CI->crud_model->readRecordRow('tb_sub_page', array('menu_id'=>$menuId));
			$mainPageRecord = $this->CI->crud_model->readRecordRow('tb_main_page', array('id'=>$subPageRecord->main_id));
			return $this->getURL($subPageRecord->meta_slug, NULL , $mainPageRecord->meta_slug);
		}
	}
	
	function getIframeURL( $oURL , $oSubURL = NULL , $query = array('item'=>null))
	{
		//http://localhost/smilefb/en/aboutus.html
		$oLang = $this->CI->lang->lang();
		$url_suffix = $this->CI->config->item('url_suffix');
		
		if(! empty($query)){
			
			$countQuery = count($query);
			$isLoop = 1;
			
			foreach($query as $key => $value){
				$isItem = 	$key . "=" . $value;
				$isQuery[] = ($countQuery > $isLoop)? $isItem . "&" : $isItem;
				$isLoop = $isLoop + 1;
			}
			
			$oParameter = implode($isQuery);
		}
		
		if(empty($oSubURL)){
			return base_url() . "{$oLang}/{$oURL}{$url_suffix}?{$oParameter}";
		} else {
			return base_url() . "{$oLang}/{$oURL}/{$oSubURL}{$url_suffix}?{$oParameter}";
		}
	}

	function getBroadcom( $menuId, $menuSubId = NULL )
	{
		$oLang = $this->CI->lang->lang();
		$row = $this->CI->crud_model->readRecordRow('tb_menu', array('id'=>$menuId));
		
		if(empty($menuSubId)){
			return ($oLang == "th")? "<li>" . $row->th_menu_name . "</li>" : "<li>" . $row->en_menu_name . "</li>";
		} else {
			$_row = $this->CI->crud_model->readRecordRow('tb_menu', array('id'=>$menuSubId));
			$mainMenu = ($oLang == "th")? $row->th_menu_name : $row->en_menu_name;
			$subMenu = ($oLang == "th")? $_row->th_menu_name : $_row->en_menu_name;
			return "<li>" . $mainMenu . "</li> <li class=\"sub\"><span>" . $subMenu . "</span></li>";
		}
	}
	
	function getDescription( $class , $controller = NULL )
	{
		if(! empty($controller) and $class != "ourcollection"){
			$_row = $this->CI->crud_model->readRecordRow('tb_sub_page', array('meta_slug'=>$controller));
			$description = entities_to_ascii($_row->meta_description); // แปลง แอสกี
			$description = strip_tags($description); // ตัด tag html
			$description = preg_replace('~[^a-z0-9ก-๙\.\-\_]~iu', " ", $description); // ตัดอักขระพิเศษ
			$description = strtolower($description); // ทำให้เป็นตัวพิมพ์เล็ก
			$description = trim($description); // ตัดช่องว่างหน้าและหลัง
			$description = @ereg_replace('[[:space:]]+', ' ', $description); // ตัดช่วงว่างระหว่างคำให้เหลือแค่ 1 ช่อง
			return word_limiter($description, 10);
			
		} else {
			$_row = $this->CI->crud_model->readRecordRow('tb_main_page', array('meta_slug'=>$class));
			$description = entities_to_ascii($_row->meta_description); // แปลง แอสกี
			$description = strip_tags($description); // ตัด tag html
			$description = preg_replace('~[^a-z0-9ก-๙\.\-\_]~iu', " ", $description); // ตัดอักขระพิเศษ
			$description = strtolower($description); // ทำให้เป็นตัวพิมพ์เล็ก
			$description = trim($description); // ตัดช่องว่างหน้าและหลัง
			$description = @ereg_replace('[[:space:]]+', ' ', $description); // ตัดช่วงว่างระหว่างคำให้เหลือแค่ 1 ช่อง
			return word_limiter($description, 10);
			
		}	
	}
	
	function getAllDescription( $class , $controller = NULL )
	{
		if(! empty($controller) and $class != "ourcollection"){
			$_row = $this->CI->crud_model->readRecordRow('tb_sub_page', array('meta_slug'=>$controller));
			$description = entities_to_ascii($_row->meta_description); // แปลง แอสกี
			//$description = strip_tags($description); // ตัด tag html
			//$description = preg_replace('~[^a-z0-9ก-๙\.\-\_]~iu', " ", $description); // ตัดอักขระพิเศษ
			$description = strtolower($description); // ทำให้เป็นตัวพิมพ์เล็ก
			$description = trim($description); // ตัดช่องว่างหน้าและหลัง
			$description = @ereg_replace('[[:space:]]+', ' ', $description); // ตัดช่วงว่างระหว่างคำให้เหลือแค่ 1 ช่อง
			return $description;
			
		} else {
			$_row = $this->CI->crud_model->readRecordRow('tb_main_page', array('meta_slug'=>$class));
			$description = entities_to_ascii($_row->meta_description); // แปลง แอสกี
			//$description = strip_tags($description); // ตัด tag html
			//$description = preg_replace('~[^a-z0-9ก-๙\.\-\_]~iu', " ", $description); // ตัดอักขระพิเศษ
			$description = strtolower($description); // ทำให้เป็นตัวพิมพ์เล็ก
			$description = trim($description); // ตัดช่องว่างหน้าและหลัง
			$description = @ereg_replace('[[:space:]]+', ' ', $description); // ตัดช่วงว่างระหว่างคำให้เหลือแค่ 1 ช่อง
			return $description;
			
		}	
	}
	
	function getKeywords( $class , $controller = NULL )
	{
		if(! empty($controller) and $class != "ourcollection"){
			$_row = $this->CI->crud_model->readRecordRow('tb_sub_page', array('meta_slug'=>$controller));
			return $_row->meta_keyword;
		} else {
			$_row = $this->CI->crud_model->readRecordRow('tb_main_page', array('meta_slug'=>$class));
			return $_row->meta_keyword;
		}
	}
	
	function getTitle( $table , $where )
	{
		$row = $this->CI->crud_model->readRecordRow($this->db->dbprefix($table), $where);
		return $row;
	}
	
}