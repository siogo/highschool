<?php  
	
	date_default_timezone_set("PRC");
	error_reporting(0);
	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");

?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>成绩打分</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header id="header">
	    <div class="sec">
		    <h1 class="logo">师生互动平台</h1>
			<nav class="link">
			    <ul class="o-nav">
			        <li class="active"><a href="###" class="s-bc">首页</a></li>
				    <li><a href="addarticle.php" class="f-bc">发布文章</a></li>				    
				    <li><a href="paragraph.php?page=1" class="w-bc">文章赏析</a></li>
				    <li><a href="setinfo.php" class="d-bc">个人中心</a></li>
			    </ul>
				<div class="dz">
				    <ul>
					<?php
						if(isset($_COOKIE["name"])){	
							echo "<div class=\"dlz\">Hi:<a href=\"setinfo.php\"><span id=\"user\" style=\"display:none\">".$_COOKIE["username"]."</span>".$_COOKIE["name"]." </a><a href=\"logout.php\">[退出]</a></div>";
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
    <div id="content" style="width:998px;border:1px solid #333;height:530px;padding:0">	
	    <div class="wk zylb" style="background:#fff;">
		    <div class="wz">
			    当前位置:管理作业
			</div>
		    <div class="return">
			    <a href="#" style=" color:#333">返回</a>
			</div>
			<form style="text-align:center;">
			    <div class="cj" style="text-align:center;">
				    <div class="cjlb" style="float:none;margin:0 auto">
				        <table border="1">
					        <tr>
						        <th style="width:150px">课程号</th>
							    <th>课程名</th>
							    <th style="width:150px">学号</th>
							    <th style="width:150px">姓名</th>
							    <th style="width:90px">成绩</th>
						    </tr>
						    <tr>
						        <td>课程号</td>
							    <td>毛泽东思想和中国特色社会主义理论体系概论</td>
							    <td>学分</td>
							    <td>必修</td>
							    <td>
								  <input type="text"  style="border:none;outline:none;width:60px;"/></td>
						    </tr>
							<tr>
						        <td>课程号</td>
							    <td>毛泽东思想和中国特色社会主义理论体系概论</td>
							    <td>号</td>
							    <td>姓名</td>
							    <td>
								  <input type="text"  style="border:none;outline:none;width:60px;"/></td>
						    </tr>
							<tr>
						        <td>课程号</td>
							    <td>毛泽东思想和中国特色社会主义理论体系概论</td>
							    <td>学号</td>
							    <td>姓名</td>
							    <td>
								  <input type="text"  style="border:none;outline:none;width:60px;"/></td>
						    </tr>
							<tr>
						        <td>课程号</td>
							    <td>毛泽东思想和中国特色社会主义理论体系概论</td>
							    <td>学号</td>
							    <td>姓名</td>
							    <td>
								  <input type="text"  style="border:none;outline:none;width:60px;"/></td>
						    </tr>
							<tr>
						        <td>课程号</td>
							    <td>毛泽东思想和中国特色社会主义理论体系概论</td>
							    <td>学号</td>
							    <td>姓名</td>
							    <td>
								  <input type="text"  style="border:none;outline:none;width:60px;"/></td>
						    </tr>
							<tr>
						        <td>课程号</td>
							    <td>毛泽东思想和中国特色社会主义理论体系概论</td>
							    <td>学号</td>
							    <td>姓名</td>
							    <td>
								  <input type="text"  style="border:none;outline:none;width:60px;"/></td>
						    </tr>
							<tr>
						        <td>课程号</td>
							    <td>毛泽东思想和中国特色社会主义理论体系概论</td>
							    <td>学号</td>
							    <td>姓名</td>
							    <td>
								  <input type="text"  style="border:none;outline:none;width:60px;"/></td>
						    </tr>
							<tr>
						        <td>课程号</td>
							    <td>毛泽东思想和中国特色社会主义理论体系概论</td>
							    <td>学号</td>
							    <td>姓名</td>
							    <td>
								  <input type="text"  style="border:none;outline:none;width:60px;"/></td>
						    </tr>
							<tr>
						        <td>课程号</td>
							    <td>毛泽东思想和中国特色社会主义理论体系概论</td>
							    <td>学号</td>
							    <td>姓名</td>
							    <td>
								  <input type="text"  style="border:none;outline:none;width:60px;"/></td>
						    </tr>
							<tr>
						        <td>课程号</td>
							    <td>毛泽东思想和中国特色社会主义理论体系概论</td>
							    <td>学号</td>
							    <td>姓名</td>
							    <td>
								  <input type="text"  style="border:none;outline:none;width:60px;"/></td>
						    </tr>
							<tr>
						        <td>课程号</td>
							    <td>毛泽东思想和中国特色社会主义理论体系概论</td>
							    <td>学号</td>
							    <td>姓名</td>
							    <td>
								  <input type="text"  style="border:none;outline:none;width:60px;"/></td>
						    </tr>
							<tr>
						        <td>课程号</td>
							    <td>毛泽东思想和中国特色社会主义理论体系概论</td>
							    <td>学号</td>
							    <td>姓名</td>
							    <td>
								  <input type="text"  style="border:none;outline:none;width:60px;"/></td>
						    </tr>
							<tr>
						        <td>课程号</td>
							    <td>毛泽东思想和中国特色社会主义理论体系概论</td>
							    <td>学号</td>
							    <td>姓名</td>
							    <td>
								  <input type="text"  style="border:none;outline:none;width:60px;"/></td>
						    </tr>
					    </table>
				    </div>
			    </div>
			</form>
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








