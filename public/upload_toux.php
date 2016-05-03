<?php 
	
	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");

	$username = $_COOKIE['username'];
	$img = $_POST['img'];
	$s = base64_decode(str_replace('data:image/png;base64,','', $img));
	if(file_exists('./photo_head/'.$username)){

	}else{
		mkdir('./photo_head/'.$username);
	}
	$src = './photo_head/'.$username.'/head.png';
	$state = file_put_contents($src, $s);
	$arr = array('state' => $state,'username' => $username);
	$data = json_encode($arr);

	$type = $_COOKIE['group'];
	$id = $_COOKIE['id'];
	// mysql_query("UPDATE ".$table." SET head_pic = '".$src."' WHERE '".$key."' = '".$id."'");
	if($type == 'student'){
		mysql_query("UPDATE tb_student SET head_pic = '".$src."' WHERE student_id = '".$id."'");
	}else{
		mysql_query("UPDATE tb_teacher SET head_pic = '".$src."' WHERE teacher_id = '".$id."'");
	}
	echo $data;

?>