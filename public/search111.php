<?php 

	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");
	
	$search = $_GET['search'];
	$result = mysql_query("SELECT * FROM tb_paragraph WHERE para_title like '%".$search."%'");
	while ($row = mysql_fetch_array($result)) {
		echo $row['para_title'].'<br />';
	}

?>