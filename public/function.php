<?php
	function isemail($email){
		$reg = '/([\w\-]+\@[\w\-]+\.[\w\-]+)/';
		if(preg_match($reg,$email)){
			return true;
		}else{
			return false;
		}
	}
?>