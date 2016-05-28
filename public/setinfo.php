<?php
	date_default_timezone_set("PRC");
	error_reporting(0);
	header('Content-Type:text/html; charset=utf-8');
	session_start();
	if(!isset($_SESSION['passport']) || $_SESSION['passport'] != $_COOKIE['passport']){
		echo "<script type='text/javascript'>alert('亲,请先登录才能进入个人中心哟!');window.location.href='index.php'</script>";	
		die;		
	}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<title>个人资料</title>
<link rel="stylesheet" href="css/style.css">
<style>
      .cropit-preview-image-container {
        cursor: move;
      }
    </style>
</head>
<body>
    <header id="header">
	    <div class="sec">
		    <h1 class="logo">师生互动平台</h1>
			<nav class="link">
			    <ul class="o-nav">
			        <li><a href="index.php" class="s-bc">首页</a></li>
				    <li><a href="addarticle.php" class="f-bc">发布文章</a></li>				    
				    <li><a href="paragraph.php?page=1" class="w-bc">文章赏析</a></li>
				    <li class="active"><a href="setinfo.php" class="d-bc">个人中心</a></li>
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
				<span class="stu"><a href="./myscore.php">我的成绩</a></span>
			</div>
			<div class="Xx">
			    <span class="stu"><a href="./myclass.php">我的课程</a></span>&nbsp;&nbsp;
				<span class="stu"><a href="./myhomework.php?page=1">我的作业</a></span>
			</div>
			<div class="Xx">
			    <span class="grxx"><a href="./videosub.php">发布视频</a></span>&nbsp;&nbsp;
				<span class="grxx"><a href="./videolist.php?page=1">视频播放</a></span>
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

	    <div class="setion-1">
		    <div class="bt-prev left">
				<img src="img/bt-prev.png"/>
			</div>
			<div class="box">
		        <div class="flexslider" id="three">
			        <ul class="slides">
				        <li>
					        <div class="title">
						        <a href="###">标题</a>
						    </div>
							<div class="time">
						        2016年10月28日
						    </div>
						    <p class="w">
							    <a href="###">
							       哈哈哈哈哈哈哈哈哈哈哈哈哈纪委行情已经有加干涉我u坚实的金融界呵呵呵哈哈哈哈哈哈哈纪委行情已经有加干涉我u坚实的金融界呵呵呵哈哈哈哈哈哈哈纪委行情已经有加干涉我u坚实的金融界呵呵呵哈纪委行情已经有加干涉我u坚实的金融界呵呵呵一人机会危机不仅今晚而后...
							    </a>
						    </p>
						    <div class="yz">
						        阅读（5）|转载（5）|评论（5）
						    </div>
					    </li>
						<li>
					        <div class="title">
						        <a href="###">标题</a>
						    </div>
							<div class="time">
						        2016年10月28日
						    </div>
						    <p class="w">
							    <a href="###">
							       哈哈哈哈哈哈哈哈哈哈哈哈哈纪委行情已经有加干涉我u坚实的金融界呵呵呵哈哈哈哈哈哈哈纪委行情已经有加干涉我u坚实的金融界呵呵呵哈哈哈哈哈哈哈纪委行情已经有加干涉我u坚实的金融界呵呵呵哈纪委行情已经有加干涉我u坚实的金融界呵呵呵一人机会危机不仅今晚而后...
							    </a>
						    </p>
						    <div class="yz">
						        阅读（5）|转载（5）|评论（5）
						    </div>
					    </li>
				    </ul>
			    </div>
			</div>
			<div class="bt-next right">
				<img src="img/bt-next.png"/>
			</div>
		</div>

		<div class="setion-2">
		    <div>
			    <div class="yt">
				    当前页面：我的信息>>
				</div>
			    <div class="return-2">
			        返回
			    </div>
			</div>
			<div class="ej">
			    <div class="kk dj">
				    <span class="grzl" style="cursor:pointer">个人资料</span>
				</div>
				<div class="kk">
				    <span class="txsz" style="cursor:pointer">头像设置</span>
				</div>
				<div class="kk">
				    <span class="yxyz" style="cursor:pointer">邮箱验证</span>
				</div>
				<div class="kk">
				    <span class="mmxg" style="cursor:pointer">密码修改</span>
				</div>
			</div>
		</div>

		<div class="setion-22">
		    <div>
			    <div class="yt">
				    当前页面：我的信息
				</div>
			    <div class="return-2 return-22">
			        返回
			    </div>
				<div class="zl">
				    <form class="zl-1">
					    <table>
						    <tr>
							    <td class="mc">
								    <div>
									    昵称
									</div>
								</td>
								<td class="xs">
								    <div>
									   <input type="text" id="nickname" />
									</div>
								</td>
							</tr>
							<tr>
							    <td class="mc">
								    <div>
									    联系电话
									</div>
								</td>
								<td class="xs">
								    <div>
									   <input type="text" id="tel" />
									</div>
								</td>
							</tr>
							<tr>
							    <td class="mc">
								    <div>
									    性别
									</div>
								</td>
								<td class="xs-1">
								    <div>
									   <input type="radio" name="sex" value="unknown" />保密
									   <input type="radio" name="sex" value="male" />男
									   <input type="radio" name="sex" value="famale" />女
									</div>
								</td>
							</tr>
							<tr>
							    <td class="mc wk1" valign="top">
								    <div>
									    个性签名
									</div>
								</td>
								<td>
									<textarea rows="8" id="txt" style="width:400px;outline:none;"></textarea>
								</td>
							</tr>
							<tr class="xg">
							    <td></td>
							    <td style="text-align:center;">
								     <input style="cursor:pointer" type="button" id="changemsg" value="修改"/>
								</td>
							</tr>
						</table>
					</form>
				</div>

				<div class="jttxsz">
				    <div class="txwk">
				    	<div class="image-editor" style="">
				    		<input type="file" class="cropit-image-input">
      						<div class="cropit-preview" style="background-color: #f8f8f8; background-size: cover; border: 1px solid #ccc; border-radius: 3px; margin-top: 7px; width: 250px; height: 250px;"></div>
      						<div class="image-size-label" style="margin-top: 10px;">

     			 			</div>
      						<span>缩放：</span><input type="range" class="cropit-image-zoom-input"><br />
      						<button class="export" style="margin-top: 10px;">修改</button>
    					</div>
				    </div>
				</div>

				<div class="yxym">
				    <div class="yy">
					    <form>
					        <div>当前邮箱</div>
						    <div>
						        <input id="checkemail" type="text"/>
						    </div>
						    <div>
							    <input id="btnsend" type="button" value="发送邮件" style="cursor: pointer;" />
							</div>
							<div>
						        <input id="yanzhengma" type="text"/ placeholder="请输入验证码">
						    </div>
							<div>
							    <input id="btnchange" type="button" value="确认更改" style="cursor: pointer;" />
							</div>
						</form>
					</div>
				</div>

				<div class="mmdk">
				    <form>
				        <div class="mm" style="margin-top:80px">
					        <input type="password" placeholder="当前密码" id="password_old" />
					    </div>
						<div class="mm">
					        <input type="password" placeholder="新密码" id="pawd_1" />
					    </div>
						<div class="mm">
					        <input type="password" placeholder="确认密码" id="pawd_2" />
					    </div>
						<div class="tj">
					        <input type="button" value="提交" id="changepawd" />
					    </div>
					</form>
				</div>

			</div>
		</div>

    </div>
	<footer>
	    <div class="footer" style="clear:both">
		      Copyright&nbsp;&#64;&nbsp;Plain and Simple&nbsp;&#124;&nbsp;Design by WangXiang
		</div>
	</footer>
<script src="//cdn.bootcss.com/jquery/2.0.0/jquery.min.js"></script>
<script src="js/jquery.cropit.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		//根据group显示功能块
		var group = $('#group').text();
		if(group == 'student'){
			$('.teac').hide();
		}else{
			$('.stu').hide();
		}

		//抓头像
		var user = $('#user').text();
		$('#headphoto').attr('src','photo_head/'+user+"/head.png");

		$('#three').flexslider({
			animation: "slide",
            animationLoop: true,
            pauseOnAction: false,
		});
		//显示文章面板
		$('.zxwz').click(function(){
			$('.none').show();
			$('.zxwz').hide();
			$('.shouqi').show();
		});
		//隐藏文章面板
		$('.shouqi').click(function(){
			$('.none').hide();
			$('.shouqi').hide();
			$('.zxwz').show();
		});

		//个人信息
		$('.grxx').click(function(){
			$('.setion-1').hide();
			$('.setion-2').show();
			$('.setion-22').hide();
		})

		$('.return-2').click(function(){
			$('.setion-1').show();
			$('.setion-2').hide();
		})

		$('.grzl').click(function(){
			$('.setion-2').hide();
			$('.setion-1').hide();
			$('.setion-22').show();
			$('.zl').show();
			$('.jttxsz').hide();
			$('.yxym').hide();
			$('.mmdk').hide();
		});

		$('.return-22').click(function(){
			$('.setion-1').hide();
			$('.setion-2').show();
			$('.setion-22').hide();
		});

		$('.txsz').click(function(){
			$('.setion-2').hide();
			$('.setion-1').hide();
			$('.setion-22').show();
			$('.jttxsz').show();
			$('.zl').hide();
			$('.yxym').hide();
			$('.mmdk').hide();
		});

		$('.return-22').click(function(){
			$('.setion-1').hide();
			$('.setion-2').show();
			$('.setion-22').hide();
		});

		$('.yxyz').click(function(){
			$('.setion-2').hide();
			$('.setion-1').hide();
			$('.setion-22').show();
			$('.zl').hide();
			$('.jttxsz').hide();
			$('.mmdk').hide();
			$('.yxym').show();
		});

		$('.return-22').click(function(){
			$('.setion-1').hide();
			$('.setion-2').show();
			$('.setion-22').hide();
		});

		$('.mmxg').click(function(){
			$('.setion-2').hide();
			$('.setion-1').hide();
			$('.setion-22').show();
			$('.zl').hide();
			$('.jttxsz').hide();
			$('.mmdk').show();
			$('.yxym').hide();
		})

		// $('.return-22').click(function(){
		// 	$('.setion-1').hide();
		// 	$('.setion-2').show();
		// 	$('.setion-22').hide();
		// });

		//修改个人信息
		$('#changemsg').click(function(){
			var group = $('#group').text();
			var nickname = $('#nickname').val();
			var tel = $('#tel').val();
			var reg = /1[0-9][0-9]{9}/;
			var sex = $('.xs-1').find('input:radio:checked').val();
			var text = $('#txt').val();
			if(!reg.test(tel)){
				alert("请输入正确格式电话");
			}else{
				$.post('myinfo_modify.php',{nickname:nickname,tel:tel,sex:sex,text:text,type:'msg',group:group},function(data){
					if(data == '1'){
						alert("修改成功！");
						$('.setion-2').fadeIn();
						$('.setion-22').fadeOut();
					}
				});
			}
			if(group == '' || nickname == '' || tel == '' || sex == '' || text == '')
			{
				alert('内容不能为空!');
				return;
			}
			if(!reg.test(tel)){
				alert("请输入正确格式电话");
				return;
			}
			$.post('myinfo_modify.php',{nickname:nickname,tel:tel,sex:sex,text:text,type:'msg',group:group},function(data){
				if(data == '1'){
					alert("修改成功！");
					$('.setion-2').fadeIn();
					$('.setion-22').fadeOut();
				}
			});

		});

		// 发送邮箱
		var yanzheng;
		var email;
		$('#btnsend').click(function(){
			email = $('#checkemail').val();
			var regemail = /\w+[@]{1}\w+[.]\w+/;
			if(!regemail.test(email)){
				alert("请输入正确格式邮箱");
			}else{
				alert("邮件已发送");
				$.post('smtpmailsend.php',{'email':email},function(data){					
					yanzheng = data;
				})	
			}		
		})
		$('#btnchange').click(function(){
			var text = $('#yanzhengma').val();
			if(text == yanzheng){
				alert("邮箱已经验证");
				$.post('checkemail.php',{"email":email},function(data){
				})
				window.location.href = 'setinfo.php';
			}else{
				alert("邮箱验证不成功");
			}
		})


		//修改密码
		$('#changepawd').click(function(){			
			var password_old = $('#password_old').val();
			var pawd_1 = $('#pawd_1').val();
			var pawd_2 = $('#pawd_2').val();
			if(pawd_1 != pawd_2){
				alert('两次输入的密码不一致，请重新输入');
				$('#pawd_1').val("");
				$('#pawd_2').val("");
			}else{
				$.post('myinfo_modify.php',{password_old:password_old,password_new:pawd_1,type:'pawd'},function(data){
					if(data == '1'){
						alert("修改成功！");
						$('#password_old').val("");
						$('#pawd_1').val("");
						$('#pawd_2').val("");
					 	$('.setion-2').fadeIn();
						$('.setion-22').fadeOut();
					}else if(data == '0'){
						alert("当前密码错误，修改失败！");
						$('#password_old').val("");
						$('#pawd_1').val("");
						$('#pawd_2').val("");
					}else{
						alert("新密码长度至少为8位！");
						$('#password_old').val("");
						$('#pawd_1').val("");
						$('#pawd_2').val("");
					}
				});
			}
		});
		$(function() {
        	$('.image-editor').cropit({
        		imageState: {},
        	});

        	$('.export').click(function() {
        		var imageData = $('.image-editor').cropit('export');        		
        		if(imageData == undefined)
        		{
        			alert('请选择头像!');
        			return;
        		}
        		$.post('upload_toux.php',{img:imageData},function(data){
        			var obj = $.parseJSON(data);
        			if(obj.state){
        				alert("修改成功！")
        				// window.location = "http://127.0.0.1/bs/homework/public/setinfo.php";
        				window.location.reload();
        			}
        		});
        	});
      	});
	});
</script>
</body>
</html>
