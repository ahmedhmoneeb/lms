<?php include_once("includes/header.php"); ?>
	<div class="container w">
		<div class="row">
		<div class="col-sm-8">
		<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:100%; margin-bottom:20px;"><h3>Questionnaire</h3></div>
		
		<div style="clear:both"></div>
			<form class="form-horizontal" role="form" action="lib/questionnaire.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="q1">Q1 : </label>
                    <br/>
                    <div class="col-sm-8">
                        <label class="radio-inline">
                            <input type="radio" name="q1"  required="required" value="a">A
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="q1"  required="required" value="b">B
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="q2">Q2 : </label>
                    <br/>
                    <div class="col-sm-8">
                        <label class="radio-inline">
                            <input type="radio" name="q2" required="required" value="a">A
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="q2" required="required" value="b">B
                        </label>
                    </div>
                </div>
              <div class="form-group">
                    <label class="control-label col-sm-2" for="q3">Q3 : </label>
                    <br/>
                    <div class="col-sm-8">
                        <label class="radio-inline">
                            <input type="radio" name="q3" required="required" value="a">A
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="q3" required="required" value="b">B
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="q4">Q4 : </label>
                    <br/>
                    <div class="col-sm-8">
                        <label class="radio-inline">
                            <input type="radio" name="q4" required="required" value="a">A
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="q4" required="required" value="b">B
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="q5">Q5 : </label>
                    <br/>
                    <div class="col-sm-8">
                        <label class="radio-inline">
                            <input type="radio" name="q5" required="required" value="a">A
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="q5" required="required" value="b">B
                        </label>
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
