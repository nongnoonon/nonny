
        <ul class="breadcrumb well">
	    <li class="active">Create Agencies<span class="divider">/</span></li>
        </ul>
	
	<div class="clear"></div>
        <?php if($this->session->flashdata('error') != NULL):?>
        <div class="alert alert-error"> <button class="close" data-dismiss="alert">×</button><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
        <?php if($this->session->flashdata('successful') != NULL):?>
        <div class="alert alert-success"> <button class="close" data-dismiss="alert">×</button><?php echo $this->session->flashdata('successful'); ?></div>
        <?php endif; ?>
	<div class="clear"></div>
        
	<?php echo form_open_multipart('backoffice/chkCreateAgencies', array('id' => 'isForm', 'class' => 'form-horizontal well')); ?>
	<?php echo form_fieldset('เพิ่มบุคลากร'); ?>
        
        <div class="paddingtop10"></div>
              
	<div class="control-group">
	<label class="control-label" for="mandarin"> ชื่อ - สกุล </label>
	<div class="controls">
	  <?php echo form_input(array('name'=>'agen_name' ,'class'=>'required', 'style'=>'width:99%')); ?>
	  <div id="comment"></div>
	</div>
       </div>
        
        <div class="control-group">
	<label class="control-label" for="mandarin"> ตำแหน่ง </label>
	<div class="controls">
	  <?php echo form_input(array('name'=>'agen_rank' ,'class'=>'required', 'style'=>'width:99%')); ?>
	  <div id="comment"></div>
	</div>
       </div>
	
	<div class="control-group">
	<label class="control-label" for="mandarin"> ระดับหัวหน้าภาค </label>
	<div class="controls">
	  <?php echo form_checkbox('md', '1'); ?>
	  <div id="comment"></div>
	</div>
       </div>
	
	<div class="control-group">
	    <label class="control-label" for="img_url"> รูปภาพบุคลากร </label>
	    <div class="controls">
	      <?php echo form_upload(array('name'=>'is_files' ,'class'=>'input-xxlarge')); ?>
	      <p class="help-block">ขนาดของรูปภาพ กว้าง 300 px , สูง 265 px</p>
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
	<label class="control-label" for="pinyin"> การศึกษา </label>
	<div class="controls">
	  <?php $this->ckeditor->editor("agen_skill", '', $this->listCKE); ?>
	</div>
       </div>
       
       <div class="control-group">
	<label class="control-label" for="pinyin"> ห้องทำงาน </label>
	<div class="controls">
	  <?php $this->ckeditor->editor("agen_room", '', $this->listCKE); ?>
	</div>
       </div>
        
        <div class="control-group">
	    <label class="control-label" for="img_url"> facebook </label>
	    <div class="controls">
	       <div class="input-prepend">
                <span class="add-on">https://www.facebook.com/</span>
                <input class="span2" id="prependedInput" name="facebook" type="text" placeholder="Username">
              </div>
	      <p class="help-block">ตัวอย่าง : https://www.facebook.com/nopz.soodsoi</p>
	    </div>
	</div>
        
        <div class="control-group">
	    <label class="control-label" for="img_url"> twitter </label>
	    <div class="controls">
	       <div class="input-prepend">
                <span class="add-on">https://twitter.com/</span>
                <input class="span2" id="prependedInput" name="twitter" type="text" placeholder="Username">
              </div>
	      <p class="help-block">ตัวอย่าง : https://twitter.com/nopz_soodsoi</p>
	    </div>
	</div>
        
        <div class="control-group">
	    <label class="control-label" for="img_url"> DPU Lss </label>
	    <div class="controls">
	       <div class="input-prepend">
                <span class="add-on">http://lss.dpu.ac.th/lecturer_info.php?id=</span>
                <input class="span2" id="prependedInput" name="lss" type="text" placeholder="user id">
              </div>
	      <p class="help-block">ตัวอย่าง : http://lss.dpu.ac.th/lecturer_info.php?id=155</p>
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