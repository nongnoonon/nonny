	<div class="metro-course pull-left">
	    <div class="bachelor pull-left">
		<div class="preface" id="preface">
		    <?php echo $bachelor->topic; ?>
		    <p class="more pull-right"><a class="back">คลิกเพื่อกลับ...</a></p>
		</div>
		<a class="more"><?php echo image_asset('faculty/course-bachelor.jpg', $this->theme , array('class'=>'preface')); ?></a>
		<div id="content">
		    <?php echo $bachelor->long_desc;?>
		</div> 
	    </div>
	    
	    <?php if(!empty($master)): ?>
	    <div class="master pull-left">
		<div class="preface" id="preface">
		    <?php echo $master->topic; ?>
		    <p class="more pull-right"><a class="back">คลิกเพื่อกลับ...</a></p>
		</div>
		<a class="more"><?php echo image_asset('faculty/course-master.jpg', $this->theme , array('class'=>'preface')); ?></a>
		<div id="content">
		    <?php echo $master->long_desc;?>
		</div>  
	    </div>
	    <?php endif; ?>
        </div>
	
	<script type="text/javascript">
	    
	     var slideDuration = 500;
	    
	    var slideBachelorIn = { opacity: 1, width: '764' }
	    var slideBachelorOut = { opacity: 1, width: '377'}
	    var slideMasterIn = { opacity: 1, width: 'toggle' }
	    var slideMasterOut = { width: 'toggle' }
	    
	    var moveBachelorIn = { opacity: 1, width: 'toggle' }
	    var moveBachelorOut = { width: 'toggle' }
	    var moveMasterIn = { opacity: 1, width: '764' }
	    var moveMasterOut = { opacity: 1, width: '377'}
	
	    $('.bachelor a.more').click(function() {
		$(this).delay(1000).hide();
		$('.master').animate(slideMasterOut, slideDuration);
		$('.bachelor').delay(1000).animate(slideBachelorIn, slideDuration);
		$('.master img').delay(1000).hide();
		$('.master #preface').delay(1000).hide();
		$('.bachelor img').delay(1000).hide();
		$('.bachelor #preface a.back').delay(1000).css({"display":"block", "opacity":"1"}).show();
		$('.bachelor #content').delay(1000).css({"display":"block"}).animate(slideBachelorIn, slideDuration);
	    });
	    
	    $('.bachelor #preface a.back').click(function() {
		$(this).hide();
		$('.bachelor #content').css({"display":"none", "opacity":"0"}).hide();
		$('.bachelor').animate(slideBachelorOut, slideDuration);
		$('.bachelor #preface a.more').delay(1500).css({"display":"block", "opacity":"1"}).show();
		$('.master').delay(1000).animate(slideMasterIn, slideDuration);
		$('.bachelor a.more').delay(2000).fadeIn();
		$('.bachelor img').delay(2000).fadeIn();
		$('.master img').delay(2000).fadeIn();
		$('.master #preface').delay(2000).fadeIn();
	    });
	    
	    $('.master a.more').click(function() {
		$(this).delay(1000).hide();
		$('.bachelor').animate(slideMasterOut, slideDuration);
		$('.master').delay(1000).animate(slideBachelorIn, slideDuration);
		$('.bachelor img').delay(1000).hide();
		$('.bachelor #preface').delay(1000).hide();
		$('.master img').delay(1000).hide();
		$('.master #preface a.back').delay(1000).css({"display":"block", "opacity":"1"}).show();
		$('.master #content').delay(1000).css({"display":"block"}).animate(slideBachelorIn, slideDuration);
	    });
	    
	    $('.master #preface a.back').click(function() {
		$(this).hide();
		$('.master #content').css({"display":"none", "opacity":"0"}).hide();
		$('.master').animate(slideBachelorOut, slideDuration);
		$('.master #preface a.more').delay(1500).css({"display":"block", "opacity":"1"}).show();
		$('.bachelor').delay(1000).animate(slideMasterIn, slideDuration);
		$('.master a.more').delay(2000).fadeIn();
		$('.master img').delay(2000).fadeIn();
		$('.bachelor img').delay(2000).fadeIn();
		$('.bachelor #preface').delay(2000).fadeIn();
	    });
	    
	    
	</script>
	