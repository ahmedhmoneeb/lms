<?php 
	include_once("includes/header.php"); 
	if($_REQUEST['question_no'])
	{
		$question_no = $_REQUEST['question_no'] + 1;
		if($_SESSION['quiz'][$question_no-1]['qq_correct'] == $_REQUEST['answer'])
		{
			$_SESSION['quiz_answer']++; 
		}
	}
	if(count($_SESSION['quiz']) == $question_no)
		$question_label = "Submit Exam";
	else 
		$question_label = "Next Question";
	if(count($_SESSION['quiz']) < $question_no)
	{
		header("Location:lib/quiz.php?act=save_quiz_ans");
		exit;
	}
	if($_REQUEST[quiz_id])
	{
		$SQL="SELECT * FROM quiz_question WHERE qq_quiz_id = $_REQUEST[quiz_id]";
		$rs=mysql_query($SQL) or die(mysql_error());
		$i = 1;
		while($data = mysql_fetch_assoc($rs))
		{
			$_SESSION['quiz'][$i++] = $data;
		}
		$question_no = 1;
		$_SESSION['quiz_answer'] = 0;
		$question_label = "Next Question";
	}
?>
<script>
jQuery(function() {
	jQuery( "#quiz_date" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "-0:+1",
	   dateFormat: 'd MM,yy'
	});
});
</script>

	<div class="container w">
		<div class="row centered">
		<div class="col-sm-8">
		<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:100%; margin-bottom:20px;"><h3>Quiz Exam</h3></div>
		<div style="clear:both"></div>
			<form class="form-horizontal" role="form" action="quiz-paper.php" method="post" enctype="multipart/form-data">
			  <div class="form-group">
				<label class="control-label col-sm-10" style="text-align:left;" for="email"><?=$_SESSION['quiz'][$question_no]['qq_question']?></label>
			  </div>
			  <div class="form-group">
				<div class="col-sm-10" style="text-align:left; margin-left:50px;"><input type="radio" name="answer" value="<?=$_SESSION['quiz'][$question_no]['qq_option1']?>"> <?=$_SESSION['quiz'][$question_no]['qq_option1']?></div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-10" style="text-align:left; margin-left:50px;"><input type="radio" name="answer" value="<?=$_SESSION['quiz'][$question_no]['qq_option2']?>"> <?=$_SESSION['quiz'][$question_no]['qq_option2']?></div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-10" style="text-align:left; margin-left:50px;"><input type="radio" name="answer" value="<?=$_SESSION['quiz'][$question_no]['qq_option3']?>"> <?=$_SESSION['quiz'][$question_no]['qq_option3']?></div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-10" style="text-align:left; margin-left:50px;"><input type="radio" name="answer" value="<?=$_SESSION['quiz'][$question_no]['qq_option4']?>"> <?=$_SESSION['quiz'][$question_no]['qq_option4']?></div>
			  </div>
			  <div class="form-group"> 
				<div class="col-sm-12" style="text-align:right;">
				  <button type="submit" class="btn btn-primary" style="width:140px; padding:8px;"><?=$question_label?></button>
				</div>
			  </div>
			  <input type="hidden" name="act" value="save_quiz">
			  <input type="hidden" name="question_no" value="<?=$question_no?>">
			</form>
			</div>
			<div class="col-sm-4" style="margin-bottom:10px;">
				<div><img src="assets/img/side1.jpg" style="width:250px;"></div>
			</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?>
