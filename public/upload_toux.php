<?php 
	
	$username = $_COOKIE['username'];
	$img = $_POST['img'];
	$s = base64_decode(str_replace('data:image/png;base64,','', $img));
	if(file_exists('./photo_head/'.$username)){

	}else{
		mkdir('./photo_head/'.$username);
	}
	$src = './photo_head/'.$username.'/head.png';
	$state = file_put_contents($src, $s);
	$arr = array('state' => $state,'username' => $username);
	$data = json_encode($arr);
	echo $data;

?>