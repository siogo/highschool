<?php 
	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");

	// $teacher = $_COOKIE[''];//用户名应该存在cookies中
	$teacher = 'zztest';
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>发布作业</title>
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
    <div id="content">	
	    <div class="k">
		    <div class="wz">
			    当前位置：发布作业
			</div>
			<div class="return">
			    <a href="#">返回</a>
			</div>
			<div class="k-1">
			    <form>
				    <table>
					    <tr>
						    <td class="bt">
							    <div style="margin-bottom:20px">作业题目</div>
							</td>
							<td class="nr-1">
							    <div style="margin-bottom:20px">
								    <textarea id="name"></textarea>
							    </div>
							</td>
						</tr>
						<tr>
							<td class="bt">
							    <div style="margin-bottom:20px">课程</div>
							</td>
							<td>
								<select id="course">
								<?php  
									$result = mysql_query("SELECT teacher_id FROM tb_teacher WHERE account = '".$teacher."'");
									while ($row = mysql_fetch_array($result)) {
										$tid = $row['teacher_id'];
									}
									$re = mysql_query("SELECT course_name,course_id FROM tb_course WHERE teacher = '".$tid."'");
									while ($roa = mysql_fetch_array($re)) {
										echo "<option value=\"".$roa['course_id']."\">".$roa['course_name']."</option>";
									}
								?>	
								</select>
							</td>
						</tr>
						<tr>
						    <td class="bt">
							    <div>具体要求</div>
							</td>
							<td class="nr-2">
							    <div>
								    <textarea id="yaoqiu"></textarea>
								</div>
							</td>
						</tr>
						<tr class="tj">
						    <td colspan="2">
							    <div>
								     <input type="buttom" id="btn" value="提交" style="text-align: center; cursor: pointer;" />
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
			var name = $('#name').val();
			var content = $('#yaoqiu').val();
			var course = $('#course').val();
			$.post("addhomework.php", {name:name,course:course}, function(data){
			 	switch(data){
			 		case '0':
			 			alert("添加失败(信息不全)");
			 			break;
			 		case '1':
			 			alert("添加成功");
		 				break;
			 		case '2':
			 			alert("添加失败(作业重复)");
			 			break;
			 	}
			});
		});
		
	})
</script>
</body>
</html>





