        <div class="metro-content pull-left">
            <div class="title-tab pull-left">ข้อมูลติดต่อ</div>
            <div class="title-bar pull-left"></div>
            <div class="clearfix"></div>
            
            <div class="tabbable tabs-left"> <!-- Only required for left/right tabs -->
              <ul class="nav nav-tabs">
                <?php foreach($query as $key => $value): ?>
                <li <?php echo ($key == 0)? 'class="active"': ""; ?>><a href="#tab<?php echo $key; ?>" data-toggle="tab"><?php echo $value->topic; ?></a></li>
                <?php endforeach; ?>
              </ul>
              <div class="tab-content">
                <?php foreach($query as $key => $value): ?>
                <div <?php echo ($key == 0)? 'class="tab-pane active"': 'class="tab-pane"'; ?> id="tab<?php echo $key; ?>">
                    <?php echo $value->long_desc; ?>
                    
                </div>
                <?php endforeach; ?>
              </div>
            </div>
        </div>