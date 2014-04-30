        <div class="metro-award pull-left">
	    <?php $countItem = ceil(count($query->result()) / 3 ); $itemWidth = $countItem * 258; ?>
	    
	    <div class="show-item">
		<ul id="item1">
		<?php $i = 0; ?>
		<?php foreach($query->result() as $key => $value): ?>
		<?php $i++; ?>
			<li class="doublebox"><?php echo anchor($this->Option_model->getURL('award/show', array('item'=>$value->id), $this->division), "<i>". image_asset("award/thumb/{$value->img_url}", 'control') ."</i><p>" . mb_substr($value->topic, 0, 30) . "...</p>"); ?></li>
		<?php if($i % 3 == 0): ?>
		</ul><ul id='<?php echo "item{$i}"; ?>'>
		<?php endif; ?>
		<?php endforeach; ?>
		</ul>
	    </div>
        </div>
	<?php if($countItem == 3): ?>
	<script>
	    $(document).ready(function(){
		$('.show-item').css({"width":"<?php echo $itemWidth - 10; ?>"});
		$('.show-item ul#item6 li').css({"margin":"0 0 10px 0"});
	    })
	</script>
	<?php elseif($countItem > 3): ?>
	<script>
	    $(document).ready(function(){
		$('.show-item').css({"width":"<?php echo $itemWidth; ?>"});
		$('.container-metrostyle .metro-award').css({"overflow-x": "auto"});
	    });
	</script>
	<?php else: ?>
	<script>
	    $(document).ready(function(){
		$('.show-item').css({"width":"<?php echo $itemWidth; ?>"});
	    });
	</script>
	<?php endif; ?>