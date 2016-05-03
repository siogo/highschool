<?php 
	
	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");
	//这是回复主评论；
	if($_POST['type'] == '0'){
		if(isset($_COOKIE["username"])){

			$content = $_POST['content'];//留言内容；
			$pid = $_POST['pid'];//文章id
			$username = $_COOKIE['username'];//用户名
			$id = $_COOKIE['id'];//用户id
			$type = $_COOKIE['group'];//用户类型
			$time = time();//添加时间
			echo '1';
			mysql_query("INSERT INTO tb_test (message_content,message_publish,para_id,cu_id,type) VALUES ('".$content."','".$time."','".$pid."','".$id."','".$type."')");
		}else{
			echo "0";
		}
	}else{
		if(isset($_COOKIE["username"])){

			$content = $_POST['content'];//留言内容；
			$pid = $_POST['pid'];//文章id
			$username = $_COOKIE['username'];//用户名
			$id = $_COOKIE['id'];//用户id
			$type = $_COOKIE['group'];//用户类型
			$time = time();//添加时间
			$key = $_POST['key'];
			$result = mysql_query("SELECT cu_id FROM tb_test WHERE message_id = '".$key."'");
			while ($row = mysql_fetch_array($result)) {
				$pu_id = $row['cu_id'];
			}
			echo '1';
			mysql_query("INSERT INTO tb_test (message_content,message_publish,para_id,cu_id,type,mp_id,state,pu_id) VALUES ('".$content."','".$time."','".$pid."','".$id."','".$type."','".$key."','1','".$pu_id."')");
		}else{
			echo "0";
		}
	}
	

?>
