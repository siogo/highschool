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
    <title>我的课程</title>
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
						if(isset($_COOKIE["name"])){	
							echo "<div class=\"dlz\">Hi:<a href=\"setinfo.php\"><span>".$_COOKIE["name"]." </span></a><a href=\"logout.php\">[退出]</a></div>";
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
			    当前位置:我的课程
			</div>
		    <div class="return">
			    <a href="#" onClick="javascript :history.back(-1);" style=" color:#333">返回</a>
			</div>
			<div class="cj">
			    <div class="sx">
				    <div>
					    <a href="#" class="cjkc-active">全部课程</a>
					</div>
					<div>
					    <a href="choosesource.php">选择课程</a>
					</div>
					
				</div>
				<div class="cjlb">
				    <table border="1">
						<tr>
						    <th style="width:150px">课程号</th>
							<th>课程名</th>
							<th style="width:150px">学分</th>
							<th style="width:150px">课程属性</th>
							<th style="width:90px">任课老师</th>
						</tr>

						<?php  
							$result = mysql_query("SELECT * FROM tb_choosecourse WHERE student_id = '".$_COOKIE['id']."'");
							while ($row = mysql_fetch_array($result)) {
								echo "<tr>";
								$result_a = mysql_query("SELECT * FROM tb_course WHERE course_id = '".$row['course_id']."'");
								while ($row_a = mysql_fetch_array($result_a)) {
									echo "<td>".$row_a['course_id']."</td>";
									echo "<td>".$row_a['course_name']."</td>";
									echo "<td>".$row_a['credits']."</td>";
									echo "<td>".$row_a['course_type']."</td>";
								}
								$result_b = mysql_query("SELECT * FROM tb_teacher WHERE teacher_id = '".$row['teacher_id']."'");
								while ($row_b = mysql_fetch_array($result_b)) {
									echo "<td>".$row_b['chinese_name']."</td>";
								}
								echo "</tr>";
							}
						?>
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








