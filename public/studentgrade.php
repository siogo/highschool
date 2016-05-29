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
    <title>成绩打分</title>
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
							echo "<div class=\"dlz\">Hi:<a href=\"setinfo.php\"><span id=\"user\" style=\"display:none\">".$_COOKIE["username"]."</span>".$_COOKIE["name"]." </a><a href=\"logout.php\">[退出]</a><span id=\"userid\" style=\"display:none;\">".$_COOKIE['id']."</span></div>";
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
	    <div class="wk zylb" style="background:#fff;">
		    <div class="wz">
			    当前位置:管理作业
			</div>
		    <div class="return">
			    <a href="javascript:history.go(-1)" style=" color:#333">返回</a>
			</div>
			<form style="text-align:center;">
			    <div class="cj" style="text-align:center;">
				    <div style="float:none;width:880px;margin:0 auto;height:361px;overflow-y:scroll;">
				        <table border="1"  style="border-collapse: collapse;font-size: 15px;;text-align:center;">
					        <tr style="height:30px;">
						        <th style="width:150px">课程号</th>
							    <th>课程名</th>
							    <th style="width:150px">学号</th>
							    <th style="width:150px">姓名</th>
							    <th style="width:90px">成绩</th>
						    </tr>
					<?php 
						$result = mysql_query("SELECT * FROM tb_choosecourse WHERE teacher_id = '".$_COOKIE['id']."'");
						while ($row = mysql_fetch_array($result)) {
							echo "<tr style=\"height:30px;\">";
							echo "<td class=\"course_id\">".$row['course_id']."</td>";
							$result_a = mysql_query("SELECT * FROM tb_course WHERE course_id = '".$row['course_id']."'");
							while ($row_a = mysql_fetch_array($result_a)) {
								echo "<td style=\"width:280px;\">".$row_a['course_name']."</td>";
							}
							echo "<td class=\"student_id\">".$row['student_id']."</td>";
							$result_b = mysql_query("SELECT * FROM tb_student WHERE student_id = '".$row['student_id']."'");
							while ($row_b = mysql_fetch_array($result_b)) {
								echo "<td>".$row_b['chinese_name']."</td>";
								if($row['grade'] == '-1'){
									
									echo "<td><input class=\"gradeinput\" type=\"text\" style=\"border:none;outline:none;width:60px;\"/><span class=\"grade\"></span></td>";
								}else{
									echo "<td><input class=\"gradeinput\" type=\"text\" style=\"border:none;outline:none;width:60px;display:none;\"/><span class=\"grade\">".$row['grade']."</span></td>";
								}
								
							}
							
							echo "</tr>";
						}
					?>
						    <!-- <tr style="height:30px;">
						        <td>课程号</td>
							    <td>毛泽东思想和中国特色社会主义理论体系概论</td>
							    <td>学号</td>
							    <td>成绩</td>
							    <td>
								  <input type="text"  style="border:none;outline:none;width:60px;"/></td>
						    </tr> -->
					    </table>
				    </div>
					<div style="margin-top:30px;">
					    <input type="button" id="button" value="提交" style="width:80px;height:30px;font-size:16px;" />
					</div>
			    </div>
			</form>
		</div>
	</div>
	<!--<header>header</header>
	<section>section</section>-->
	<footer>
	    <div class="footer">
		      Copyright&nbsp;&#64;&nbsp;Plain and Simple&nbsp;&#124;&nbsp;Design by WangXiang
		</div>
	</footer>
<script src="//cdn.bootcss.com/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
			

		$('#button').click(function(){
			var userid = $('#userid').text();
			var course_id = $('.course_id');
			var student_id = $('.student_id');
			var grade = $('.grade');
			var inputgrade = $('.gradeinput');
			var arrcourse = new Array();
			var arrstudent = new Array();
			var arrgrade = new Array();
			var flag = 0;
			for (var i = 0; i < course_id.length; i++) {
				var text1 = $(course_id[i]).text();	//课程id
				var text2 = $(student_id[i]).text();//学生id
				var text3 = $(grade[i]).text();		//已经存在的成绩
				var text4 = $(inputgrade[i]).val();	//输入的成绩
				
				

				if(text3 != 0){
					
				}else{
					arrcourse.push(text1);
					arrstudent.push(text2);
					
					if(text4){
						if (text4 > 0&&text4<= 100) {
							flag = 1;
							arrgrade.push(text4);
						}else{
							alert("成绩输入有错误,请重新输入！！");
							break;
						}
						
					}else{
						arrgrade.push('-1');
					}
				}
			}
			console.log(arrcourse);
			console.log(arrstudent);
			console.log(arrgrade);
			console.log(userid);

			
			if (flag == 1) {
				$.post('addgrade.php',{"course":arrcourse,"student":arrstudent,"teacher":userid,"grade":arrgrade},function(data){
					if(data == '1'){
						alert("成绩修改成功");
						window.location.reload() = "studentgrade.php";
					}
				})
			}
		})
	})
</script>
</body>
</html>








