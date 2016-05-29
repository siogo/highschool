<?php
    date_default_timezone_set("PRC");
    error_reporting(0);
    header("Content-Type:text/html;charset=UTF-8");
    mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
    mysql_select_db("highschool");
    mysql_query("set names 'utf8'");


    $wid = $_POST['wid'];
    $result = mysql_query("SELECT * FROM tb_onlinestu WHERE online_id = '".$wid."'");
    while ($row = mysql_fetch_array($result)) {
        $title = $row['online_publishtime'];  //发布时间;
        $course_id = $row['course_id'];
    }

    $result_a = mysql_query("SELECT * FROM tb_course WHERE course_id = '".$course_id."'");
    while ($row_a = mysql_fetch_array($result_a)) {
        $teacher = $row_a['teacher'];
    }

    $result_b = mysql_query("SELECT * FROM tb_teacher WHERE teacher_id = '".$teacher."'");
    while ($row_b = mysql_fetch_array($result_b)) {
        $teacher_name = $row_b['account'];
    }

    $src = 'homework/'.$teacher_name.'/'.$title."/";

    if (($_FILES["file"]["type"] == "application/octet-stream" || $_FILES["file"]["type"] == "application/x-zip-compressed")&&($_FILES["file"]["size"] < 6000000)){
        //由文件上传导致的错误代码>0 报告错误
        if ($_FILES["file"]["error"] > 0){
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        }else{
            echo "<script>";
            echo "alert(\"上传成功\");";
            echo "window.location.href = \"myhomework.php?page=1\";";
            echo "</script>";

            if (file_exists($src . $_FILES["file"]["name"])){
                echo $_FILES["file"]["name"] . "该文件已经存在";
            }else{
                move_uploaded_file($_FILES["file"]["tmp_name"], $src. $_FILES["file"]["name"]);
                echo "已经上传" . $src . $_FILES["file"]["name"];
                mysql_query("UPDATE tb_worksub SET state = '1', filename = '".$_FILES["file"]["name"]."' WHERE online_id = '".$wid."' AND student_id = '".$_COOKIE['id']."'");
            }
        }
    }else{
        // echo "";
        // echo $_FILES["file"]["type"];
        echo "<script>";
        echo "alert(\"非法文件\");";
        echo "window.location.href = \"myhomework.php?page=1\";";
        echo "</script>";
    }
?>