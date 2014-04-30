</div>
<div class="clear">&nbsp;</div>

<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<?php echo js_asset('bootstrap.js', 'bootstrap'); ?>
<?php echo js_asset('bootstrap.min.js', 'bootstrap'); ?>

<script> $('.alert').delay(8400).slideDown().fadeOut(800); </script>
<script>
$('.dropdown-toggle').dropdown();

$(document).ready(function () { // this line makes sure this code runs on page load
	
	// required field validate
	$("#isForm").validate();
	
	$('.chkAlldelete').click(function () {
		$(this).parents('fieldset:eq(0)').find(':checkbox').attr('checked', this.checked);
	});
	
	$('.action-delete').click(function(){
		if($("input:checked").length == 0){
			alert("Please check one checkbox.");
			return false;	
		} else {
			var answer = confirm('Are you sure you want to delete some item ?');
			return answer // answer is a boolean
		}
	}); 
});
</script>
<!-- start footer -->         
<div id="footer">
	<!--  start footer-left -->
	<div id="footer-left"></div>
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->

 
</body>
</html>