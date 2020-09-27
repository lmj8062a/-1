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
  <link rel="stylesheet" type="text/css" href="./dodo.css">
  <title>누가도와달래</title>

</head>
<body>
<center>
  <h2>누가도와달래 1KM 내 도움</h2>
 
  <hr />


 
 <?php
	 $baeyul = '1';
	  if(empty($_SESSION['id'])){
		 echo "<script>alert('로그인해주세요.');</script>";
		 echo "<script>location.href='../';</script>"; 
		  }
	 if(!empty($_SESSION['id'])){
	 require_once('dbconn.php');
	 mysqli_query($dbc,"SET NAMES utf8");
$d=0;


$result23=mysqli_query($dbc,"SELECT * FROM request where approve='0' order by number desc");

$checkid=$_SESSION['id'];

$checkgps=mysqli_query($dbc,"SELECT * FROM userinfo where id ='$checkid'");
$rows=mysqli_fetch_array($checkgps);

	$userlat = $rows['lat'];
	$userlng = $rows['lng'];

$baeyul=1;


function _deg2rad($deg){ 
	$radians = 0.0; 
	$radians = $deg * M_PI/180.0; 
	return($radians); 
}
function geoDistance($lat1, $lon1, $lat2, $lon2, $unit="k") { 
	$theta = $lon1 - $lon2; 
	$dist = sin(_deg2rad($lat1)) * sin(_deg2rad($lat2)) + cos(_deg2rad($lat1)) * cos(_deg2rad($lat2)) * cos(_deg2rad($theta)); 
	$dist = acos($dist); 
	$dist = rad2deg($dist); 
	$miles = $dist * 60 * 1.1515; 
	$unit = strtolower($unit); 
 
	if ($unit == "k") { 
		return ($miles * 1.609344); 
	} else{ 
		return $miles; 
	} 
}	


while($row=mysqli_fetch_array($result23))

{
  $idx['$baeyul']=$row['number'];
  
// _____________________________________________________________________________________
$aaa=$idx['$baeyul'];

//echo "<script>alert('$aaa');</script>";


	$requestlat=$row['lat'];
	$requestlng=$row['lng'];


$distance = geoDistance($userlat,$userlng,$row['lat'],$row['lng']);



if($distance<1){
	









//______________________________________________________________________________________


?>

 <div class="card_ask">  </div>
   내용: <?php echo $row['help'];?>
   <p>사례 : <?php echo $row['cost'];?>
 <p>요청 :  <?php echo $row['date'];?> 

		
		<?php
$ssaa1=strcmp($vmmsa,'0');

if(!$ssaa1){

}
?>
<?php
if($ssaa1){
?>
<img src = "">
<?php
}
?>
      </div>
   

    
<span class="profile_certification"></span>
    </div>
    <div class="card_time">
	   </div>
  <form enctype="multipart/form-data" method="post" action="./accept.php">
 <?//echo 'submits'.$idx['$baeyul'];?>
<input type="hidden" name="idx" value="<?php echo 'submits'.$idx['$baeyul'];?>" />
<input type="hidden" name="ids" value="<?php echo $idx['$baeyul'];?>" />

<a onClick="location.href="./accept.php">  
<div><button class="who_btn3" name ="submit<?php echo $idx['$baeyul'];?>" >수락하기
</a>

</form>
 </div> </b></form></button>
 <hr style="border: solid white; border-width: 20px 0 0;>
<?php 
	
}
$baeyul++;
}


}
//echo '__________________________________________________여기까지 새질문';

?>