
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1><?php echo ucfirst($controller); ?></h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><?php echo image_asset('shared/side_shadowleft.jpg','control', array('width'=>'20', 'height'=>'300')); ?></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><?php echo image_asset('shared/side_shadowright.jpg','control', array('width'=>'20', 'height'=>'300')); ?></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			<h2>Statistic</h2>
            <div>
            	<?php echo anchor('backoffice/dashboard?data=day', '[รายวัน]'); ?>
                <?php echo anchor('backoffice/dashboard?data=month', '[รายเดือน]'); ?>
				<?php echo anchor('backoffice/dashboard?data=year', '[รายปี]'); ?> 
				<?php echo anchor('backoffice/dashboard?data=hour', '[รายชั่วโมง]'); ?> 
				<?php echo anchor('backoffice/dashboard?data=referers', '[แหล่งที่มา]'); ?> 
				<?php echo anchor('backoffice/dashboard?data=keyword', '[คำค้นหา]'); ?></div>
			<div>
            <br />
            <h3>Visitors</h3><?php echo $oVisitChart; ?></div>
           	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
                    <th class="table-header-repeat line-left"> <a href="">วันที่</a> </th>
                    <th class="table-header-repeat line-left "> <a href="">ผู้เยี่ยมชม</a> </th>
                    <th class="table-header-repeat line-left"> <a href="">ผู้เยี่ยมชมใหม่</a> </th>
                    <th class="table-header-repeat line-left"> <a href="">จำนวนที่เปิดหน้า</a> </th>
                    <th class="table-header-repeat line-left"> <a href="">อัตราส่วนผู้ชมใหม่</a> </th>
                    <th class="table-header-repeat line-left"> <a href="">อัตราตีกลับ</a> </th>
				</tr>
		
				<?php $loop = 1; ?>
				<?php foreach($oDateMerge as $arr): ?>
                <?php $mod = $loop % 2; ?>
				<tr <?php echo ($mod == 1)? "class=\"alternate-row\"" : ""; ?>>
					<td><?php echo $loop ?></td>
					<?php foreach($arr as $key => $value): ?>
						<td><?php echo $value; ?></td>
					<?php endforeach; ?>
				</tr>
				<?php $loop++; ?>
				<?php endforeach; ?>
				</table>
			</div>
			<!--  end table-content  -->
	
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->
