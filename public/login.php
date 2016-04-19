<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="utf-8">
    <title>登录</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login">
        <div class="login-head">
		    <div class="login-1">
			    <img src="img/logo.png"/>
	            <h1>师生互动</h1>
			</div>
	    </div>
		<div class="login-setion">
		    <form action="login_check.php" method="post">
			    <table>
				    <tr>
					    <td class="la-1">
						    邮箱
						</td>
						<td class="tian">
						    <input type="text"  name="username" placeholder="请输入用户名或邮箱" />
						</td>
					</tr>
					<tr>
					    <td class="la-2">
						    密码 
						</td>
						<td class="tian pp">
						    <input type="password" name="password" placeholder="请输入密码"/>
						</td>
					</tr>
					<tr class="hang-3">
					    <td colspan="2">
						   <input type="submit" name="submit" value="登录"/> 
						   <a href="#" class="a-kk">还没账号？</a>
						   <a href="#" class="a-kk">忘记密码？</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>








