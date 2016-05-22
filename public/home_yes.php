<?php
	date_default_timezone_set("PRC");
	error_reporting(0);
	if(!isset($_COOKIE["username"])){
		echo "<script>alert(\"抱歉您还未登录，请先登录\");location.href=\"login.php\";</script>";
	}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>首页-已登</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-1.10.1.min.js"></script>
	<script src="js/jquery.flexslider-min.js"></script>
	<script type="text/javascript">
			$(document).ready(function(){
				$('#three').flexslider({
					
					animation: "slide",
                    animationLoop: true,
                    pauseOnAction: false,
					
				});
				
				$('.zxwz').click(function(){
				$('.none').show();
				$('.zxwz').hide();
				$('.shouqi').show();
			})
			
			//隐藏注册面板
			$('.shouqi').click(function(){
				$('.none').hide();
				$('.shouqi').hide();
				$('.zxwz').show();
			})
			});
		</script>
</head>
<body>
    <header id="header">
	    <div class="sec">
		    <h1 class="logo">师生互动平台</h1>
			<nav class="link">
			    <ul class="o-nav">
			        <li class="active"><a href="index.php" class="s-bc">首页</a></li>
				    <li><a href="addarticle.php" class="f-bc">发布文章</a></li>
				    <li><a href="###" class="d-bc">在线答疑</a></li>
				    <li><a href="paragraph.php" class="w-bc">文章赏析</a></li>
			    </ul>
				<div class="dz">
				    <div class="dlz">Hi:<span><?php echo $_COOKIE["username"]; ?></span><a href="logout.php">[退出]</a></div>
				</div>
			</nav>
		</div>
	</header>
    
	<div id="content" style="padding:0;background:#f1f0ec">
	    <div class="aside" style="float:left">
		    <div class="Tx">
			    <img src="img/Tulip.jpg"/>
			</div>
			<div class="Xx">
			    <span><a href="###">我的信息</a></span>&nbsp;&nbsp;
				<span><a href="###">我的成绩</a></span>
			</div>
			<div class="Xx">
			    <span><a href="###">我的课程</a></span>&nbsp;&nbsp;
				<span><a href="###">我的作业</a></span>
			</div>
			<div class="Xx">
			    <span><a href="###">发布课程</a></span>&nbsp;&nbsp;
				<span><a href="###">管理学生</a></span>
			</div>
			<div class="Xx">
			    <span><a href="###">发布作业</a></span>&nbsp;&nbsp;
				<span><a href="###">统计信息</a></span>
			</div>
		</div>
	    <div class="setion-1">
		    <div class="bt-prev left">
				<img src="img/bt-prev.png"/>
			</div>
			<div class="box">
		        <div class="flexslider" id="three">
			        <ul class="slides">
				        <li>
					        <div class="title">
						        <a href="###">标题</a>
						    </div>
							<div class="time">
						        2016年10月28日
						    </div>
						    <p class="w">
							    <a href="###">
							       哈哈哈哈哈哈哈哈哈哈哈哈哈纪委行情已经有加干涉我u坚实的金融界呵呵呵哈哈哈哈哈哈哈纪委行情已经有加干涉我u坚实的金融界呵呵呵哈哈哈哈哈哈哈纪委行情已经有加干涉我u坚实的金融界呵呵呵哈纪委行情已经有加干涉我u坚实的金融界呵呵呵一人机会危机不仅今晚而后...
							    </a>
						    </p>
						    <div class="yz">
						        阅读（5）|转载（5）|评论（5）
						    </div>
					    </li>
						<li>
					        <div class="title">
						        <a href="###">标题</a>
						    </div>
							<div class="time">
						        2016年10月28日
						    </div>
						    <p class="w">
							    <a href="###">
							       哈哈哈哈哈哈哈哈哈哈哈哈哈纪委行情已经有加干涉我u坚实的金融界呵呵呵哈哈哈哈哈哈哈纪委行情已经有加干涉我u坚实的金融界呵呵呵哈哈哈哈哈哈哈纪委行情已经有加干涉我u坚实的金融界呵呵呵哈纪委行情已经有加干涉我u坚实的金融界呵呵呵一人机会危机不仅今晚而后...
							    </a>
						    </p>
						    <div class="yz">
						        阅读（5）|转载（5）|评论（5）
						    </div>
					    </li>
				    </ul>
			    </div>
			</div>
			<div class="bt-next right">
				<img src="img/bt-next.png"/>
			</div>
		</div>
    </div>
	<footer>
	    <div class="footer" style="clear:both">
		      Copyright @ Plain and Simple | Design by WangXiang
		</div>
	</footer>
</body>
</html>








