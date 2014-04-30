        <div class="metro-agencies pull-left">
	    <div class="title-bar pull-left">บุคลากร <span>(คลิกที่รูปภาพเพื่อดูรายละเอียด)</span><?php echo anchor('faculty/agencies', 'back', array('class'=>'close')); ?></div>
            <div class="clearfix"></div>
	    <div class="mini-content">
		<div class="row-fluid">
			<div class="span12">
			    <?php echo image_asset($banner, $this->theme); ?>
			</div>
		</div>
	    </div>
	    <div class="content">
		<?php foreach($query as $key => $value): ?>
		<!-- start description -->
		<div class="personal">
		    <div class="row-fluid">
			<div class="span12">
			    <div class="span6" style="text-align: center;">
			       <?php echo image_asset("agencies/fullsize/{$value->agen_img}", 'control'); ?>
			       <h3><?php echo $value->agen_name; ?></h3>
			     </div>
			     <div class="span6">
				<h2><?php echo $value->agen_rank; ?></h2>
				<?php if(!empty($value->agen_skill)): ?>
				<p>การศึกษา</p>
				    <?php echo $value->agen_skill; ?>
				<?php endif; ?>
				<?php if(!empty($value->agen_room)): ?>
				<p>ห้องทำงาน</p>
				    <?php echo $value->agen_room; ?>
				<?php endif; ?>
				<p>โทร </p>
				<?php if(!empty($value->facebook) or !empty($value->twitter) or !empty($value->lss)): ?>
				<p>ช่องทางอื่นๆ</p>
				<?php endif; ?>
				<ul class="social">
				    <?php if(!empty($value->facebook)): ?>
				    <li><a href="https://www.facebook.com/<?php echo $value->facebook; ?>" target="_blank"><?php echo image_asset('facebook-icon.png', $this->theme); ?></a></li>
				    <?php endif; ?>
				    <?php if(!empty($value->twitter)): ?>
				    <li><a href="https://twitter.com/<?php echo $value->twitter; ?>" target="_blank"><?php echo image_asset('twitter-icon.png', $this->theme); ?></a></li>
				    <?php endif; ?>
				    <?php if(!empty($value->lss)): ?>
				    <li><a href="http://lss.dpu.ac.th/lecturer_info.php?id=<?php echo $value->lss; ?>" target="_blank"><?php echo image_asset('lss-icon.png', $this->theme); ?></a></li>
				    <?php endif; ?>
				</ul>
			     </div>
			</div>
		    </div>
		</div>
		<!-- end description -->
		<?php endforeach; ?>
		<?php foreach($md as $key => $value): ?>
		<!-- start description -->
		<div class="personal">
		    <div class="row-fluid">
			<div class="span12">
			    <div class="span6" style="text-align: center;">
			       <?php echo image_asset("agencies/fullsize/{$value->agen_img}", 'control'); ?>
			       <h3><?php echo $value->agen_name; ?></h3>
			     </div>
			     <div class="span6">
				<h2><?php echo $value->agen_rank; ?></h2>
				<?php if(!empty($value->agen_skill)): ?>
				<p>การศึกษา</p>
				    <?php echo $value->agen_skill; ?>
				<?php endif; ?>
				<?php if(!empty($value->agen_room)): ?>
				<p>ห้องทำงาน</p>
				    <?php echo $value->agen_room; ?>
				<?php endif; ?>
				<p>โทร </p>
				<?php if(!empty($value->facebook) or !empty($value->twitter) or !empty($value->lss)): ?>
				<p>ช่องทางอื่นๆ</p>
				<?php endif; ?>
				<ul class="social">
				    <?php if(!empty($value->facebook)): ?>
				    <li><a href="https://www.facebook.com/<?php echo $value->facebook; ?>" target="_blank"><?php echo image_asset('facebook-icon.png', $this->theme); ?></a></li>
				    <?php endif; ?>
				    <?php if(!empty($value->twitter)): ?>
				    <li><a href="https://twitter.com/<?php echo $value->twitter; ?>" target="_blank"><?php echo image_asset('twitter-icon.png', $this->theme); ?></a></li>
				    <?php endif; ?>
				    <?php if(!empty($value->lss)): ?>
				    <li><a href="http://lss.dpu.ac.th/lecturer_info.php?id=<?php echo $value->lss; ?>" target="_blank"><?php echo image_asset('lss-icon.png', $this->theme); ?></a></li>
				    <?php endif; ?>
				</ul>
			     </div>
			</div>
		    </div>
		</div>
		<!-- end description -->
		<?php endforeach; ?>
		<?php foreach($gm as $key => $value): ?>
		<!-- start description -->
		<div class="personal">
		    <div class="row-fluid">
			<div class="span12">
			    <div class="span6" style="text-align: center;">
			       <?php echo image_asset("agencies/fullsize/{$value->agen_img}", 'control'); ?>
			       <h3><?php echo $value->agen_name; ?></h3>
			     </div>
			     <div class="span6">
				<h2><?php echo $value->agen_rank; ?></h2>
				<?php if(!empty($value->agen_skill)): ?>
				<p>การศึกษา</p>
				    <?php echo $value->agen_skill; ?>
				<?php endif; ?>
				<?php if(!empty($value->agen_room)): ?>
				<p>ห้องทำงาน</p>
				    <?php echo $value->agen_room; ?>
				<?php endif; ?>
				<p>โทร </p>
				<?php if(!empty($value->facebook) or !empty($value->twitter) or !empty($value->lss)): ?>
				<p>ช่องทางอื่นๆ</p>
				<?php endif; ?>
				<ul class="social">
				    <?php if(!empty($value->facebook)): ?>
				    <li><a href="https://www.facebook.com/<?php echo $value->facebook; ?>" target="_blank"><?php echo image_asset('facebook-icon.png', $this->theme); ?></a></li>
				    <?php endif; ?>
				    <?php if(!empty($value->twitter)): ?>
				    <li><a href="https://twitter.com/<?php echo $value->twitter; ?>" target="_blank"><?php echo image_asset('twitter-icon.png', $this->theme); ?></a></li>
				    <?php endif; ?>
				    <?php if(!empty($value->lss)): ?>
				    <li><a href="http://lss.dpu.ac.th/lecturer_info.php?id=<?php echo $value->lss; ?>" target="_blank"><?php echo image_asset('lss-icon.png', $this->theme); ?></a></li>
				    <?php endif; ?>
				</ul>
			     </div>
			</div>
		    </div>
		</div>
		<!-- end description -->
		<?php endforeach; ?>
	    </div>
	    
	    <div class="clearfix"></div>
	    <div class="footer-bar pull-left"></div>
        </div>
	
	<script>
	    $('.mini-content').click(function(){
		$(this).hide();
		$('.title-bar span').hide();
		$('.title-bar a.close').css({"display":"block", "opacity":"1"});
		$('.content').css({"display":"block"});
	    });
	    
	</script>