<?php
	require_once('../../sys/connect.class.php');
?>
<!doctype html>
<html>
	<head>
		<title>欢迎使用高校师生互动平台管理后台</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/manage.css" type="text/css">
	</head>
	
	<body>
		<div id="header">高校师生互动平台管理后台</div>
		<div id="row">
			<div id="side">
				<ul>
					<li><a href="welcome.php">管理后台</a></li>
					<li><a href="audit.php">文章列表</a></li>
					<li><a href="message.php">留言列表</a></li>
					<li><a href="homework.php">作业列表</a></li>
					<li><a href="javascript:void(0);">学生信息</a></li>
					<li><a href="teacher.php">教师信息</a></li>
				</ul>
			</div>
		</div>
		<div id="content-side">
			<div id="audit" class="show">				
				<table border="1" width="980" height="60" cellspacing="0" cellpadding="6">
					<thead>
						<tr>
							<td>ID</td>
							<td>姓名</td>
							<td>性别</td>
							<td>联系电话</td>
							<td>邮箱</td>
							<td>操作</td>
						</tr>
					</thead>
					<tbody>
						<?php
							$flag = false;
							if(isset($_GET['page'])){
								$page = $_GET['page'];
							}else{
								$page = 1;
							}
							
							if(!$flag){
								$con = new connect();
								$num_rows = $con->num_rows('tb_student');
								if($num_rows > 1){
									$total_page = ceil($num_rows/10);
									if($page > $total_page) {
										$page = $total_page;
										$limit = ($page-1)*10;
									}else{
										$limit = ($page-1)*10;
									}
									$result = $con->select('tb_student','','','','',"$limit",'10');
								}
							}
							
							foreach($result as $key=>$row){
								echo "<tr>";
								echo "<td width='160' align='left'>".$row['student_id']."</td>";
								echo "<td width='360' align='left'>".$row['chinese_name']."</td>";
								echo "<td width='560' align='left'>".$row['sex']."</td>";
								echo "<td width='180' align='left'>".$row['tel']."</td>";
								echo "<td width='560' align='left'>".$row['email']."</td>";
								echo "<td width='160' align='left'><a class=\"del\" href='javascript:void(0);'>删除<span style = \"display:none\">".$row['student_id']."</span></a></td>";
								echo "</tr>";
							}
							//$flag = true;
						?>
					</tbody>
				</table>
				<div id="page">
					<button type="bottom" id="last-page" onclick="prev();">上一页</button>
					<p>共<?php echo $total_page; ?>页,当前第<?php echo $page; ?>页</p>
					<button type="bottom" id="first-page" onclick="next();">下一页</button>
				</div>			
			</div>
		</div>
		<script>
			var url = "<?php echo $_SERVER['PHP_SELF']; ?>";			
			var page = "<?php echo $page+1; ?>";
			var total_page = "<?php echo $total_page ?>";
				
			var oDiv = document.getElementById('content-side');
			var div = oDiv.getElementsByTagName('div');

			function audit(obj){
				for(var i=0;i<div.length;i++){
					if(div[i].getAttribute('class') == 'show'){
						div[i].className = 'hide';
					}
				}
				var fun = /function\s+(\w+)/.exec(arguments.callee)[1];
				var oDiv = document.getElementById(fun);
				if(oDiv.getAttribute('class') == 'hide'){
					oDiv.className = 'show';	
				}			
			}
			function prev(){
				if(page > 2){
					var offset = page;
					offset = parseInt(offset) - 2;		
					window.location.href=url+'?page='+offset;
				}else{
					alert("已经是第一页");
					return false;
				}
			}
			function next(){
				if(page > total_page){
					alert("已经是最后一页");
					return false;
				}else{
					window.location.href=url+'?page='+page;
				}
			}
		</script>
		<script src="../js/jquery-1.10.1.min.js"></script>
		<script src="../js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				var del = $('.del');
				for (var i = 0; i < del.length; i++) {
					$(del[i]).click(function(){
						var val = $(this).find('span').text();
						$.post("del.php", {pid:val,state:'2'}, function(data){
							if(data == '1'){
								window.location.reload();
								alert("删除成功");
							}
						})
					})
				}
			})
		</script>