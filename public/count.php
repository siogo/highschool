<?php  

	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");

	$pid = $_POST['pid'];
	$result = mysql_query("SELECT * FROM tb_paragraph WHERE para_id = '".$pid."'");
	while ($row = mysql_fetch_array($result)) {
		$read = $row['count_read'];
	}
	$read = $read + 1;
	mysql_query("UPDATE tb_paragraph SET count_read = '".$read."' WHERE para_id = '".$pid."'");

?>