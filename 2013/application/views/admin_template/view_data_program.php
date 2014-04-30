
    <div class="navbar">
      <div class="navbar-inner">
	<a class="brand" href="#">Quick Menu</a>
	<ul class="nav">
	  <li class="divider-vertical"></li>
	  <li><?php echo anchor('backoffice/program/create', '<i class="icon-book"></i> Create Program'); ?></li>
	  <li class="divider-vertical"></li>
	  <!--<li><a href="#"><i class="icon-th"></i> Create Meaning</a></li>
	  <li class="divider-vertical"></li>
	  <li><a href="#"><i class="icon-th-large"></i> Create Sentence</a></li>
	  <li class="divider-vertical"></li> -->
	</ul>
	<?php echo form_open('backoffice/search' , array('method'=>'get', 'class' => 'navbar-form pull-right')); ?>
	    <input type="text" name="word" class="input-large" placeholder="Search program">
	    <button type="submit" class="btn">Submit</button>
	<?php echo form_close(); ?>
      </div>
    </div>
    
    <div class="clearfix"></div>
    <?php if($this->session->flashdata('error') != NULL):?>
    <div class="alert alert-error"><?php echo $this->session->flashdata('error'); ?><button class="close" data-dismiss="alert">×</button></div>
    <?php endif; ?>
    <?php if($this->session->flashdata('successful') != NULL):?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('successful'); ?><button class="close" data-dismiss="alert">×</button></div>
    <?php endif; ?>
    <div class="clearfix"></div>
    
    <?php
        $num_page = (empty($_GET['num_page']))? $this->perpage : $this->input->get('num_page');
        $per_page = (empty($_GET['per_page']))? 0 : $this->input->get('per_page');
        
        $config['full_tag_open'] = '<div class="pagination" style="float:right; margin: 0;"><ul>';
        $config['first_link'] = 'First';
        $config['next_tag_open'] = '<li>';
        $config['next_link'] = 'Next';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_link'] = 'Previous';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['last_link'] = 'Last';
        $config['full_tag_close'] = '</ul></div>';
        
        if(isset($_GET['group'])){
            //$result = $this->crud_model->readRecord($this->db->dbprefix('terminology'), NULL, $_GET['group'], TRUE, $per_page, $num_page);
            
            $result = $this->db->query("SELECT a.*, b.name_th FROM {$this->db->dbprefix('tab')} a
								    LEFT JOIN {$this->db->dbprefix('department')} b ON a.dep_id = b.id
								    WHERE a.type='program' and b.division='{$this->input->get('group')}'
								    ORDER BY a.dep_id,a.sort ASC
                                                                    LIMIT {$per_page},{$num_page}
								");
            
            $config['base_url'] = $this->Option_model->getURL("{$this->controller}", array('group'=>$_GET['group'], 'num_page'=>$num_page));
        } else {
            $result = $this->crud_model->readRecord($this->db->dbprefix('terminology'), NULL , NULL, TRUE, $per_page, $num_page);
            $config['base_url'] = $this->Option_model->getURL("{$this->controller}", array( 'num_page'=>$num_page));
        }
        
        $config['use_page_numbers'] = FALSE;
        $config['page_query_string'] = TRUE;
        $config['num_links'] = $this->numpage;
        $config['total_rows'] = count($result->result());
        $config['per_page'] = $this->perpage; 
        
        $this->pagination->initialize($config); 
     ?>
     
    <?php $hidden = array('is_control'=>$this->controller, 'is_view'=>$this->view, 'is_table'=>'tb_main_page'); ?>
    <?php echo form_open_multipart('backoffice/chkDeleteItem' , array('id' => 'deleteitem'), $hidden); ?>
    <?php echo form_fieldset(); ?>
    <div class="clear"></div>
    <?php if(! empty($result)): ?>
    	<?php echo $this->pagination->create_links(); ?>
    <?php endif; ?>
    <div class="clear"></div>
    <div class="padding10"></div>
    <div class="clear"></div>
    
    <table class="table table-bordered table-condensed">
    <thead>
        <tr>
            <th class="table-header-check check"><input type="checkbox" class="chkAlldelete" /></th>
            <th class="table-header-repeat"><a href="?sortBy=topic">หัวข้อ</a></th>
            <th class="table-header-repeat"><a href="?sortBy=pinyin">ชื่อคณะหรือภาควิชา</a></th>
            <th class="table-header-repeat"><a href="?sortBy=created">วันที่สร้าง</a></th>
            <th class="table-header-repeat"><a href="?sortBy=sort">ลำดับ</a></th>
            <th class="table-header-repeat"><a href="?sortBy=status">สถานะ</a></th>
            <th class="table-header-repeat"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($result->result() as $key => $row): ?>
        <tr>
            <td class="check"><input type="checkbox" id="chkdelete" name="delId[]" value="<?php echo $row->id; ?>" /></td>
            <td><?php echo $row->topic; ?></td>
            <td><?php echo $row->name_th; ?></td>
            <td><?php echo $row->created; ?></td>
            <td></td>
            <td><?php echo $row->status; ?></td>
            <td class="options-width">
            <div class="btn-group">
        	<a class="btn btn-inverse" href="<?php echo $this->Option_model->getURL( 'program/edit', array('editId'=>$row->id, 'group'=>$this->input->get('group'))); ?>"><i class="icon-cog icon-white"></i> Quick Setting </a>
            <a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
              <ul class="dropdown-menu">
		<li><a href="#">preview</a></li>
		<li class="divider"></li>
                <?php $status = ($row->status == "active")? "inactive": "active"; ?>
                <?php $icon = ($row->status == "active")? '<i class="icon-ok-circle"></i>': '<i class="icon-ban-circle"></i>'; ?>
                <?php $active = ($row->status == "active")? " Active": " Inactive"; ?>
                <li><a href="<?php echo $this->Option_model->getURL( "chkActiveItembyGET", array('activeId'=>$row->id,'is_control'=>$this->controller, 'is_view'=>$this->view, 'is_table'=>'tab', 'is_group'=>$this->input->get('group'), 'status'=>$status)); ?>"><?php echo $icon; ?><?php echo $active; ?></a></li>
              </ul>
        </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
    <!--  end product-table................................... --> 
    <div class="clear"></div>
    <?php if(! empty($result)): ?>
    	<?php echo $this->pagination->create_links(); ?>
    <?php endif; ?>
    <div class="clear"></div>
    <div class="padding10"></div>
    <div class="clear"></div>
    <?php echo form_fieldset_close(); ?>
    <?php echo form_close(); ?>
		
    <div class="clear">&nbsp;</div>
