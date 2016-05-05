<?php
	require_once('../../sys/connect.class.php');
?>
<!doctype html>
<html>
	<head>
		<title>欢迎使用高校师生互动平台管理后台</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../../css/manage.css" type="text/css">
	</head>
	
	<body>
		<div id="header">高校师生互动平台管理后台</div>
		<div id="row">
			<div id="side">
				<ul>
					<li><a href="welcome.php">管理后台</a></li>
					<li><a href="javascript:void(0);" onclick="audit(this);">文章列表</a></li>
					<li><a href="message.php">留言列表</a></li>
					<li><a href="homework.php">作业列表</a></li>
					<li><a href="student.php">学生信息</a></li>
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
							<td>标题</td>
							<td>发布时间</td>
							<td>发布用户</td>
							<td>发布内容</td>
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
								$num_rows = $con->num_rows('tb_paragraph');
								if($num_rows > 10){
									$total_page = ceil($num_rows/10);
									if($page > $total_page) {
										$page = $total_page;
										$limit = ($page-1)*10;
									}else{
										$limit = ($page-1)*10;
									}
									$result = $con->select('tb_paragraph','','','','',"$limit",'10');
								}
							}
							
							foreach($result as $key=>$row){
								echo "<tr>";
								echo "<td width='160' align='left'>".$row['para_id']."</td>";
								echo "<td width='360' align='left'>".mb_substr($row['para_title'],0,10,'utf-8')."</td>";
								echo "<td width='560' align='left'>".date('Y-m-d H:i:s',$row['para_publish'])."</td>";
								echo "<td width='160' align='left'>".$row['account']."</td>";
								if($row['para_content'] == ''){
									echo "<td width='560' align='left'>".$row['para_content']."</td>";
								}else{
									echo "<td width='560' align='left'>".mb_substr($row['para_content'],0,10,'utf8').'...'."</td>";
								}
								echo "<td width='160' align='left'><a href='javascript:void(0);' onclick='del(this);'>删除</a></td>";
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