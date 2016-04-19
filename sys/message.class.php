<?php
	include("connect.class.php");
	
	class message
	{
		private $con;
		
		function __construct()
		{
			$connect_database = new connect;
			if($connect_database != NULL)
			{
				$this->con = $connect_database->connect_sql();
			}
		}
		//点赞获取数据函数
		function get_message_for_zan($zan = "set", $data = 51, $para_id = 12)
		{
			//判断是否是获取数据如果$zan为get则为获取数据
			if($zan == "get")
			{
				if($para_id == "")
				{
					echo "<script>location.href='../public/paragraph.php';</script>";
				}
				$sql = "SELECT message_good FROM message WHERE para_id=".$para_id;
				$result = mysqli_query($this->con, $sql);
				if(mysqli_affected_rows($this->con) != NULL)
				{
					$row = mysqli_fetch_assoc($result);
					$message_good = $row["message_good"];
					return $message_good;
				}else
				{
					return;
				}
			}elseif($zan == "set")
			{
				if($para_id != NULL)
				{
					$this->set_message_for_zan($data, $para_id);
					return;
				}
			}
		}
		//设置点赞数据函数
		function set_message_for_zan($data, $para_id)
		{
			if($data != NULL)
			{
				if($data = htmlspecialchars($data))
				{
					$sql = "UPDATE message SET message_good=$data WHERE para_id=".$para_id;
					$result = mysqli_query($this->con, $sql);
					if(mysqli_affected_rows($this->con) != NULL)
					{
						
					}
				}else
				{
					return;
				}
			}
		}
	}
?>