<!doctype html>
<meta name="viewport" content="width=device-width, user-scalable=no">
<html>
	<head>
		<center>
<?php
		session_start();
	if(empty($_SESSION["id"])){
	echo "<script>alert('로그인해주세요.');</script>";
	echo "<script>location.href='../';</script>";
		}
	$lat= $_GET['lat'];
	$lng = $_GET['lng'];
	
	
	$data = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&key=AIzaSyDLo0QNqIZVF5jOSsawx9-fE0P-9Mwg3wU");
//echo $data;
$jsondata = json_decode($data);

$주소 = $jsondata->results[0]->formatted_address;

echo $주소;
	?>