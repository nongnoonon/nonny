<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php echo doctype('html5'); ?>

<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="https://www.facebook.com/2008/fbml">
  
<head>
<title>วิศวกรรมศาสตร์ มหาวิทยาลัยธุรกิจบัณฑิตย์ : Engineering DPU</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
<meta name="copyright" content="Connext Studio Co.,Ltd. , http://www.connextstudio.com" />
<meta name="generator" content="CodeIgniter , Open source PHP web application framework 2.1.0"> 
<meta name="author" content="Keattisak Sanunwongsaukh">
<meta name="revised" content="2013" />
<meta name="robots" content="index,follow">
<meta name="description" content="<?php echo $this->iDescription; ?>" />
<meta name="keywords" content="วิศวกรรม, วิศวกรรมศาสตร์, ธุรกิจบัณฑิตย์, ไฟฟ้า, อุตสาหการ, คอมพิวเตอร์, ดิจิทัลมีเดีย"  />



<?php echo css_asset('bootstrap.css', 'bootstrap'); ?>
<?php echo css_asset('bootstrap-responsive.css', 'bootstrap'); ?>
<?php echo css_asset('shared-style.css', 'control'); ?>

<!-- start hook css -->
<?php if(!empty($hook_css)): ?>
  <?php foreach($hook_css as $value): ?>
    <?php echo css_asset($value , $this->theme); ?>
  <?php endforeach; ?>
<?php endif; ?>
<!-- end hook css -->

<!-- start hook api -->
<?php if(!empty($hook_api)): ?>
  <?php foreach($hook_api as $value): ?>
  <script type="text/javascript" src="<?php echo $value; ?>"></script>
  <?php endforeach; ?>
<?php endif; ?>
<!-- end hook api -->

<!-- start hook js -->
<?php if(!empty($hook_js)): ?>
  <?php foreach($hook_js as $value): ?>
  <?php echo js_asset($value , $this->theme); ?>
  <?php endforeach; ?>
<?php endif; ?>
<!-- end hook js -->

<!-- special IE-only canvas fix -->
<!--[if IE]><script type="text/javascript" src="../../../assets/modules/control/js/excanvas.js"></script><![endif]-->
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<style type="text/css">
  body { background-color: <?php echo $this->bgColor; ?>; }
</style>

</head>
<body>
<div class="container container-<?php echo $this->theme; ?> container-<?php echo $this->division; ?>">
	<header>
	    <div class="row-fluid">
		<div class="span8">
		    <div class="pull-left"><?php echo anchor('', image_asset($this->logoURL, $this->theme)); ?></div>
		</div>
		<div class="span4" id="headbar">
		  <div class="pull-right"><a href="http://www.dpu.ac.th" target="_blank"><?php echo image_asset('dpu-logo.png', $this->theme); ?></a></div>
		</div>
	    </div>
	</header>
	<div class="row-fluid">
	  <!-- start metro navi -->
	  <div class="metro-navi pull-left">
	    <ul>
	      <li class="home"><?php echo anchor('faculty', '<i>' . image_asset('faculty/home-icon.png', $this->theme) . '</i><p>main<br />หน้าหลัก</p>'); ?></li>
	      <li class="about"><?php echo anchor('faculty/about', '<i>' . image_asset('faculty/about-icon.png', $this->theme) . '</i><p>about<br />ข้อมูลเกี่ยวกับ</p>'); ?></li>
	      <li class="course"><?php echo anchor('faculty/course', '<i>' . image_asset('faculty/program-icon.png', $this->theme) . '</i><p>program<br />หลักสูตร</p>'); ?></li>
	      <li class="agencies"><?php echo anchor('faculty/agencies', '<i>' . image_asset('faculty/agencies-icon.png', $this->theme) . '</i><p>staff<br />บุคลากร</p>'); ?></li>
	      <li class="award"><?php echo anchor('faculty/award', '<i>' . image_asset('faculty/award-icon.png', $this->theme) . '</i><p>award<br />รางวัล</p>'); ?></li>
	      <li class="contact"><?php echo anchor('faculty/contact', '<i>' . image_asset('faculty/contact-icon.png', $this->theme) . '</i><p>contact<br />ติดต่อ</p>'); ?></li>
	    </ul>
	  </div>
	  <!-- end metro navi -->