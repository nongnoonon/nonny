
        <ul class="breadcrumb well">
	    <li class="active">Edit Award<span class="divider">/</span></li>
        </ul>
	
	<div class="clear"></div>
        <?php if($this->session->flashdata('error') != NULL):?>
        <div class="alert alert-error"> <button class="close" data-dismiss="alert">×</button><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
        <?php if($this->session->flashdata('successful') != NULL):?>
        <div class="alert alert-success"> <button class="close" data-dismiss="alert">×</button><?php echo $this->session->flashdata('successful'); ?></div>
        <?php endif; ?>
	<div class="clear"></div>
        
	<?php $hidden = array('editId'=>$this->input->get('editId'), 'group'=>$this->input->get('group')); ?>
	<?php echo form_open_multipart('backoffice/chkEditAward', array('id' => 'isForm', 'class' => 'form-horizontal well'), $hidden); ?>
	<?php echo form_fieldset('แก้ไขข่าวสารเกี่ยวกับการรับรางวัล'); ?>
        
        <div class="paddingtop10"></div>
              
	<div class="control-group">
	<label class="control-label" for="mandarin"> หัวข้อ </label>
	<div class="controls">
	  <?php echo form_input(array('name'=>'topic' ,'value'=>$row->topic ,'class'=>'required', 'style'=>'width:99%')); ?>
	  <div id="comment"></div>
	</div>
       </div>
	
	<?php if(!empty($img_cover->img_url)): ?>
	<div class="control-group" id="show_image">
	    <label class="control-label" for="is_files">รูปภาพปก <br /><input type="button" class="btn btn-mini" id="btn_on_image" value="เปลียนปก" /></label>
	    <div class="controls">
	      <?php echo image_asset("award/thumb/{$img_cover->img_url}", 'control'); ?>
	    </div>
	</div>
	<div class="control-group" id="show_uploadimage">
	    <label class="control-label" for="is_files">รูปภาพปก <br /><input type="button" class="btn btn-mini" id="btn_close_image" value="ยกเลิกอัพโหลด" /></label>
	    <div class="controls">
		<?php echo form_hidden('change_image', $img_cover->id); ?>
	      <?php echo form_upload(array('name'=>'is_files' ,'class'=>'input-xxlarge')); ?>
	    </div>
	</div>
	<?php else: ?>
	<div class="control-group">
	    <label class="control-label" for="is_files">รูปภาพปก </label>
	    <div class="controls">
		<?php echo form_hidden('change_image','0'); ?>
	      <?php echo form_upload(array('name'=>'is_files' ,'class'=>'input-xxlarge')); ?>
	    </div>
	</div>
	<?php endif; ?>
	
	<script> 
	    $(window).load(function () {
		$('#show_uploadimage').css({'display':'none'});
	    });
	    
	    $('#btn_on_image').click(function(){
		$('#show_image').css({'display':'none'});
		$('#show_uploadimage').show();
	    });
	    
	     $('#btn_close_image').click(function(){
		$('#show_uploadimage').css({'display':'none'});
		$('#show_image').show();
	    });
	</script>
        
	<div class="control-group">
	    <label class="control-label" for="is_multifiles">เพิ่มรูปภาพ </label>
	    <div class="controls">
	      <?php echo form_upload(array('name'=>'is_multifiles' ,'class'=>'input-xxlarge')); ?>
	    </div>
	</div>
        <?php if(!empty($img)): ?>
        <div class="control-group">
            <div class="controls">
                <ul class="multi-image">
                    <?php foreach($img as $key => $value): ?>
                    <li>
                        <?php echo image_asset("award/thumb/{$value->img_url}", 'control', array('width'=>'100')); ?>
                        <br />
                        <a href="#" ><i></i>delete</a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php endif; ?>
	
	<div class="control-group">
	    <label class="control-label" for="dep_id"> เลือกหมวด </label>
	    <div class="controls">
	    <?php $bachelor = $this->crud_model->readRecord('department', array('division'=>'faculty', 'status'=>'active')); ?>
	    <?php foreach($bachelor as $key => $value): ?>
	      <label class="dep"><input type="radio" name="dep_id" id='<?php echo "dep_id{$value->id}"; ?>' value='<?php echo "{$value->id}"; ?>' <?php echo ($row->dep_id == '1')? 'checked': ''; ?>> <?php echo "หน้าหลัก{$value->name_th}"; ?></label>
	    <?php endforeach; ?>
	    </div>
	    <div class="paddingtop10"></div>
	    <div class="clearfix"></div>
	    <div class="controls">
	    <label><strong>ปริญญาตรี</strong></label>
	    <?php $bachelor = $this->crud_model->readRecord('department', array('division'=>'bachelor', 'status'=>'active')); ?>
	    <?php foreach($bachelor as $key => $value): ?>
	      <label class="dep"><input type="radio" name="dep_id" id='<?php echo "dep_id{$value->id}"; ?>' value='<?php echo "{$value->id}"; ?>' <?php echo ($row->dep_id == $value->id)? 'checked': ''; ?>> <?php echo "{$value->name_th}"; ?></label>
	    <?php endforeach; ?>
	    </div>
	     <div class="paddingtop10"></div>
	    <div class="clearfix"></div>
	    <div class="clearfix"></div>
	    <div class="controls">
	    <label><strong>ปริญญาโท</strong></label>
	    <?php $master = $this->crud_model->readRecord('department', array('division'=>'master', 'status'=>'active')); ?>
	    <?php foreach($master as $key => $value): ?>
	      <label class="dep"> <input type="radio" name="dep_id" id='<?php echo "dep_id{$value->id}"; ?>' value='<?php echo "{$value->id}"; ?>' <?php echo ($row->dep_id == $value->id)? 'checked': ''; ?>> <?php echo "{$value->name_th}"; ?></label>
	    <?php endforeach; ?>
	    </div>
	</div>
       
       <div class="control-group">
	<label class="control-label" for="pinyin"> รายละเอียดข่าว </label>
	<div class="controls">
	  <?php $this->ckeditor->editor("long_desc", $row->long_desc, $this->fullCKE); ?>
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