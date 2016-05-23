<?php
	header('Content-Type:text/html;charset=utf-8');	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{		
		include '../sys/connect.class.php';
		$con = new connect();
		$email = $_POST['email'];
		$match = "/\w+@(\w|\d)+\.\w{2,3}/i";
		if($email != '')
		{
			if(preg_match($match, $email))
			{				
				if($con->check_email($email))
				{
					setcookie('email', $email, time()+3600);			
					echo '{"success":"1"}';					
					die;
				}else{
					echo '{"success":"0"}';
					die;
				}				
			}
			if($con->check_email($email))
			{
				setcookie('email', $email, time()+3600);			
				echo '{"success":"1"}';				
				die;
			}else{
				echo '{"success":"0"}';
				die;	
			}
		}else{
			echo '{"success":"0"}';
			die;
		}
	}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>忘记密码</title>
	<link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header id="header">
	    <div class="sec">
		    <h1 class="logo">师生互动平台</h1>
		</div>
	</header>
    <div id="content" style="background:#fff">	
	    <div class="k">
		    <div class="wz">
			    当前位置：找回密码
			</div>
			<div class="return">
			    <a href="login.php">返回</a>
			</div>
			<div class="wjmm">
			    <div class="mm">
				    <img src="img/zhaohuimm.png" />
				</div>
                <div class="zh">
				    <form>
					     <label style="display:block;margin-bottom:20px;">
						     请填写你需要找回的帐号：
						 </label>
						 <input type="text" name="email" id="email" placeholder="请你输入用户名/邮箱" /><br/>
						 <input type="button" id="check_next" value="下一步" style="height:42px;width:404px;background:#3f89ec;color:#fff;border:none;margin-top:70px;" />
					</form>
                </div>				
			</div>
		</div>   
	</div>
	<!--<header>header</header>
	<section>section</section>-->
	<footer>
	    <div class="footer">
		      Copyright&nbsp;&#64;&nbsp;Plain and Simple&nbsp;&#124;&nbsp;Design by WangXiang
		</div>
	</footer>
<script>	
	var next = document.getElementById('check_next');
	var email = document.getElementById('email');

	next.onclick = function(){
		if(email.value != '')
		{
			var data = 'email='+email.value;	
		}else{
			alert('内容为空!');
			return;
		}
		
		var xhr = new XMLHttpRequest();
		xhr.open('POST', window.location.href, true);
		xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		xhr.send(data);

		xhr.onreadystatechange = function(){
			if(xhr.status==200 && xhr.readyState==4)
			{
				var json_obj = JSON.parse(xhr.responseText);
				
				if(json_obj.success == 0)
				{
					alert('错误的邮箱或用户名');					
				}else{
					window.location.href='resetnick.php';
				}
			}
		};
	};
</script>
</body>
</html>