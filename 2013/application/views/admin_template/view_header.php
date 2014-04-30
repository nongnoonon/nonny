<?php (! isset($this->is_logged_in) || $this->is_logged_in != true)? redirect($this->Option_model->getURL('index')): NULL;	?>
<!DOCTYPE html>
<head>
<?php
	$this->output->set_header("HTTP/1.0 200 OK");
	$this->output->set_header("HTTP/1.1 200 OK");
	$this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
	$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
	$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
	$this->output->set_header("Pragma: no-cache");
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Backoffice</title>
<?php echo css_asset('bootstrap.css', 'bootstrap'); ?>
<?php echo css_asset('backoffice-style.css', 'control'); ?>
<?php echo css_asset('bootstrap-responsive.css', 'bootstrap'); ?>
<?php echo css_asset('bootstrap-prettify.css', 'bootstrap'); ?>

<!--  jquery core -->
<?php echo js_asset('jquery-1.7.1.min.js', 'control'); ?>
<?php echo js_asset('jquery-ui-1.8.18.custom.min.js', 'control'); ?>
<?php echo js_asset('jquery-validate.js', 'control'); ?>
<?php echo js_asset('jquery.maskedinput-1.0.js', 'control'); ?>
<?php echo js_asset('count-char.js', 'control'); ?>
<!--[if IE]>
<?php echo css_asset('pro_dropline_ie.css', 'control'); ?>
<![endif]-->

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<style type="text/css">
  body {
	padding-top: 60px;
	padding-bottom: 40px;
  }
</style>
</head>
<body> 
    <div class="navbar navbar-fixed-top">
        <div class="navbar navbar-inverse">
              <div class="navbar-inner">
                <div class="container">
                  <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  <a class="brand" href="#">Backoffice</a>
                  <div class="nav-collapse collapse navbar-responsive-collapse">
                    <ul class="nav">
                      <li><?php echo anchor('backoffice/main', 'หน้าแรก'); ?></li>
		      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ข้อมูลเกี่ยวกับ <b class="caret"></b></a>
                        <ul class="dropdown-menu">
			  <li class="nav-header">หน้าคณะ</li>
			  <li><?php echo anchor($this->Option_model->getURL('aboutus', array('group'=>'faculty') , 'backoffice'), '<i class="icon-folder-open"></i> จัดการข้อมูล'); ?></li>
                          <li class="divider"></li>
			  <li class="nav-header">ปริญญาตรี</li>
			  <li><?php echo anchor($this->Option_model->getURL('aboutus', array('group'=>'bachelor') , 'backoffice'), '<i class="icon-folder-open"></i> จัดการข้อมูล'); ?></li>
			  <li class="divider"></li>
			  <li class="nav-header">ปริญญาโท</li>
			  <li><?php echo anchor($this->Option_model->getURL('aboutus', array('group'=>'master') , 'backoffice'), '<i class="icon-folder-open"></i> จัดการข้อมูล'); ?></li>
			  <li class="divider"></li>
			  <li><?php echo anchor('backoffice/aboutus/create', '<i class="icon-pencil"></i> เขียนข้อมูลเกี่ยวกับ'); ?></li>
                        </ul>
                      </li>
		      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ข้อมูลการติดต่อ<b class="caret"></b></a>
                        <ul class="dropdown-menu">
			  <li class="nav-header">หน้าคณะ</li>
			  <li><?php echo anchor($this->Option_model->getURL('contact', array('group'=>'faculty') , 'backoffice'), '<i class="icon-folder-open"></i> จัดการข้อมูล'); ?></li>
                          <li class="divider"></li>
			  <li class="nav-header">ปริญญาตรี</li>
			  <li><?php echo anchor($this->Option_model->getURL('contact', array('group'=>'bachelor') , 'backoffice'), '<i class="icon-folder-open"></i> จัดการข้อมูล'); ?></li>
			  <li class="divider"></li>
			  <li class="nav-header">ปริญญาโท</li>
			  <li><?php echo anchor($this->Option_model->getURL('contact', array('group'=>'master') , 'backoffice'), '<i class="icon-folder-open"></i> จัดการข้อมูล'); ?></li>
			  <li class="divider"></li>
			  <li><?php echo anchor('backoffice/contact/create', '<i class="icon-pencil"></i> เขียนข้อมูลการติดต่อ'); ?></li>
                        </ul>
                      </li>
		      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ข้อมูลหลักสูตร <b class="caret"></b></a>
                        <ul class="dropdown-menu">
			  <li class="nav-header">หน้าคณะ</li>
			  <li><?php echo anchor($this->Option_model->getURL('program', array('group'=>'faculty') , 'backoffice'), '<i class="icon-folder-open"></i> จัดการข้อมูล'); ?></li>
                          <li class="divider"></li>
			  <li class="nav-header">ปริญญาตรี</li>
			  <li><?php echo anchor($this->Option_model->getURL('program', array('group'=>'bachelor') , 'backoffice'), '<i class="icon-folder-open"></i> จัดการข้อมูล'); ?></li>
			  <li class="divider"></li>
			  <li class="nav-header">ปริญญาโท</li>
			  <li><?php echo anchor($this->Option_model->getURL('program', array('group'=>'master') , 'backoffice'), '<i class="icon-folder-open"></i> จัดการข้อมูล'); ?></li>
			  <li class="divider"></li>
			  <li><?php echo anchor('backoffice/program/create', '<i class="icon-pencil"></i> เขียนข้อมูลหลักสูตร'); ?></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ข่าวสาร <b class="caret"></b></a>
                        <ul class="dropdown-menu">
			  <li class="nav-header">หน้าคณะ</li>
			  <li><?php echo anchor($this->Option_model->getURL('info', array('group'=>'faculty') , 'backoffice'), '<i class="icon-folder-open"></i> จัดการข้อมูล'); ?></li>
                          <li class="divider"></li>
			  <li class="nav-header">ปริญญาตรี</li>
			  <li><?php echo anchor($this->Option_model->getURL('info', array('group'=>'bachelor') , 'backoffice'), '<i class="icon-folder-open"></i> จัดการข้อมูล'); ?></li>
			  <li class="divider"></li>
			  <li class="nav-header">ปริญญาโท</li>
			  <li><?php echo anchor($this->Option_model->getURL('info', array('group'=>'master') , 'backoffice'), '<i class="icon-folder-open"></i> จัดการข้อมูล'); ?></li>
			  <li class="divider"></li>
			  <li><?php echo anchor('backoffice/info/create', '<i class="icon-pencil"></i> เขียนข่าว'); ?></li>
                        </ul>
                      </li>
		      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">รางวัล <b class="caret"></b></a>
                        <ul class="dropdown-menu">
			  <li class="nav-header">หน้าคณะ</li>
			  <li><?php echo anchor($this->Option_model->getURL('award', array('group'=>'faculty') , 'backoffice'), '<i class="icon-star"></i> จัดการข้อมูล'); ?></li>
                          <li class="divider"></li>
			  <li class="nav-header">ปริญญาตรี</li>
			  <li><?php echo anchor($this->Option_model->getURL('award', array('group'=>'bachelor') , 'backoffice'), '<i class="icon-star"></i> จัดการข้อมูล'); ?></li>
			  <li class="divider"></li>
			  <li class="nav-header">ปริญญาโท</li>
			  <li><?php echo anchor($this->Option_model->getURL('award', array('group'=>'master') , 'backoffice'), '<i class="icon-star"></i> จัดการข้อมูล'); ?></li>
			  <li class="divider"></li>
			  <li><?php echo anchor('backoffice/award/create', '<i class="icon-pencil"></i> เพิ่มรางวัล'); ?></li>
                        </ul>
                      </li>
		       <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">บุคลากร <b class="caret"></b></a>
                        <ul class="dropdown-menu">
			  <li class="nav-header">หน้าคณะ</li>
			  <li><?php echo anchor($this->Option_model->getURL('agencies', array('group'=>'faculty') , 'backoffice'), '<i class="icon-user"></i> จัดการข้อมูล'); ?></li>
                          <li class="divider"></li>
			  <li class="nav-header">ปริญญาตรี</li>
			  <li><?php echo anchor($this->Option_model->getURL('agencies', array('group'=>'bachelor') , 'backoffice'), '<i class="icon-user"></i> จัดการข้อมูล'); ?></li>
			  <li class="divider"></li>
			  <li class="nav-header">ปริญญาโท</li>
			  <li><?php echo anchor($this->Option_model->getURL('agencies', array('group'=>'master') , 'backoffice'), '<i class="icon-user"></i> จัดการข้อมูล'); ?></li>
			  <li class="divider"></li>
			  <li><?php echo anchor('backoffice/agencies/create', '<i class="icon-pencil"></i> เพิ่มบุคลากร'); ?></li>
                        </ul>
                      </li>
                    </ul>
                    <ul class="nav pull-right">
                      <li class="divider-vertical"></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile  Management<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">You Profile</a></li>
                          <li><a href="#">change password</a></li>
                          <li><?php echo anchor('faculty', 'review website', array('target'=>'_blank')); ?></li>
                          <li class="divider"></li>
                          <li><?php echo anchor('backoffice/logout', 'logout'); ?></li>
                        </ul>
                      </li>
                    </ul>
                  </div><!-- /.nav-collapse -->
                </div>
              </div><!-- /navbar-inner -->
            </div>
    </div>
<div class="clearfix"></div>
<div class="container">
 