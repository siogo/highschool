<?php 
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
					echo "<script>location.href=\"index.php\"</script>";
				}else{
					echo "<script>alert(\"邮箱或用户名或密码不正确，请重新输入\");location.href=\"login.php\"</script>";
				}
			}else{
				echo "<script>alert(\"邮箱或用户名或密码不正确，请重新输入\");location.href=\"login.php\"</script>";
			}
		}else{
			echo "<script>alert(\"邮箱不正确，请重新输入\");location.href=\"login.php\"</script>";
		}
	}else if($group == 'teacher'){
		$result = $check_class->check_email($username,$group);

		if($result !== false){
			if($check_class->check_password($result['password'], $password)){
				setcookie("username", $username);
				setcookie("is_login", "1");
				setcookie("group", $group);
				echo "<script>location.href=\"home_yes.php\"</script>";
			}else{
				echo "<script>alert(\"邮箱或用户名或密码不正确，请重新输入\");location.href=\"login.php\"</script>";
			}
		}else{
			echo "<script>alert(\"邮箱或用户名或密码不正确，请重新输入\");location.href=\"login.php\"</script>";
		}
	}
?>