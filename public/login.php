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
		    <form name="login_form">
			    <table>
				    <tr>
					    <td class="la-1">
						    账号
						</td>
						<td class="tian">
						    <input type="text"  name="username" id="username" placeholder="请输入用户名或邮箱" />
						</td>
					</tr>
					<tr>
					    <td class="la-2">
						    密码 
						</td>
						<td class="tian pp">
						    <input type="password" name="password" id="password" placeholder="请输入密码"/>
						</td>
					</tr>
					<tr>
						<td class="tian check" id="radio">
							<input type="radio" name="group" value="teacher" onchange="radio_change();" />教师
							<input type="radio" name="group" value="student" onchange="radio_change();" checked="checked" />学生
						</td>
					</tr>
					<tr class="hang-3">
					    <td colspan="2">
						   <input type="button" name="submit" id="login" value="登录"/> 
						   <a href="register.php" class="a-kk">还没账号？</a>
						   <a href="reset.php" class="a-kk">忘记密码？</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
<script src="js/login.js"></script>
</body>
</html>








