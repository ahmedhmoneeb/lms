<?php 
	include_once("includes/header.php"); 
	$userlist_list = "";
	if($_REQUEST['message_type'])
	{
		if($_REQUEST['message_type'] == 2) {
			$userlist_list = get_new_optionlist("user","user_id","user_name",0);
			$selected_1 = "selected";
		}
		if($_REQUEST['message_type'] == 3) {
			$userlist_list = get_new_optionlist("student","student_id","student_name",0);
			$selected_2 = "selected";
		}
	}
?>
<script>
jQuery(function() {
	jQuery( "#message_date" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "-0:+1",
	   dateFormat: 'd MM,yy'
	});
});
function submitPage(obj) {
	this.frm_message.action = "#";
	this.frm_message.submit();
}
</script>
	<div class="container w">
		<div class="row centered">
		<div class="col-sm-8">
		<?php if($_REQUEST['msg']) { ?>
		  <div class="alert alert-success fade in" style="margin:10px;">
			  <strong><?=$_REQUEST['msg']?></strong>
		  </div>
		  <?php } ?>
		<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:100%; margin-bottom:20px;"><h3>Send Message</h3></div>
		<?php include_once("includes/message_tabs.php"); ?>
			<div style="clear:both"></div>
			<form class="form-horizontal" role="form" action="lib/message.php" method="post" enctype="multipart/form-data" name="frm_message">
			  <div class="form-group" style="margin-top:10px;">
				<label class="control-label col-sm-2" for="email">Send To : </label>
				<div class="col-sm-10">
				  <select class="form-control" id="sel1" name="message_type" required onChange="submitPage(this)">
					<option value="">Please Select</option>
					<option value="2" <?=$selected_1?>>Send to Teacher</option>
					<option value="3" <?=$selected_2?>>Send to Student</option>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">User : </label>
				<div class="col-sm-10">
				  <select class="form-control" id="sel1" name="message_receiver_id" required>
					<?php echo $userlist_list; ?>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Subject : </label>
				<div class="col-sm-10">
				  <input type="text" value="<?=$data['message_subject']?>" class="form-control" id="message_subject" name="message_subject" placeholder="Enter Subject" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Message : </label>
				<div class="col-sm-10">
				  <textarea class="form-control" rows="5" id="comment" name="message_content" placeholder="Enter Message" required><?=$data['message_content']?></textarea>
				</div>
			  </div>
			  <div class="form-group"> 
				<label class="control-label col-sm-2" for="email"></label>
				<div class="col-sm-10" style="text-align:left;">
				  <button type="submit" class="btn btn-primary" style="width:140px; padding:8px;">Send Message</button>
				  <button type="reset" class="btn btn-danger" style="width:140px; padding:8px;">Reset</button>
				</div>
			  </div>
			  <input type="hidden" name="act" value="save_message">
			  <input type="hidden" name="avail_file" value="<?=$data[message_filename]?>">
			  <input type="hidden" name="message_id" value="<?=$data[message_id]?>">
			</form>
			</div>
			<div class="col-sm-4" style="margin-bottom:10px;">
				<div><img src="assets/img/side1.jpg" style="width:250px;"></div>
			</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?>
