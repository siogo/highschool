<?php 
	date_default_timezone_set("PRC");
	error_reporting(0);
	include "../sys/connect.class.php";
	include "../sys/login.class.php";

	session_start();	

	if(isset($_POST["username"])){
		$username = htmlspecialchars($_POST["username"]);
		$_SESSION['username'] = $username;
	}else{
		$username = '';
	}
	if(isset($_POST["password"])){
		$password = htmlspecialchars($_POST["password"]);
	}else{
		$password = '';
	}
	if($_POST['group'] == 'student' || $_POST['group'] == 'teacher'){
		$group = $_POST['group'];
	}else{
		$group = '';
	}
	//setcookie("zan", 1);
	$connect_class = new connect;
	$check_class = new check;

	if($group == 'student'){
		if(strpos($username, "@") !== false)
		{
			$result = $check_class->check_email($username,$group);
			if($result !== false){
				if($check_class->check_password($result['password'], $password)){
					setcookie("username", $username);
					setcookie("is_login", "1");
					setcookie("group", $group);
					setcookie("id", $result['student_id']);	
					setcookie("name",$result['chinese_name']);				
					echo '{"success":"1","msg":"登录成功"}';
				}else{
					echo '{"success":"0","msg":"登录失败,用户名或密码错误"}';
				}
			}else{
				echo '{"success":"0","msg":"登录失败,用户名或密码错误"}';
			}
		}else{
			echo '{"success":"0","msg":"登录失败,用户名或密码错误"}';
		}
	}else if($group == 'teacher'){
		$result = $check_class->check_email($username,$group);
		if($result !== false){
			if($check_class->check_password($result['password'], $password)){
				setcookie("username", $username);
				setcookie("is_login", "1");
				setcookie("group", $group);
				setcookie("id", $result['teacher_id']);
				setcookie("name",$result['chinese_name']);
				echo '{"success":"1","msg":"登录成功"}';
			}else{
				echo '{"success":"0","msg":"登录失败,用户名或密码错误"}';
			}
		}else{
			echo '{"success":"0","msg":"登录失败,用户名或密码错误"}';
		}
	}
?>