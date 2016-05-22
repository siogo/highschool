<?php  
	date_default_timezone_set("PRC");
	error_reporting(0);
	$src = $_GET['src'];
	$a = $_GET['name'];
	header('Content-type: application/force-download');
	header("Content-Disposition: attachment; filename= '".$a."'");   
	@readfile($src);
?>