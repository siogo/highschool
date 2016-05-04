<?php  

	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");

	$name = $_POST['name'];
	$course = $_POST['course'];
	$tid = $_COOKIE['id'];
	$teacher = $_COOKIE['username'];
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
		mkdir("homework/".iconv("UTF-8","GB2312",$teacher)."/".iconv("UTF-8","GB2312",$name));
		mysql_query("INSERT into tb_onlinestu (online_author,online_title,course_id) VALUES ('".$tid."','".$name."','".$course."')");
	}
?>