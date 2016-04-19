<?php

	include 'function.php';
	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");

	$state = 0;
	$email = $_POST['email'];
	$email1 = $email;
	$pswd = $_POST['password1'];
	$pswda = $_POST['password2'];
	$type = $_POST['type'];
	$sex = $_POST['sex'];
	$tel = $_POST['tel'];
	$nick_name = $_POST['nick_name'];
	$l = strlen($pswd);
	
	//判断邮箱格式是否正确
	$result = isemail($email);
	if(!$result){
		echo "<script>";
		echo "alert(\"邮箱格式错误\"); ";
		//echo "window.location.href ='http://127.0.0.1/zztest/zhuce.html';";
		echo "window.history.go(-1)";
		echo "</script>";
		exit();
	}
	
	//判断密码是否错误
	if($pswd != $pswda){
		echo "<script>";
		echo "alert(\"两次密码输入不一致\"); ";
		//echo "window.location.href ='http://127.0.0.1/zztest/zhuce.html';";
		echo "window.history.go(-1)";
		echo "</script>";
		exit();
	}

	//判断密码位数
	if(strlen($pswd) < 6){
		echo "<script>";
		echo "alert(\"密码太短请重新输入\"); ";
		//echo "window.location.href ='http://127.0.0.1/zztest/zhuce.html';";
		echo "window.history.go(-1)";
		echo "</script>";
		exit();
	}

	
	//判断邮箱是否重复
	
	if($type == 'student'){
		$haemail = mysql_query("SELECT * FROM tb_student WHERE Email = '".$email."'");
		while($roa = mysql_fetch_array($haemail)){
			$state = 1;
		}
	}
	
	if($type == 'teacher'){
		echo $email;
		$email = mysql_query("SELECT * FROM tb_teacher WHERE Account = '".$email."'");
		while($rob = mysql_fetch_array($email)){
			$state = 1;
		}
	}

	if($state == 1){
		echo "<script>";
		echo "alert(\"此邮箱已经被注册过！\"); ";
		//echo "window.location.href ='http://127.0.0.1/zztest/zhuce.html';";
		echo "window.history.go(-1)";
		echo "</script>";
	}
	//注册成功
	if($state == 0){
		if($type == 'student'){
			mysql_query("INSERT into tb_student (email,password,sex,tel) VALUES ('".$email."','".md5($pswd)."','".$sex."','".$tel."')");
			echo "<script>";
			echo "alert(\"注册成功！\"); ";
			echo "window.location.href ='http://127.0.0.1/bs/homework/homework/public/login.html';";
			echo "</script>";
		}
		if($type == 'teacher'){
			mysql_query("INSERT into tb_teacher (Account,Password,Sex,Tel) VALUES ('".$email1."','".md5($pswd)."','".$sex."','".$tel."')");
			echo "INSERT into tb_teacher (Account,Password,Sex,Tel) VALUES ('".$email1."','".md5($pswd)."','".$sex."','".$tel."')";
			echo "注册成功";
		}
	}
?>