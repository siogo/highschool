<?php  
	
	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");

	$title = $_POST['title'];
	$connect = $_POST['content'];
	$list = $_POST['list'];
	$time = time();
	$user = $_COOKIE["id"];
	$type = $_COOKIE['group'];

	mysql_query("INSERT into tb_paragraph (para_content,para_title,account,para_kind,para_publish,type) VALUES ('".$connect."','".$title."','".$user."','".$list."','".$time."','".$type."')");
	echo "添加成功";

	
?>
