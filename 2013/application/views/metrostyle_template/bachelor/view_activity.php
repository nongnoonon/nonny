        <div class="metro-award pull-left">
	    <?php $countItem = ceil(count($query) / 3); $itemWidth = $countItem * 258; ?>
	    
	    <div class="show-item">
		<ul id="item1">
		<?php $i = 0; ?>
		<?php foreach($query->result() as $key => $value): ?>
		<?php $i++; ?>
			<li class="doublebox"><?php echo anchor($this->Option_model->getURL("activity/{$value->abbr}/show", array('item'=>$value->id), $this->division), "<i>". image_asset("activity/thumb/{$value->img_url}", 'control') ."</i><p>" . substr($value->topic, 0, 30) . "...</p>"); ?></li>
		<?php if($i % 3 == 0): ?>
		</ul><ul id='<?php echo "item{$i}"; ?>'>
		<?php endif; ?>
		<?php endforeach; ?>
		</ul>
	    </div>
        </div>
	<?php if($countItem == 3): ?>
	<script>
	    $('.show-item').css({"width":"<?php echo $itemWidth - 10; ?>"});
	    $('.show-item ul#item6 li').css({"margin":"0 0 10px 0"});
	</script>
	<?php else: ?>
	<script>
	    $('.show-item').css({"width":"<?php echo $itemWidth; ?>"});
	</script>
	<?php endif; ?>