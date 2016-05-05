<?php  
	
	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");

	$pid = $_POST['pid'];
	$state = $_POST['state'];
	if($state == '1'){  //文章列表
		mysql_query("DELETE FROM tb_paragraph WHERE para_id = '".$pid."'");
		echo '1';
	}
	
?>