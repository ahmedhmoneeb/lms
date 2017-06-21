<?php include_once("includes/header.php"); ?>
	<div class="container w">
		<div class="row">
		<div class="col-sm-8">
		<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:100%; margin-bottom:20px;"><h3>Questionnaire</h3></div>

		<div style="clear:both"></div>
			<form class="form-horizontal" role="form" action="lib/questionnaire.php" method="post" enctype="multipart/form-data">
                <div class="form-group" >
										<div class ="row" >
                    	<label class="control-label " for="q1">Q1 : When I think about what I did yesterday, I am most likely to get</label>
										</div>
										<div class ="row">
											<div class="col-sm-1">
											</div>
	                    <div class="col-sm-9">
	                        <label class="radio-inline">
	                            <input type="radio" name="q1"  required="required" value="a">(a) a picture.
	                        </label>
													<br/>
	                        <label class="radio-inline">
	                            <input type="radio" name="q1"  required="required" value="b">(b) words.
	                        </label>
	                    </div>
										</div>
                </div>
                <div class="form-group">
										<div class ="row">
                    	<label class="control-label" for="q2">Q2 : When I am learning something new, it helps me to</label>
										</div>
										<div class ="row">
											<div class="col-sm-1">
											</div>
	                    <div class="col-sm-9">
	                        <label class="radio-inline">
	                            <input type="radio" name="q2" required="required" value="a">(a) talk about it.
	                        </label>
													<br/>
	                        <label class="radio-inline">
	                            <input type="radio" name="q2" required="required" value="b">(b) think about it.
	                        </label>
	                    </div>
										</div>
                </div>
              <div class="form-group">
									<div class ="row">
                    <label class="control-label" for="q3">Q3 : In a book with lots of pictures and charts, I am likely to</label>
									</div>
									<div class ="row">
										<div class="col-sm-1">
										</div>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="q3" required="required" value="a">(a) look over the pictures and charts carefully.
                        </label>
												<br/>
                        <label class="radio-inline">
                            <input type="radio" name="q3" required="required" value="b">(b) focus on the written text.
                        </label>
                    </div>
									</div>
                </div>
                <div class="form-group">
									<div class ="row">
                    <label class="control-label" for="q4">Q4 : I remember best</label>
									</div>

									<div class ="row">
										<div class="col-sm-1">
										</div>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="q4" required="required" value="a">(a) what I see.
                        </label>
												<br/>
                        <label class="radio-inline">
                            <input type="radio" name="q4" required="required" value="b">(b) what I hear.
                        </label>
                    </div>
									</div>
                </div>
                <div class="form-group">
									<div class ="row">
                    <label class="control-label" for="q5">Q5 : I prefer to study</label>
									</div>

									<div class ="row">
										<div class="col-sm-1">
										</div>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="q5" required="required" value="a">(a) in a study group.
                        </label>
												<br/>
                        <label class="radio-inline">
                            <input type="radio" name="q5" required="required" value="b">(b) alone.
                        </label>
                    </div>
									</div>
                </div>
                <div class="row">
                    <br/>
                </div>
			  <div class="form-group">
				<div class="col-sm-10" style="text-align:left;">
				  <button type="submit" class="btn btn-primary" style="width:140px; padding:8px;">Submit</button>
				  <button type="reset" class="btn btn-danger" style="width:140px; padding:8px;">Reset</button>
				</div>
			  </div>
			</form>
			</div>
			<div class="col-sm-4" style="margin-bottom:10px;">
				<?php include_once("includes/sidebar.php"); ?>
			</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?>
