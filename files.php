<?php
	include_once("includes/header.php");
	if($_REQUEST[files_id])
	{
		$SQL="SELECT * FROM files WHERE files_id = $_REQUEST[files_id]";
		$rs=mysql_query($SQL) or die(mysql_error());
		$data=mysql_fetch_assoc($rs);
	}
?>
	<div class="container w">
		<div class="row centered">
		<div class="col-sm-8">
		<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:100%; margin-bottom:20px;"><h3>Add Files</h3></div>
		<div style="clear:both"></div>
			<form class="form-horizontal" role="form" action="lib/files.php" method="post" enctype="multipart/form-data">
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Title : </label>
				<div class="col-sm-10">
				  <input type="text" value="<?=$data['files_title']?>" class="form-control" id="files_title" name="files_title" placeholder="Enter Files Title" required>
				</div>
			  </div>
				<div class="form-group">
				<label class="control-label col-sm-2" for="email">Select Subject : </label>
				<div class="col-sm-10">
				  <select class="form-control" id="sel1" name="files_subject_id" required>
					<?php echo get_new_optionlist("subject","subject_id","subject_title",$data[files_subject_id]); ?>
				  </select>
				</div>
			</div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Select Class : </label>
				<div class="col-sm-10">
				  <select class="form-control" id="sel3" name="files_class_id" required>
					<?php echo get_new_optionlist("class","class_id","class_title",$data[files_class_id]); ?>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Upload File : </label>
				<div class="col-sm-10">
				  <input type="file" class="form-control"  name="files_filename" placeholder="Enter email">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Description : </label>
				<div class="col-sm-10">
				  <textarea class="form-control" rows="5" id="comment" name="files_description" placeholder="Enter Files Description" required><?=$data['files_description']?></textarea>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email"></label>
				<div class="col-sm-10" style="text-align:left;">
				  <button type="submit" class="btn btn-primary" style="width:140px; padding:8px;">Submit</button>
				  <button type="reset" class="btn btn-danger" style="width:140px; padding:8px;">Reset</button>
				</div>
			  </div>
			  <input type="hidden" name="act" value="save_files">
			  <input type="hidden" name="avail_file" value="<?=$data[files_filename]?>">
			  <input type="hidden" name="files_id" value="<?=$data[files_id]?>">
			</form>
			</div>
			<div class="col-sm-4" style="margin-bottom:10px;">
				<div><img src="assets/img/side1.jpg" style="width:250px;"></div>
			</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?>
