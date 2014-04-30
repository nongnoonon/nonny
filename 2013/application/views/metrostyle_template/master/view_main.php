        <div class="metro-slider pull-left">
            <div id="ca-container" class="ca-container">
		<div class="ca-wrapper">
		    <?php $is_news = $this->crud_model->readRecord('info', array('dep_id'=>$this->meta->id, 'status'=>'active')); ?>
		    <?php foreach($is_news as $key => $value): ?>
		    <?php $ca = $key + 1; ?>
			<div class="ca-item ca-item-<?php echo $ca; ?>">
				<div class="ca-item-main">
					<div class="ca-icon"><?php echo image_asset("info/fullsize/{$value->img_url}", 'control'); ?></div>
					<h4>
					    <a href="#" class="ca-more">
					    <p><?php echo $value->topic; ?></p>
					    <span><?php echo mb_substr($value->short_desc, 0, 50); ?>...</span>
					    </a>
					</h4>
				</div>
				<div class="ca-content-wrapper">
					<div class="ca-content">
						<h6><?php echo $value->topic; ?></h6>
						<a href="#" class="ca-close">close</a>
						<div class="ca-content-text"><?php echo $value->long_desc; ?></div>
					</div>
				</div>
			</div>
		    <?php endforeach; ?>
		    <?php if(count($is_news) < 3): ?>
		    <?php $is_limit = 3 - count($is_news); ?>
		    <?php $is_info = $this->crud_model->readRecord('info', array('dep_id'=>'0', 'status'=>'active'), NULL , NULL , NULL , $is_limit); ?>
		    <?php foreach($is_info as $key => $value): ?>
		    <?php $ca = $is_limit++; ?>
			<div class="ca-item ca-item-<?php echo $ca; ?>">
				<div class="ca-item-main">
					<div class="ca-icon"><?php echo image_asset("info/fullsize/{$value->img_url}", 'control'); ?></div>
					<h4>
					    <a href="#" class="ca-more">
					    <p><?php echo $value->topic; ?></p>
					    <span><?php echo mb_substr($value->short_desc, 0, 50); ?>...</span>
					    </a>
					</h4>
				</div>
				<div class="ca-content-wrapper">
					<div class="ca-content">
						<h6><?php echo $value->topic; ?></h6>
						<a href="#" class="ca-close">close</a>
						<div class="ca-content-text"><?php echo $value->long_desc; ?></div>
					</div>
				</div>
			</div>
		    <?php endforeach; ?>
		    <?php endif; ?>
		</div>
	    </div>
        </div>
	<script type="text/javascript">
		$('#ca-container').contentcarousel();
	</script>