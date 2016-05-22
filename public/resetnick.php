<?php
	header('Content-Type:text/html;charset=utf-8');	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{		
		include '../sys/connect.class.php';
		$con = new connect();		
		$phone = $_POST['phone_number'];
		$email = $_COOKIE['email'];

		if($con->check_phone($email, $phone))
		{
			//setcookie('phone', $email, time()+3600);						
			echo '<script>window.location.href="resetpwd.php";</script>';
			die;
		}else{
			echo "<script>alert('手机号不正确,请重新输入');</script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>安全验证</title>
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
			    <a href="reset.php">返回</a>
			</div>
			<div class="wjmm">
			    <div class="mm">
				    <img src="img/anquan.png" />
				</div>
                <div class="zh">
				    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					    <div style="margin-bottom:20px;font-size:12px;">
						    为了你的帐号安全，请完成身份验证：
						</div>
						<label style="display:block;margin-bottom:20px;font-weight:bold">
						    邮箱验证：
						</label>
						<label style="margin-left:30px;">邮箱：</label>
                        <div style="display:inline-block">
						    <?php if(isset($_COOKIE)){echo $_COOKIE['email'];}else{echo '';} ?>
						</div>
						<br/>
						<label style="display:block;margin-bottom:20px;margin-top:30px;font-weight:bold">
						    手机号码：
						</label>
						<input type="text" name="phone_number" placeholder="请输入手机号码" style="width:250px;"/>
						<br/>
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















