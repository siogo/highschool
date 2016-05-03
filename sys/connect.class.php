<?php

	/**
	* 连接数据库类
	* 操作数据库的增、删、查、改
	*/
	header("content-type: text/html; charset: utf-8");
	DEFINE("HOST","localhost");
	DEFINE("USERNAME","root");
	DEFINE("PASSWORD","123456");
	DEFINE("DB","highschool");
	
	class connect{
		private $con;
		
		public function __construct(){
			$this->con = mysqli_connect(HOST,USERNAME,PASSWORD,DB);
			mysqli_query($this->con, "set character set 'utf8'");
			mysqli_query($this->con, "set names 'utf8'");
		}
		
		public function select($tablename,$where_column=null,$where=null,$order_by=null,$sort=null,$start=null,$limit=null){

			mysqli_query($this->con, "set character set 'utf8'");
			mysqli_query($this->con, "set names 'utf8'");
			if($where_column == null && $where == null && $start == null && $limit == null && $order_by == null && $sort ==null){
				$query = "SELECT * FROM $tablename";
			}else if($where_column != null && $where != null && $start != null && $limit != null && $order_by != null && $sort != null){
				$query = "SELECT * FROM $tablename WHERE $where_column='".$where."' ORDER BY $order_by $sort LIMIT $start,$limit ";
			}else if($where_column != null && $where != null && $start != null && $limit != null){
				$query = "SELECT * FROM $tablename WHERE $where_column='".$where."' LIMIT $start,$limit";
			}else if($where_column != null && $where != null && $order_by != null && $sort != null){
				$query = "SELECT * FROM $tablename WHERE $where_column='".$where."' $order_by $sort ";
			}else if($where_column != null && $where != null){
				$query = "SELECT * FROM $tablename WHERE $where_column='".$where."' ";
			}else if($start != null && $limit != null){
				$query = "SELECT * FROM $tablename LIMIT $start,$limit";
			}else if($order_by != null && $sort != null){
				$query = "SELECT * FROM $tablename ORDER BY $order_by $sort";
			}
			$result = mysqli_query($this->con,$query);

			$arr_length = mysqli_affected_rows($this->con);
			$row = array();
			for($i=0;$i<$arr_length;$i++){
				$row[] = mysqli_fetch_assoc($result);
			}
			return $row;
		}
		
		public function insert($tablename,$name=array(),$value=array()){
			mysqli_query($this->con, "set character set 'utf8'");
			mysqli_query($this->con, "set names 'utf8'");
			if($name != null && $value != null && count($name) == count($value)){
				if(is_array($name) && is_array($value)){
					$names = implode(',',$name);
					$values = implode('\',\'',$value);
					$query = "INSERT INTO $tablename ($names) VALUES ('$values')";
				}else{
					echo '{"msg":"参数不是数组！","success":"0"}';
				}
			}else{
				$query = "";
			}
			$result = mysqli_query($this->con,$query);
			if(!$result){
				echo '{"msg":"插入失败，请检查参数是否正确！","success":"0"}';
			}
			if(mysqli_affected_rows($this->con) !== FALSE){				
				return true;
			}else{				
				return false;
			}
		}
		
		public function update($tablename,$column=null,$value=null,$where_column=null,$where=null){
			mysqli_query($this->con, "set character set 'utf8'");
			mysqli_query($this->con, "set names 'utf8'");
			if($column != null && $value != null && $where_column != null && $where != null){
				$query = "UPDATE $tablename SET $column='".$value."' WHERE $where_column='".$where."' ";
			}
			$result = mysqli_query($this->con,$query);
			if(!$result){
				echo '{"msg":"更新数据失败,请检查参数是否正确！","success":"0"}';
			}
		}
		
		public function delete($tablename,$column=null,$where=null){
			mysqli_query($this->con, "set character set 'utf8'");
			mysqli_query($this->con, "set names 'utf8'");
			if($column != null && $where != null){
				$query = "DELETE FROM $tablename WHERE $column='".$where."' ";
			}else{
				$query = "";
			}
			$result = mysqli_query($this->con,$query);
			if(!$result){
				echo '{"msg":"删除数据失败，请检查参数是否正确！","success":"0"}';				
			}
			if(mysqli_affected_rows($this->con) !== FALSE){
				return true;
			}else{
				return false;
			}
		}
		
		public function num_rows($tablename){
			$query = "SELECT COUNT(*) FROM $tablename";
			$result = mysqli_query($this->con,$query);
			$num_rows = mysqli_fetch_array($result);
			return $num_rows[0];
		}
	}
?>