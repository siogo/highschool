<?php

	header('Content-Type:text/html;charset=utf-8');	
	error_reporting(0);
	if(isset($_COOKIE) && $_COOKIE['nickcheck'] != '')
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			include '../sys/connect.class.php';
			$con = new connect();
			$newpwd = $_POST['newpwd'];
			$comfirm = $_POST['comfirm'];
			$email = $_COOKIE['email'];
			if($newpwd != $comfirm)
			{
				echo '{"success":"0"}';
				die;
			}else{			
				if($con->update_pwd($email, $newpwd))
				{
					echo '{"success":"1"}';
					die;
				}else{
					echo '{"success":"0"}';
					die;
				}
			}
		}
	}else{
		echo '<script>window.location.href="resetnick.php"</script>';
		die;
	}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>重置密码</title>
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
				    <img src="img/chongz.png" />
				</div>
                <div class="zh">
				    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					    <div style="margin-bottom:40px;">
					        <label style="margin-bottom:20px;">
						       新密码：
						    </label>
						    <input type="password" name="newpwd" id="newpwd" style="margin-left:32px;"/>
						</div>
						<div>
						    <label style="margin-bottom:20px;">
						        确认新密码：
						    </label>
						    <input type="password" id="comfirm" name="comfirm" />
						</div>
						<input type="button" id="next" value="确定" style="height:42px;width:404px;background:#3f89ec;color:#fff;border:none;margin-top:60px;margin-left:105px;" />
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
		var newpwd = document.getElementById('newpwd');
		var comfirm = document.getElementById('comfirm');

		next.onclick = function (){
			if(newpwd == '' && comfirm == '')
			{
				alert('内容为空!');
				return;
			}else{
				var data = 'newpwd='+newpwd.value+'&comfirm='+comfirm.value;
			}

			var xhr = new XMLHttpRequest();

			xhr.open('POST', window.location.href, true);
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.send(data);

			xhr.onreadystatechange = function(){
				if(xhr.status == 200 && xhr.readyState == 4)
				{
					var json_obj = JSON.parse(xhr.responseText);

					if(json_obj.success == 0){
						alert('两次密码输入不正确');						
					}else{
						alert('恭喜,密码修改成功!\r\n请使用新密码登录');
						window.location.href = 'logout.php';
					}
				}
			};
		};
	</script>
</body>
</html>















