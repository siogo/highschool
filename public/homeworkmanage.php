<?php  

	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");

?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>作业列表-老师</title>
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
			    当前位置:管理作业
			</div>
		    <div class="return">
			    <a href="#" style=" color:#333">返回</a>
			</div>
			<div class="cj">
			    <div class="sx">
				    <div>
					    <a href="#" class="cjkc-active">全部作业</a>
					</div>
					<div>
					    <a href="">查看作业</a>
					</div>
				</div>
				<div class="cjlb">
				    <table border="1">
					    <tr>
						    <th>作业题目作业题目作业题目作业题目作业题目</th>
							<th style="width:150px">发布时间</th>
							<th style="width:150px">截止时间</th>
							<th style="width:90px">完成情况</th>
						</tr>

				<?php  
					$result = mysql_query("SELECT * FROM tb_onlinestu WHERE online_author = '".$_COOKIE['id']."'");
					while ($row = mysql_fetch_array($result)) {
						echo "<tr>";
						echo 	"<td>".$row['online_title']."</td>";
						echo 	"<td>".date("Y-m-d",$row['online_publishtime'])."</td>";
						echo 	"<td>".date("Y-m-d",$row['online_endtime'])."</td>";
						echo 	"<td><a href=\"checkhomework.php?oid=".$row['online_id']."\" style=\"color:#7406b3\">查看</a></td>";
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








