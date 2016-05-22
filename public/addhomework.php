<?php  
	date_default_timezone_set("PRC");
	error_reporting(0);
	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");

	$name = $_POST['name'];
	$course = $_POST['course'];
	$tid = $_COOKIE['id'];
	$teacher = $_COOKIE['username'];
	$yaoqiu = $_POST['yaoqiu'];
	$time = time();
	$flag = '0';

	
	if($name){
		$b = mysql_query("SELECT online_title FROM tb_onlinestu WHERE online_author = '".$tid."'");
		while ($rob = mysql_fetch_array($b)) {
			if($name == $rob['online_title']){
				echo '2';//作业重复
				$flag = '1';
			}
		}
	}else{
		echo '0';//信息不全
		$flag = '1';
	}

	if($flag == 0){	
		echo '1';
		if(file_exists("homework/".iconv("UTF-8","GB2312",$teacher)."/")){

		}else{
			mkdir("homework/".iconv("UTF-8","GB2312",$teacher)."/");
		}
		mkdir("homework/".iconv("UTF-8","GB2312",$teacher)."/".iconv("UTF-8","GB2312",$time));
		mysql_query("INSERT into tb_onlinestu (online_author,online_title,course_id,yaoqiu,online_publishtime) VALUES ('".$tid."','".$name."','".$course."','".$yaoqiu."','".$time."')");
		$result_b = mysql_query("SELECT * FROM tb_onlinestu WHERE online_author = '".$tid."' order by online_id desc limit 0,1");
		while ($row_b = mysql_fetch_array($result_b)) {
			$online_id =  $row_b['online_id'];
		}
		
		$result = mysql_query("SELECT * FROM tb_choosecourse WHERE course_id = '".$course."'");
		while ($row = mysql_fetch_array($result)) {
			$student_id = $row['student_id'];
			mysql_query("INSERT into tb_worksub (student_id,online_id) VALUES ('".$student_id."','".$online_id."')");
		}
	}
?>