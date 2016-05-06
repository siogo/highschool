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
    <title>搜索页面</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header id="header">
	    <div class="sec">
		    <h1 class="logo">师生互动平台</h1>
			<nav class="link">
			    <ul class="o-nav">
			        <li class="active"><a href="index.php" class="s-bc">首页</a></li>
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
    <div id="content" style="width:998px;border:1px solid #999;height:530px;padding:0">	
	    <div class="wk zylb" style="background:#fff;">
		    <div class="wz">
			    当前位置:搜索结果
			</div>
		    <div class="return">
			    <a href="javascript:history.go(-1)" style=" color:#333">返回</a>
			</div>
			<div class="ssym">
			    <div class="sszs" style="overflow-y: scroll;">
		<?php  
			$search = $_GET['search'];
			$result = mysql_query("SELECT * FROM tb_paragraph WHERE para_title like '%".$search."%'");
			while ($row = mysql_fetch_array($result)) {
				echo "<div class=\"ssjg\">";
				echo 	"<div class=\"fbr\">";
				echo 		"<img src=\"img/form.png\" style=\"width: 32px; margin-top: 9px; margin-left: 9px;\" />";
				echo 	"</div>";
				echo 	"<div class=\"bt\">";
				echo 		"<a class=\"link\" href=\"#\">".$row['para_title']."<span style=\"display:none;\">".$row['para_id']."</span></a>";
				echo 	"</div>";
				echo "</div>";
			}

		?>
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
<script src="js/jquery-1.10.1.min.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var link = $('.link');
		for (var i = 0; i < link.length; i++) {	
			$(link[i]).click(function(){
				var val = $(this).find('span').text();
				$(this).attr('href','detarticle.php?pid='+val);
			})
		}
	})
</script>
</body>
</html>








