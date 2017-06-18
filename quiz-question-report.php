<?php 
include_once("includes/header.php"); 
$SQL="SELECT * FROM quiz_question WHERE qq_quiz_id = '$_REQUEST[quiz_id]'";
$rs=mysql_query($SQL) or die(mysql_error());
?>
<script>
jQuery(document).on("click", ".delete-dialog", function () {
     var id = $(this).data('id');
	 $("#recordID").val( id );
});
function delete_record(qq_id)
{
	this.document.frm_quiz_question.act.value="delete_quiz_question";
	this.document.frm_quiz_question.submit();
}
</script>
	<div class="container w">
		<div class="row">
			<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:95%; margin-bottom:10px; margin-left:20px"><h3>Quiz Report</h3></div>
			<div style="clear:both"></div>
		  <div class="col-lg-12">
			<form name="frm_quiz_question" action="lib/quiz_question.php" method="post">
			  <section class="panel">
				  <header class="panel-heading">
					  Quiz Question Listing Page
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
						 <th style="width:18%">Question</th>
						 <th style="width:12%">Option 1</th>
						 <th style="width:12%">Option 2</th>
						 <th style="width:12%">Option 3</th>
						 <th style="width:12%">Option 4</th>
						 <th style="width:12%">Answer</th>
						 <th style="width:16%"><i class="icon_cogs"></i> Action</th>
					  </tr>
					  <?php 
						$sr_no=1;
						while($data = mysql_fetch_assoc($rs))
						{
					  ?>
					  <tr>
						 <td><?=$sr_no++?></td>
						 <td><?=$data[qq_question]?></td>
						 <td><?=$data[qq_option1]?></td>
						 <td><?=$data[qq_option2]?></td>
						 <td><?=$data[qq_option3]?></td>
						 <td><?=$data[qq_option4]?></td>
						 <td><?=$data[qq_correct]?></td>
						 <td>
						  <div class="btn-group">
							  <a href="quiz-question.php?qq_id=<?php echo $data[qq_id] ?>" class="btn btn-success">Edit</a>
							  <a class="delete-dialog btn btn-danger" data-id="<?php echo $data[qq_id] ?>" data-toggle="modal" href="#myModal-2">Delete</i></a>
						  </div>
						 </td>
					  </tr>
					  <?php } ?>
				   </tbody>
				</table>
			  </section>
			  <input type="hidden" name="act" />
			  <input type="hidden" name="qq_id" id="recordID" />
			 </form>
		  </div>
	  </div>
	</div>
<?php include_once("includes/footer.php"); ?>
