<!DOCTYPE html>
<html>
<head>
	<title>Detail Cell Site</title>
	<script src="<?php echo base_url('asset/jquery-3.2.1.slim.js'); ?>"></script>
	<script src="<?php echo base_url('asset/chartdashboard/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('asset/chartdashboard/fussioncharts/fussioncharts.js'); ?>"></script>
	<script src="<?php echo base_url('asset/chartdashboard/fussioncharts/fussioncharts.charts.js'); ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/chartdashboard/css/bootstrap.min.css'); ?>">
</head>
<body>
	<div class="row">
	<div class="col-sm-1"></div>
      <div class="col-sm-2">
        <div class="row" style="background: #ff0000">
        	<div class="block-content">
				<span class="line"><?php echo $maxamount;
				  ?></span>
        	</div>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="block" style="background: #ffff00">
           hahaha
        </div>
      </div>
      <div class="col-sm-2">
        <div class="block" style="background: #ffa000">
           hahaha
        </div>
      </div>
      <div class="col-sm-2">
        <div class="block" style="background: #ffa000">
           hahaha
        </div>
      </div>
      <div class="col-sm-2">
        <div class="block" style="background: #ffa000">
           hahaha
        </div>
      </div>
    </div>
    
    <script src="<?php echo base_url('asset/peity/jquery.peity.js'); ?>" ></script>
    <script type="text/javascript">
    	$(".line").peity("line");
    </script>
</body>
</html>

