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
    
	<div id="content" style="padding:0;background:#f1f0ec">
	    <div class="aside" style="float:left">
		    <div class="Tx">
			    <img src="img/Tulip.jpg"/>
			</div>
			<div class="Xx">
			    <span class="grxx"><a href="###">我的信息</a></span>&nbsp;&nbsp;
				<span><a href="###">我的成绩</a></span>
			</div>
			<div class="Xx">
			    <span><a href="###">我的课程</a></span>&nbsp;&nbsp;
				<span><a href="###">我的作业</a></span>
			</div>
			<div class="Xx">
			    <span><a href="###"  class="active">发布课程</a></span>&nbsp;&nbsp;
				<span><a href="###">管理学生</a></span>
			</div>
			<div class="Xx">
			    <span><a href="###">发布作业</a></span>&nbsp;&nbsp;
				<span><a href="###">统计信息</a></span>
			</div>
		</div>
		
		<div class="setion-2" style="display:block">
		    <div>
			    <div class="yt">
				    当前页面：发布课程
				</div>
			    <div class="return-2">
			        <a href="#" style="color:#333">返回</a>
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
						    <input type="radio" name="type" value="compulsory" />必修
							<input type="radio" name="type" value="take" />选修
							<input type="radio" name="type" value="other" />其他
					    </div>
					</div>
					<div>
					    <label style="margin-left:33px;">学分</label>
						<input type="text" id="credits" />
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
		$('#btn').click(function(){
			var course_name = $('#course_name').val();
			var course_type = $('#course_type input[name="type"]:checked').val();
			var credits = $('#credits').val();
			var classroom = $('#classroom').val();
			var time = $('#time').val();
			var jieshu = $('#jieshu').val();
			$.post("addcourse.php",{course_name:course_name,type:course_type,credits:credits,classroom:classroom,time:time,jieshu:jieshu}, function(data){
				switch(data){
					case '0':
						alert("添加失败(课程信息不全)");
						break;
					case '1':
						alert("添加成功");
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







