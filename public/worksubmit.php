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
    <title>作业-回答</title>
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
				    <li class="active"><a href="setinfo.php" class="d-bc">个人中心</a></li>
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
	    <div class="wk zylb" style="background:#f1f0ec;display:inline-block;">
		    <div class="wz">
			    当前位置:我的作业>>作业列表>>当前作业
			</div>
		    <div class="return-1" style="margin-left:-20px;">
			    <a href="#">返回</a>
			</div>
			<div class="jtzy">
				    <table>
				        <tr class="hang">
					        <td class="sx">
						        <div>
							    作业题目
							    </div>
						    </td>
						    <td class="nr">
						    <div>
					<?php  
						$oid = $_GET['wid'];
						$result = mysql_query("SELECT * FROM tb_onlinestu WHERE online_id = '".$oid."'");
						while ($row = mysql_fetch_array($result)) {
							echo $row['online_title'];
					?>
							</div>
						    </td>
					    </tr>
					    <tr class="hang1">
					        <td class="sx">
						        <div>
						        作业要求
							    </div>
						    </td>
						    <td class="nr" valign="top">
						        <div>
					<?php
							echo $row['yaoqiu'];
						}		
					?>
							    </div>
						    </td>
					    </tr>
					    <tr class="hang2">
						    <td class="sx" valign="top">
						        <div>
							    作答上传
						        </div>
						    </td>
						    <td class="nr" valign="top">
							    <form action="workupload.php" method="post" enctype="multipart/form-data">
									<label for="file"></label>
									<input style="display: none;" name="wid" value="<?php echo $_GET['wid'] ?>">
									<input type='hidden' name='MAX_FILE_SIZE' value='6000000' /> 
									<input type="file" name="file" id="file" /> 
									<br />
									<input type="submit" name="submit" value="Submit" />
								</form>
						    </td>
					    </tr>
				    </table>
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








