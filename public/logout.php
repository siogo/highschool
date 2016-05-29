<?php
	date_default_timezone_set("PRC");
	error_reporting(0);
	setcookie("username","",time()-1);
	setcookie("is_login","",time()-1);
	setcookie("group","",time()-1);
	setcookie("name","",time(-1));
	setcookie("email","",time()-1);
	setcookie("nickcheck","",time()-1);
<<<<<<< HEAD
	setcookie("id","",time()-1);
=======
	setcookie("passport","",time()-1);
>>>>>>> 848758999ef3bee2e7b1f033aa7f2dc4a9d5a774
	echo "<script>location.href=\"index.php\"</script>";
?>