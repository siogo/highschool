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
    <title>上传</title>
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
				    <div class="dlz">Hi:<span>张三哈</span><a href="#">[退出]</a></div>
				</div>
			</nav>
		</div>
	</header>
    <div id="content">	
	    <div class="k">
		    <div class="wz">
			    当前位置：上传视频
			</div>
			<div class="return">
			    <a href="#" onClick="javascript:history.back(-1);">返回</a>
			</div>
			<div class="k-1">
			    <form action="videoupload.php" method="post" enctype="multipart/form-data">
				    <table style="margin-top:120px">
					    <tr>
						    <td class="bt">
							    <div style="margin-bottom:20px">标题</div>
							</td>
							<td class="nr-1">
							    <div style="margin-bottom:20px">
								    <input type="text" name="title" />
							    </div>
							</td>
						</tr>
						<tr>
						    <td class="bt">
							    <div style="margin-bottom:20px">说明</div>
							</td>
							<td class="nr-1">
							    <div style="margin-bottom:20px">
								    <input type="text" name="content" />
							    </div>
							</td>
						</tr>
						<tr>
							<td class="nr-2" colspan="2">
								<label for="file">Filename:</label>
								<input type='hidden' name='MAX_FILE_SIZE' value='6000000' /> 
								<input type="file" name="file" id="file" /> 
								<br />
								<div style="margin-left:240px;margin-top:10px">
								    <input type="submit" name="submit" value="上传" />
								</div>
							</td>
						</tr>
					</table>
				</form>
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








