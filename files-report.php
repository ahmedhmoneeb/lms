<style>
            @import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

            fieldset, label { margin: 0; padding: 0; }
            body{ margin: 20px; }
            h1 { font-size: 1.5em; margin: 10px; }

            .rating {
                border: none;
                float: left;
            }

            .rating > input { display: none; }
            .rating > label:before {
                margin: 5px;
                font-size: 1.25em;
                font-family: FontAwesome;
                display: inline-block;
                content: "\f005";
            }

            .rating > .half:before {
                content: "\f089";
                position: absolute;
            }

            .rating > label {
                color: #ddd;
                float: right;
            }

            .rating > input:checked ~ label,
            .rating:not(:checked) > label:hover,
            .rating:not(:checked) > label:hover ~ label { color: #FFD700;  }

            .rating > input:checked + label:hover,
            .rating > input:checked ~ label:hover,
            .rating > label:hover ~ input:checked ~ label,
            .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }
        </style>
<?php
	include_once("includes/header.php");
	global $SERVER_PATH;
	if(isset($_SESSION['user_details']['student_course_id']))
	{
		$SQL="SELECT * FROM files,user,class WHERE files_class_id = class_id AND files_teacher_id = user_id AND files_class_id = '".$_SESSION['user_details']['student_course_id']."'";
	}
	else
	{
		$SQL="SELECT * FROM files,user,class WHERE files_class_id = class_id AND files_teacher_id = user_id AND user_id = '".$_SESSION['user_details']['user_id']."'";
	}
	$rs=mysql_query($SQL) or die(mysql_error());
	session_start();
?>
<script>
jQuery(document).on("click", ".delete-dialog", function () {
     var id = $(this).data('id');
	 $("#recordID").val( id );
});
function delete_record(files_id)
{
	this.document.frm_files.act.value="delete_files";
	this.document.frm_files.submit();
}
</script>
<script>
function rateFile(rateVal, fileId)
{
//window.alert(fileId);

$.post('lib/rating.php',{rate:rateVal, fileID:"'"+fileId+"'"},function(d){
             
                     alert('Thanks You');
			location.reload();
});

}
</script>


	<div class="container w">
		<div class="row">
			<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:95%; margin-bottom:10px; margin-left:20px"><h3>Downloaded Files Report</h3></div>
			<div style="clear:both"></div>
		  <div class="col-lg-12">
			<form name="frm_files" action="lib/files.php" method="post">
			  <section class="panel">
				  <header class="panel-heading">
					  Downloaded Files Listing Page
				  </header>
				  <?php if($_REQUEST['msg']) { ?>
				  <div class="alert alert-success fade in" style="margin:10px;">
					  <strong><?=$_REQUEST['msg']?></strong>
				  </div>
				  <?php } ?>
				  <table class="table table-striped table-advance table-hover">
				   <tbody>
					  <tr>
						 <th>Title</th>
						 <th>Class</th>
						 <th>Teacher</th>
						 <th>Filename</th>
						 <th style="width:14%">Download</th>
						 <?php if($_SESSION['user_details']['user_level_id'] == 2) { ?>
							<th style="width:14%">Action</th>

						 <?php } ?>
						 <th style="width:18%">Rate</th>
						<th>Current Rate</th>
					  </tr>
					  <?php
						$sr_no=1;
						while($data = mysql_fetch_assoc($rs))
						{
					  ?>
					  <tr>
						 <td><?=$data[files_title]?></td>
						 <td><?=$data[class_title]?></td>
						 <td><?=$data[user_name]?></td>
						 <td><?=$data[files_filename]?></td>
						 <?php
							 $_SESSION[files_id]=$data[files_id];
						 ?>
						 <td>
							 <div class="btn-group">
							  <a href="<?php echo $SERVER_PATH."uploads/".$data[files_filename] ?>" class="btn btn-primary" target="_blank">Download File</a>
							 </div>
					     </td>
						 <td>
						  	<fieldset id='demo<?php echo $data[files_id];?>' class="rating">

								<input class="stars" onclick="rateFile(5,<?php echo $_SESSION[files_id];?>)" type="radio" id="star5<?php echo $_SESSION[files_id];?>" name="rating" value="5" />
								<label class = "full" for="star5<?php echo $_SESSION[files_id];?>" title="Awesome - 5 stars"></label>
								<input class="stars" onclick="rateFile(4,<?php echo $_SESSION[files_id];?>)" id="star4<?php echo $_SESSION[files_id];?>" type="radio" name="rating" value="4" />
								<label class = "full" for="star4<?php echo $_SESSION[files_id];?>" title="Pretty good - 4 stars"></label>
								<input class="stars" onclick="rateFile(3,<?php echo $_SESSION[files_id];?>)" type="radio" id="star3<?php echo $_SESSION[files_id];?>" name="rating" value="3" />
								<label class = "full" for="star3<?php echo $_SESSION[files_id];?>" title="Meh - 3 stars"></label>
								<input class="stars" onclick="rateFile(2,<?php echo $_SESSION[files_id];?>)" type="radio" id="star2<?php echo $_SESSION[files_id];?>" name="rating" value="2" />
								<label class = "full" for="star2<?php echo $_SESSION[files_id];?>" title="Kinda bad - 2 stars"></label>
								<input class="stars" onclick="rateFile(1,<?php echo $_SESSION[files_id];?>)" type="radio" id="star1<?php echo $_SESSION[files_id];?>" name="rating" value="1" />
								<label class = "full" for="star1<?php echo $_SESSION[files_id];?>" title="Sucks big time - 1 star"></label>

                   		</fieldset>
							<label class ="rate_num" id = "rate_num"></label>						  </td>
						 <?php if($_SESSION['user_details']['user_level_id'] == 2) { ?>
						 <td>
						  <div class="btn-group">
							  <a href="files.php?files_id=<?php echo $data[files_id] ?>" class="btn btn-success">Edit</a>
							  <a class="delete-dialog btn btn-danger" data-id="<?php echo $data[files_id] ?>" data-toggle="modal" href="#myModal-2">Delete</i></a>
						  </div>
						  </td>

						  <?php } ?>
						<td><?php echo $data[files_rate] ?></td>
					  </tr>
					  <?php } ?>
				   </tbody>
				</table>
			  </section>
			  <input type="hidden" name="act" />
			  <input type="hidden" name="files_id" id="recordID" />
			 </form>
		  </div>
	  </div>
	</div>

<?php include_once("includes/footer.php"); ?>
