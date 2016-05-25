<?php
/**
* by www.phpddt.com
*/
error_reporting(E_ALL&~E_NOTICE);
header("content-type:text/html;charset=utf-8");
ini_set("magic_quotes_runtime",0);
require 'smtpmail.php';
try {
	$ren=rand(1000,9000);
	$mail = new PHPMailer(true); 
	$mail->IsSMTP();
	$mail->CharSet='UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码
	$mail->SMTPAuth   = true;                  //开启认证
	$mail->Port       = 25;                    
	$mail->Host       = "smtp.163.com"; 
	$mail->Username   = "z379044496@163.com";    
	$mail->Password   = "zhangzao0422";            
	//$mail->IsSendmail(); //如果没有sendmail组件就注释掉，否则出现"Could  not execute: /var/qmail/bin/sendmail "的错误提示
	$mail->AddReplyTo("z379044496@163.com","mckee");//回复地址
	$mail->From       = "z379044496@163.com";
	// $mail->From   = $_POST['name'];
	$mail->FromName   = '亲爱的用户';	
	$to =$_POST['email'];
	$mail->AddAddress($to);
	$mail->Subject  = "重置密码，安全验证";
	$mail->Body = "亲爱的高校师生互联平台用户---验证码是---".$ren."    ----------请在查看邮件之后，获得验证码之后，返回高校师生互联平台输入验证码--";
	$mail->AltBody    = "请在查看邮件之后，获得验证码之后，返回高校师生互联平台输入验证码"; //当邮件不支持html时备用显示，可以省略
	$mail->WordWrap   = 80; // 设置每行字符串的长度
	//$mail->AddAttachment("f:/test.png");  //可以添加附件
	$mail->IsHTML(true); 
	$mail->Send();
    echo $ren;
} catch (phpmailerException $e) {
	             echo"<script>";
		         echo"alert('邮件发送失败,请检查邮箱地址是否有效or或暂时不法发送');";
		         echo"</script>";
}
?>