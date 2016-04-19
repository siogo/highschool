<?php 
	include "../sys/connect.class.php";
	include "../sys/login.class.php";

	session_start();
	
	if(isset($_POST["username"])){
		$username = htmlspecialchars($_POST["username"]);
	}
	if(isset($_POST["password"])){
		$password = htmlspecialchars($_POST["password"]);
	}
	//setcookie("zan", 1);
	$_SESSION['username'] = $username;
	$connect_class = new connect;
	$check_class = new check;

	if(isset($username) && !empty($username)){
		if(strpos($username,"@") !== false){
			$result = $check_class->check_email($username);
			if($result !== false){
				if($check_class->check_password($result['password'], $password)){
					setcookie("username", $username);
					setcookie("is_login", "1");
					echo "<script>location.href=\"home_yes.php\"</script>";
				}else{
					echo "<script>alert(\"邮箱或用户名或密码不正确，请重新输入\");location.href=\"login.php\"</script>";
				}
			}else{
				echo "<script>alert(\"邮箱或用户名或密码不正确，请重新输入\");location.href=\"login.php\"</script>";
			}
		}else{
			if($check_class->check_username($username)){
				if($check_class->check_password($username, $password)){
					setcookie("username", $username);
					setcookie("is_login", "1");
					echo "<script>location.href=\"home_yes.php\"</script>";
				}else{
					echo "<script>alert(\"邮箱或用户名或密码不正确，请重新输入\");location.href=\"login.php\"</script>";
				}
			}else{
				echo "<script>alert(\"邮箱或用户名或密码不正确，请重新输入\");location.href=\"login.php\"</script>";
			}
		}
	}else{
		echo "<script>location.href=\"login.php\";</script>";
	}
?>