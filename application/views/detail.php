<!DOCTYPE html>
<html>
<head>
	<title>Detail Cell Site</title>
	<script src="<?php echo base_url('asset/jquery-3.2.1.slim.js'); ?>"></script>
	<script src="<?php echo base_url('asset/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('asset/AdminLTE/bower_components/chart.js/chart.min.js'); ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
<body>
	<div class="container">
      <div class="col-sm-12">
        <div class="row" style="background: #ffffff">
        	<div class="block-content">
				<canvas id="canvas1" height="20%" width="100%"></canvas>
        	</div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="row" style="background: #ffffff">
        	<div class="block-content">
				<canvas id="canvas2" height="20%" width="100%"></canvas>
        	</div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="row" style="background: #ffffff">
        	<div class="block-content">
				<canvas id="canvas3" height="20%" width="100%"></canvas>
        	</div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="row" style="background: #ffffff">
        	<div class="block-content">
				<canvas id="canvas4" height="20%" width="100%"></canvas>
        	</div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="row" style="background: #ffffff">
        	<div class="block-content">
				<canvas id="canvas5" height="20%" width="100%"></canvas>
        	</div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="row" style="background: #ffffff">
        	<div class="block-content">
				<canvas id="canvas6" height="20%" width="100%"></canvas>
        	</div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="row" style="background: #ffffff">
        	<div class="block-content">
				<canvas id="canvas7" height="20%" width="100%"></canvas>
        	</div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="row" style="background: #ffffff">
        	<div class="block-content">
				<canvas id="canvas8" height="20%" width="100%"></canvas>
        	</div>
        </div>
      </div>
    
    <script src="<?php echo base_url('asset/peity/jquery.peity.js'); ?>" ></script>
    <script type="text/javascript">
    	$(".line").peity("line");
    </script>
    <script>
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		var lineChartData = {
			labels : ["January","February","March","April","May","June","July"],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				},
				{
					label: "My Second dataset",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				}
			]

		}

	window.onload = function(){
		var ctx = document.getElementById("canvas1").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}


	</script>
</body>
</html>

