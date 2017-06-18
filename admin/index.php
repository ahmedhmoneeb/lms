<?php 
	include_once("includes/header.php");
	include_once("includes/sidebar.php"); 
?>
<style>
.btn-circle {
  width: 156px;
  height: 156px;
  text-align: center;
  padding: 6px 0;
  line-height: 1.42;
  border-radius: 90px;
  color: #fff;
  background: #57889c;
  background-color: #57889c;
  font-size: 18px;
  font-weight: 700;
}
.btn-circle div{
  margin-top: 40px;
}
.mydash {
	border:1px solid #57889c;
	padding:10px;
	margin:10px;
}
.col-lg-2 {
	width:14.667%;
}
</style>      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-laptop"></i>Dashboard</li>						  	
					</ol>
				</div>
			</div>
              
            <div class="row">
				<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
					<a href="subject-report.php" class="btn btn-default btn-circle"><div>Subject <br>Management</div></a>	
				</div><!--/.col-->
				<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
					<a href="class-report.php" class="btn btn-default btn-circle"><div>Class <br>Management</div></a>	
				</div><!--/.col-->
				<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
					<a href="department-report.php" class="btn btn-default btn-circle"><div>Department <br>Management</div></a>	
				</div><!--/.col-->	
				<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
					<a href="school-year-report.php" class="btn btn-default btn-circle"><div>School Year <br>Management</div></a>	
				</div><!--/.col-->
				<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
					<a href="event-report.php" class="btn btn-default btn-circle"><div>Events <br>Management</div></a>	
				</div><!--/.col-->				
				<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
					<a href="student-report.php" class="btn btn-default btn-circle"><div>Students <br>Management</div></a>	
				</div><!--/.col-->				
				<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
					<a href="user-report.php" class="btn btn-default btn-circle"><div>Users <br>Management</div></a>	
				</div><!--/.col-->
				<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
					<a href="log-report.php" class="btn btn-default btn-circle"><div>Log <br>Reports</div></a>	
				</div><!--/.col-->
				<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
					<a href="lib/login.php?act=logout" class="btn btn-default btn-circle"><div style="margin-top:55px">Logout</div></a>	
				</div><!--/.col-->				
			</div><!--/.row-->
		
			        <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>
              
            </div>
                        
          </div> 
              <!-- project team & activity end -->

          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
	<script src="js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <<script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
	<script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
	<script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js" ></script>
	<script src="assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
	<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="js/jquery-jvectormap-world-mill-en.js"></script>
	<script src="js/xcharts.min.js"></script>
	<script src="js/jquery.autosize.min.js"></script>
	<script src="js/jquery.placeholder.min.js"></script>
	<script src="js/gdp-data.js"></script>	
	<script src="js/morris.min.js"></script>
	<script src="js/sparklines.js"></script>	
	<script src="js/charts.js"></script>
	<script src="js/jquery.slimscroll.min.js"></script>
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});



  </script>

  </body>
</html>
