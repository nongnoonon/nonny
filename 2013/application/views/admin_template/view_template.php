<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	$this->load->view('admin_template/view_header');

	$this->load->view('admin_template/view_' . $main_content);

	$this->load->view('admin_template/view_footer');