<?php
	header('Content-Type:text/html;charset=utf-8');
	error_reporting(0);
	if(isset($_COOKIE) && $_COOKIE['email'] != '')
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{		
			include '../sys/connect.class.php';
			$con = new connect();		
			$phone = $_POST['phone_number'];
			$email = $_COOKIE['email'];

			if($con->check_phone($email, $phone))
			{
				setcookie('nickcheck', 1, time()+3600);						
				echo '{"success":"1"}';
				die;
			}else{
				echo '{"success":"0"}';
				die;
			}
		}
	}else{
		echo '<script>window.location.href="reset.php"</script>';
		die;
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
				    <form>
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
						<input type="text" name="phone_number" id="phone" placeholder="请输入手机号码" style="width:250px;"/>
						<br/>
						 <input type="button" value="下一步" id="next" style="height:42px;width:404px;background:#3f89ec;color:#fff;border:none;margin-top:70px;" />
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
		var next = document.getElementById('next');
		var phone = document.getElementById('phone');

		next.onclick = function (){
			if(phone.value == '')
			{
				alert('手机号为空');
				return;
			}else{
				var data = 'phone_number='+phone.value;
			}

			var xhr = new XMLHttpRequest();

			xhr.open('POST', window.location.href, true);
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.send(data);

			xhr.onreadystatechange = function(){
				if(xhr.status == 200 && xhr.readyState == 4)
				{
					var json_obj = JSON.parse(xhr.responseText);
					if(json_obj.success == 0)
					{
						alert('错误的手机号!');
					}else{
						window.location.href = 'resetpwd.php';
					}
				}
			};
		};
	</script>
</body>
</html>















