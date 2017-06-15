<!-- Modal -->
<form class="form-horizontal" role="form" action="lib/login.php" method="post" enctype="multipart/form-data">
	<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="messageModalLabel">View Message</h4>
		  </div>
		  <div class="modal-body">
				<div class="row centered">
					  <div class="form-group">
						<label class="control-label col-sm-3" for="email">Subject : </label>
						<div class="col-sm-8"><div id="inbox_subject"></div></div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-3" for="email">Date : </label>
						<div class="col-sm-8"><div id="inbox_date"></div></div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-3" for="email">Message : </label>
						<div class="col-sm-8"><div id="inbox_message"></div></div>
					  </div>
					  <input type="hidden" name="act" value="check_login">
				</div>
		  </div>
		  <div class="modal-footer">
			<button class="btn btn-danger" style="width:140px; padding:8px;" data-dismiss="modal" class="close" type="button">Close</button>
		  </div>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</form>	