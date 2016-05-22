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
					echo '<script>window.location.href="resetnick.php";</script>';
					//include 'resetnick.php';
					die;
				}else{
					echo "<script>alert('更新失败');</script>";
				}				
			}
			if($con->check_email($email))
			{
				setcookie('email', $email, time()+3600);			
				echo '<script>window.location.href="resetnick.php";</script>';
				//include 'resetnick.php';
				die;
			}
		}else{
			echo '<script>alert("内容为空");window.location.href="reset.php";</script>';
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
				    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					     <label style="display:block;margin-bottom:20px;">
						     请填写你需要找回的帐号：
						 </label>
						 <input type="text" name="email" placeholder="请你输入用户名/邮箱" /><br/>
						 <input type="submit" value="下一步" style="height:42px;width:404px;background:#3f89ec;color:#fff;border:none;margin-top:70px;" />
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
</body>
</html>















