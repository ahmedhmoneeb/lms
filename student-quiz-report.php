<?php 
	include_once("includes/header.php"); 
	if(isset($_SESSION['user_details']['student_course_id']))
	{
		$SQL="SELECT * FROM quiz,user,class WHERE quiz_class_id = class_id AND quiz_teacher_id = user_id AND quiz_class_id = '".$_SESSION['user_details']['student_course_id']."'";
	}
	else
	{
		$SQL="SELECT * FROM quiz,user,class WHERE quiz_class_id = class_id AND quiz_teacher_id = user_id AND user_id = '".$_SESSION['user_details']['user_id']."'";
	}
	$rs=mysql_query($SQL) or die(mysql_error());
?>
<script>
jQuery(document).on("click", ".delete-dialog", function () {
     var id = $(this).data('id');
	 $("#recordID").val( id );
});
function delete_record(quiz_id)
{
	this.document.frm_quiz.act.value="delete_quiz";
	this.document.frm_quiz.submit();
}
</script>
	<div class="container w">
		<div class="row">
			<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:95%; margin-bottom:10px; margin-left:20px"><h3>Quiz Report</h3></div>
			<div style="clear:both"></div>
		  <div class="col-lg-12">
			<form name="frm_quiz" action="lib/quiz.php" method="post">
			  <section class="panel">
				  <header class="panel-heading">
					  Quiz Listing Page
				  </header>
				  <?php if($_REQUEST['msg']) { ?>
				  <div class="alert alert-success fade in" style="margin:10px;">
					  <strong><?=$_REQUEST['msg']?></strong>
				  </div>
				  <?php } ?>
				  <table class="table table-striped table-advance table-hover">
				   <tbody>
					  <tr>
						 <th style="width:6%">Sr. No.</th>
						 <th style="width:40%">Title</th>
						 <th style="width:10%">Class</th>
						 <th style="width:10%">By Teacher</th>
						 <th style="width:16%">Action</th>
					  </tr>
					  <?php 
						$sr_no=1;
						while($data = mysql_fetch_assoc($rs))
						{
							$SQL = "SELECT * FROM quiz_result WHERE qr_quiz_id = $data[quiz_id] AND qr_student_id = ".$_SESSION['user_details']['student_id'];
							$resultRs = mysql_query($SQL);
							if(mysql_num_rows($resultRs))
							{
								$resutlData = mysql_fetch_assoc($resultRs);
								$linkData = "Already Taken Score $resutlData[qr_answer] out of $resutlData[qr_total_question]";
							} else {
								$linkData = '<a href="quiz-paper.php?quiz_id='.$data[quiz_id].'" class="btn btn-success">Start Quiz</a>';
							}
					  ?>
					  <tr>
						 <td><?=$sr_no++?></td>
						 <td><?=$data[quiz_title]?></td>
						 <td><?=$data[class_title]?></td>
						 <td><?=$data[user_name]?></td>
						 <td>
						  <div class="btn-group">
							 <?=$linkData?>
						  </div>
						 </td>
					  </tr>
					  <?php } ?>
				   </tbody>
				</table>
			  </section>
			  <input type="hidden" name="act" />
			  <input type="hidden" name="quiz_id" id="recordID" />
			 </form>
		  </div>
	  </div>
	</div>
<?php include_once("includes/footer.php"); ?>
