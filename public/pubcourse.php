<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>发布课程</title>
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
							echo "<div class=\"dlz\">Hi:<a href=\"setinfo.php\"><span id=\"user\" style=\"display:none\">".$_COOKIE["username"]."</span>".$_COOKIE["name"]." </a><a href=\"logout.php\">[退出]</a></div>";
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
    
	<div id="content" style="padding:0;background:#f1f0ec">
	    <div class="aside" style="float:left">
		    <div class="Tx">
			    <img id="headphoto" src="##"/>
			    <span id="group" style="display: none;"><?php echo $_COOKIE['group'] ?></span>
			</div>
			<div class="Xx">
			    <span class="grxx"><a style="cursor:pointer" class="active">我的信息</a></span>&nbsp;&nbsp;
				<span class="stu"><a href="myscore.php">我的成绩</a></span>
			</div>
			<div class="Xx">
			    <span class="stu"><a href="myclass.php">我的课程</a></span>&nbsp;&nbsp;
				<span class="stu"><a href="myhomework.php">我的作业</a></span>
			</div>
			<div class="Xx">
			    <span class="grxx"><a href="videosub.php">发布视频</a></span>&nbsp;&nbsp;
				<span class="grxx"><a href="videolist.php">视频播放</a></span>
			</div>
			<div class="Xx">
			    <span class="teac"><a href="pubcourse.php">发布课程</a></span>&nbsp;&nbsp;
				<span class="teac"><a href="studentgrade.php">管理学生</a></span>
			</div>
			<div class="Xx">
			    <span class="teac"><a href="addwork.php">发布作业</a></span>&nbsp;&nbsp;
				<span class="teac"><a href="homeworkmanage.php">管理作业</a></span>
			</div>
		</div>
		
		<div class="setion-2" style="display:block">
		    <div>
			    <div class="yt">
				    当前页面：发布课程
				</div>
			    <div class="return-2">
			        <a href="javascript:history.go(-1);location.reload()" style="color:#333">返回</a>
			    </div>
			</div>
			<div class="fbkc">
			    <form>
				    <div>
					    <label style="margin-left:16px;">课程名</label>
						<input type="text" id="course_name"/>
					</div>
					<div>
					    <label>课程属性</label>
						<div class="kuangk" id="course_type">
						    <input type="radio" name="type" value="必修" />必修
							<input type="radio" name="type" value="选修" />选修
							<input type="radio" name="type" value="其他" />其他
					    </div>
					</div>
					<div>
					    <span style="margin-right:32px;">学分</span>
						<select id="credits" style="width:302px;height:34px;">
							<option value="1">1分</option>
							<option value="2">2分</option>
							<option value="3">3分</option>
							<option value="4">4分</option>
							<option value="5">5分</option>
							<option value="6">6分</option>
							<option value="7">7分</option>
							<option value="8">8分</option>
							<option value="9">9分</option>
							<option value="10">10分</option>
						</select>
					</div>
					<div>
					    <label>上课教室</label>
						<input type="text" id="classroom" />
					</div>
					<div class="sksj">
					    <label>上课时间</label>
						<select id="time">
                            <option value="星期一">星期一</option>
                            <option value="星期二">星期二</option>
							<option value="星期三">星期三</option>
                            <option value="星期四">星期四</option>
							<option value="星期五">星期五</option>
                        </select>
						<select id="jieshu">
                            <option value="1">第一节</option>
                            <option value="2">第二节</option>
							<option value="3">第三节</option>
                            <option value="4">第四节</option>
							<option value="5">第五节</option>
                        </select>
					</div>
					<div class="fban">
					    <input id="btn" type="button" value="发布"/>
					</div>
				</form>
			</div>
			
		</div>		
    </div>
	<footer>
	    <div class="footer" style="clear:both">
		      Copyright&nbsp;&#64;&nbsp;Plain and Simple&nbsp;&#124;&nbsp;Design by WangXiang
		</div>
	</footer>
<script src="js/jquery-1.10.1.min.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var user = $('#user').text();
		console.log(user);
		$('#headphoto').attr('src','photo_head/'+user+"/head.png");

		var group = $('#group').text();
		if(group == 'student'){
			$('.teac').hide();
		}else{
			$('.stu').hide();
		}
		
		$('#btn').click(function(){
			var course_name = $('#course_name').val();
			var course_type = $('#course_type input[name="type"]:checked').val();
			var credits = $('#credits').val();
			var classroom = $('#classroom').val();
			var time = $('#time').val();
			var jieshu = $('#jieshu').val();
			console.log(credits);
			$.post("addcourse.php",{course_name:course_name,type:course_type,credits:credits,classroom:classroom,time:time,jieshu:jieshu}, function(data){
				switch(data){
					case '0':
						alert("添加失败(课程信息不全)");
						break;
					case '1':
						alert("添加成功");
						window.location.href = "setinfo.php";
						break;
					case '2':
						alert("添加失败(课程重复)");
						break;
					case '3':
						alert("添加失败(教室冲突)");
						break;
				}
			});
		});

	})	
</script>
</body>
</html>







