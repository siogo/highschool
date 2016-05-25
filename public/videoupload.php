<?php
    date_default_timezone_set("PRC");
    error_reporting(0);
    header("Content-Type:text/html;charset=UTF-8");
    mysql_connect("localhost","root","123456") or die("Could not connect:".mysql_error());
    mysql_select_db("highschool");
    mysql_query("set names 'utf8'");


    // $wid = $_POST['wid'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id = $_COOKIE['id'];
    $type = $_COOKIE['group'];
    $src = 'video/';

    if (($_FILES["file"]["type"] == "video/mp4" || $_FILES["file"]["type"] == "application/x-zip-compressed")&&($_FILES["file"]["size"] < 6000000)){
        //由文件上传导致的错误代码>0 报告错误
        if ($_FILES["file"]["error"] > 0){
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        }else{
            
            echo "上传成功";
            echo "<script>";
            echo "window.location.href = \"setinfo.php\"";
            echo "</script>";
            if (file_exists($src . $_FILES["file"]["name"])){
                echo $_FILES["file"]["name"] . "该文件已经存在";
            }else{
                move_uploaded_file($_FILES["file"]["tmp_name"], $src. $_FILES["file"]["name"]);
                echo "已经上传" . $src . $_FILES["file"]["name"];
                mysql_query("INSERT INTO tb_video (video_title,video_content,video_kind,account,type,video_publish) VALUES ('".$title."', '".$content."','".$src.$_FILES["file"]["name"]."','".$id."','".$type."','".time()."')");
            }
        }
    }else{
        echo "非法文件";
        echo "<script>";
        echo "window.location.href = \"videosub.php\"";
        echo "</script>";
    }
?>