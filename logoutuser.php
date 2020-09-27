<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p align="center">
<title>누가도와달래 로그아웃</title>
 
</head>
<body>
<center>
  <h2> 누가도와달래 로그아웃</h2>



  <link rel="stylesheet" type="text/css" href="./donotignore.css">
  
  <hr />
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>누가도와달래 로그아웃</title>
</head>
 <body>
로그아웃 하시겠습니까?

<button name="yes" type="submit">네!</button></div>
<button name="no" type="submit">아니요!</button></div>



<?php
	session_start();
	if(isset($_POST['yes'])){
		session_destroy();
		echo "<script>alert('또 오세요!');</script>";
		 echo "<script> location.href='../'; </script>"; 
	}
	if(isset($_POST['no'])){
		
		echo "<script> location.href='../'; </script>"; 
		
	}