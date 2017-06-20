<style>
	.stars-container {
  position: relative;
  display: inline-block;
  color: transparent;
		}

		.stars-container:before {
			position: absolute;
			top: 0;
			left: 0;
			content: '★★★★★';

			color: lightgray;
		}

		.stars-container:after {
			position: absolute;
			top: 0;
			left: 0;
			content: '★★★★★';

			color: gold;
			overflow: hidden;
		}

		.stars-0:after { width: 0%; }
		.stars-1:after { width: 20%; }
		.stars-2:after { width: 40%; }
		.stars-3:after { width: 60%; }
		.stars-4:after { width: 80%; }
		.stars-5:after { width: 100%; }


		.btn{display:inline-block;}
</style>
<?php
	session_start();
	include_once("includes/header.php");
	if($_SESSION['user_details']['user_level_id'] == 2)
	{
		$SQL="SELECT * FROM subject,user,class WHERE subject_class_id = class_id AND subject_teacher_id = user_id AND subject_class_id = '".$_SESSION['user_details']['student_course_id']."'";
	}
	else
	{
		$SQL="SELECT * FROM subject,class WHERE subject_class_id = class_id AND class_id = '".$_SESSION['user_details']['student_course_id']."'";
	}
	$rs=mysql_query($SQL) or die(mysql_error());


	if(isset($_SESSION['user_details']['student_course_id']))
	{
		$SQL2="SELECT * FROM files,user,class WHERE files_class_id = class_id AND files_teacher_id = user_id AND files_class_id = '".$_SESSION['user_details']['student_course_id']."' ORDER BY files_rate DESC";
	}
	else
	{
		$SQL2="SELECT * FROM files,user,class WHERE files_class_id = class_id AND files_teacher_id = user_id AND user_id = '".$_SESSION['user_details']['user_id']."' ORDER BY files_rate DESC";
	}
	$rs2=mysql_query($SQL2) or die(mysql_error());

?>
<script>
	$(document).ready(function() {
			 var $content = $(".hidden").hide();

				$(".btn").click(function () {
					$(".hidden").html("");
					var sign = $(this).text();
					if(sign == "-")
					{
						sign = $(this).html("+");
					}
					else
					{
						sign = $(this).html("-");
					}
					var postid = $(this).data('postid');

					$.ajax({
								url: 'lib/get_files_rate.php',
								data: "",
								dataType: "json",
								type: "POST",
								success: function (data)
								{
											var len = data.length;
											var txt = "";
											if(len > 0)
											{
													txt = '<br/><div class = "row" style ="font-size:20px;font-weight: bold;">'
																+'<div class = "col-sm-2">File Title</div>'
																+'<div class = "col-sm-2">File Name</div>'
																+'<div class = "col-sm-2">Download</div></div>';
													for(var i=0;i<len;i++)
													{

														if(data[i].files_subject_id == postid)
														{
																if(data[i].files_title && data[i].files_filename && data[i].files_rate)
																{

																	txt += '<br/><div class = "row">'
																								+'<div class = "col-sm-2">'+data[i].files_title +'</div>'
																								+'<div class = "col-sm-2">'+data[i].files_filename + '</div>'
																								+'<div class = "col-sm-2"><div class="btn-group"><a href="<?php echo $SERVER_PATH."uploads/".$data[files_filename] ?>" class="btn btn-primary" target="_blank">Download File</a>'
							 																	+'</div></div></div><br/><hr><br/>';
																								 addScore(data[i].files_rate, $("#fixture"));
																}
														}
													}

													if(txt != ""){
															$("#fixture").append(txt).removeClass("hidden");
													}

												}

									},
									error: function (xhr, status, error) {
											// executed if something went wrong during call
											if (xhr.status > 0) alert('got error: ' + status); // status 0 - when load is interrupted
									}

							});

							$(this).toggleClass("expanded");
							$content.html("");
							$content.slideToggle();
						});


  function addScore(score, $domElement) {
    $("<span class='stars-container'>")
      .addClass("stars-" + score.toString())
      .text("★★★★★")
      .appendTo($domElement);
  }
});
</script>
	<div class="container w">
		<div class="row">
			<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:95%; margin-bottom:10px; margin-left:20px"><h3>Subject Report</h3></div>
			<div style="clear:both"></div>
		  <div class="col-lg-12">
			<form name="frm_subject" action="lib/subject.php" method="post">
			  <section class="panel">
				  <header class="panel-heading">
					  Subject Report
				  </header>
				  <?php if($_REQUEST['msg']) { ?>
				  <div class="alert alert-success fade in" style="margin:10px;">
					  <strong><?=$_REQUEST['msg']?></strong>
				  </div>
				  <?php } ?>
				  <table class="table table-striped table-advance table-hover">
				   <tbody>
					  <tr>
							<th></th>
						 <th>Subject Code</th>
						 <th>Title</th>
						 <th>Class</th>
					  </tr>
					  <?php
						$sr_no=1;
						while($data = mysql_fetch_assoc($rs))
						{
					  ?>
					  <tr>
							<td><div class = "btn" id="plus" data-postid="<?php echo $data[subject_id];?>">+

								<div>
							</td>
					     <td><?=$data[subject_code]?></td>
						 <td><?=$data[subject_title]?></td>
						 <td><?=$data[class_title]?></td>
					  </tr>

					  <?php } ?>
				   </tbody>
				</table>
			  </section>
			  <input type="hidden" name="act" />
			  <input type="hidden" name="subject_id" id="recordID" />
			 </form>
			 <div id = "fixture" class=" hidden"  style="display: block;margin-left:2%;margin-bottom:2%">

			 </div>

				<!--
				<table id="table" class="hidden">
					<tr>
							<th>Title</th>
							<th>File Name</th>
							<th id="fixture">Rate</th>
					</tr>
			</table>
			-->
	  </div>

	</div>
<?php include_once("includes/footer.php"); ?>
