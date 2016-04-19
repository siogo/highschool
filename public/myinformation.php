<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>个人信息</title>
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
				//显示文章面板
				$('.zxwz').click(function(){
				$('.none').show();
				$('.zxwz').hide();
				$('.shouqi').show();
			})
			//隐藏文章面板
			$('.shouqi').click(function(){
				$('.none').hide();
				$('.shouqi').hide();
				$('.zxwz').show();
			})
			
			
			//个人信息
			$('.grxx').click(function(){
				$('.setion-1').hide();
				$('.setion-2').show();
			})
			
			$('.return-2').click(function(){
				$('.setion-1').show();
				$('.setion-2').hide();
			})
			
			
			$('.grzl').click(function(){
				$('.setion-2').hide();
				$('.setion-1').hide();
				$('.setion-22').show();
			})
			$('.return-22').click(function(){
				$('.setion-1').hide();
				$('.setion-2').show();
				$('.setion-22').hide();
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
			        <li class="active"><a href="###" class="s-bc">首页</a></li>
				    <li><a href="###" class="f-bc">发布文章</a></li>
				    <li><a href="###" class="d-bc">在线答疑</a></li>
				    <li><a href="###" class="w-bc">文章赏析</a></li>
			    </ul>
				<div class="dz">
				    <div class="dlz">Hi:<span>张三哈</span><a href="#">[退出]</a></div>
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
			    <span class="grxx"><a href="###" class="active">我的信息</a></span>&nbsp;&nbsp;
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
		
		<div class="setion-2">
		    <div>
			    <div class="yt">
				    当前页面：我的信息>>
				</div>
			    <div class="return-2">
			        返回
			    </div>
			</div>
			<div class="ej">
			    <div class="kk dj">
				    <span class="grzl">个人资料</span>
				</div>
				<div class="kk">
				    <span class="txsz">头像设置</span>
				</div>
				<div class="kk">
				    <span class="yxyz">邮箱验证</span>
				</div>
				<div class="kk">
				    <span class="mmxg">密码修改</span>
				</div>
			</div>
		</div>
		
		<div class="setion-22">
		    <div>
			    <div class="yt">
				    当前页面：我的信息>个人资料
				</div>
			    <div class="return-2 return-22">
			        返回
			    </div>
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








