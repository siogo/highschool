<?php

	setcookie("username","",time()-1);
	setcookie("is_login","",time()-1);
	echo "<script>location.href=\"index.php\"</script>";
?>