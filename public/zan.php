<?php  
	date_default_timezone_set("PRC");
	error_reporting(0);
	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");

	$pid = $_POST['pid'];
	$type = $_COOKIE['group'];
	$uid = $_COOKIE['id'];
	$flag = '0';
	
	$is_login = $_COOKIE['is_login'];
	if($is_login){
		$result = mysql_query("SELECT * FROM tb_zan WHERE type = '".$type."' AND uid = '".$uid."'");
		while ($row = mysql_fetch_array($result)) {
			if($row['para_id'] == $pid){
				$flag = '1';
			}
		}
		if($flag == '0'){
			mysql_query("INSERT INTO tb_zan (para_id,uid,state,type) VALUES ('".$pid."','".$uid."','1','".$type."')");
			echo "1";
		}else{
			echo "2";
		}
	}else{
		echo "0";
	}
		
	

?>