<!DOCTYPE html>
<html>
<head>
	<title>RecAUvery</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
		<link href="docs.css" rel="stylesheet" media="screen">
		<link href="css/diapo.css" rel="stylesheet" media="screen">
		<link href="css/font-awesome.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/docs.css" />
		<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css" />
		<link rel="stylesheet" type="text/css" media="print" href="css/print.css" />
		<link rel="stylesheet" type="text/css" href="js/jquery.datetimepicker.min.css">


	
<!-- js -->			
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.hoverdir.js"></script>
<script src = js/jquery.js></script>
<script src="js/jquery.datetimepicker.full.min.js"></script>
			
<script>
jQuery(document).ready(function() {
$(function(){
	$('.pix_diapo').diapo();
});
});
</script>	
	<noscript>
		<style>
			.da-thumbs li a div {
				top: 0px;
				left: -100%;
				-webkit-transition: all 0.3s ease;
				-moz-transition: all 0.3s ease-in-out;
				-o-transition: all 0.3s ease-in-out;
				-ms-transition: all 0.3s ease-in-out;
				transition: all 0.3s ease-in-out;
				}
				.da-thumbs li a:hover div{
					left: 0px;
				}
		</style>
	</noscript>		
		
<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
 <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
<script type='text/javascript' src='scripts/jquery.easing.1.3.js'></script> 
<script type='text/javascript' src='scripts/jquery.hoverIntent.minified.js'></script> 
<script type='text/javascript' src='scripts/diapo.js'></script> 
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#datetimepicker').datetimepicker({
    	format: 'Y-m-d H:i:i',
    	formatTime: 'H:i:i',
    	formatDate: 'Y-m-d',
    	step:1
    });
});
</script>
<?php include('dbcon.php'); ?>
<body>