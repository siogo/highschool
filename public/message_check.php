<?php

	function check_message()
	{
		echo "111";
		die;
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(!isset($_POST['message']))
			{
				echo "<script></script>";
			}
		}else{
			echo "<script>location.href=detail.php;</script>";
		}
	}
?>