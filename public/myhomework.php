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
    <title>作业列表</title>
	<link rel="stylesheet" href="css/style.css">
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
    <div id="content" style="width:998px;border:1px solid #333;height:530px;padding:0">	
	    <div class="wk zylb">
		    <div class="wz">
			    当前位置:我的作业>>作业列表
			</div>
		    <div class="return">
			    <a href="#">返回</a>
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
						echo 		"<td>".$row_a['online_author']."</td>";
						echo 		"<td><a href=\"worksubmit.php?wid=".$row_a['online_id']."\">".$row_a['online_title']."</a></td>";
						echo 		"<td>".'#'."</td>";
						echo 		"<td>".'#'."</td>";
						if($row_a['state'] == '0'){
							$state = "未完成";
						}else{
							$state = "已完成";
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








