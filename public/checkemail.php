<?php  

	date_default_timezone_set("PRC");
	error_reporting(0);
	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");

	$email = $_POST['email'];
	$id = $_COOKIE['id'];
	$group = $_COOKIE['group'];
	if($group == 'student'){
		mysql_query("UPDATE tb_student SET email = '".$email."' WHERE student_id = '".$id."'");
	}else{
		mysql_query("UPDATE tb_teacher SET email = '".$email."' WHERE teacher_id = '".$id."'");
	}
?>