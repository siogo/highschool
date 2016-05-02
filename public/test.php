<html>

<body>
<?php  

	header("Content-Type:text/html;charset=UTF-8");
	mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
	mysql_select_db("highschool");
	mysql_query("set names 'utf8'");

	$ra = mysql_query("SELECT * FROM tb_test WHERE state = '0'");
	while ($rb = mysql_fetch_array($ra)) {
		$z = mysql_query("SELECT * FROM tb_student WHERE student_id = '".$rb['cu_id']."'");
		while ($zrow = mysql_fetch_array($z)) {
			echo $zrow['chinese_name']." : ";
		}
		echo $rb['message_content']."<br>";
		$message_id = $rb['message_id'];

		$rc = mysql_query("SELECT * FROM tb_test WHERE mp_id = '".$message_id."'");
		while ($rd = mysql_fetch_array($rc)) {
			// echo $rd['cu_id'];
			// echo $rd['pu_id'];
			$rwo = mysql_query("SELECT * FROM tb_student WHERE student_id = '".$rd['cu_id']."'");
			while ($rwoa = mysql_fetch_array($rwo)) {
				echo "<span style=\"margin-left:20px;\">".$rwoa['chinese_name']."对"."</span>";
			}

			$rowb = mysql_query("SELECT * FROM tb_student WHERE student_id = '".$rd['pu_id']."'");
			while ($rwoc = mysql_fetch_array($rowb)) {
				echo $rwoc['chinese_name']."说:";
			}
			echo "<span style=\"margin-left:20px;\">".$rd['message_content']."</span><br>";
		}
	}
?>
</body>
</html>
