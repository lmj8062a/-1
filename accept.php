<?php
require_once "dbconn.php";

	session_start();

$sid= $_SESSION['id'];
mysqli_query($conn,"SET NAMES utf8");
$idx= $_POST['idx'];
echo $ids = $_POST['ids'];
if(isset($_POST['$idx']));{
	$result23=mysqli_query($dbc,"SELECT * FROM request where number=$ids");
$row=mysqli_fetch_array($result23);

echo $thisid=$row['requestid'];
$title = $row['help'];

  $emailrow=mysqli_query($dbc,"SELECT * FROM userinfo where id='$thisid'");
$rows=mysqli_fetch_array($emailrow);

$email=$rows['email'];

$telrow=mysqli_query($dbc,"SELECT * FROM userinfo where id='$sid'");
$telrows=mysqli_fetch_array($telrow);
$tel =$telrows['tell'];
echo $email;
echo $tel;
////이메일 보내기/////////////////////


require_once('PHPMailerAutoload.php');

$mail = new PHPMailer(); 

$mail->ContentType = "text/html";  

//전송시 한글 깨짐 방지
$mail->Charset = 'UTF-8'; 
$mail->SMTPSecure = 'ssl'; 

$mail->isSMTP(); 
$mail->SMTPDebug = 2; 

$subject = "도움 요청드립니다.";
$mail_from  = "email";
$mail_to  = $email;

//제목과 보내는 사람 이름 등등은 직접적으로 인코딩 변경
$subject = "=?UTF-8?B?".base64_encode($subject)."?="."\r\n"; 
$mail_from = "=?UTF-8?B?".base64_encode($mail_from )."?="."\r\n"; 
$mail_to = "=?UTF-8?B?".base64_encode($mail_to)."?="."\r\n"; 

$message =  "게시글 :".$title.'<br>'."연락주세요 :".$tel;
  
$mail->Debugoutput = 'html'; 
  
$mail->Host = 'smtp.naver.com'; 
  
$mail->Port = 465; 
$mail->SMTPAuth = true; 
  
$mail->Username = "email"; 
  
$mail->Password = "password"; 
  
$mail->setFrom('email', $mail_from); 
  
$mail->addReplyTo('email', $mail_from); 
  
$mail->addAddress($email, $mail_to); 
  
$mail->Subject = $subject; 
  
$mail->msgHTML($message, dirname(__FILE__)); 
  
$mail->AltBody = 'This is a plain-text message body'; 
  
if (!$mail->send()) { 
    //echo "Mailer Error: " . $mail->ErrorInfo; 
    echo "<script>alert('메일이 보내지지 않았습니다.');</script>";
    echo "<script> location.href='./check.php';</script>";
} else { 
	$query="update request set approve='$sid' where number = '$ids'";


mysqli_query($dbc,$query);

echo "<script>alert('도움 신청 메일을 보냈습니다.');</script>";
echo "<script> location.href='./check.php';</script>";

    //echo "Message sent!"; 
}






////////////////////이메일 보내기//////////////////////
















  

//echo "<script> alert('$sid'); </script>";
//echo "<script> alert('$ids'); </script>";
}


?>