<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>欢迎注册成为本系统用户</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header id="header">
	    <div class="sec">
		    <h1 class="logo">师生互动平台</h1>
			<nav class="link">
			    <ul class="o-nav">
			        <li><a href="index.php" class="s-bc">首页</a></li>
				    <li><a href="addarticle.php" class="f-bc">发布文章</a></li>				    
				    <li><a href="paragraph.php?page=1" class="w-bc">文章赏析</a></li>
				    <li><a href="setinfo.php" class="d-bc">个人中心</a></li>
			    </ul>
				<div class="dz">
				    <ul>
					   <li style="margin-left:50px"><a href="login.php">登录</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</header>
    <div id="content" style="background:#fff;width:998px;border:1px solid #333;">	
	    <div class="wk">
		    <form name="register_form">
			    <table class="wk-1">
				    <tr class="kc">
					    <td class="mc">
						    邮箱
						</td>
						<td class="kc-1">
						    <input type="text" name="email" id="email" placeholder="必填项" />
						</td>
					</tr>
					<tr class="kc">
					    <td class="mc">
						    密码
						</td>
						<td class="kc-1">
						    <input type="password" name="password1" id="pass" placeholder="必填项" />
						</td>
					</tr>
					<tr class="kc">
					    <td class="mc">
						    确认密码
						</td>
						<td class="kc-1">
						    <input type="password" name="password2" id="pass_confirm" placeholder="必填项" />
						</td>
					</tr>
					<tr class="kc">
					    <td class="mc">
						    类型
						</td>
						<td class="kc-1">
						    <div style="line-height:30px;" id="radio">
							    <input type="radio" name="group" value="teacher" class="b" onchange="radio_u();" />老师
								<input type="radio" name="group" value="student" class="g" onchange="radio_u();" checked="checked" />学生
							</div>
						</td>
					</tr>
					<tr class="kc">
					    <td class="mc">
						    姓名
						</td>
						<td class="kc-1">
						    <input type='text' name='user_name' id='user_name' placeholder='必须为真实姓名' />
						</td>
					</tr>
					<tr class="kc">
					    <td class="mc">
						    性别
						</td>
						<td class="kc-1">
						    <div style="line-height:30px;" id="sex">
							    <input type="radio" name="sex" onchange="radio_sex();" value="male" class="b" checked="checked" />男
								<input type="radio" name="sex" onchange="radio_sex();" value="famale" class="g"/>女
							</div>
						</td>
					</tr>
					<tr class="kc">
					    <td class="mc">
						    联系电话
						</td>
						<td class="kc-1">
						    <input type="text" name="tel" id="tel" placeholder="必填项" />
						</td>
					</tr>
					<tr class="tj">
					    <td colspan="2">
						    <input type="button" id="register" value="注册"/>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<footer>
	    <div class="footer">
		      Copyright @ Plain and Simple | Design by WangXiang
		</div>
	</footer>
	<script src="js/register.js" type="text/javascript"></script>
</body>
</html>