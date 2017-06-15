<!-- Modal -->
<form class="form-horizontal" role="form" action="lib/login.php" method="post" enctype="multipart/form-data">
	<div class="modal fade" id="studentLoginModal" tabindex="-1" role="dialog" aria-labelledby="studentLoginModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="studentLoginModalLabel">Student Login (Login to account)</h4>
		  </div>
		  <div class="modal-body">
				<div class="row centered">
					  <div class="form-group">
						<label class="control-label col-sm-3" for="email">Username : </label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" id="user_user" name="user_user" placeholder="Enter Username" required>
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-3" for="email">Password : </label>
						<div class="col-sm-8">
						  <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Enter Password" required>
						</div>
					  </div>
					  <input type="hidden" name="act" value="check_student_login">
				</div>
		  </div>
		  <div class="modal-footer">
			<button type="submit" class="btn btn-primary" style="width:140px; padding:8px;">Login To Account</button>
			<button type="reset" class="btn btn-danger" style="width:140px; padding:8px;">Reset</button>
		  </div>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</form>	