<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p align="center">
<title>누가도와달래 회원가입</title>
 
</head>
<body>
<center>
  <h2> 누가도와달래 회원가입</h2>



  <link rel="stylesheet" type="text/css" href="./donotignore.css">
  
  <hr />
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>누가도와달래 회원가입</title>
</head>
 <body>

 <!-- <p><h1><center>회원가입</center></h1></p> -->
 <?php
	  $lat= $_GET['lat'];
	$lng = $_GET['lng'];
	
	
	$data = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&key=AIzaSyDLo0QNqIZVF5jOSsawx9-fE0P-9Mwg3wU");
$jsondata = json_decode($data);
$addresss = $jsondata->results[4]->formatted_address;

	 
	 ?>
	<p>이름:<input type="text"class="namecan" name="name" placeholder="이름"></p>
	<p>아디:<input type="text"class="namecan" name="id" placeholder="전체주소 또는 아이디"></p>
	<p>비번:<input type="password"class="namecan" name="pw" placeholder="비밀번호"></p>
    <p>이메일:<input type="text"class="namecan" name="email" placeholder="email"></p>
     <p>전화번호:<input type="text"class="namecan" name="tell" placeholder="도움 응답 시 필요합니다."></p>
       
       <p><input type="hidden" name="addre" value=<?php echo $addresss;?>></p>
         <p><input type="hidden" name="lat" value=<?php echo $lat;?>></p>
           <p><input type="hidden" name="lng" value=<?php echo $lng;?>></p>
	<div>&nbsp &nbsp &nbsp &nbsp<button class="login1_btn" name="regist" type="submit">회원가입 </button></div>
<?php



if(isset($_POST['regist'])) {
	   require_once('dbconn.php');
	  // connect (mysqli_connect)

mysqli_query($dbc,"SET NAMES utf8");
// post (name,id,pass,address,age)
$name = $_POST['name'];
$id = $_POST['id'];
$pw = $_POST['pw']; 
$email = $_POST['email'];
$addres = $_POST['addre'];
$lats = $_POST['lat'];
$lngs = $_POST['lng'];
$tell = $_POST['tell'];

$rra="select * from userinfo where id='$id'";
$nno=mysqli_query($dbc,$rra);
$row2 = mysqli_fetch_array($nno);





if($row2){

echo "<script>alert('아이디가 중복 됩니다.');</script>";
echo "<script>location.href = '../';</script>";
}
else{
// save (INSERT)


$query="INSERT INTO userinfo
		(name,id,pw,email,lat,lng,tell)
		VALUES
		('$name','$id','$pw','$email','$lats','$lngs','$tell')";
$result = mysqli_query($dbc, $query);

$query2="CREATE TABLE $id(
    name varchar(30)  character set utf8 collate utf8_general_ci,
     id varchar(19),
     pw varchar(500),
email varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci, address varchar(500)  character set utf8 collate utf8_general_ci);";
//mysqli_query($dbc, $query2);
$query1233="ALTER TABLE $id ENGINE = MYISAM;";
//mysqli_query($dbc,$query1233);

if($result!=false){
	echo "<script>alert('회원가입을 축하드립니다!');</script>";
	echo "<script>location.href='../';</script>";

}
if($result!=TRUE){
	
	echo "<script>alert('회원가입 실패에요. 다시 한번 시도해보세요.');</script>";
	echo "<script>location.href='../';</script>";
	
}

mysqli_close($dbc);

   }
   }
   ?>


 </body>
</html>
