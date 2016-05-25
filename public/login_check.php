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
	$num6 = '';
	$data = 'abcdefghijklmnopqrstuvwsyz0123456789@#$%^*()_+';
	for($i=0;$i<6;$i++)
	{
		$num6 .= substr($data, mt_rand(0, strlen($data)-1), 1);
	}
	$passport = md5($num6);
	//setcookie("zan", 1);
	$connect_class = new connect;
	$check_class = new check;

	if($group == 'student'){
		if(strpos($username, "@") !== false)
		{
			$result = $check_class->get_email($username,$group);			
			if($result !== false){
				if($check_class->get_password($result['password'], $password)){
					setcookie("username", $username, time()+3600);
					setcookie("is_login", "1", time()+3600);
					setcookie("group", $group, time()+3600);
					setcookie("id", $result['student_id'], time()+3600);	
					setcookie("name", $result['chinese_name'], time()+3600);
					setcookie("passport", $passport, time()+3600);
					$_SESSION['passport'] = $passport;				
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
		$result = $check_class->get_email($username,$group);
		if($result !== false){
			if($check_class->get_password($result['password'], $password)){
				setcookie("username", $username);
				setcookie("is_login", "1");
				setcookie("group", $group);
				setcookie("id", $result['teacher_id']);
				setcookie("name",$result['chinese_name']);
				$_SESSION['passport'] = $passport;
				echo '{"success":"1","msg":"登录成功"}';
			}else{
				echo '{"success":"0","msg":"登录失败,用户名或密码错误"}';
			}
		}else{
			echo '{"success":"0","msg":"登录失败,用户名或密码错误"}';
		}
	}
?>