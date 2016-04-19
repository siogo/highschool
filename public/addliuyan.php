<?php 
	
	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");

	if(isset($_COOKIE["username"])){
		$content = $_POST['content'];
		$pid = $_POST['pid'];
		$username = $_COOKIE['username'];
		$re = mysql_query("SELECT * FROM tb_student WHERE email = \"$username\"");
		while ($row = mysql_fetch_array($re)) {
			$uid = $row['student_id'];	
		}
		$time = time();
		echo '1';
		mysql_query("INSERT INTO tb_message (message_content,message_publish,para_id,user_id) VALUES ('".$content."','".$time."','".$pid."','".$uid."')");
	}else{
		echo "0";
	}

?>
