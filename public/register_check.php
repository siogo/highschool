<?php
	date_default_timezone_set("PRC");
	error_reporting(0);
	require_once('../sys/connect.class.php');
	$con = new connect();
	$email = $_POST['email'];
	$password = $_POST['password'];
	$pass_confirm = $_POST['pass_confirm'];
	$name = $_POST['name'];
	$sex = $_POST['sex'];
	$group = $_POST['group'];
	$telephone = $_POST['telephone'];

	$match = "/\w+@(\w|\d)+\.\w{2,3}/i";
	if(preg_match($match, $email)){
		if($password != $pass_confirm){
			echo '{"msg":"密码输入不匹配","success":"0"}';
		}else{
			if($name==''||$sex==''||$group==''||$telephone==''||$password==''||$pass_confirm==''){
				echo '{"msg":"必填项为空","success":"0"}';
			}else{
				if($group=='student'){
					$result = $con->select('tb_student','email',$email);
					if($result != false){
						if($result[0]['email'] == $email){
							echo '{"msg":"邮箱重复,请重新填写","success":"0"}';
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
						}else{
							echo '{"msg":"\r\r\r恭喜你,注册成功\r\n\r\n是否跳转到登录页面","success":"1"}';
						}
					}			
				}
				if($group == 'teacher'){					
					$result = $con->select('tb_teacher','email',$email);
					if($result != false)
					{
						if($result[0]['email'] == $email){
							echo '{"msg":"邮箱重复,请重新填写","success":"0"}';
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
						}else{
							echo '{"msg":"\r\r\r恭喜你,注册成功\r\n\r\n是否跳转到登录页面","success":"1"}';
						}
					}					
				}
			}
		}
	}else{
		echo '{"msg":"当前邮箱不合法","success":"0"}';
	}
?>