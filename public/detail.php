<?php
	require_once("../sys/connect.class.php");
	require_once("../sys/paragraph.class.php");
	require_once("message_check.php");
	
	session_start();
	
	$instance = new connect;
	$con = $instance->connect_sql();
	if(!isset($_GET["detail"]))
	{
		echo "<script>location.href='paragraph.php';</script>";
	}else
	{
		$detail = $_GET["detail"];
	}
	$sql = "SELECT * FROM paragraph WHERE para_id=".$detail;
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	
	$para = new paragraph();
	$message_good = $para->get_message_for_zan($detail);

	$message_data = $para->get_message_data($detail);
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title><?php echo $row["para_title"]; ?></title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header id="header">
	    <div class="sec">
		    <h1 class="logo">师生互动平台</h1>
			<nav class="link">
			    <ul class="o-nav">
			        <li><a href="index.php" class="s-bc">首页</a></li>
				    <li><a href="###" class="f-bc">发布文章</a></li>
				    <li><a href="###" class="d-bc">在线答疑</a></li>
				    <li class="active"><a href="paragraph.php" class="w-bc">文章赏析</a></li>
			    </ul>
				<div class="dz">
				    <ul>
					<?php
						if(isset($_COOKIE["username"])){
							echo "<div class=\"dlz\">Hi:<span>".$_COOKIE["username"]." </span><a href=\"logout.php\">[退出]</a></div>";
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
    <div id="content" style="background:none;border:1px solid #333;width:998px">	
	    <div class="wzxqk">
		    <div class="wz">
			    <a href="javascript:void(0);">当前位置</a>：<a href="javascript:void(0);">文章赏析</a>><a href="javascript:void(0)">文章详情</a>
			</div>
			<div class="return">
			    <a href="paragraph.php">返回</a>
			</div>
			<div class="jt-article">
			    <div class="bt">
					<?php
						echo $row["para_title"];
					?>
				</div>
				<div class="xian"></div>
				<div class="writer">
				     <span class="zzhe"><?php echo $row["account"]; ?></span>&nbsp;&nbsp;
					 <span class="time"><?php echo $row["para_publish"]; ?></span>
				</div>
				<div class="tu">
				    <img src="img/Tulip.jpg"/>
				</div>
				<div class="wznr">
				    <?php
						echo "<p>";
						echo $row["para_content"];
						echo "</p>";
					?>
				</div>
				<div class="dzan">
				    已有<?php echo $message_good; ?>人点赞<a href="#"><img src="img/zan.png"/></a>
				</div>
				<div class="pl">
				    <input type="text" name="message"/><input type="button" name="send_message"/>
				</div>
				<?php
					echo "
					<div class='plzs'>
						<div class='plr'>
							<img src='img/tx.png'/>
						</div>
						<div class='plnr'>
							<div class='z'>
								 <span>".$message_data['user'].":</span>".$message_data['message_content']."
							</div>
							<div class='time'>
								 ".$message_data['message_publish']."<img src='img/tl.png'/>
							</div>
						</div>
					</div>					
					";
				?>
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
</body>
</html>








