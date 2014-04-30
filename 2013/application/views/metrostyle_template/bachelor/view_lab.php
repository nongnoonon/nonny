        <div class="metro-index pull-left">
	    <ul class="bachelor" style="float: left; cursor: pointer;">
		<?php foreach($query->result() as $key => $value): ?>
                <li class="lab-<?php echo $key; ?>"><a><i><?php echo image_asset("bachelor/$value->img_url", $this->theme); ?></i><p><?php echo $value->lab_name; ?></a></p>
		</li>
		<?php endforeach; ?>
	    </ul>
	    <?php foreach($query->result() as $key => $value): ?>
		<div class="desc" id="lab-<?php echo $key; ?>"><div class="close" id="lab-<?php echo $key; ?>">X</div>
		    
		</div>
	    <?php endforeach; ?>
        </div>
	<div class="clearfix"></div>
	<script type="text/javascript">
	    
	     var slideDuration = 1000;
	    
	    var labIn = { opacity: 1, width: '245' }
	    var labOut = { width: 0, opacity: 0}
	    var descIn = { opacity: 0.7, width: '759', height: '370' }
	    var descOut = { opacity: 0, width: 0, height: 0 }
	
	    $('ul.bachelor li').click(function() {
		var isClassName = $(this).attr('class');
		$(this).css({"margin": "0 0 10px 0"});
		$('ul.bachelor li').each(function(index, domEle){
		    var isIndex = 'lab-' + index;
			if(isIndex != isClassName){
			   $('ul.bachelor li.' + isIndex ).css({"padding":"0", "margin":"0"}).animate(labOut, slideDuration);
			}
		});
		$('.desc#' + isClassName).css({"padding":"5px"}).animate(descIn, slideDuration);
	    });
	    
	    
	    $('.close').click(function(){
		var isIdName = $(this).attr('id');
		$('.desc#' + isIdName).css({"padding":"0px"}).animate(descOut, slideDuration);
		setTimeout(function(){
		    if(isIdName != "lab-0"){
			$('ul.bachelor li.' + isIdName).css({"margin-left":"14.6px"}); 
		    }
		    $('ul.bachelor li').each(function(index, domEle){
			var isIndex = 'lab-' + index;
			    if(isIndex != isIdName){
				if(index == 0){
				    $('ul.bachelor li.' + isIndex ).animate(labIn, slideDuration);
				} else {
				    $('ul.bachelor li.' + isIndex ).css({"margin-left":"14.6px"}).animate(labIn, slideDuration);
				}
			    }
		    });
		}, slideDuration)
	    });
	    
	    
	    
	</script>