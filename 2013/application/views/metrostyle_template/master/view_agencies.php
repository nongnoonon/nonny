        <div class="metro-agencies pull-left">
	    <div class="title-bar pull-left">บุคลากร</div>
            <div class="clearfix"></div>
	    <div class="bachelor-content">
		<?php foreach($query as $key => $value): ?>
		<!-- start description -->
		<div class="personal">
		    <div class="row-fluid">
			<div class="span12">
			    <div class="span5" style="text-align: center;">
			       <?php echo image_asset("agencies/fullsize/{$value->agen_img}", 'control'); ?>
			       <h3><?php echo $value->agen_name; ?></h3>
			     </div>
			     <div class="span7">
				<h2><?php echo $value->agen_rank; ?></h2>
				<?php if(!empty($value->agen_skill)): ?>
				<p>การศึกษา</p>
				    <?php echo $value->agen_skill; ?>
				<?php endif; ?>
				<?php if(!empty($value->agen_room)): ?>
				<p>ห้องทำงาน</p>
				    <?php echo $value->agen_room; ?>
				<?php endif; ?>
				<?php if(!empty($value->facebook) or !empty($value->twitter) or !empty($value->lss)): ?>
				<p>ติดต่อ</p>
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