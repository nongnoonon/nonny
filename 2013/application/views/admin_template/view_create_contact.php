
        <ul class="breadcrumb well">
	    <li class="active">Create Contact<span class="divider">/</span></li>
        </ul>
	
	<div class="clear"></div>
        <?php if($this->session->flashdata('error') != NULL):?>
        <div class="alert alert-error"> <button class="close" data-dismiss="alert">×</button><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
        <?php if($this->session->flashdata('successful') != NULL):?>
        <div class="alert alert-success"> <button class="close" data-dismiss="alert">×</button><?php echo $this->session->flashdata('successful'); ?></div>
        <?php endif; ?>
	<div class="clear"></div>
        
	<?php echo form_open_multipart('backoffice/chkCreateContact', array('id' => 'isForm', 'class' => 'form-horizontal well')); ?>
	<?php echo form_fieldset('สร้างข้อมูลการติดต่อ'); ?>
        
        <div class="paddingtop10"></div>
              
	<div class="control-group">
	<label class="control-label" for="mandarin"> หัวข้อ </label>
	<div class="controls">
	  <?php echo form_input(array('name'=>'topic' ,'class'=>'required', 'style'=>'width:99%')); ?>
	  <div id="comment"></div>
	</div>
       </div>
       
       <div class="control-group">
	    <label class="control-label" for="dep_id"> เลือกหมวด </label>
	    <div class="controls">
	    <?php $bachelor = $this->crud_model->readRecord('department', array('division'=>'faculty', 'status'=>'active')); ?>
	    <?php foreach($bachelor as $key => $value): ?>
	      <label class="dep"><input type="radio" name="dep_id" id='<?php echo "dep_id{$value->id}"; ?>' value='<?php echo "{$value->id}"; ?>' checked> <?php echo "หน้าหลัก{$value->name_th}"; ?></label>
	    <?php endforeach; ?>
	    </div>
	    <div class="paddingtop10"></div>
	    <div class="clearfix"></div>
	    <div class="controls">
	    <label><strong>ปริญญาตรี</strong></label>
	    <?php $bachelor = $this->crud_model->readRecord('department', array('division'=>'bachelor', 'status'=>'active')); ?>
	    <?php foreach($bachelor as $key => $value): ?>
	      <label class="dep"><input type="radio" name="dep_id" id='<?php echo "dep_id{$value->id}"; ?>' value='<?php echo "{$value->id}"; ?>'> <?php echo "{$value->name_th}"; ?></label>
	    <?php endforeach; ?>
	    </div>
	    <div class="clearfix"></div>
	    <div class="paddingtop10"></div>
	    <div class="clearfix"></div>
	    <div class="controls">
	    <label><strong>ปริญญาโท</strong></label>
	    <?php $master = $this->crud_model->readRecord('department', array('division'=>'master', 'status'=>'active')); ?>
	    <?php foreach($master as $key => $value): ?>
	      <label class="dep"> <input type="radio" name="dep_id" id='<?php echo "dep_id{$value->id}"; ?>' value='<?php echo "{$value->id}"; ?>'> <?php echo "{$value->name_th}"; ?></label>
	    <?php endforeach; ?>
	    </div>
	</div>
       
       <div class="control-group">
	<label class="control-label" for="pinyin"> รายละเอียด </label>
	<div class="controls">
	  <?php $this->ckeditor->editor("long_desc", '', $this->fullCKE); ?>
	</div>
       </div>
    
	
        
       <div class="clear"></div>
       <hr class="divider" />
        
         <div class="well">
	    <?php echo form_submit(array('value'=>'Save Draft', 'name'=>'status', 'class'=>'btn btn-primary')); ?> 
            <?php echo form_submit(array('value'=>'Published', 'name'=>'status', 'class'=>'btn btn-danger')); ?>   
         </div>
         
        <?php echo form_fieldset_close(); ?>
        <?php echo form_close(); ?>
		
<div class="clearfix"></div>