<?php  

	date_default_timezone_set("PRC");
	error_reporting(0);
	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");

	$course = $_POST['course'];
	$student = $_POST['student'];
	$grade = $_POST['grade'];
	$teacher_id = $_POST['teacher'];

	if($course ==''||$student == ''||$grade == ''||$teacher_id==''){
		echo "0";
	}else{
		for ($i=0; $i < count($course); $i++) { 
		$result = mysql_query("SELECT * FROM tb_choosecourse WHERE teacher_id = '".$teacher_id."' AND course_id = '".$course[$i]."' AND student_id = '".$student[$i]."'");
		while ($row = mysql_fetch_array($result)) {
			$id =  $row['id'];
		}
		$result_a = mysql_query("UPDATE tb_choosecourse SET grade = '".$grade[$i]."' WHERE id = '".$id."'");
		}
		echo "1";
	}
	
	

?>