<?php

	/**
	*操作paragraph文章类
	*/
	header("content-type: text/html; charset: utf8");
	require_once("connect.class.php");
	
	class paragraph
	{
		private $con;
		private $num = 7;
		
		function __construct(){
			$connect = new connect;
			$this->con = $connect->connect_sql();
			mysqli_query($this->con, "set character set 'utf8'");
			mysqli_query($this->con, "set names 'utf8'");
		}
		
		public function get_para_title($page = 1)
		{
			$sql = "SELECT para_title FROM paragraph WHERE account=\"admin\"";
			mysqli_query($this->con, "set character set 'utf8'");
			mysqli_query($this->con, "set names 'utf8'");
			$result = mysqli_query($this->con, $sql);
			if($row = mysqli_num_rows($result) > $this->num){
				$page = ($page - 1)*7;
				$sql = "SELECT para_title,para_id FROM paragraph WHERE account=\"admin\" LIMIT $page,$this->num";
				$limit = mysqli_query($this->con, $sql);
				$data = array();
				for($i=0; $i<mysqli_num_rows($limit); $i++){
					$data[] = mysqli_fetch_assoc($limit);
				}
				return $data;
			}else
			{
				$data = array();
				for($i=0; $i<mysqli_num_rows($result); $i++){
					$data[] = mysqli_fetch_assoc($result);
				}
				return $data;
			}
		}
		//获取数据库paragraph表总条数
		public function get_count()
		{
			$sql = "SELECT COUNT(*) FROM paragraph";
			$result = mysqli_query($this->con, $sql);
			$count = mysqli_fetch_assoc($result);
			$result = ceil($count["COUNT(*)"] / 7);
			return $result;
		}
		
		public function get_message_for_zan($para_id)
		{
			$sql = "SELECT message_good FROM message WHERE para_id=".$para_id;
			$result = mysqli_query($this->con, $sql);
			
			$count = mysqli_fetch_assoc($result);
			return $count['message_good'];
		}
		
		public function set_message_for_zan($para_id)
		{
			$message_good = $this->get_message_for_zan($para_id);
			$message_good += 1;
			$sql = "UPDATE message SET message_good=".$message_good." WHERE para_id=".$para_id;
			mysqli_query($this->con, $sql);
			
			if(mysqli_affected_rows($this->con) !== NULL)
			{
				return true;
			}else{
				return false;
			}
		}
		
		public function get_message_data($para_id)
		{
			$sql = "SELECT * FROM message WHERE para_id=".$para_id;
			$result = mysqli_query($this->con, $sql);
			
			$row = mysqli_fetch_assoc($result);
			return $row;
		}
	}
	
	//$instance = new paragraph;
	//$instance->get_para_title();
?>