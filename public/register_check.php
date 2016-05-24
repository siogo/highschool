<?php
	date_default_timezone_set("PRC");
	error_reporting(0);
	require_once('../sys/connect.class.php');
	$con = new connect();
	$score = 0;
	// $email = $_POST['email'];
	// $password = $_POST['password'];
	// $pass_confirm = $_POST['pass_confirm'];
	// $name = $_POST['name'];
	// $sex = $_POST['sex'];
	// $group = $_POST['group'];
	// $telephone = $_POST['telephone'];

	function password($password='')
	{
		$password = $password == ''?$_POST['password']:$password;
		if(isset($_POST['pass_confirm']))
		{
			$pass_confirm = $_POST['pass_confirm'];
			if($pass_confirm != $password)
			{
				echo '{"msg":"两次输入不匹配","success":"0"}';
				die;
			}else{
				echo '{"msg":"密码匹配成功","success":"1"}';
				die;
			}
		}		
		global $score;
		if(preg_match("/[0-9]+/", $password))
		{
			$score++;
		}
		if(preg_match("/[0-9]{3,}/", $password))
		{
			$score++;
		}
		if(preg_match("/[a-z]+/", $password))
		{
			$score++;
		}
		if(preg_match("/[a-z]{3,}/", $password))
		{
			$score++;
		}
		if(preg_match("/[A-Z]+/", $password))
		{
			$score++;
		}
		if(preg_match("/[A-Z]{3,}/", $password))
		{
			$score++;
		}
		if(preg_match("/[_|\-|+|=|*|!|@|#|$|%|^|&|(|)]+/", $password))
		{
			$score+=2;
		}
		if(preg_match("/[_|\-|+|=|*|!|@|#|$|%|^|&|(|)]{3,}/",$password))
        {
            $score ++ ; 
        }
		if(strlen($password) < 8)
		{
			//echo '{"msg":"密码位数小于8位","success":"0","strong":"'.$score.'"}';
			echo '{"msg":"密码位数小于8位","success":"0","strong":"'.$score.'"}';
			die;
		}
		if($score >= 6)
		{
			echo '{"msg":"恭喜密码强度良好","success":"1","strong":"'.$score.'"}';
			die;
		}
	}

	function email($email='')
	{
		$email = $email == ''?$_POST['email']:$email;
		$match = "/\w+@(\w|\d)+\.\w{2,3}/i";
		if(preg_match($match, $email))
		{
			echo '{"msg":"邮箱格式正确","success":"1"}';
			return true;
		}else{
			echo '{"msg":"邮箱格式不正确","success":"0"}';
			die;
		}
	}

	if(($fun=strpos($_SERVER['REQUEST_URI'], '?')) != -1)
	{				
		$function = substr($_SERVER['REQUEST_URI'], $fun+1, 10);
		// if($function != 'telephone')
		// {
		// 	die;
		// }		
		$function();
	}

	function telephone($telephone='')
	{
		$telephone = $telephone == ''?$_POST['telephone']:$telephone;
		if(strlen($telephone) < 11)
		{
			echo '{"msg":"不是一个手机号,手机号码需要11位","success":"0"}';
			die;
		}
		if(strlen($telephone) > 11)
		{
			echo '{"msg":"手机号码超过11位","success":"0"}';
			die;
		}
		$head_three = substr($telephone, 0, 2);		
		if(preg_match("/(13|15|18)/", $head_three))
		{			
			echo '{"msg":"手机号有效","success":"1"}';
			die;
		}else{
			echo '{"msg":"不是一个有效的手机号","success":"0"}';
			die;
		}
	}
	
	function register()
	{
		global $score;		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$f_email = $_POST['f_email'];
			$f_pass = $_POST['f_pass'];
			$f_tel = $_POST['f_tel'];
			$f_pass_comfirm = $_POST['f_pass_comfirm'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$name = $_POST['name'];
			$sex = $_POST['sex'];
			$group = $_POST['group'];
			$telephone = $_POST['telephone'];
			$pass_confirm = $_POST['pass_confirm'];
			if($email == '')
			{
				if(!$f_email)
				{
					echo '{"msg":"非法的邮箱或为空","success":"0","strong":"'.$score.'"}';
					die;
				}
			}else{
				$match = "/\w+@(\w|\d)+\.\w{2,3}/i";
				
				if(!preg_match($match, $email))
				{					
					echo '{"msg":"非法的邮箱或为空","success":"0","strong":"'.$score.'"}';
					die;
				}
			}

			if($password == '')
			{
				if(!$f_pass)
				{				
					echo '{"msg":"密码为空或密码强度不足","success":"0","strong":"'.$score.'"}';
					die;	
				}
			}else{					
				global $score;
				if(preg_match("/[0-9]+/", $password))
				{
					$score++;
				}
				if(preg_match("/[0-9]{3,}/", $password))
				{
					$score++;
				}
				if(preg_match("/[a-z]+/", $password))
				{
					$score++;
				}
				if(preg_match("/[a-z]{3,}/", $password))
				{
					$score++;
				}
				if(preg_match("/[A-Z]+/", $password))
				{
					$score++;
				}
				if(preg_match("/[A-Z]{3,}/", $password))
				{
					$score++;
				}
				if(preg_match("/[_|\-|+|=|*|!|@|#|$|%|^|&|(|)]+/", $password))
				{
					$score+=2;
				}
				if(preg_match("/[_|\-|+|=|*|!|@|#|$|%|^|&|(|)]{3,}/",$password))
		        {
		            $score ++ ; 
		        }
		        if($score < 6)
		        {
		        	echo '{"msg":"密码强度不足","success":"0","strong":"'.$score.'"}';
					die;
		        }
			}

			if($pass_confirm == '')
			{
				if(!$f_pass_comfirm)
				{
					echo '{"msg":"密码不匹配","success":"0","strong":"'.$score.'"}';
					die;
				}
			}else{
				if($password != $pass_confirm)
				{
					echo '{"msg":"密码不匹配","success":"0","strong":"'.$score.'"}';
					die;
				}
			}
			
			if($name == '')
			{
				echo '{"msg":"姓名为空","success":"0","strong":"'.$score.'"}';
				die;
			}

			if($telephone == '')
			{
				if(!$f_tel)
				{
					echo '{"msg":"手机号不正确或手机号为空","success":"0","strong":"'.$score.'"}';
					die;
				}
			}else{
				if(strlen($telephone) < 11)
				{
					echo '{"msg":"不是一个手机号,手机号码需要11位","success":"0"}';
					die;
				}
				if(strlen($telephone) > 11)
				{
					echo '{"msg":"手机号码超过11位","success":"0"}';
					die;
				}
				$head_three = substr($telephone, 0, 2);		
				if(!preg_match("/(13|15|18)/", $head_three))
				{			
					echo '{"msg":"不是一个有效的手机号","success":"0"}';
					die;
				}
			}

			if($group=='student'){
				global $con;
				
				$result = $con->select('tb_student','email',$email);

				if($result != false){
					if($result[0]['email'] == $email){
						echo '{"msg":"邮箱重复,请重新填写","success":"0"}';
						die;
					}
				}else{
					$password = md5($password);
					$key = array(
						'password',
						'chinese_name',
						'sex',
						'tel',
						'email',
					);
					$data = array(
						$password,
						$name,
						$sex,
						$telephone,
						$email,
					);
					$bool = $con->insert('tb_student',$key,$data);						
					if(!$bool){
						echo '{"msg":"插入失败","success":"0"}';
						die;
					}else{
						echo '{"msg":"\r\r\r恭喜你,注册成功\r\n\r\n是否跳转到登录页面","success":"1"}';
						die;
					}
				}			
			}
			if($group == 'teacher'){					
				$result = $con->select('tb_teacher','email',$email);
				if($result != false)
				{
					if($result[0]['email'] == $email){
						echo '{"msg":"邮箱重复,请重新填写","success":"0"}';
						die;
					}else{

					}
				}else{
					$password = md5($password);
					$key = array(
						'password',
						'chinese_name',
						'sex',
						'tel',
						'account',
					);
					$data = array(
						$password,
						$name,
						$sex,
						$telephone,
						$email,
					);
					$bool = $con->insert('tb_teacher',$key,$data);						
					if(!$bool){
						echo '{"msg":"插入失败","success":"0"}';
						die;
					}else{
						echo '{"msg":"\r\r\r恭喜你,注册成功\r\n\r\n是否跳转到登录页面","success":"1"}';
						die;
					}
				}					
			}
		}
	}	
?>