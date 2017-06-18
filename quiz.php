<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[quiz_id])
	{
		$SQL="SELECT * FROM quiz WHERE quiz_id = $_REQUEST[quiz_id]";
		$rs=mysql_query($SQL) or die(mysql_error());
		$data=mysql_fetch_assoc($rs);
	}
?>
	<div class="container w">
		<div class="row centered">
		<div class="col-sm-8">
		<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:100%; margin-bottom:20px;"><h3>Add Quiz</h3></div>
		<div style="clear:both"></div>
			<form class="form-horizontal" role="form" action="lib/quiz.php" method="post" enctype="multipart/form-data">
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Title : </label>
				<div class="col-sm-10">
				  <input type="text" value="<?=$data['quiz_title']?>" class="form-control" id="quiz_title" name="quiz_title" placeholder="Enter Quiz Title" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Select Class : </label>
				<div class="col-sm-10">
				  <select class="form-control" id="sel1" name="quiz_class_id" required>
					<?php echo get_new_optionlist("class","class_id","class_title",$data[quiz_class_id]); ?>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Description : </label>
				<div class="col-sm-10">
				  <textarea class="form-control" rows="5" id="comment" name="quiz_description" placeholder="Enter Quiz Description" required><?=$data['quiz_description']?></textarea>
				</div>
			  </div>
			  <div class="form-group"> 
				<label class="control-label col-sm-2" for="email"></label>
				<div class="col-sm-10" style="text-align:left;">
				  <button type="submit" class="btn btn-primary" style="width:140px; padding:8px;">Submit</button>
				  <button type="reset" class="btn btn-danger" style="width:140px; padding:8px;">Reset</button>
				</div>
			  </div>
			  <input type="hidden" name="act" value="save_quiz">
			  <input type="hidden" name="avail_file" value="<?=$data[quiz_filename]?>">
			  <input type="hidden" name="quiz_id" value="<?=$data[quiz_id]?>">
			</form>
			</div>
			<div class="col-sm-4" style="margin-bottom:10px;">
				<div><img src="assets/img/side1.jpg" style="width:250px;"></div>
			</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?>
