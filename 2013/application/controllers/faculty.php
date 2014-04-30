<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

# Author : Mr. Keattisak Sanunwongsaukh
# Date   : 12 / 11 / 2012
# Power by : Connext Studio Co.,Ltd.

class Faculty extends CI_Controller {
	
	/** This is routes segment 1 **/	
	public $iClass;
	
	/** This is routes segment 2 **/
	public $iController;
	
	/** This is routes segment 3 **/
	public $iView;

	/** config are description for header page **/
	public $iDescription;
	
	/** config are keyword for header page , Use these keywords through your site to improve SEO. **/
	public $iKeywords;
	
	/** config are title for header page **/
	public $iTitle;
	
	/** config our theme **/
	public $theme = "metrostyle";
	
	/** config our division **/
	public $division = "faculty";
	
	/** config background color theme **/
	public $bgColor = "#fff";
	
	/** logo for faculty page **/
	public $logoURL = "faculty/faculty-logo.png";

	public function __construct()
	{
		parent::__construct();
		
		$this->iClass =  $this->router->class;
		$this->iController = $this->uri->segment(2);
		$this->iView = $this->uri->segment(3);
		//$this->user_logged_in = $this->Option_model->chk_logged_in();
		//$this->user_info = $this->Option_model->get_userinfo();
		
		$this->iDescription 	= "คณะวิศวกรรมศาสตร์ มหาวิทยาลัยธุรกิจบัณฑิตย์";
		$this->iKeywords 	= "วิศวะ, วิศวกรรม, ลูกเจ้าแม่คลองประปา";
		$this->iTitle 		= "คณะวิศวกรรมศาสตร์";
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
		
		$data['hook_css'] = array('main-style.css', 'main-slide.css');
		$data['hook_js'] = array('jquery.easing.1.3.js', 'jquery.mousewheel.js', 'jquery.contentcarousel.js');
		$data['hook_api'] = array('http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js');
		$data['query'] = $this->crud_model->readRecord('info', array('status'=>'active'), 'id', false);
		$data['main_content'] = "main";
		$this->load->view("{$this->theme}_template/{$this->division}/view_template" , $data);
	}
	
	function about()
	{
		$data['hook_css'] = array('main-style.css', 'about-style.css');
		$data['hook_api'] = array('http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js');
		$data['query'] = $this->crud_model->readRecord('tab', array('dep_id'=>'1', 'type'=>'about', 'status'=>'active'), 'sort'); 
		$data['main_content'] = "about";
		$this->load->view("{$this->theme}_template/{$this->division}/view_template" , $data);
	}
	
	function course()
	{
		$data['hook_css'] = array('main-style.css', 'course-style.css');
		$data['hook_api'] = array('http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js');
		$data['bachelor'] = $this->crud_model->readRecordRow('tab', array('dep_id'=>'1', 'type'=>'program', 'status'=>'active', 'sort'=>1));
		$data['master'] = $this->crud_model->readRecordRow('tab', array('dep_id'=>'1', 'type'=>'program', 'status'=>'active', 'sort'=>2));
		$data['main_content'] = "course";
		$this->load->view("{$this->theme}_template/{$this->division}/view_template" , $data);
	}
	
	function agencies()
	{
		$data['banner'] = "faculty/agencies-banner.jpg";
		$data['hook_css'] = array('main-style.css', 'agencies-style.css');
		$data['hook_api'] = array('http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js');
		$data['query'] = $this->crud_model->readRecord('agencies', array('dep_id'=>'1', 'status'=>'active'), 'sort');
		$data['md'] = $this->crud_model->readRecord('agencies', array('md'=>'1', 'status'=>'active'), 'sort');
		$data['gm'] = $this->crud_model->readRecord('agencies', array('gm'=>'1', 'status'=>'active'), 'sort'); 
		$data['main_content'] = "agencies";
		$this->load->view("{$this->theme}_template/{$this->division}/view_template" , $data);
	}
	
	function award()
	{
		$is_item = ($this->input->get('item') == NULL)? 0: $this->input->get('item');
		$data['hook_css'] = array('main-style.css', 'award-style.css');
		$data['hook_api'] = array('http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js');
		$data['item'] = $this->crud_model->readRecord('image', array('ref_id'=>$is_item, 'img_type'=>'award', 'status'=>'active'), 'id', false);
		$data['cover'] = $this->db->query("SELECT a.long_desc, b.img_url FROM tbl_award a
								    LEFT JOIN tbl_image b ON a.id = b.ref_id
								    WHERE a.status='active' and b.img_cover=1 and b.ref_id={$is_item}
								");
		
		$data['query'] = $this->db->query("SELECT a.id, a.topic, a.long_desc, b.img_url FROM tbl_award a
								    LEFT JOIN tbl_image b ON a.id = b.ref_id
								    WHERE b.img_cover=1 AND a.status='active' 
								    ORDER BY a.created DESC
								");
		
		$data['main_content']  = ($this->iView == "show")? "show" : "award";
		$this->load->view("{$this->theme}_template/{$this->division}/view_template" , $data);
	}
	
	function contact()
	{
		$data['hook_css'] = array('main-style.css', 'about-style.css');
		$data['hook_api'] = array('http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js');
		$data['query'] = $this->crud_model->readRecord('tab', array('dep_id'=>'1', 'type'=>'contact' , 'status'=>'active'), 'sort'); 
		$data['main_content'] = "contact";
		$this->load->view("{$this->theme}_template/{$this->division}/view_template" , $data);
	}
	
	function error404()
	{		
		$data['main_content'] = "error404";
		$this->load->view("{$this->theme}_template/{$this->division}/view_template" , $data);
	}
	
}
