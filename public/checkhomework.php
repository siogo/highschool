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
    <title>查看作业</title>
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
    <div id="content" style="background:#fff;border:1px solid #333;width:998px">	
	    <div class="k x">
		    <div class="wz">
			    当前位置：作业管理
			</div>
			<div class="return">
			    <a href="javascript:history.go(-1)">返回</a>
			</div>
			<div class="tjxx">
			    <div>
				    <div class="scsj">
					    已完成作业学生
					</div>
					<div class="tj-bg">
					    <table>
						    <tr class="hg">
							    <th>学号</th>
								<th>姓名</th>
								<th>作业</th>
								<th>联系电话</th>
							</tr>
					<?php  

						$oid = $_GET['oid'];
						$result = mysql_query("SELECT * FROM tb_worksub WHERE online_id = '".$oid."' AND state = '1'");
						while($row = mysql_fetch_array($result)){
							echo "<tr class=\"hg\">";
							$student_id = $row['student_id'];
							$result_b = mysql_query("SELECT * FROM tb_onlinestu WHERE online_id = '".$oid."'");
							while ($row_b = mysql_fetch_array($result_b)) {
								echo 	"<td style=\"display:none;\"><span class=\"time\" style=\"display:none;\">".$row_b['online_publishtime']."</span></td>";
								$result_c = mysql_query("SELECT * FROM tb_teacher WHERE teacher_id = '".$row_b['online_author']."'");
								while ($row_c = mysql_fetch_array($result_c)) {
									echo 	"<td style=\"display:none;\"><span class=\"teacher\" style=\"display:none;\">".$row_c['account']."</span></td>";
								}
							}
							echo 	"<td style=\"display:none;\"><span class=\"teacher\" style=\"display:none;\">".$row['filename']."</span></td>";
							$result_a = mysql_query("SELECT * FROM tb_student WHERE student_id = '".$student_id."'");
							while ($row_a = mysql_fetch_array($result_a)) {
								echo 	"<td>".$row_a['student_id']."</td>";
								echo 	"<td>".$row_a['chinese_name']."</td>";
								echo 	"<td class=\"xiaz\"><span style=\"cursor:pointer\">下载</span></td>";
								echo 	"<td>".$row_a['tel']."</td>";	
							}
							echo "</tr>";
						}

					?>
                        </table>						
					</div>
				</div>
				
				<div class="dingj">
				    <div class="scsj">
					    未完成作业学生
					</div>
					<div class="tj-bg">
					    <table>
						    <tr class="hg">
							    <th>学号</th>
								<th>姓名</th>
								<th>联系电话</th>
							</tr>
					<?php
						$oid = $_GET['oid'];
						$result = mysql_query("SELECT * FROM tb_worksub WHERE online_id = '".$oid."' AND state = '0'");
						while($row = mysql_fetch_array($result)){
							echo "<tr class=\"hg\">";
							$student_id = $row['student_id'];
							$result_a = mysql_query("SELECT * FROM tb_student WHERE student_id = '".$student_id."'");
							while ($row_a = mysql_fetch_array($result_a)) {	
								echo 	"<td>".$row_a['student_id']."</td>";
								echo 	"<td>".$row_a['chinese_name']."</td>";
								echo 	"<td>".$row_a['tel']."</td>";	
							}
							echo "</tr>";
						}

					?>
                        </table>						
					</div>
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
		var span = $('.xiaz').find('span');
		for (var i = 0; i < span.length; i++) {
			$(span[i]).click(function(){
				var time = $($(this).parent().parent().find('td')[0]).find('span').text();
				var teacher = $($(this).parent().parent().find('td')[1]).find('span').text();
				var filena = $($(this).parent().parent().find('td')[2]).find('span').text();
				var src = "homework/"+teacher+"/"+time+"/"+filena;
				console.log(src);
				// $.post("download.php",{src:src}, function(data){});
				if(filena == '0'){

				}else{
					window.location.href='download.php?src='+src+'&name='+filena;
				}
				
			})
		}
	})
</script>
</body>
</html>








