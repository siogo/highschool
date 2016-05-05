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
					<li><a href="audit.php" onclick="audit(this);">文章列表</a></li>
					<li><a href="message.php" onclick="message(this);">留言列表</a></li>
					<li><a href="homework.php" onclick="homework(this);">作业列表</a></li>
					<li><a href="student.php" onclick="student(this);">学生信息</a></li>
					<li><a href="javascript:void(0);" onclick="teacher(this);">教师信息</a></li>
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

					</tbody>
				</table>
			</div>
		</div>