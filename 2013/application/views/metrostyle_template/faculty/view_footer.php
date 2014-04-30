    </div>
    <footer class="metro-footer">
        <div class="row-fluid">
            <div class="span12">
                <div class="span3">
                    <p>ผู้สนใจสมัครเข้าศึกษาต่อ</p>
                    <ul>
                        <li><a href="http://www.dpu.ac.th/admissions/scholarship.html" target="_blank">ทุนการศึกษา</a></li>
                        <li><a href="http://www.dpu.ac.th/admissions/potential.php" target="_blank">สมัครเข้าศึกษา</a></li>
                        <li><a href="http://www.dpu.ac.th/acda/page.php?id=2426" target="_blank">ปฏิทินการศึกษา</a></li>
                        <li><a href="http://www.dpu.ac.th/2012/index/5005/" target="_blank">ทัศนียภาพของมหาวิทยาลัย</a></li>
                    </ul>
                </div>
                <div class="span3">
                    <p>หลักสูตรปริญญาตรี</p>
                    <ul> <!-- 
                        <li><//?php echo anchor('bachelor/home/ee', 'วิศวกรรมไฟฟ้า'); ?></li>
                        <li><//?php echo anchor('bachelor/home/ie', 'วิศวกรรมอุตสาหการ'); ?></li>
                        <li><//?php echo anchor('bachelor/home/ce', 'วิศวกรรมคอมพิวเตอร์'); ?></li>
                        <li><//?php echo anchor('bachelor/home/de', 'วิศวกรรมดิจิทัลมีเดียและระบบเกม'); ?></li> -->
                        <li><a href="http://www.dpu.ac.th/eng/ee/" target="_blank">วิศวกรรมไฟฟ้า</a></li>
                        <li><a href="http://www.dpu.ac.th/eng/ie/" target="_blank">วิศวกรรมอุตสาหการ</a></li>
                        <li><a href="http://www.dpu.ac.th/eng/ce/" target="_blank">วิศวกรรมคอมพิวเตอร์</a></li>
                        <li><a href="http://www.dpu.ac.th/eng/ae/" target="_blank">วิศวกรรมดิจิทัลมีเดียและระบบเกม</a></li>
                        <li><a href="http://www.dpu.ac.th/admissions/water_system.html" target="_blank">ระบบงานประปา</a></li>
                    </ul>
                </div>
                <div class="span4">
                    <p>หลักสูตรปริญญาโท</p>
                    <ul> <!-- 
                        <li><//?php echo anchor('master/home/cc', 'สาขาวิชาเทคโนโลยีคอมพิวเตอร์และการสื่อสาร'); ?></li>
                        <li><//?php echo anchor('master/home/ct', 'สาขาวิศวกรรมคอมพิวเตอร์และโทรคมนาคม'); ?></li>
                        <li><//?php echo anchor('master/home/em', 'สาขาวิชาการจัดการทางวิศวกรรม'); ?></li> -->
                        <li><a href="http://www.dpu.ac.th/em/" target="_blank">การจัดการทางวิศวกรรม</a></li>
                        <li><a href="http://www.dpu.ac.th/eng/mect/" target="_blank">วิศวกรรมคอมพิวเตอร์และโทรคมนาคม</a></li>
                        <li><a href="http://www.dpu.ac.th/eng/mscc/" target="_blank">เทคโนโลยีคอมพิวเตอร์และการสื่อสาร</a></li>
                    </ul>
                </div>
                <div class="span2"></div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12 social">
                <div class="pull-left" style="margin: 5px 0 0 0;">คณะวิศวกรรมศาสตร์ มหาวิทยาลัยธุรกิจบัณฑิตย์ โทรศัพท์ 0-2954-7300-29 ต่อ 498, 594, 601 โทรสาร 0-2954-7356</div>
                <ul class="pull-right">
                    <li><a href="https://www.facebook.com/engineer.dpu" target="_blank" title="Engineering's Facebook"><?php echo image_asset('facebook.png', $this->theme); ?></a></li>
                     <li><a href="http://www.youtube.com/user/EngDpu" target="_blank" title="Engineering's Youtube"><?php echo image_asset('youtube-icon.png', $this->theme); ?></a></li>
                    <li><a href="http://www.dpu.ac.th/2012/index/7378/" target="_blank" title="Site Map"><?php echo image_asset('sitemap.png', $this->theme); ?></a></li>
                   <li><a href="http://lss.dpu.ac.th/7.html" target="_blank" title="Engineering's Teaching Resources (LSS)"><?php echo image_asset('lss-icon.png', $this->theme); ?></a></li>
                    <li><a href="http://www.dpu.ac.th/eng/km/" target="_blank"  title="Engineering's Knowledge Management"><?php echo image_asset('km_logo.png', $this->theme); ?></a></li>
                    <li><a href="https://reg.dpu.ac.th/register/" target="_blank"  title="DPU SAP Login"><?php echo image_asset('sap-icon.png', $this->theme); ?></a></li>
                </ul>
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