<!DOCTYPE html>
<html>
<head>
	<title>Detail Monthly Cell Site</title>
	<script src="<?php echo base_url('asset/jquery-3.2.1.slim.js'); ?>"></script>
	<script src="<?php echo base_url('asset/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('asset/AdminLTE/bower_components/chart.js/chart.min.js'); ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
<body>
	<div class="container">
      <div class="col-sm-12">
        <div class="row" style="background: #ffffff">
        	<div class="block-content">
        		VLR<br>
        		<button onclick=link1() class="btn-success btn-sm">Daily</button>
        		<button onclick=link2() class="btn-success btn-sm">Weekly</button>
        		<button onclick=link3() class="btn-success btn-sm">Monthly</button>
        		<canvas id="canvas1" height="20%" width="100%"></canvas>
        	</div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="row" style="background: #ffffff">
        	<div class="block-content">
        		TRAFFIC<br>
        		<button onclick=link1() class="btn-success btn-sm">Daily</button>
        		<button onclick=link2() class="btn-success btn-sm">Weekly</button>
        		<button onclick=link3() class="btn-success btn-sm">Monthly</button>
				<canvas id="canvas2" height="20%" width="100%"></canvas>
        	</div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="row" style="background: #ffffff">
        	<div class="block-content">
        		<br>
				<canvas id="canvas3" height="20%" width="100%"></canvas>
        	</div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="row" style="background: #ffffff">
        	<div class="block-content">
        		REVENUE<br>
        		<button onclick=link1() class="btn-success btn-sm">Daily</button>
        		<button onclick=link2() class="btn-success btn-sm">Weekly</button>
        		<button onclick=link3() class="btn-success btn-sm">Monthly</button>
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
      
    
    <script src="<?php echo base_url('asset/peity/jquery.peity.js'); ?>" ></script>
    <script type="text/javascript">
    	$(".line").peity("line");
    </script>
    <script>
		var lineChartData1 = {
			labels : ["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(0,0,255,0.3)",
					strokeColor : "rgba(0,0,0,0)",
					pointColor : "rgba(255,0,0,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [<?php foreach ($dailyvlr as $data) {
						echo $data; }?>]
				}
			]

		}
		var lineChartData2 = {
			labels : ["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(0,0,255,0.3)",
					strokeColor : "rgba(0,0,0,0)",
					pointColor : "rgba(255,0,0,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [<?php foreach ($dailytraffic as $data) {
						echo $data; }?>]
				}
			]

		}

		var lineChartData4 = {
			labels : ["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(0,0,255,0.3)",
					strokeColor : "rgba(0,0,0,0)",
					pointColor : "rgba(255,0,0,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [<?php foreach ($dailytraffic as $data) {
						echo $data; }?>]
				}
			]

		}

	window.onload = function(){
		var ctx = document.getElementById("canvas1").getContext("2d");
		var ctx2 = document.getElementById("canvas2").getContext("2d");
		//var ctx3 = document.getElementById("canvas3").getContext("2d");
		var ctx4 = document.getElementById("canvas4").getContext("2d");
		//var ctx5 = document.getElementById("canvas5").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData1, {
			responsive: true
		});
		window.myLine = new Chart(ctx2).Line(lineChartData2, {
			responsive: true
		});
		/*window.myLine = new Chart(ctx3).Line(lineChartData3, {
			responsive: true
		});*/
		window.myLine = new Chart(ctx4).Line(lineChartData4, {
			responsive: true
		});
		/*window.myLine = new Chart(ctx5).Line(lineChartData5, {
			responsive: true
		});*/
	}

	function link1()
      {
        window.location = "<?php echo base_url('Welcome/detaildaily');?>";
      }
    function link2()
      {
        window.location = "<?php echo base_url('Welcome/detailweekly');?>";
      }
    function link3()
      {
        window.location = "<?php echo base_url('Welcome/detailmonthly');?>";
      }


	</script>
</body>
</html>

