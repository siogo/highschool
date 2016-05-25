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
    <title>选择课程</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript">	
	</script>
</head>
<body>
    <header id="header">
	    <div class="sec">
		    <h1 class="logo">师生互动平台</h1>
			<nav class="link">
			    <ul class="o-nav">
			        <li class="active"><a href="###" class="s-bc">首页</a></li>
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
    <div id="content" style="background:#fff;border:1px solid #333;width:998px">	
	    <div class="k">
		    <div class="wz">
			    当前位置：<a href="myclass.php">我的课程</a>>>选择课程
			</div>
			<div class="return" style="left:670px;">
			    <a href="#" onClick="javascript :history.back(-1);">返回</a>
			</div>
			<div class="course">
			    <div class="xke">
			        <form>
					    <div class="xke-1">
                            <table>
						        <tr>
							        <th>课程号</th>
                                    <th style="width:200px;">课程名</th>
								    <th>学分</th>
								    <th>任课教师</th>
									<th>限制人数</th>
								    <th  style="width:180px;">上课时间</th>
								    <th  style="width:180px;">上课教室</th>
								    <th>选择</th>
							    </tr>
					<?php  
						$result = mysql_query("SELECT * FROM tb_course");
						while ($row = mysql_fetch_array($result)) {
							$flag = '0';
							$result_a = mysql_query("SELECT * FROM tb_choosecourse WHERE student_id = '".$_COOKIE['id']."'");
							while ($row_a = mysql_fetch_array($result_a)) {
								if($row['course_id'] == $row_a['course_id']){
									$flag = '1';
									break;
								}else{
									
								}
							}
							if($flag == '1'){
								echo "<tr style=\"display:none\">";
							}else{
								echo "<tr>";
							}
							echo 	"<td>".$row['course_id']."</td>";	//id
							echo 	"<td>".$row['course_name']."</td>";		//名字
							echo 	"<td>".$row['credits']."</td>";		//学分
							$result_a = mysql_query("SELECT * FROM tb_teacher WHERE teacher_id = '".$row['teacher']."'");
							while ($row_a = mysql_fetch_array($result_a)) {
								echo "<td>".$row_a['chinese_name']."</td>";		//任课教师
							}
							echo 	"<td>限制人数</td>";
							echo 	"<td>".$row['week']."第".$row['ctime']."节"."</td>";
							echo 	"<td>".$row['classroom']."</td>";
							echo 	"<td class=\"xz\"><input type=\"checkbox\"/><span style=\"display:none;\">".$row['course_id'].","."</span><h5 style=\"display:none\">".$row['teacher'].","."</h5></td>";
						}
					?>    		
                  			</table>				
				        </div>
						<div class="xk-tj">
						    <input type="button" value="提交" id="btn" />
						</div>
					</form>
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

		$('#btn').click(function(){
			var course = $('.xz').find("input[type = 'checkbox']:checked").parent().find('span').text();
			var teach = $('.xz').find("input[type = 'checkbox']:checked").parent().find('h5').text();
			course = course.substring(0,course.length-1);
			teach = teach.substring(0,teach.length-1);
			$.post("choose_hou.php", {course:course,teacher:teach}, function(data){
				if(data == '1'){
					alert('选课成功');
					window.location.reload()
				}
			});
		})
	})
</script>
</body>
</html>








