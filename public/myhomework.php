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
    <title>作业列表</title>
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
    <div id="content" style="width:998px;border:1px solid #333;height:530px;padding:0">	
	    <div class="wk zylb">
		    <div class="wz">
			    当前位置:我的作业>>作业列表
			</div>
		    <div class="return">
			    <a href="javascript:history.back(-1);">返回</a>
			</div>
			<div class="zuoy" style="height: 376px; overflow-y: scroll;">
			    <table>
				    <tr class="bj" >
					    <th class="fbz">发布者</th>
						<th class="tm">作业题目</th>
						<!-- <th class="type">分类</th> -->
						<th class="fbsj">发布时间</th>
						<th class="jzsj">截止时间</th>
						<th>完成情况</th>
					</tr>
			<?php  

				$result = mysql_query("SELECT * FROM tb_choosecourse WHERE student_id = '".$_COOKIE['id']."'");		
				while ($row = mysql_fetch_array($result)) {
					$flag = '0';
					$result_a = mysql_query("SELECT * FROM tb_onlinestu WHERE course_id = '".$row['course_id']."'");
					while ($row_a = mysql_fetch_array($result_a)) {
						echo "<tr class=\"bj\">";
						$result_c = mysql_query("SELECT * FROM tb_teacher WHERE teacher_id = '".$row_a['online_author']."'");
						while ($row_c = mysql_fetch_array($result_c)) {
							echo 	"<td>".$row_c['chinese_name']."</td>";
						}
						
						echo 		"<td><a href=\"worksubmit.php?wid=".$row_a['online_id']."\">".$row_a['online_title']."</a></td>";
						echo 		"<td>".date("Y-m-d",$row_a['online_publishtime'])."</td>";
						echo 		"<td>".date("Y-m-d",$row_a['online_endtime'])."</td>";
						$result_b = mysql_query("SELECT * FROM tb_worksub WHERE online_id = '".$row_a['online_id']."' AND student_id = '".$_COOKIE['id']."'");
						while ($row_b = mysql_fetch_array($result_b)) {
							if($row_b['state'] == '0'){
								$state = "未完成";
							}else{
								$state = "已完成";
							}

						}
						
						echo 		"<td>".$state."</td>";
						echo "</tr>";
					}
				}

			?>
				</table>
			</div>
			<div class="pages">
			    
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








