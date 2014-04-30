    </div>
    <footer class="metro-footer">
        <?php if(!empty($this->iController) and $this->iController != "index" and $this->iController != "lab"): ?>
        <div class="row-fluid">
            <div class="span3">
                <!-- start metro navi -->
                <div class="metro-navi pull-left">
                  <ul>
                    <li class="lab"><?php echo anchor("{$this->division}/collegian/{$this->iView}", '<i></i><p>collegian<br />ทำเนียบนักศึกษา</p>'); ?></li>
                    <li class="contactus"><?php echo anchor("{$this->division}/contact/{$this->iView}", '<i>' . image_asset('faculty/contact-icon.png', $this->theme) . '</i><p>contact<br />ติดต่อ</p>'); ?></li>
                  </ul>
                </div>
            </div>
            <div class="span9">
                <div class="row-fluid">
                    <div class="span4">
                        <p>หลักสูตรปริญญาตรี</p>
                        <ul>
                            <li><?php echo anchor("bachelor/home/ee", 'วิศวกรรมไฟฟ้า'); ?></li>
                            <li><?php echo anchor("bachelor/home/ie", 'วิศวกรรมอุตสาหการ'); ?></li>
                            <li><?php echo anchor("bachelor/home/ce", 'วิศวกรรมคอมพิวเตอร์'); ?></li>
                            <li><?php echo anchor("bachelor/home/de", 'วิศวกรรมดิจิทัลมีเดียและระบบเกม'); ?></li>
                        </ul>
                    </div>
                    <div class="span8">
                        <p>หลักสูตรปริญญาโท</p>
                        <ul>
                            <li><?php echo anchor("{$this->division}/home/cc", 'สาขาวิชาเทคโนโลยีคอมพิวเตอร์และการสื่อสาร'); ?></li>
                            <li><?php echo anchor("{$this->division}/home/ct", 'สาขาวิศวกรรมคอมพิวเตอร์และโทรคมนาคม'); ?></li>
                            <li><?php echo anchor("{$this->division}/home/em", 'สาขาวิชาการจัดการทางวิศวกรรม'); ?></li>
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
                        <ul>
                            <li><?php echo anchor("bachelor/home/ee", 'วิศวกรรมไฟฟ้า'); ?></li>
                            <li><?php echo anchor("bachelor/home/ie", 'วิศวกรรมอุตสาหการ'); ?></li>
                            <li><?php echo anchor("bachelor/home/ce", 'วิศวกรรมคอมพิวเตอร์'); ?></li>
                            <li><?php echo anchor("bachelor/home/de", 'วิศวกรรมดิจิทัลมีเดียและระบบเกม'); ?></li>
                        </ul>
                    </div>
                    <div class="span5">
                        <p>หลักสูตรปริญญาโท</p>
                        <ul>
                            <li><?php echo anchor("{$this->division}/home/cc", 'สาขาวิชาเทคโนโลยีคอมพิวเตอร์และการสื่อสาร'); ?></li>
                            <li><?php echo anchor("{$this->division}/home/ct", 'สาขาวิศวกรรมคอมพิวเตอร์และโทรคมนาคม'); ?></li>
                            <li><?php echo anchor("{$this->division}/home/em", 'สาขาวิชาการจัดการทางวิศวกรรม'); ?></li>
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
                            <div class="pull-left" style="margin: 1px 0 0 0;">มหาวิทยาลัยธุรกิจบัณฑิตย์ โทรศัพท์ 0-2954-7300-29 โทรสาร 0-2589-9605 ต่อ ...</div>
                            <div class="pull-right">
                            <ul>
                                <li><a href="" target="_blank"><?php echo image_asset('facebook-icon.png', $this->theme); ?></a></li>
                                <li><a href="" target="_blank"><?php echo image_asset('youtube-icon.png', $this->theme); ?></a></li>
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
    </footer>
</div>
<?php echo js_asset('bootstrap.js', 'bootstrap'); ?>
<?php echo js_asset('bootstrap.min.js', 'bootstrap'); ?>
<script> $('.alert').delay(8400).slideDown().fadeOut(800); </script>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=510923562276743";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27919766-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>