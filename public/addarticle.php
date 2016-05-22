<?php
	date_default_timezone_set("PRC");
	error_reporting(0);
	if(!isset($_COOKIE['is_login'])){
		echo "<script>
				var confirm = confirm('您未登录,是否跳转到登录页面');
				if(confirm){window.location.href='login.php'}else{window.location.href='index.php'};
			  </script>";		
	}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>发布文章</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header id="header">
	    <div class="sec">
		    <h1 class="logo">师生互动平台</h1>
			<nav class="link">
			    <ul class="o-nav">
			        <li><a href="./index.php" class="s-bc">首页</a></li>
				    <li class="active"><a href="addarticle.php" class="f-bc">发布文章</a></li>				    
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
    <div id="content">	
	    <div class="k">
		    <div class="wz">
			    当前位置：发布文章
			</div>
			<div class="return">
			    <a href="javascript:history.back(-1);">返回</a>
			</div>
			<div class="k-1">
			    <form>
				    <table>
					    <tr>
						    <td class="bt">
							    <div style="margin-bottom:20px">标题</div>
							</td>
							<td class="nr-1">
							    <div style="margin-bottom:20px">
								    <input name="title" type="text" id="title" />
							    </div>
							</td>
						</tr>
						<tr>
						    <td class="bt">
							    <div style="margin-bottom:20px">分类</div>  
							</td>
						    <td>
							    <div class="flei"> 
								    <select name="list" id="list">
                                        <option value="wenxue">文学</option>
                                        <option value="shuxue">数学</option>
                                        <option value="english">英语</option>
                                        <option value="computer">计算机</option>
                                    </select>
								</div>
							</td>
						</tr>
						<!-- <tr>
						    <td class="bt">
							    <div style="margin-bottom:20px">类型</div>  
							</td>
						    <td>
							    <div class="flei"> 
								    <select name="list" id="list">
                                        <option value="wenxue">视频</option>
                                        <option value="shuxue">文章</option>
                                    </select>
								</div>
							</td>
						</tr> -->
						<tr>
						    <td class="bt" valign="top">
							    <div>文章正文</div>
							</td>
							<td class="nr-2">
							    <div>
								    <textarea id="content1"></textarea>
								</div>
							</td>
						</tr>
						<tr class="tj">
						    <td colspan="2">
							    <div style="margin-top:10px;">
								     <input id="btn" type="button" value="发布"/>
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
<script src="js/jquery-1.10.1.min.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btn').click(function(){
			var title = $('#title').val();
			var content = $('#content1').val();
			var list = $('#list').val();
			$.post('./addarti_hou.php',{title:title,content:content,list:list},function(state){
				alert(state);
			});
		})
	});
	
</script>
</body>
</html>








