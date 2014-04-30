    </div>
    <footer class="metro-footer">
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49044946-2', 'dpu.ac.th');
  ga('send', 'pageview');

</script>
        <?php if(!empty($this->iController) and $this->iController != "index" and $this->iController != "lab"): ?>
        <div class="row-fluid">
            <div class="span3">
                <!-- start metro navi -->
                <div class="metro-navi pagination-centered">
				<iframe width="220" height="170" src="//www.youtube.com/embed/1FgOjhd7jdc" frameborder="0" allowfullscreen></iframe>
                  <!--<ul>
                    <li class="lab"><?php //echo anchor("{$this->division}/lab/{$this->iView}", '<i></i><p>lab<br />ห้องปฎิบัตการ</p>'); ?></li>
                    <li class="contactus"><?php //echo anchor("{$this->division}/contact/{$this->iView}", '<i>' . image_asset('faculty/contact-icon.png', $this->theme) . '</i><p>contact<br />ติดต่อ</p>'); ?></li>
                  </ul>-->
                </div>
            </div>
            <div class="span9">
                <div class="row-fluid">
                    <div class="span4">
                        <p>หลักสูตรปริญญาตรี</p>
                        <ul>
                        <ul><!--
                            <li><?php echo anchor("{$this->division}/home/ee", 'วิศวกรรมไฟฟ้า'); ?></li>
                            <li><?php echo anchor("{$this->division}/home/ie", 'วิศวกรรมอุตสาหการ'); ?></li>
                            <li><?php echo anchor("{$this->division}/home/ce", 'วิศวกรรมคอมพิวเตอร์'); ?></li>-->
                           <li><a href="http://www.dpu.ac.th/eng/ee/" target="_blank">วิศวกรรมไฟฟ้า</a></li>
                           <li><a href="http://www.dpu.ac.th/eng/ie/" target="_blank">วิศวกรรมอุตสาหการ</a></li>
                          <li><a href="http://www.dpu.ac.th/eng/ce/" target="_blank">วิศวกรรมคอมพิวเตอร์</a></li>
                            <li><?php echo anchor("{$this->division}/home/de", 'วิศวกรรมดิจิทัลมีเดียและระบบเกม'); ?></li>
                        <li><a href="http://www.dpu.ac.th/admissions/water_system.html" target="_blank">ระบบงานประปา</a></li>
                        </ul>
                    </div>
                    <div class="span8">
                        <p>หลักสูตรปริญญาโท</p>
                        <ul><!--
                            <li><?php echo anchor('master/home/cc', 'สาขาวิชาเทคโนโลยีคอมพิวเตอร์และการสื่อสาร'); ?></li>
                            <li><?php echo anchor('master/home/ct', 'สาขาวิศวกรรมคอมพิวเตอร์และโทรคมนาคม'); ?></li>
                            <li><?php echo anchor('master/home/em', 'สาขาวิชาการจัดการทางวิศวกรรม'); ?></li>-->
                        <li><a href="http://www.dpu.ac.th/em/" target="_blank">การจัดการทางวิศวกรรม</a></li>
                        <li><a href="http://www.dpu.ac.th/eng/mect/" target="_blank">วิศวกรรมคอมพิวเตอร์และโทรคมนาคม</a></li>
                        <li><a href="http://www.dpu.ac.th/eng/mscc/" target="_blank">เทคโนโลยีคอมพิวเตอร์และการสื่อสาร</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <?php else: ?>
        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span3">
                        <p>หลักสูตรปริญญาตรี</p>
                        <ul><!--
                            <li><?php echo anchor("{$this->division}/home/ee", 'วิศวกรรมไฟฟ้า'); ?></li>
                            <li><?php echo anchor("{$this->division}/home/ie", 'วิศวกรรมอุตสาหการ'); ?></li>
                            <li><?php echo anchor("{$this->division}/home/ce", 'วิศวกรรมคอมพิวเตอร์'); ?></li>-->
                           <li><a href="http://www.dpu.ac.th/eng/ee/" target="_blank">วิศวกรรมไฟฟ้า</a></li>
                           <li><a href="http://www.dpu.ac.th/eng/ie/" target="_blank">วิศวกรรมอุตสาหการ</a></li>
                          <li><a href="http://www.dpu.ac.th/eng/ce/" target="_blank">วิศวกรรมคอมพิวเตอร์</a></li>
                            <li><?php echo anchor("{$this->division}/home/de", 'วิศวกรรมดิจิทัลมีเดียและระบบเกม'); ?></li>
                        <li><a href="http://www.dpu.ac.th/admissions/water_system.html" target="_blank">ระบบงานประปา</a></li>
                        </ul>
                    </div>
                    <div class="span5">
                        <p>หลักสูตรปริญญาโท</p>
                        <ul><!--
                            <li><?php echo anchor('master/home/cc', 'สาขาวิชาเทคโนโลยีคอมพิวเตอร์และการสื่อสาร'); ?></li>
                            <li><?php echo anchor('master/home/ct', 'สาขาวิศวกรรมคอมพิวเตอร์และโทรคมนาคม'); ?></li>
                            <li><?php echo anchor('master/home/em', 'สาขาวิชาการจัดการทางวิศวกรรม'); ?></li>-->
                        <li><a href="http://www.dpu.ac.th/em/" target="_blank">การจัดการทางวิศวกรรม</a></li>
                        <li><a href="http://www.dpu.ac.th/eng/mect/" target="_blank">วิศวกรรมคอมพิวเตอร์และโทรคมนาคม</a></li>
                        <li><a href="http://www.dpu.ac.th/eng/mscc/" target="_blank">เทคโนโลยีคอมพิวเตอร์และการสื่อสาร</a></li>
                        </ul>
                    </div>
                    <div class="span4">
                        <div class="back pull-right">
                            <ul>
                               <li class="doublebox"><?php echo anchor("{$this->division}/home/{$this->iView}", '<p><i class="icon-arrow-left icon-white"></i>back</p>'); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="row-fluid">
                    <div class="span12">
                        <div class="social">
                            <div class="pull-left" style="margin: 1px 0 0 0;">คณะวิศวกรรมศาสตร์ มหาวิทยาลัยธุรกิจบัณฑิตย์ โทรศัพท์ 0-2954-7300 ต่อ 498 โทรสาร 0-2954-7356</div>
                            <div class="pull-right">
                            <ul>
                    <li><a href="https://www.facebook.com/DEDPU" target="_blank" title="Engineering's Facebook"><?php echo image_asset('facebook.png', $this->theme); ?></a></li>
                     <li><a href="http://www.youtube.com/user/DEDPU2012" target="_blank" title="Engineering's Youtube"><?php echo image_asset('youtube-icon.png', $this->theme); ?></a></li>
					  <li><a href="http://debloger.weebly.com" target="_blank" title="DE bloger"><?php echo image_asset('DE_Logo_Bloger.png', $this->theme); ?></a></li>
                    <li><a href="http://www.dpu.ac.th/2012/index/7378/" target="_blank" title="Site Map"><?php echo image_asset('sitemap.png', $this->theme); ?></a></li>
                   <li><a href="http://lss.dpu.ac.th/7.html" target="_blank" title="Engineering's Teaching Resources (LSS)"><?php echo image_asset('lss-icon.png', $this->theme); ?></a></li>
                    <li><a href="http://www.dpu.ac.th/eng/km/" target="_blank"  title="Engineering's Knowledge Management"><?php echo image_asset('km_logo.png', $this->theme); ?></a></li>
                    <li><a href="https://reg.dpu.ac.th/register/" target="_blank"  title="DPU SAP Login"><?php echo image_asset('sap-icon.png', $this->theme); ?></a></li>
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
    </footer>
</div>
<?php echo js_asset('bootstrap.js', 'bootstrap'); ?>
<?php //echo js_asset('bootstrap.min.js', 'bootstrap'); ?>
<script> $(document).ready(function() { $('.alert').delay(8400).slideDown().fadeOut(800); }); </script>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<!--<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=5109235