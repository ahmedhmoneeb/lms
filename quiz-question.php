<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[qq_id])
	{
		$SQL="SELECT * FROM quiz_question WHERE qq_id = $_REQUEST[qq_id]";
		$rs=mysql_query($SQL) or die(mysql_error());
		$data=mysql_fetch_assoc($rs);
	}
	
	if($_REQUEST['quiz_id'])
	{
		$data['qq_quiz_id'] = $_REQUEST['quiz_id'];
	}
?>
	<div class="container w">
		<div class="row centered">
		<div class="col-sm-8">
		<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:100%; margin-bottom:20px;"><h3>Add Quiz Question</h3></div>
		<div style="clear:both"></div>
			<form class="form-horizontal" role="form" action="lib/quiz_question.php" method="post" enctype="multipart/form-data">
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Title : </label>
				<div class="col-sm-10">
				  <input type="text" value="<?=$data['qq_question']?>" class="form-control" id="qq_question" name="qq_question" placeholder="Enter Quiz Question" required>
				</div>
			  </div>
			 <div class="form-group">
				<label class="control-label col-sm-2" for="email">Option 1 : </label>
				<div class="col-sm-7">
				  <input type="text" value="<?=$data['qq_option1']?>" class="form-control" id="qq_option1" name="qq_option1" placeholder="Enter Option 1" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Option 2 : </label>
				<div class="col-sm-7">
				  <input type="text" value="<?=$data['qq_option2']?>" class="form-control" id="qq_option2" name="qq_option2" placeholder="Enter Option 2" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Option 3 : </label>
				<div class="col-sm-7">
				  <input type="text" value="<?=$data['qq_option3']?>" class="form-control" id="qq_option3" name="qq_option3" placeholder="Enter Option 3" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Option 4 : </label>
				<div class="col-sm-7">
				  <input type="text" value="<?=$data['qq_option4']?>" class="form-control" id="qq_option4" name="qq_option4" placeholder="Enter Option 4" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Answer : </label>
				<div class="col-sm-7">
				  <input type="text" value="<?=$data['qq_correct']?>" class="form-control" id="qq_correct" name="qq_correct" placeholder="Enter Correct Answer" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Description : </label>
				<div class="col-sm-10">
				  <textarea class="form-control" rows="5" id="comment" name="qq_description" placeholder="Enter Quiz Question Description" required><?=$data['qq_description']?></textarea>
				</div>
			  </div>
			  <div class="form-group"> 
				<label class="control-label col-sm-2" for="email"></label>
				<div class="col-sm-10" style="text-align:left;">
				  <button type="submit" class="btn btn-primary" style="width:140px; padding:8px;">Submit</button>
				  <button type="reset" class="btn btn-danger" style="width:140px; padding:8px;">Reset</button>
				</div>
			  </div>
			  <input type="hidden" name="act" value="save_quiz_question">
			  <input type="hidden" name="qq_id" value="<?=$data[qq_id]?>">
 			  <input type="hidden" name="qq_quiz_id" value="<?=$data[qq_quiz_id]?>">
			</form>
			</div>
			<div class="col-sm-4" style="margin-bottom:10px;">
				<div><img src="assets/img/side1.jpg" style="width:250px;"></div>
			</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?>
