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
    <title>首页</title>
	<link rel="stylesheet" href="css/style.css">
	<style type="text/css">
		pre{
			white-space: pre-wrap;       
			white-space: -moz-pre-wrap;  
			white-space: -pre-wrap;      
			white-space: -o-pre-wrap;    
			word-wrap: break-word;       
		}
	</style>

</head>
<body>
    <header id="header">
	    <div class="sec">
		    <h1 class="logo">师生互动平台</h1>
			<nav class="link">
			    <ul class="o-nav">
			        <li class="active"><a href="index.php" class="s-bc">首页</a></li>
				    <li><a href="./addarticle.php" class="f-bc">发布文章</a></li>
				    <li><a href="###" class="d-bc">在线答疑</a></li>
				    <li><a href="paragraph.php?page=1" class="w-bc">文章赏析</a></li>
			    </ul>
				<div class="dz">
				    <ul>
					<?php
						if(isset($_COOKIE["username"])){
							echo "<div class=\"dlz\">Hi:<a href=\"setinfo.php\"><span>".$_COOKIE["username"]." </span></a><a href=\"logout.php\">[退出]</a></div>";
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
	    <div class="search">
	        <form>
			    <input type="text" id="txt" placeholder="键入关键字"/>
				<input type="button" id="search" style="cursor:pointer" value="搜索"/>
			</form>
	    </div>
		<div class="rmwz">
		    <div class="zt">
			   <img src="img/zx-act.png"/>
			</div>
			<div style="position:relative">
			    <div class="tulip" style="position:absolute;top:100px;">
				    <img src="img/Tulip.jpg">
				</div>
				<div class="all-wz">
				    <div class="wz">
				        <div class="wz-bt">
				        <?php  
				        	$result = mysql_query('SELECT * FROM tb_paragraph order by para_id desc limit 0,1');
				        	while ($row = mysql_fetch_array($result)) {
				        		// <a href="###">十万个为什么</a>
				        		echo "<a href=\"detarticle.php?pid=".$row['para_id']."\">".$row['para_title']."</a>";
				        		echo "<span >".$row['para_id']."</span>";
				        ?>    
					    </div>
					    <div class="fbtime">
					    <?php  
					    		echo date("Y-m-d H:i:s",$row['para_publish']);
					    	
					    ?>
					    </div>
					    <div class="wz-nr">
					    <?php  
					    		$str = substr($row['para_content'],0,299)."...";
					    		echo "<pre>".$str;
					    	}
					    ?>
					        </pre>
						    <div class="wz-xq"><a href="###"><b>查看全文>></b></a></div>
					    </div>
					</div>
					<!-- <div class="wz none">
				        <div class="wz-bt">
					        <a href="###">十万个为什么</a>
					    </div>
					    <div class="fbtime">
					        2015年10月23日
					    </div>
					    <div class="wz-nr">
					        <p>
					             有一次，在我参加的一个晚会上，主持人问一个小男孩：你长大以后要做什么样的人？孩子看看我们这些企业家，然后说：做企业家。在场的人忽地笑着鼓起了掌。我也拍了拍手，但听着并不舒服。我想，这孩子对于企业究竟知道多少呢？他是不是因为当着我们的面才说要当企业家的呢？他是不是受了大人的影响，以为企业家风光，都是有钱的人，才要当企业家的呢？...
					        </p>
						    <div class="wz-xq"><a href="###"><b>查看全文>></b></a></div>
					    </div>
					</div> -->
					<div class="zxwz">
					    <input type="button" value="5" class="zx-wz"/>
					</div>
					<div class="shouqi">
					    <input type="button" value="收起" class="sq"/>
					</div>
				</div>
			</div>
		</div>
		<div class="hot-user jj" style="background:#f1f0ec;width:900px;margin:0 auto">
		    <div class="zt jianju">
			   <img src="img/hot-user.png"/>
			</div>
			<div class="tx">
			    <ul>
				    <li>
					    <a href="###"><img src="img/Tulip.jpg"></a>
					</li>
					<li>
					    <a href="###"><img src="img/Tulip.jpg"></a>
					</li>
					<li>
					    <a href="###"><img src="img/Tulip.jpg"></a>
					</li>
					<li>
					    <a href="###"><img src="img/Tulip.jpg"></a>
					</li>
					<li>
					    <a href="###"><img src="img/Tulip.jpg"></a>
					</li>
					<li>
					    <a href="###"><img src="img/Tulip.jpg"></a>
					</li>
				</ul>
			</div>
		</div>
		
		<div class="article-show">
		    <div class="zt">
			   <img src="img/hot-act.png"/>
			</div>
		    <div class="article">
			    <div class="bt-prev">
				    <img src="img/bt-prev.png"/>
				</div>
				<div class="lb">
				    <div class="flexslider" id="three">
					    <ul class="slides">
						    <li>
							    <div class="bt">
							    	<?php  
							    		$res = mysql_query("SELECT * FROM tb_paragraph order by count_read desc limit 0,1");
							    		while ($ros = mysql_fetch_array($res)) {
							    			echo "<a href=\"###\">".$ros['para_title']."</a>"
							    	?>
								    
								</div>
							    <p class="zw">
								    <a href="###">
								    <?php  
								    		echo $ros['para_content'];
								    ?>
									   
									</a>
								</p>
								<div class="zz">
								    阅读（<?php echo $ros['count_read']?>）|转载（<?php echo $ros['count_send']?>）|评论（<?php echo $ros['count_discuss']; }?>）
								</div>
							</li>
							<li>
							    <div class="bt">
							    	<?php  
							    		$res = mysql_query("SELECT * FROM tb_paragraph order by count_read desc limit 1,1");
							    		while ($ros = mysql_fetch_array($res)) {
							    			echo "<a href=\"###\">".$ros['para_title']."</a>"
							    	?>
								</div>
							    <p class="zw">
								    <a href="###">
								    <?php  
								    		echo $ros['para_content'];
								    ?>
									</a>
								</p>
								<div class="zz">
								    阅读（<?php echo $ros['count_read']?>）|转载（<?php echo $ros['count_send']?>）|评论（<?php echo $ros['count_discuss']; }?>）
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="bt-next">
				    <img src="img/bt-next.png"/>
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

		var pid = $('.wz-bt').find('span').text();

		var a = $('.wz-xq').find('a');
		$(a).attr('href','detarticle.php?pid='+pid);

		$('#search').click(function(){
			var text = $('#txt').val();
			window.location.href = "http://127.0.0.1/bs/highschool/public/search.php?search="+text;
		});

	});
</script>
</body>
</html>







