<?php  
	date_default_timezone_set("PRC");
	error_reporting(0);
	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");

	$course = $_POST['course'];
	$teacher = $_POST['teacher'];
	$course_id = explode(',',$course);
	$teacher_id = explode(',',$teacher);
	$student_id = $_COOKIE['id'];
	$length = count($course_id);
	$time = time();
	
	// $result = mysql_query("SELECT * FROM tb_choosecourse WHERE student_id = '".$student_id."'");
	// while ($row = mysql_fetch_array($result)) {
	// 	for ($i=0; $i < $length; $i++) { 
	// 		if($course_id == $row['course_id']){
	// 			echo $course_id;
	// 			continue;
	// 		}
	// 	}
	// }
	for ($i=0; $i < $length; $i++) { 
		$result = mysql_query("SELECT * FROM tb_course WHERE course_id = '".$course_id[$i]."'");
		while ($row = mysql_fetch_array($result)) {
			$type = $row['course_type'];
		}
		mysql_query("INSERT INTO tb_choosecourse (course_id,student_id,choosetime,teacher_id,type) VALUES ('".$course_id[$i]."','".$student_id."','".$time."','".$teacher_id[$i]."','".$type."')");
	}
	echo '1';
?>