        <div class="metro-slider pull-left">
            <div id="ca-container" class="ca-container">
		<div class="ca-wrapper">
		    <?php foreach($query as $key => $value): ?>
		    <?php $ca = $key + 1; ?>
			<div class="ca-item ca-item-<?php echo $ca; ?>">
				<div class="ca-item-main">
					<div class="ca-icon"><?php echo image_asset("info/fullsize/{$value->img_url}", 'control'); ?></div>
					
					<h4>
					    <a href="#" class="ca-more">
					    <p><?php echo mb_substr($value->topic, 0 , 175); ?>...</p>
					    
					    <div class="created"><?php echo $value->created; ?></div>
					    </a>
					</h4>
						
				</div>
				<div class="ca-content-wrapper">
					<div class="ca-content">
						<h6><?php echo $value->topic; ?></h6>
						<a href="#" class="ca-close">close</a>
						<div class="ca-content-text">
						    <?php echo $value->long_desc; ?>
						    <div class="clearfix"></div>
						    <br>สร้างเมื่อ : <?php echo $value->created; ?>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
        </div>
	<script type="text/javascript">
		$('#ca-container').contentcarousel();
	</script>