<?php 
	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");

	$username = $_COOKIE['username'];
	$type = $_POST['type'];
	$group = $_POST['group'];
	
	if ($group == 'student') {
		if($type == 'pawd'){
			$l = strlen($_POST['password_new']);
			if($l >= 8){
				$password_old = md5($_POST['password_old']);
				$password_new = md5($_POST['password_new']);
				$result = mysql_query("SELECT * FROM tb_student WHERE email = '".$username."'");
				while ($row = mysql_fetch_array($result)) {
					$password = $row['password'];
					if($password != $password_old){
						echo '0';
					}else{
						mysql_query("UPDATE tb_student SET password = '".$password_new."' WHERE email = '".$username."'");
						echo '1';
					}
				}
			}else{
				echo '2';
			}
		}
		if($type == 'msg'){
			$nickname = $_POST['nickname'];
			$tel = $_POST['tel'];
			$sex = $_POST['sex'];
			$text = $_POST['text'];
			mysql_query("UPDATE tb_student SET chinese_name = '".$nickname."' ,tel = '".$tel."' ,sex = '".$sex."' ,remark = '".$text."' WHERE email = '".$username."'");
			echo '1';
		}
	}else{
		if($type == 'pawd'){
			$l = strlen($_POST['password_new']);
			if($l >= 8){
				$password_old = md5($_POST['password_old']);
				$password_new = md5($_POST['password_new']);
				$result = mysql_query("SELECT * FROM tb_teacher WHERE account = '".$username."'");
				while ($row = mysql_fetch_array($result)) {
					$password = $row['password'];
					if($password != $password_old){
						echo '0';
					}else{
						mysql_query("UPDATE tb_teacher SET password = '".$password_new."' WHERE account = '".$username."'");
						echo '1';
					}
				}
			}else{
				echo '2';
			}
		}
		if($type == 'msg'){
			$nickname = $_POST['nickname'];
			$tel = $_POST['tel'];
			$sex = $_POST['sex'];
			$text = $_POST['text'];
			mysql_query("UPDATE tb_teacher SET chinese_name = '".$nickname."' ,tel = '".$tel."' ,sex = '".$sex."' ,remark = '".$text."' WHERE account = '".$username."'");
			echo '1';
		}
	}
?>