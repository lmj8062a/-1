<!doctype html>
<?php
	session_start();
	
	
	$lat= $_GET['lat'];
	$lng = $_GET['lng'];
	
		$data = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&key=AIzaSyDLo0QNqIZVF5jOSsawx9-fE0P-9Mwg3wU");
$jsondata = json_decode($data);
$addresss = $jsondata->results[2]->formatted_address;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="./donotignore.css">
  <title>누가도와달래</title>

</head>
<body>
<center>
  <h2>누가도와달래 도움 요청하기</h2>
 
  <hr />
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <!-- <label for="name">이름:</label>
    <input type="text" id="name" name="name" value="<?php if (!empty($name)) echo $name; ?>" /><br />
	-->
	나의 주소 : <?php echo $addresss?>
	<p>내용: <input type="text"class="namecan" name="help" placeholder="도움 요청 내용을 적어주세요."> </p>
	 <p>사례: <input type="test"class="namecan" name="cost" placeholder="없으시면 안적으셔도 됩니다."> </p>
	        <p><input type="hidden" name="lat" value=<?php echo $lat;?>></p>
           <p><input type="hidden" name="lng" value=<?php echo $lng;?>></p>
  <div>  &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp<button class="login1_btn" name="request" type="submit">요청하기</button></div>
<p></p>
<p>* 요청시 주소는 전송 되지 않습니다.</p>
<p>* 메일로 도움 응답이 가요.</p>


   </form>

<?php
	if(empty($_SESSION['id'])){
		
		echo "<script>alert('로그인해주세요.');</script>";
		 echo "<script>location.href='../';</script>"; 
		
	}
	if(!empty($_SESSION['id'])){
	if(isset($_POST['request'])){
	$requestid=$_SESSION['id'];
	$help =$_POST['help'];
	$cost=$_POST['cost'];
	$lats=$_POST['lng'];
	$lngs = $_POST['lat'];
	require_once('dbconn.php');
	mysqli_query($dbc,"SET NAMES utf8");
$query="INSERT INTO request
		(help,cost,requestid,lat,lng)
		VALUES
		('$help','$cost','$requestid','$lngs','$lats')";
$result = mysqli_query($dbc, $query);
	}
	
	
	}
	
	
	
	
	?>