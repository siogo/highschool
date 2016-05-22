<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>我的课表</title>
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
					<?php
						if(isset($_COOKIE["username"])){
							echo "<div class=\"dlz\">Hi:<a href=\"setinfo.php\"><span>".$_COOKIE["username"]." </span></a><a href=\"logout.php\">[退出]</a></div>";
						}else{
					?>
					   <li><a href="login.php">登录</a></li>
					   <li><a href="register.php">注册</a></li>
					<?php
						}
					?>
					</ul>
				</div>
			</nav>
		</div>
	</header>
    <div id="content" style="background:#fff;border:1px solid #333;width:998px">	
	    <div class="k">
		    <div class="wz">
			    当前位置：我的课表
			</div>
			<div class="return">
			    <a href="javascript:history.go(-1);location.reload()">返回</a>
			</div>
			<div class="course">
			    <div class="course-1">
				    <table border="1" cellspacing="0" cellpadding="0" bgcolor="#9edaf7" style="border-style:none">
					    <tr style="height:50px;">
						    <th colspan="2" style="border:1px solid #fff"></th>
							<th class="t">星期一</th>
							<th class="t">星期二</th>
							<th class="t">星期三</th>
							<th class="t">星期四</th>
							<th class="t">星期五</th>
						</tr>  
						<tr>
						    <td rowspan="4" class="t-2"><b>上午</b></td>
							<td class="t-4">第一节（08:00-09:00）</td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
						</tr>  
						<tr>
						    <td class="t-4">第一节（09:05-09:50）</td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
						</tr>  
						<tr>
						    <td class="t-4">第二节（10:05-10:50）</td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
						</tr>  
						<tr>
						    <td class="t-4">第二节（10:55-11:40）</td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
						</tr>  
					</table>
				</div>
				
				<div class="course-1" style="margin-top:10px">
				    <table border="1" cellspacing="0" cellpadding="0" bgcolor="#9edaf7" style="border-style:none">  
						<tr>
						    <td rowspan="4" class="t-2"><b>下午</b></td>
							<td class="t-4">第三节（14:00-14:45）</td>
							<td class="t-3 t"></td>
							<td class="t-3 t"></td>
							<td class="t-3 t"></td>
							<td class="t-3 t"></td>
							<td class="t-3 t"></td>
						</tr>  
						<tr>
						    <td class="t-4">第三节（14:50-15:35）</td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
						</tr>  
						<tr>
						    <td class="t-4">第四节（15:50-16:35）</td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
						</tr>  
						<tr>
						    <td class="t-4">第四节（16:40-17:25）</td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
						</tr>  
					</table>
				</div>
				
				<div class="course-1" style="margin-top:10px">
				    <table border="1" cellspacing="0" cellpadding="0" bgcolor="#9edaf7" style="border-style:none">  
						<tr>
						    <td rowspan="4" class="t-2"><b>晚上</b></td>
							<td class="t-4">第五节（18:30-19:15）</td>
							<td class="t-3 t"></td>
							<td class="t-3 t"></td>
							<td class="t-3 t"></td>
							<td class="t-3 t"></td>
							<td class="t-3 t"></td>
							
						</tr>  
						<tr>
						    <td class="t-4">第五节（19:20-20:05）</td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							
						</tr>  
						<tr>
						    <td class="t-4">第五节（20:15-21:00）</td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							<td class="t-3"></td>
							
						</tr>  
					</table>
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








