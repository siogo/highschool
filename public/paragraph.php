<?php
	date_default_timezone_set("PRC");
	error_reporting(0);
	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");

	$re = mysql_query("SELECT count(*) from tb_paragraph"); 
	$rs = mysql_fetch_array($re);

	//记录总条数
	$numrows = $rs[0];

	//设置每一页显示的记录数
	$pagesize = 7;

	//计算总页数
	$pages = intval($numrows/$pagesize);
	if($numrows == 0){
		$pages = 1;
	}

	//如果有余数page+1;
	if($numrows%$pagesize){
		$pages++;
	}

	//设置页数
	if (isset($_GET['page'])) {
		$page = intval($_GET['page']);
	}else{
		//设置第一页
		$page = 1;
	}

	//计算记录偏移量
	$offset = $pagesize*($page-1);

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
			    <a href="javascript:void(0);">当前位置</a>:<a href="javascript:void(0);">全部文章</a>
			</div>
		    <div class="return">
			    <a href="index.php" style=" color:#333">返回</a>
			</div>
			<div class="ssym">
			    <div class="sszs">
			        <?php  
			        	$result = mysql_query("SELECT * FROM tb_paragraph order by para_id desc limit $offset,$pagesize");
			        	while ($row = mysql_fetch_array($result)) {
			        		
			        		echo "<div class=\"ssjg\">";
				        	echo 	"<div class=\"fbr\">";
					        echo		"<img src=\"img/form.png\" style=\"width: 32px; margin-top: 9px; margin-left: 9px;\"/>";
					    	echo 	"</div>";
					    	echo	"<div class=\"bt\">";
					        echo		"<a href=\"#\">".$row['para_title']."</a>";
					    	echo    	"<span style=\"display:none\">".$row['para_id']."</span>";
					    	echo 	"</div>";	
				    		echo "</div>";
			        	}
			        ?>
			    </div>
				<div class="pages" style="margin-top:0">
			    <a id="prev" href="paragraph.php">上一页</a>
					当前第<span><?php $i = explode('=',$_SERVER["QUERY_STRING"]); echo $i[1]; ?></span>页，共<span id="ispan"><?php echo $pages; ?></span>页
				<a id="next" href="paragraph.php">下一页</a>
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
		(function ($) {
            $.getUrlParam = function (name) {
                var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
                var r = window.location.search.substr(1).match(reg);
                if (r != null) return unescape(r[2]); return null;
            }
        })(jQuery);
        var page = $.getUrlParam('page');
        var next = parseInt(page)+1;
        var prev = parseInt(page)-1;
        var anum = $('#ispan').text();

        if(next > anum){
        	next = anum;
        }
        if(prev < 1){
        	prev = 1;
        }

		$('#prev').attr('href','paragraph.php?page='+prev);	
		$('#next').attr('href','paragraph.php?page='+next);

		var div = $('.bt');
		for (var i = 0; i < div.length; i++) {
			var pid = $(div[i]).find('span').text();
			$(div[i]).find('a').attr('href','detarticle.php?pid='+pid);
		};
		
	});
</script>
</body>
</html>








