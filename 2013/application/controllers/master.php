<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

# Author : Mr. Keattisak Sanunwongsaukh
# Date   : 12 / 11 / 2012
# Power by : Connext Studio Co.,Ltd.

class Master extends CI_Controller {
	
	/** This is routes segment 1 **/	
	public $iClass;
	
	/** This is routes segment 2 **/
	public $iController;
	
	/** This is routes segment 3 **/
	public $iView;
	
	public $param;
	
	public $ids;
	
	#show a page name (เก็บชื่อเพจ)
	public $iPage;
	
	#This meta tag (เก็บค่า meta tag)
	public $meta = array();
	
	#config are description for header page
	public $desc;
	
	#config are keyword for header page , Use these keywords through your site to improve SEO.
	public $keyword;
	
	#config are title for header page
	public $title;
	
	#config our theme 
	public $theme = "metrostyle";
	
	#config our division
	public $division = "master";
	
	#config background color theme
	public $bgColor = "#0d1d22";
	
	public $hsColor = "#fff";
	
	#logo for faculty page
	public $logoURL = "faculty-logo-small.png";

	public function __construct()
	{
		parent::__construct();
		
		$this->iClass =  $this->router->class;
		$this->iController = $this->uri->segment(2);
		$this->iView = $this->uri->segment(3);
		$this->param = $this->uri->segment(4);
		$this->ids = $this->uri->segment(5);
		//$this->user_logged_in = $this->Option_model->chk_logged_in();
		//$this->user_info = $this->Option_model->get_userinfo();
		
		$this->meta = $this->crud_model->readRecordRow('department', array('abbr' => $this->iView));
		$this->desc 	= "คณะวิศวกรรมศาสตร์ มหาวิทยาลัยธุรกิจบัณฑิตย์";
		$this->keyword 	= "วิศวะ, วิศวกรรม, ลูกเจ้าแม่คลองประปา";
		$this->title 	= (empty($this->meta->name_th))? "หลักสูตรปริญญาโท วิศวกรรมศาสตรมหาบัณฑิต" : "{$this->meta->name_th}";
		$this->title_en	= (empty($this->meta->name_en))? "Master of Engineering" : "{$this->meta->name_en}";
		$this->bgColor 	= (empty($this->meta->bg_color))? $this->bgColor : "#{$this->meta->bg_color}";
		$this->hsColor 	= (empty($this->meta->hs_color))? $this->hsColor : "#{$this->meta->hs_color}";
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
	
	function index()
	{
		//http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js
		$data['hook_css'] = array('main-style.css');
		$data['hook_js'] = array('jquery.jcarousel.min.js');
		$data['hook_api'] = array('http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js');
		$data['main_content'] = "index";
		$this->load->view("{$this->theme}_template/{$this->division}/view_template" , $data);
	}
	
	function home()
	{		
		$data['hook_css'] = array('main-style.css', 'main-slide.css');
		$data['hook_js'] = array('jquery.easing.1.3.js', 'jquery.mousewheel.js', 'jquery.contentcarousel.js');
		$data['hook_api'] = array('http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js');
		$data['main_content'] = "main";
		$this->load->view("{$this->theme}_template/{$this->division}/view_template" , $data);
	}
	
	function about()
	{
		$this->iPage = "ข้อมูลเกี่ยวกับ";
		$data['hook_css'] = array('main-style.css', 'about-style.css');
		$data['hook_api'] = array('http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js');
		$data['query'] = $this->crud_model->readRecord('tab', array('dep_id'=>$this->meta->id, 'type'=>'about', 'status'=>'active'), 'sort'); 
		$data['main_content'] = "about";
		$this->load->view("{$this->theme}_template/{$this->division}/view_template" , $data);
	}
	
	function program()
	{
		$this->iPage = "หลักสูตร";
		$data['hook_css'] = array('main-style.css', 'about-style.css');
		$data['hook_api'] = array('http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js');
		$data['query'] = $this->crud_model->readRecord('tab', array('dep_id'=>$this->meta->id, 'type'=>'program', 'status'=>'active'), 'sort'); 
		$data['main_content'] = "program";
		$this->load->view("{$this->theme}_template/{$this->division}/view_template" , $data);
	}
	
	function course()
	{
		$data['hook_css'] = array('main-style.css', 'course-style.css');
		$data['hook_api'] = array('http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js');
		$data['main_content'] = "course";
		$this->load->view("{$this->theme}_template/{$this->division}/view_template" , $data);
	}
	
	function agencies()
	{
		$data['banner'] = "faculty/agencies-banner.jpg";
		$data['hook_css'] = array('main-style.css', 'agencies-style.css');
		$data['hook_api'] = array('http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js');
		$data['query'] = $this->crud_model->readRecord('agencies', array('dep_id'=>$this->meta->id, 'status'=>'active'), 'sort'); 
		$data['main_content'] = "agencies";
		$this->load->view("{$this->theme}_template/{$this->division}/view_template" , $data);
	}
	
	function activity()
	{
		$data['hook_css'] = array('main-style.css', 'award-style.css');
		$data['hook_api'] = array('http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js');
		
		$data['main_content']  = ($this->param == "show")? "show" : "activity";
		$this->load->view("{$this->theme}_template/{$this->division}/view_template" , $data);
	}
	
	function award()
	{
		$this->iPage = "ผลงานวิชาการ";
		$data['hook_css'] = array('main-style.css', 'about-style.css');
		$data['hook_api'] = array('http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js');
		$data['query'] = $this->crud_model->readRecord('tab', array('dep_id'=>$this->meta->id, 'type'=>'thesis', 'status'=>'active'), 'sort'); 
		$data['main_content'] = "award";
		$this->load->view("{$this->theme}_template/{$this->division}/view_template" , $data);
	}
	
	function collegian()
	{
		$this->iPage = "ทำเนียบนักศึกษา";
		$data['hook_css'] = array('main-style.css', 'about-style.css');
		$data['hook_api'] = array('http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js');
		$data['query'] = $this->crud_model->readRecord('tab', array('dep_id'=>$this->meta->id, 'type'=>'collegian', 'status'=>'active'), 'sort'); 
		$data['main_content'] = "collegian";
		$this->load->view("{$this->theme}_template/{$this->division}/view_template" , $data);
	}
	
	function contact()
	{
		$data['hook_css'] = array('main-style.css', 'about-style.css');
		$data['hook_api'] = array('http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js');
		$data['query'] = $this->crud_model->readRecord('tab', array('dep_id'=>$this->meta->id, 'type'=>'contact' , 'status'=>'active'), 'sort'); 
		$data['main_content'] = "contact";
		$this->load->view("{$this->theme}_template/{$this->division}/view_template" , $data);
	}
	
	function lab()
	{
		$data['hook_css'] = array('main-style.css');
		$data['hook_js'] = array('jquery.jcarousel.min.js');
		$data['hook_api'] = array('http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js');
		$data['main_content'] = "lab";
		$this->load->view("{$this->theme}_template/{$this->division}/view_template" , $data);
	}
	
	function error404()
	{
		$data['hook_css'] = array('main-style.css');
		$data['hook_api'] = array('http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js');
		$data['main_content'] = "error404";
		$this->load->view("{$this->theme}_template/{$this->division}/view_template" , $data);
	}
	
}
