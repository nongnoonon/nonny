        <div class="metro-show pull-left">
            <?php $result = $cover->row(); ?>
            <div class="ogimage pull-left"><?php echo image_asset("award/fullsize/{$result->img_url}", 'control', array('class'=>'ogimg')); ?></div>
            <div class="thumb pull-left">
                <ul>
                    <?php foreach($item as $key => $value): ?>
                   <li><a class="item" rel="<?php echo image_asset_url("award/fullsize/{$value->img_url}", 'control'); ?>"><i><?php echo image_asset("award/thumb/{$value->img_url}", 'control'); ?></i></a></li>
                   <?php endforeach; ?>
                </ul>
             </div>
            <div class="clearfix"></div>
            <div class="desc pull-left">
		<div class="fb_share">
		    <div class="fb-like" data-href="http://www.dpu.ac.th/eng/2013/faculty/award/show.html?item=<?php echo $this->input->get('item'); ?>" data-send="false" data-layout="box_count" data-width="100" data-show-faces="true"></div>
		</div>
                <?php echo $result->long_desc; ?>
            </div>
            <div class="back pull-left">
                <ul>
                   <li class="doublebox"><?php echo anchor('faculty/award', '<p><i class="icon-arrow-left icon-white"></i>back</p>'); ?></li>
                </ul>
            </div>
        </div>
        <script type="application/javascript">
                $('a.item').click(function(){
                       url = $(this).attr("rel");
                       $('.ogimg').attr("src", url);
                });
	</script>