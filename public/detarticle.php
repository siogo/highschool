<?php 
	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>文章详情</title>
	<link rel="stylesheet" href="css/style.css">
	<style type="text/css">
		pre{
			white-space: pre-wrap;       
			white-space: -moz-pre-wrap;  
			white-space: -pre-wrap;      
			white-space: -o-pre-wrap;    
			word-wrap: break-word;       
		}
	</style>
</head>
<body>
    <header id="header">
	    <div class="sec">
		    <h1 class="logo">师生互动平台</h1>
			<nav class="link">
			    <ul class="o-nav">
			        <li class="active"><a href="index.php" class="s-bc">首页</a></li>
				    <li><a href="addarticle.php" class="f-bc">发布文章</a></li>
				    <li><a href="###" class="d-bc">在线答疑</a></li>
				    <li><a href="paragraph.php?page=1" class="w-bc">文章赏析</a></li>
			    </ul>
				<div class="dz">
				    <ul>
					<?php
						if(isset($_COOKIE["username"])){
							echo "<div class=\"dlz\">Hi:<a href=\"setinfo.php\"><span id=\"user\">".$_COOKIE["username"]." </span></a><a href=\"logout.php\">[退出]</a></div>";
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
			    当前位置：文章赏析>>文章详情
			</div>
			<div class="return">
			    <a href="#" onclick="javascript:history.back(-1);">返回</a>
			</div>
			<div class="jt-article">
			    <div class="bt">
			    <?php  
			    	$pid = $_GET['pid'];
			    	$result = mysql_query("SELECT * FROM tb_paragraph WHERE para_id = ".$pid);
			    	while ($row = mysql_fetch_array($result)) {
			    		echo $row['para_title'];
			    	
			    ?>
				</div>
				<div class="xian"></div>
				<div class="writer">
				    <span class="zzhe">小编林青霞</span>&nbsp;&nbsp;
					<span class="time"><?php echo date("Y-m-d H:i:s",$row['para_publish']); ?></span>
				</div>
				<div class="tu">
				    <img src="img/Tulip.jpg"/>
				</div>
				<div class="wznr">
					<pre><?php  
						echo $row['para_content'];
					}
					?>
					</pre>
				    <!-- <p>
					    他们说这里有一盏灯，比星星更亮。
					</p>
					<p>
					    关于变老，我作为一个二十岁开头的年轻人，第一次有很深的感触是一个学期没回家爸妈的皱纹和白发，第二次是妈妈体检报告上成片的红色，第三次是一个老人，家里的灯泡坏了，他没法换，就摸黑去上厕所，然后，就没有然后了。
					</p>
					<p>
					    第三次也是活动的最开始。
					</p>
					<p>
					    公益活动有很多，如若平时看到可怜的人，我也会掏出几块钱给对方，这世上的生死也有很多，每天有人死去，又有人新生。可到底我没有真正体会过生死的概念，当我看到老人的子女时，那几张悲伤，痛苦，却又因为是生人而狠狠压抑，但最终没能忍住而借口去厕所的脸，这才有了"点亮一盏灯"的活动。 
					</p> -->
				</div>
				<div class="dzan">
				    已有20人点赞<a href="#"><img src="img/zan.png"/></a>
				</div>
				<div class="pl">
				    <input id="txt" type="text"/><input id="btn" type="button"/>
				</div>
				<div class="plzs">
				    <?php  
				    	$pid = $_GET['pid'];
				    	$esult = mysql_query("SELECT * FROM tb_message WHERE para_id = ".$pid." ORDER BY message_publish DESC");
				    	
				    	while ($row = mysql_fetch_array($esult)) {				    		
				    		if($row['child'] == 1){
				    			$html = '';
				    			$uid = $row['user_id'];				    			
				    			//$parent_id = $row['parent_id'];
				    			$result = mysql_query("SELECT * FROM tb_message WHERE user_id = ".$uid." AND child=0");
				    			$result_row = mysql_fetch_array($result);				    			
				    			if($result_row != false){
				    				$html .= '
			    						<div id="child">
							    			<div class="plr">
							    		 		<img src="img/tx.png"/>
							    		 	</div>
							    			<div class="plnr">
							    		 		<div class="z">
							    		 			<span>小新：</span>'.$result_row['message_content'].'
							    		 		</div>
							    		 		<div class="time">
							    		 			'.date('Y-m-d h:i:s',$result_row['message_publish']).'
							    		 		</div>
							    			</div>
							    		</div>
			    					';
				    			}
				    			if($result_row == false){				    				
				    				while(1){				    									    					
				    					$p = mysql_query("SELECT * FROM tb_message WHERE parent_id = ".$uid." AND child=1");				    					
			    						$p_result = mysql_fetch_array($p);			    						
					    				if($p_result != false){
					    					$uid = $p_result['user_id'];					    					
						    				$html .= '
					    						<div id="child">
									    			<div class="plr">
									    		 		<img src="img/tx.png"/>
									    		 	</div>
									    			<div class="plnr">
									    		 		<div class="z">
									    		 			<span>小新：</span>'.$p_result['message_content'].'
									    		 		</div>
									    		 		<div class="time">
									    		 			'.date('Y-m-d h:i:s',$p_result['message_publish']).'
									    		 		</div>
									    			</div>
									    		</div>									    		
					    					';						    				
				    					}else{
				    						$p = mysql_query("SELECT * FROM tb_message WHERE user_id = ".$uid." AND child=0");				    						
				    						$p_result = mysql_fetch_array($p);				    					
						    				if($p_result != false){
							    				$html .= '
						    						<div id="child">
										    			<div class="plr">
										    		 		<img src="img/tx.png"/>
										    		 	</div>
										    			<div class="plnr">
										    		 		<div class="z">
										    		 			<span>小新：</span>'.$p_result['message_content'].'
										    		 		</div>
										    		 		<div class="time">
										    		 			'.date('Y-m-d h:i:s',$p_result['message_publish']).'
										    		 		</div>
										    			</div>
										    		</div>
						    					';
				    							break;
				    						}			    				
				    					}				    					
				    				}
				    			}
				    			echo '
				    				<div class="border_co">				    			
										<div class="plzs">
										    <div class="plr">
											    <img src="img/tx.png"/>
											</div>
											<div class="plnr">
											    <div class="z">
												     <span>小新：</span>'.$row['message_content'].'
												</div>
												<div class="time">
												     '.date('Y-m-d h:i:s',$row['message_publish']).'<a href="javascript:void(0);" id="child_message" onclick="message(this);"><img src="img/tl.png"/></a>
												</div>
											</div>
										</div>																				
										'.$html.'
									</div><br />
				    			';
				    		}else
				    		{
				    			$uid = $row['user_id'];
					    		// 查询头像
					    		// $r = mysql_query("SELECT * FROM tb_student WHERE ")
					    		echo "<div class=\"border_co\">";
					    		echo "<div class=\"plr\">";
					    		echo 	"<img src=\"img/tx.png\"/>";
					    		echo "</div>";
					    		echo "<div class=\"plnr\">";
					    		echo 	"<div class=\"z\">";
					    		echo 		"<span>小新：</span>".$row['message_content']; 
					    		echo 	"</div>";
					    		echo 	"<div class=\"time\">";
					    		echo 		"".date('Y-m-d h:i:s',$row['message_publish'])." <a href=\"javascript:void(0);\" id=\"child_message\" onclick=\"message(this);\"><img src=\"img/tl.png\"/></a>";
					    		echo 	"</div>";
					    		echo "</div>";

					    		echo "</div>";
					    		echo "<br />";
				    		}				    		
				    	}	
				    ?>
				</div>
				
			</div>
		</div>	    
	</div>
	<div id="child_input" class="hide">
		<div style="background-color:#f0d">
			<p>留言板</p>
			<textarea name="chile_message" cols="50" rows="5" id="chile_message" placeholder="请输入留言内容......" autofocus="autofocus"></textarea>
			<input type="button" name="cancel" id="cancel" value="关闭" />
			<input type="button" name="up" id="up" value="提交" />
		</div>
	</div>
	<!-- <header>header</header>
	<section>section</section> -->
	<footer>
	    <div class="footer">
		      Copyright @ Plain and Simple | Design by WangXiang
		</div>
	</footer>
<script src="js/jquery-1.10.1.min.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		(function ($) {
            $.getUrlParam = function (name) {
                var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
                var r = window.location.search.substr(1).match(reg);
                if (r != null) return unescape(r[2]); return null;
            }
        })(jQuery);

        var pid = $.getUrlParam('pid');
		$('#btn').click(function(){
			var val = $('#txt').val();
			$.post('addliuyan.php',{content:val,pid:pid},function(data){
				// alert(data);
				if(data == '1'){
					alert('留言成功');
					window.location.reload(true);
				}else{
					alert('您未登录，请先登录');
				}
			});
		});
	});
	// var child_message = document.getElementById('child_message');
	// child_message.onclick = function(){
	// 	alert(111);
	// };
	function message(e){		
		var x = document.documentElement.scrollLeft || document.body.scrollLeft;		
		var y = document.documentElement.scrollTop || document.body.scrollTop;
		var child_input = document.getElementById('child_input');
		child_input.className='show';
		child_input.style.left=(x+480)+'px';
		child_input.style.top=(y+300)+'px';
		
		var oCancel = document.getElementById('cancel');
		oCancel.onclick = function(){
			child_input.className='hide';
		};
		
	}
</script>
</body>
</html>








