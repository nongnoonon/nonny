<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Super Class
 *
 * @package	Package Name
 * @subpackage	Subpackage
 * @category	Category
 * @author	Author Name
 * @link	http://example.com
 */
 
class Backoffice extends CI_Controller {

	//public $oMylang;
	public $class;
	public $controller;
	public $view;
	public $step;
	public $stepId;
	
	public $is_logged_in;
	public $is_userName;
	
	public $template;
	
	public $oSetKC;
	public $oSetText;
	public $oSetList;
	
	public $fullCKE;
	public $textCKE;
	public $listCKE;
	
	public $perpage;
	public $numpage;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library(array('table','form_validation','pagination','image_lib'));
		
		//$this->oMylang = $this->lang->lang();
		$this->class =  $this->router->class;
		$this->controller = $this->uri->segment(2);
		$this->view = $this->uri->segment(3);
		$this->step = $this->uri->segment(4);
		$this->stepId = $this->uri->segment(5);
		
		$this->is_logged_in = $this->session->userdata('is_logged_in');
		$this->is_userName = $this->session->userdata('email');
		
		$ckeditor_url = base_url() . $this->config->item('ckeditor_basepath');
		$ckfinder_url = base_url() . $this->config->item('ckfinder_basepath');
		
		$this->load->library('CKEditor', $ckeditor_url);
		$this->ckeditor->basePath = $ckeditor_url;
		
		$this->load->library('CKFinder', $ckfinder_url);
		$this->ckfinder->BasePath = "../../" . $this->config->item('ckfinder_basepath');
		$this->ckfinder->SetupCKEditorObject($this->ckeditor);
		
		$this->oSetKC = array(
					array('Source','-','Undo','Redo','-','Link', 'Unlink', 'Image','Table','Flash','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','HorizontalRule','-','NumberedList','BulletedList','-','Outdent','Indent','Blockquote'),
					array('Format','Font','FontSize','-','TextColor','BGColor','-','Bold','Italic','Underline','Strike', 'Smiley','SpecialChar','Subscript','Superscript','RemoveFormat','-','Maximize'),
					array('NewPage','Preview','Templates','Font','FontSize'));

		$this->oSetText = array(array('Undo','Redo','Format','Font','FontSize','-','TextColor','BGColor','-','Bold','Italic','Underline','Strike','Table','-','Maximize'));
		$this->oSetList = array(array('Undo','Redo','Format','Font','FontSize','-','NumberedList','BulletedList','-','Maximize'));
		
		$this->fullCKE = array('toolbar' => $this->oSetKC  ,'width'=>'100%', 'height'=>'350px');
		$this->textCKE = array('toolbar' => $this->oSetText , 'width'=>'650px', 'height'=>'150px');
		$this->listCKE = array('toolbar' => $this->oSetList , 'width'=>'100%', 'height'=>'350px');
		
		$this->perpage = 20;
		$this->numpage = 5;
	}
	
	function _remap( $method , $params = array())
	{
		if (method_exists($this, $method))
		{
			return call_user_func_array(array($this, $method), $params);
		} 
		else 
		{
			$this->error404();
		}
	}
	
	function index($error = false)
	{
		
		if(!isset($this->is_logged_in) || $this->is_logged_in != true || $error == true)
		{
			$validation = validation_errors();
			$error = (! empty($error))? $error : $validation;
			$this->session->set_flashdata('error', "{$error}");
			$this->load->view('admin_template/view_login');
		} 
		else 
		{
			redirect($this->Option_model->getURL('main'));
		}
				
	}
	
	function validate_credentials()
	{		
		$is_logged_in = $this->Option_model->validate();
	
		if($is_logged_in) // if the user's credentials validated...
		{
			$data = array(
				'email' => $this->input->post('email'),
				'is_logged_in' => true
			);
			
			$this->session->set_userdata($data);
			
			redirect($this->Option_model->getURL('main'));
		}
		else // incorrect username or password
		{
			$this->session->set_flashdata('error', 'incorrect username or password.');
			redirect($this->Option_model->getURL('index'));
		}
		
	}	
	
	function is_logged_in()
	{
		if(!isset($this->is_logged_in) || $this->is_logged_in != true)
		{
			redirect($this->Option_model->getURL('index'));
		}		
	}
	
	function dashboard()
	{

	}
	
	function main()
	{
		$data['main_content'] = "main";
		$this->load->view("admin_template/view_template" , $data);
	}
	
	## About us ##
	
	function aboutus()
	{
		switch ($this->view){
			case "create" : $data['main_content'] = "create_aboutus";
			break;
		
			case "edit" :
				$data['row'] = $this->crud_model->readRecordRow('tab', array('id'=>$this->input->get('editId')));
				$data['main_content'] = "edit_aboutus";
			break;
		
			default : $data['main_content'] = "data_aboutus";
			break;
		}
		
		$this->load->view("admin_template/view_template" , $data);
	}
	
	function chkCreateAboutus()
	{
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('topic', 'Topic', 'trim|required|max_length[50]');
		
		if($_POST)
		{
			if($this->form_validation->run() == FALSE)
			{
				$validation = validation_errors();
				$error = (! empty($validation))? $validation : "have some more fields or required fields some problems happen.";
				$this->session->set_flashdata('error', "{$error}");
				redirect($this->Option_model->getURL("aboutus/create"));
			}
			else
			{
				$record['topic'] = UCWord($this->input->post('topic'));
				$record['long_desc'] = $this->input->post('long_desc');
				$record['dep_id'] = UCWord($this->input->post('dep_id'));
				$record['type'] = "about";
				$record['created'] = date('Y-m-d H:i:s');
				$record['status'] = ($this->input->post('status') == "Published") ? "active" : "inactive";
				
				$result = $this->crud_model->createRecord($record, "tab");
				
				if($result){
					$this->session->set_flashdata('successful', 'successful.');
					$dep = $this->crud_model->readRecordRow('department', array('id'=>$this->input->post('dep_id')));
					redirect($this->Option_model->getURL("aboutus", array('group'=>$dep->division)));
				} else {
					$this->session->set_flashdata('error', 'Error , have some more fields not support for database.');
					redirect($this->Option_model->getURL("aboutus/create"));
				}
			}
		}	
	}
	
	function chkEditAboutus()
	{
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('topic', 'Topic', 'trim|required|max_length[50]');
		
		if($_POST)
		{
			if($this->form_validation->run() == FALSE)
			{
				$validation = validation_errors();
				$error = (! empty($validation))? $validation : "have some more fields or required fields some problems happen.";
				$this->session->set_flashdata('error', "{$error}");
				redirect($this->Option_model->getURL("aboutus/edit", array('editId'=>$this->input->get('editId'), 'group'=>$this->input->post('group'))));
			}
			else
			{
				$record['topic'] = UCWord($this->input->post('topic'));
				$record['long_desc'] = $this->input->post('long_desc');
				$record['dep_id'] = UCWord($this->input->post('dep_id'));
				$record['status'] = ($this->input->post('status') == "Published") ? "active" : "inactive";
				
				$result = $this->crud_model->updateRecord($record, "tab", $this->input->post('editId'));
				
				
				if($result){
					$this->session->set_flashdata('successful', 'successful.');
					redirect($this->Option_model->getURL("aboutus", array('group'=>$this->input->post('group'))));
				} else {
					$this->session->set_flashdata('error', 'Error , have some more fields not support for database.');
					redirect($this->Option_model->getURL("aboutus/edit", array('editId'=>$this->input->get('editId'), 'group'=>$this->input->post('group'))));
				}
				
			}
		}	
	}
	
	## Contact us ##
	
	function contact()
	{
		switch ($this->view){
			case "create" : $data['main_content'] = "create_contact";
			break;
		
			case "edit" :
				$data['row'] = $this->crud_model->readRecordRow('tab', array('id'=>$this->input->get('editId')));
				$data['main_content'] = "edit_contact";
			break;
		
			default : $data['main_content'] = "data_contact";
			break;
		}
		
		$this->load->view("admin_template/view_template" , $data);
	}
	
	function chkCreateContact()
	{
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('topic', 'Topic', 'trim|required|max_length[50]');
		
		if($_POST)
		{
			if($this->form_validation->run() == FALSE)
			{
				$validation = validation_errors();
				$error = (! empty($validation))? $validation : "have some more fields or required fields some problems happen.";
				$this->session->set_flashdata('error', "{$error}");
				redirect($this->Option_model->getURL("contact/create"));
			}
			else
			{
				$record['topic'] = UCWord($this->input->post('topic'));
				$record['long_desc'] = $this->input->post('long_desc');
				$record['dep_id'] = UCWord($this->input->post('dep_id'));
				$record['type'] = "contact";
				$record['created'] = date('Y-m-d H:i:s');
				$record['status'] = ($this->input->post('status') == "Published") ? "active" : "inactive";
				
				$result = $this->crud_model->createRecord($record, "tab");
				
				if($result){
					$this->session->set_flashdata('successful', 'successful.');
					$dep = $this->crud_model->readRecordRow('department', array('id'=>$this->input->post('dep_id')));
					redirect($this->Option_model->getURL("contact", array('group'=>$dep->division)));
				} else {
					$this->session->set_flashdata('error', 'Error , have some more fields not support for database.');
					redirect($this->Option_model->getURL("contact/create"));
				}
			}
		}	
	}
	
	function chkEditContact()
	{
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('topic', 'Topic', 'trim|required|max_length[50]');
		
		if($_POST)
		{
			if($this->form_validation->run() == FALSE)
			{
				$validation = validation_errors();
				$error = (! empty($validation))? $validation : "have some more fields or required fields some problems happen.";
				$this->session->set_flashdata('error', "{$error}");
				redirect($this->Option_model->getURL("contact/edit", array('editId'=>$this->input->get('editId'), 'group'=>$this->input->post('group'))));
			}
			else
			{
				$record['topic'] = UCWord($this->input->post('topic'));
				$record['long_desc'] = $this->input->post('long_desc');
				$record['dep_id'] = UCWord($this->input->post('dep_id'));
				$record['status'] = ($this->input->post('status') == "Published") ? "active" : "inactive";
				
				$result = $this->crud_model->updateRecord($record, "tab", $this->input->post('editId'));
				
				
				if($result){
					$this->session->set_flashdata('successful', 'successful.');
					redirect($this->Option_model->getURL("contact", array('group'=>$this->input->post('group'))));
				} else {
					$this->session->set_flashdata('error', 'Error , have some more fields not support for database.');
					redirect($this->Option_model->getURL("contact/edit", array('editId'=>$this->input->get('editId'), 'group'=>$this->input->post('group'))));
				}
				
			}
		}	
	}
	
	function program()
	{
		switch ($this->view){
			case "create" : $data['main_content'] = "create_program";
			break;
		
			case "edit" :
				$data['row'] = $this->crud_model->readRecordRow('tab', array('id'=>$this->input->get('editId')));
				$data['main_content'] = "edit_program";
			break;
		
			default : $data['main_content'] = "data_program";
			break;
		}
		
		$this->load->view("admin_template/view_template" , $data);
	}
	
	function chkCreateProgram()
	{
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('topic', 'Topic', 'trim|required|max_length[255]');
		
		if($_POST)
		{
			if($this->form_validation->run() == FALSE)
			{
				$validation = validation_errors();
				$error = (! empty($validation))? $validation : "have some more fields or required fields some problems happen.";
				$this->session->set_flashdata('error', "{$error}");
				redirect($this->Option_model->getURL("program/create"));
			}
			else
			{
				$record['topic'] = UCWord($this->input->post('topic'));
				$record['long_desc'] = $this->input->post('long_desc');
				$record['dep_id'] = UCWord($this->input->post('dep_id'));
				$record['type'] = "program";
				$record['created'] = date('Y-m-d H:i:s');
				$record['status'] = ($this->input->post('status') == "Published") ? "active" : "inactive";
				
				$created = $this->crud_model->createRecord($record, "tab");
				
				if($created){
					$this->session->set_flashdata('successful', 'successful.');
					$dep = $this->crud_model->readRecordRow('department', array('id'=>$this->input->post('dep_id')));
					redirect($this->Option_model->getURL("program", array('group'=>$dep->division)));
				} else {
					$this->session->set_flashdata('error', 'Error , have some more fields not support for database.');
					redirect($this->Option_model->getURL("program/create"));
				}
			}
		}	
	}
	
	function chkEditProgram()
	{
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('topic', 'Topic', 'trim|required|max_length[255]');
		
		if($_POST)
		{
			if($this->form_validation->run() == FALSE)
			{
				$validation = validation_errors();
				$error = (! empty($validation))? $validation : "have some more fields or required fields some problems happen.";
				$this->session->set_flashdata('error', "{$error}");
				redirect($this->Option_model->getURL("program/edit", array('editId'=>$this->input->post('editId'))));
			}
			else
			{
				$record['topic'] = UCWord($this->input->post('topic'));
				$record['long_desc'] = $this->input->post('long_desc');
				$record['dep_id'] = UCWord($this->input->post('dep_id'));
				$record['status'] = ($this->input->post('status') == "Published") ? "active" : "inactive";
				
				$result = $this->crud_model->updateRecord($record, "tab", $this->input->post('editId'));
				
				if($result){
					$this->session->set_flashdata('successful', 'successful.');
					redirect($this->Option_model->getURL("program", array('group'=>$this->input->post('group'))));
				} else {
					$this->session->set_flashdata('error', 'Error , have some more fields not support for database.');
					redirect($this->Option_model->getURL("program/edit", array('editId'=>$this->input->post('editId'))));
				}
			}
		}	
	}
	
	function info()
	{
		switch ($this->view){
			case "create" : $data['main_content'] = "create_info";
			break;
		
			case "edit" :
				$data['row'] = $this->crud_model->readRecordRow('info', array('id'=>$this->input->get('editId')));
				$data['main_content'] = "edit_info";
			break;
		
			default : $data['main_content'] = "data_info";
			break;
		}
		
		$this->load->view("admin_template/view_template" , $data);
	}
	
	function chkCreateInfo()
	{
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('topic', 'Topic', 'trim|required|max_length[255]');
		
		if($_POST)
		{
			if($this->form_validation->run() == FALSE)
			{
				$validation = validation_errors();
				$error = (! empty($validation))? $validation : "have some more fields or required fields some problems happen.";
				$this->session->set_flashdata('error', "{$error}");
				redirect($this->Option_model->getURL("info/create"));
			}
			else
			{
				$record['topic'] = UCWord($this->input->post('topic'));
				$record['short_desc'] = deleteSpecialChr($this->input->post('long_desc'));
				$record['long_desc'] = $this->input->post('long_desc');
				$record['dep_id'] = UCWord($this->input->post('dep_id'));
				$record['created'] = date('Y-m-d H:i:s');
				$record['status'] = ($this->input->post('status') == "Published")? "active" : "inactive";
				
				if(isset($_FILES['is_files']) and !empty($_FILES['is_files']['name'])){
		    
					$isImage = $this->Resize_model->resizeImages('info', 248, 382, 100, 154);
					$record['img_url'] = $isImage[0]['file_name'];
				}
				
				$created = $this->crud_model->createRecord($record, "info");
				
				if($created){
					$this->session->set_flashdata('successful', 'successful.');
					redirect($this->Option_model->getURL("info", array('group'=>$this->input->post('group'))));
				} else {
					$this->session->set_flashdata('error', 'Error , have some more fields not support for database.');
					redirect($this->Option_model->getURL("info/create"));
				}
			}
		}	
	}
	
	function chkEditInfo()
	{
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('topic', 'Topic', 'trim|required|max_length[255]');
		
		if($_POST)
		{
			if($this->form_validation->run() == FALSE)
			{
				$validation = validation_errors();
				$error = (! empty($validation))? $validation : "have some more fields or required fields some problems happen.";
				$this->session->set_flashdata('error', "{$error}");
				redirect($this->Option_model->getURL("info/edit", array('editId'=>$this->input->post('editId'), 'group'=>$this->input->post('group'))));
			}
			else
			{
				$record['topic'] = UCWord($this->input->post('topic'));
				$record['short_desc'] = deleteSpecialChr($this->input->post('long_desc'));
				$record['long_desc'] = $this->input->post('long_desc');
				$record['dep_id'] = UCWord($this->input->post('dep_id'));
				$record['status'] = ($this->input->post('status') == "Published")? "active" : "inactive";
				
				
				if(isset($_FILES['is_files']) and !empty($_FILES['is_files']['name'])){
					
					if($this->input->post('change_image') != '0'){
						
						$img = $this->crud_model->readRecordRow('info' , array('id'=>$this->input->post('change_image')));
						$imgFullsizeURL = "./assets/modules/control/image/info/fullsize/{$img->img_url}";
						$imgThumbURL = "./assets/modules/control/image/info/thumb/{$img->img_url}";
						
						@unlink( $imgFullsizeURL );
						@unlink( $imgThumbURL );
					
						$img_record['img_url'] = "";
						$this->crud_model->updateRecord($img_record, 'info' , $this->input->post('change_image'));
						unset($img_record);
					}
					
					$isImage = $this->Resize_model->resizeImages('info', 248, 382, 100, 154);
					$record['img_url'] = $isImage[0]['file_name'];
				}
				
				$result = $this->crud_model->updateRecord($record, "info", $this->input->post('editId'));
				
				
				if($result){
					$this->session->set_flashdata('successful', 'successful.');
					redirect($this->Option_model->getURL("info", array('group'=>$this->input->post('group'))));
				} else {
					$this->session->set_flashdata('error', 'Error , have some more fields not support for database.');
					redirect($this->Option_model->getURL("info/edit", array('editId'=>$this->input->post('editId'), 'group'=>$this->input->post('group'))));
				}
			}
		}
	}
	
	function award()
	{
		switch ($this->view){
			case "create" : $data['main_content'] = "create_award";
			break;
		
			case "edit" :
				$data['row'] = $this->crud_model->readRecordRow('award', array('id'=>$this->input->get('editId')));
				$data['img_cover'] = $this->crud_model->readRecordRow('image', array('ref_id'=>$this->input->get('editId'), 'img_type'=>'award', 'img_cover'=>'1'));
				$data['img'] = $this->crud_model->readRecord('image', array('ref_id'=>$this->input->get('editId'), 'img_type'=>'award', 'img_cover'=>'0'));
				$data['main_content'] = "edit_award";
			break;
		
			default : $data['main_content'] = "data_award";
			break;
		}
		
		$this->load->view("admin_template/view_template" , $data);
	}
	
	function chkCreateAward()
	{
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('topic', 'Topic', 'trim|required|max_length[255]');
		
		if($_POST)
		{
				if($this->form_validation->run() == FALSE)
				{
					$validation = validation_errors();
					$error = (! empty($validation))? $validation : "have some more fields or required fields some problems happen.";
					$this->session->set_flashdata('error', "{$error}");
					redirect($this->Option_model->getURL("award/create"));
				}
				else
				{
					$record['topic'] = UCWord($this->input->post('topic'));
					$record['long_desc'] = $this->input->post('long_desc');
					$record['dep_id'] = UCWord($this->input->post('dep_id'));
					$record['created'] = date('Y-m-d H:i:s');
					$record['status'] = ($this->input->post('status') == "Published")? "active" : "inactive";
					
					$result = $this->crud_model->createRecord($record, "award");
					unset($record);
					
					if(isset($_FILES['is_files']) and !empty($_FILES['is_files']['name'])){
						
						$max_id = $this->crud_model->readRecordMax('award', 'id');
						$isImage = $this->Resize_model->resizeImages('award', 504, 250, 240, 119);
						$record['ref_id']  = $max_id->id;
						$record['img_url'] = $isImage[0]['file_name'];
						$record['img_type'] = "award";
						$record['img_cover'] = 1;
						
						$this->crud_model->createRecord($record, "image");
					}
					
					if($result){
						$this->session->set_flashdata('successful', 'successful.');
						redirect($this->Option_model->getURL("award", array('group'=>$this->input->post('group'))));
					} else {
						$this->session->set_flashdata('error', 'Error , have some more fields not support for database.');
						redirect($this->Option_model->getURL("award/create"));
					}
				}
		}
	}
	
	function chkEditAward()
	{
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('topic', 'Topic', 'trim|required|max_length[255]');
		
		if($_POST)
		{
				if($this->form_validation->run() == FALSE)
				{
					$validation = validation_errors();
					$error = (! empty($validation))? $validation : "have some more fields or required fields some problems happen.";
					$this->session->set_flashdata('error', "{$error}");
					redirect($this->Option_model->getURL("award/edit", array('editId'=>$this->input->post('editId'), 'group'=>$this->input->post('group'))));
				}
				else
				{
					$record['topic'] = UCWord($this->input->post('topic'));
					$record['long_desc'] = $this->input->post('long_desc');
					$record['dep_id'] = UCWord($this->input->post('dep_id'));
					$record['created'] = date('Y-m-d H:i:s');
					$record['status'] = ($this->input->post('status') == "Published")? "active" : "inactive";
					
					$result = $this->crud_model->updateRecord($record, "award", $this->input->post('editId'));
					unset($record);
					
					if(isset($_FILES['is_files']) and !empty($_FILES['is_files']['name'])){
												
						if($this->input->post('change_image') == '0' ){
							$isImage = $this->Resize_model->resizeImages('award', 504, 250, 240, 119);
							$record['ref_id']  = $this->input->post('editId');
							$record['img_url'] = $isImage[0]['file_name'];
							$record['img_type'] = "award";
							$record['img_cover'] = 1;
							
							$this->crud_model->createRecord($record, "image");
						} else {
							$img = $this->crud_model->readRecordRow('image' , array('id'=>$this->input->post('change_image')));
							$imgFullsizeURL = "./assets/modules/control/image/award/fullsize/{$img->img_url}";
							$imgThumbURL = "./assets/modules/control/image/award/thumb/{$img->img_url}";
							
							@unlink( $imgFullsizeURL );
							@unlink( $imgThumbURL );
						
							$img_record['img_url'] = "";
							$this->crud_model->updateRecord($img_record, 'image' , $this->input->post('change_image'));
							unset($img_record);
							
							$isImage = $this->Resize_model->resizeImages('award', 504, 250, 240, 119);
							$record['ref_id']  = $this->input->post('editId');
							$record['img_url'] = $isImage[0]['file_name'];
							$record['img_type'] = "award";
							$record['img_cover'] = '1';
							
							$this->crud_model->updateRecord($record, "image", $this->input->post('change_image'));
							unset($record, $isImage);
						}
					}
					
					unset($_FILES['is_files']);
					if(isset($_FILES['is_multifiles']) and !empty($_FILES['is_multifiles']['name'])){
												
						$isImage = $this->Resize_model->resizeImages('award', 504, 250, 240, 119, 'multifiles');
						$record['ref_id']  = $this->input->post('editId');
						$record['img_url'] = $isImage[0]['file_name'];
						$record['img_type'] = "award";
						$record['img_cover'] = '0';
						
						$this->crud_model->createRecord($record, "image");
					}
					
					if($result){
						$this->session->set_flashdata('successful', 'successful.');
						redirect($this->Option_model->getURL("award/edit", array('editId'=>$this->input->post('editId'), 'group'=>$this->input->post('group'))));
					} else {
						$this->session->set_flashdata('error', 'Error , have some more fields not support for database.');
						redirect($this->Option_model->getURL("award/edit", array('editId'=>$this->input->post('editId'), 'group'=>$this->input->post('group'))));
					}

				}
		}
	}
	
	function agencies()
	{
		switch ($this->view){
			case "create" :
				$data['main_content'] = "create_agencies";
			break;
		
			case "edit" :
				$data['row'] = $this->crud_model->readRecordRow('agencies', array('id'=>$this->input->get('editId')));
				$data['main_content'] = "edit_agencies";
			break;
		
			default :
				$data['main_content'] = "data_agencies";
			break;
		}
		
		$this->load->view("admin_template/view_template" , $data);
	}
	
	function chkCreateAgencies()
	{
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('agen_name', 'Frist name and Last name', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('agen_rank', 'Rank', 'trim|required|max_length[255]');
		
		if($_POST)
		{

			if($this->form_validation->run() == FALSE)
			{
				$validation = validation_errors();
				$error = (! empty($validation))? $validation : "have some more fields or required fields some problems happen.";
				$this->session->set_flashdata('error', "{$error}");
				redirect($this->Option_model->getURL("agencies/create"));
			}
			else
			{
				$record['dep_id'] = $this->input->post('dep_id');
				$record['agen_name'] = UCWord($this->input->post('agen_name'));
				$record['agen_rank'] = UCWord($this->input->post('agen_rank'));
				$record['md'] = $this->input->post('md');
				$record['agen_skill'] = $this->input->post('agen_skill');
				$record['agen_room'] = $this->input->post('agen_room');
				$record['facebook'] = UCWord($this->input->post('facebook'));
				$record['twitter'] = UCWord($this->input->post('twitter'));
				$record['lss'] = UCWord($this->input->post('lss'));
				$record['created'] = date('Y-m-d H:i:s');
				$record['status'] = ($this->input->post('status') == "Published")? "active" : "inactive";
				
				if(isset($_FILES['is_files']) and !empty($_FILES['is_files']['name'])){
		    
					$isImage = $this->Resize_model->resizeImages('agencies', 300, 265, 100, 88);
					$record['agen_img'] = $isImage[0]['file_name'];
				}
				
				$result = $this->crud_model->createRecord($record, "agencies");
				
				if($result){
					$this->session->set_flashdata('successful', 'successful.');
					redirect($this->Option_model->getURL("agencies"));
				} else {
					$this->session->set_flashdata('error', 'Error , have some more fields not support for database.');
					redirect($this->Option_model->getURL("agencies/create"));
				}
			}
		}	
	}
	
	function chkEditAgencies()
	{
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('agen_name', 'Frist name and Last name', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('agen_rank', 'Rank', 'trim|required|max_length[255]');
		
		if($_POST)
		{

			if($this->form_validation->run() == FALSE)
			{
				$validation = validation_errors();
				$error = (! empty($validation))? $validation : "have some more fields or required fields some problems happen.";
				$this->session->set_flashdata('error', "{$error}");
				redirect($this->Option_model->getURL("agencies/edit", array('editId'=>$this->input->post('editId'), 'group'=>$this->input->post('group'))));
			}
			else
			{
				$record['dep_id'] = $this->input->post('dep_id');
				$record['agen_name'] = UCWord($this->input->post('agen_name'));
				$record['agen_rank'] = UCWord($this->input->post('agen_rank'));
				$record['md'] = $this->input->post('md');
				$record['agen_skill'] = $this->input->post('agen_skill');
				$record['agen_room'] = $this->input->post('agen_room');
				$record['facebook'] = UCWord($this->input->post('facebook'));
				$record['twitter'] = UCWord($this->input->post('twitter'));
				$record['lss'] = UCWord($this->input->post('lss'));
				$record['status'] = ($this->input->post('status') == "Published")? "active" : "inactive";
				
				if(isset($_FILES['is_files']) and !empty($_FILES['is_files']['name'])){
					
					if($this->input->post('change_image') != '0'){
						
						$img = $this->crud_model->readRecordRow('agencies' , array('id'=>$this->input->post('change_image')));
						$imgFullsizeURL = "./assets/modules/control/image/agencies/fullsize/{$img->agen_img}";
						$imgThumbURL = "./assets/modules/control/image/agencies/thumb/{$img->agen_img}";
						
						@unlink( $imgFullsizeURL );
						@unlink( $imgThumbURL );
					
						$img_record['img_url'] = "";
						$this->crud_model->updateRecord($img_record, 'agencies' , $this->input->post('change_image'));
						unset($img_record);
					}
					
					$isImage = $this->Resize_model->resizeImages('agencies', 300, 265, 100, 88);
					$record['agen_img'] = $isImage[0]['file_name'];
				}
				
				$result = $this->crud_model->updateRecord($record, "agencies", $this->input->post('editId'));
				
				if($result){
					$this->session->set_flashdata('successful', 'successful.');
					redirect($this->Option_model->getURL("agencies" , array('group'=>$this->input->post('group'))));
				} else {
					$this->session->set_flashdata('error', 'Error , have some more fields not support for database.');
					redirect($this->Option_model->getURL("agencies/edit", array('editId'=>$this->input->post('editId'), 'group'=>$this->input->post('group'))));
				}
			}
		}	
	}
	
	
	
	## Do not delete ##
	
	function error404()
	{
		$data['main_content'] = "error404";
		$this->load->view("admin_template/view_template" , $data);
	}
	
	function chkDeleteItem()
	{
			$is_control = $this->input->post('is_control');
			$is_view = $this->input->post('is_view');
			$is_table = $this->input->post('is_table');
			
			if(! empty($_POST['delId'])){
			
				foreach($this->input->post('delId') as $id){
					$del = $this->crud_model->deleteRecord($is_table, $id);
				}
				
			} else {
				
				$this->session->set_flashdata('error', 'Error , have some more fields not support for database.');
				redirect($this->Option_model->getURL("{$is_control}/{$is_view}"));
				
			}
			
			if($del){
				$this->session->set_flashdata('successful', 'successful , Delete complete.');
				redirect($this->Option_model->getURL("{$is_control}/{$is_view}"));
			} else {
				$this->session->set_flashdata('error', 'Error , have some more fields not support for database.');
				redirect($this->Option_model->getURL("{$is_control}/{$is_view}"));
			}
	}
	
	function chkDeleteItembyGET()
	{
			$is_control = $this->input->get('is_control');
			$is_view = $this->input->get('is_view');
			$is_table = $this->input->get('is_table');
			$is_delId = $this->input->get('delId');
			
			if(! empty($_GET['delId'])){
				
					switch ($is_view){
							case 'application':
								$row = $this->crud_model->readRecordRow('tb_apps', array('id'=>$is_delId));
								
							break;
					}
					
					$del = $this->crud_model->deleteRecord($is_table, $is_delId);
			} else {
				
				$this->session->set_flashdata('error', 'Error , have some more fields not support for database.');
				redirect($this->Option_model->getURL("{$is_control}/{$is_view}"));
				
			}
			
			if($del){
				$this->session->set_flashdata('successful', 'successful , Delete complete.');
				redirect($this->Option_model->getURL("{$is_control}/{$is_view}"));
			} else {
				$this->session->set_flashdata('error', 'Error , have some more fields not support for database.');
				redirect($this->Option_model->getURL("{$is_control}/{$is_view}"));
			}
	}
	
	function chkActiveItembyGET()
	{
		$is_control = $this->input->get('is_control');
		$is_view = $this->input->get('is_view');
		$is_table = $this->input->get('is_table');
		$is_delId = $this->input->get('activeId');
		$is_group = $this->input->get('is_group');
		
		if(! empty($_GET['activeId'])){
			$record['status'] = $this->input->get('status');
			$active = $this->crud_model->updateRecord($record, $is_table, $is_delId);
		} else {
			
			$this->session->set_flashdata('error', 'Error , have some more fields not support for database.');
			redirect($this->Option_model->getURL("{$is_control}/{$is_view}", array('group'=>$is_group)));
			
		}
		
		if($active){
			$this->session->set_flashdata('successful', 'successful , Update complete.');
			redirect($this->Option_model->getURL("{$is_control}/{$is_view}", array('group'=>$is_group)));
		} else {
			$this->session->set_flashdata('error', 'Error , have some more fields not support for database.');
			redirect($this->Option_model->getURL("{$is_control}/{$is_view}", array('group'=>$is_group)));
		}
	}
	
	function chkAtoZ($str)
	{
		if(!$this->Expression_model->chkAtoZ($str)){
			$this->form_validation->set_message('chkAtoZ', 'The %s field cannot be the word match to [a-zA-Z]');
			return false;
		}else{
			return true;
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect($this->Option_model->getURL(NULL, array("redirect"=>"index")));
	}
	
	function fortest()
	{
		//$this->load->view('admin_template/view_upload');
		
		$a = array('aa');
		
		if(sizeof($a) > 4){
			$rand = array_rand($a, $size);
			
			foreach($rand as $key){
				echo $a[$key] . "\n";
			}
		} else {
			foreach($a as $key){
				echo $key;
			}
			
			for($i=0;$i< 4 - sizeof($a) ;$i++){
				echo "hello";	
			}
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */