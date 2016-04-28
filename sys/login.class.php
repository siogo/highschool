<?php
	//require_once('connect.class.php');
	class check{
		
		private $connect;
		
		public function __construct(){
			$this->connect = new connect();
		}
		
		public function check_username($username,$type=NULL){
			if($type==NULL){
				return false;
			}
			$result = $this->connect->select('tb_student','chinese_name',$username);
			if(!empty($result)){
				return true;
			}else{
				return false;
			}
		}
		
		public function check_password($new_pwd, $password){
			
			if(md5($password) == $new_pwd){
				return true;
			}else{
				return false;
			}
		}
		
		public function check_email($username,$type=NULL){
			if($type == NULL){
				return false;
			}
			if(isset($username)){
				if($type == 'teacher'){
					$result = $this->connect->select('tb_teacher','account',$username);
					return $result[0];
				}
				$match = "/\w+@(\w|\d)+\.\w{2,3}/i";
				if(preg_match($match, $username)){
					if($type == 'student'){
						$result = $this->connect->select('tb_student','email',$username);
					}
					
					if($result == false){
						return false;
					}else{
						return $result[0];
					}
				}else{
					return false;
				}
			}
		}
	}



?>