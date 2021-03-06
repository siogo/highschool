<?php
	//require_once('connect.class.php');
	class check{
		
		private $connect;
		
		public function __construct(){
			$this->connect = new connect();
		}
		
		public function get_username($username,$type=NULL){
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
		
		public function get_password($new_pwd, $password){
			
			if(md5($password) == $new_pwd){
				return true;
			}else{
				return false;
			}
		}
		
		public function get_email($username,$type=NULL){
			if($type == NULL){
				return false;
			}
			if(isset($username)){
				if($type == 'teacher'){
					$result = $this->connect->select('tb_teacher','account',$username);										
					if($result == false){
						return false;
					}else{
						$this->connect->update('tb_teacher','count',++$result[0]['count'],'account',$username);
						return $result[0];
					}				
				}
				$match = "/\w+@(\w|\d)+\.\w{2,3}/i";
				if(preg_match($match, $username)){
					if($type == 'student'){
						$result = $this->connect->select('tb_student','email',$username);						
					}
					
					if($result == false){
						return false;
					}else{
						$this->connect->update('tb_student','count',++$result[0]['count'],'email',$username);
						return $result[0];
					}
				}else{
					return false;
				}
			}
		}
	}



?>