        <div class="metro-award pull-left">
	    <?php $arr = array('activity1', 'activity2', 'activity3', 'activity4', 'activity5', 'activity6', 'activity7', 'activity8', 'activity9'); ?>
	    <?php $countItem = ceil(count($arr) / 3); $itemWidth = $countItem * 258; ?>
	    
	    <div class="show-item">
		<ul id="item1">
		<?php $i = 0; ?>
		<?php foreach($arr as $key => $value): ?>
		<?php $i++; ?>
			<li class="doublebox"><?php echo anchor($this->Option_model->getURL("activity/{$this->iView}/show", array('item'=>$i), $this->division), "<i></i><p>{$value}</p>"); ?></li>
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