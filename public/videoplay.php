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
    <title>文章列表</title>
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
				    <li class="active"><a href="<?php echo $_SERVER["PHP_SELF"].'?'.'page='.'1'; ?>" class="w-bc">文章赏析</a></li>
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
			    <a href="javascript:void(0);">当前位置</a>:<a href="javascript:void(0);">视频播放</a>
			</div>
		    <div class="return">
			    <a href="index.php" style=" color:#333">返回</a>
			</div>
			<div class="ssym">
			    <div class="sszs" style="width: 800px; margin: 0 auto;">
			    	<?php 
			    		$vid = $_GET['vid'];
			    		$result = mysql_query("SELECT * FROM tb_paragraph WHERE para_id = '".$vid."'");
			    		while ($row = mysql_fetch_array($result)) {
			    			echo "<video src=\"".$row['para_video']."\" controls=\"controls\" style=\"width: 800px; height: 100%;\">";
			    		}
			    	?>
			    	<!-- <video src="video/VID_20150828_083659.MP4" controls="controls" style="width: 800px; height: 100%;"> -->
			    </div>
			</div>
		</div>
	</div>
	<!--<header>header</header>
	<section>section</section>-->
	<footer>
	    <div class="footer">
		      Copyright @ Plain and Simple | Design by WangXiang
		</div>
	</footer>