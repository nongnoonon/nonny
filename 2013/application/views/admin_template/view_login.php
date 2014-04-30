<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo doctype('html5'); ?>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="generator" content="Connext Studio Co.,Ltd. http://www.connextstudio.com/"> 
<meta name="author" content="Keattisak Sanunwongsaukh"><!-- Date: 2011-09-27 -->
<title>Back Office</title>
<?php echo css_asset('bootstrap.css', 'bootstrap'); ?>
<?php echo css_asset('backoffice-style.css', 'control'); ?>
<?php echo css_asset('bootstrap-responsive.css', 'bootstrap'); ?>
<?php echo css_asset('bootstrap-prettify.css', 'bootstrap'); ?>
</head>
<body> 
	<div class="container" style="margin-top: 150px;">
    <div class="row">
        <div class="span4 offset4">
        
             <div class="clear"></div>
		<?php if($this->session->flashdata('error') != NULL):?>
            <div class="alert alert-error"><?php echo $this->session->flashdata('error'); ?><button class="close" data-dismiss="alert">×</button></div>
            <?php endif; ?>
            <?php if($this->session->flashdata('successful') != NULL):?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('successful'); ?><button class="close" data-dismiss="alert">×</button></div>
            <?php endif; ?>
            <div class="clear"></div>
            
            <div class="title-head label label-inverse">Backoffice</div>
        
        <?php echo form_open($this->Option_model->getURL('validate_credentials'), array('class'=>'well form-inline')); ?>
            <?php echo form_input(array('name'=>'email','class'=>'login-inp' , 'placeholder'=>'E-Mail Address')); ?><div class="clear"></div><br />
            <?php echo form_password(array('name'=>'password', 'placeholder'=>'Passsword', 'class'=>'login-inp')); ?>
            <button type="submit" class="btn">Sign in</button>
        <?php echo form_close(); ?>
        </div>
        <div class="span4"></div>
    </div>
    <div class="clear"></div>
     <footer><p style="text-align: center; ">Copyright &copy; 2012 <strong> Last Update : 9 Aug 2012 14.00 pm</strong></p></footer>
 	</div>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<?php echo js_asset('bootstrap.js', 'bootstrap'); ?>
<?php echo js_asset('bootstrap.min.js', 'bootstrap'); ?>
</body>
</html>