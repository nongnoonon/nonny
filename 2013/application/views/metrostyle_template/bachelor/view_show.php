        <div class="metro-show pull-left">
            <?php $result = $cover->row(); ?>
            <div class="ogimage pull-left"><?php echo image_asset("/{$this->iController}/fullsize/{$result->img_url}", 'control', array('class'=>'ogimg')); ?></div>
            <div class="thumb pull-left">
                <ul>
                    <?php foreach($item as $key => $value): ?>
                   <li><a class="item" rel="<?php echo image_asset_url("/{$this->iController}/fullsize/{$value->img_url}", 'control'); ?>"><i><?php echo image_asset("{$this->iController}/thumb/{$value->img_url}", 'control'); ?></i></a></li>
                   <?php endforeach; ?>
                </ul>
             </div>
            <div class="clearfix"></div>
            <div class="desc pull-left">
                <?php echo $result->long_desc; ?>
            </div>
            <div class="back pull-left">
                <ul>
                   <li class="doublebox"><?php echo anchor("index.php/bachelor/{$this->iController}/{$this->iView}", '<p><i class="icon-arrow-left icon-white"></i>back</p>'); ?></li>
                </ul>
            </div>
        </div>
        <script type="application/javascript">
                $('a.item').click(function(){
                       url = $(this).attr("rel");
                       $('.ogimg').attr("src", url);
                });
	</script>