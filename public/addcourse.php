<?php  
	date_default_timezone_set("PRC");
	error_reporting(0);
	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");

	$course_name = $_POST['course_name'];
	$course_type = $_POST['type'];
	$credits = $_POST['credits'];
	$classroom = $_POST['classroom'];
	$time = $_POST['time'];
	$jieshu = $_POST['jieshu'];	
	$flag = '0';
	//$teacher_id = '1';    //找教师的id;
	$teacher = $_COOKIE['id'];

	if($course_name&&$course_type&&$credits&&$classroom&&$time&&$jieshu){
		$result = mysql_query("SELECT course_name FROM tb_course WHERE teacher = '".$teacher."'");
		while ($row = mysql_fetch_array($result)) {
			if($row['course_name'] == $course_name){
				echo '2'; //课程重复；
				$flag = '1';
			}
		}
		$re = mysql_query("SELECT classroom,ctime FROM tb_course WHERE week = '".$time."'");
		while ($roa = mysql_fetch_array($re)) {
			if($roa['classroom'] == $classroom && $roa['ctime'] == $jieshu){
				echo '3';  //教室重复
				$flag = '1';
			}
		}
		if($flag == '0'){
			mysql_query("INSERT into tb_course (course_name,course_type,credits,classroom,week,ctime,teacher) VALUES ('".$course_name."','".$course_type."','".$credits."','".$classroom."','".$time."','".$jieshu."','".$teacher."')");
			echo '1';      //添加成功
		}
	}else{
		echo '0';          //添加失败
	}
?>
