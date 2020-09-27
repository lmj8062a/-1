<!DOCTYPE html>
<html>
	<head>
		<center>
		<meta charset="UTF-8">
		<title> 누가도와달래? </title>
		<style type="text/css"> 

		</style>
		<!-- 위치정보 API를 위한 메타태그 -->
	<meta name="viewport" content="width=device-width, user-scalable=no">
		<!-- 위치정보 API를 가져오는 코드 -->
		<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"> </script>
	<script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?clientId=WLgsW6EG7QH_slxHMne4&submodules=geocoder"></script>
		<script type="text/javascript"> 
			//위치정보 API를 연동하는 코드
var aaa= navigator.geolocation.getCurrentPosition(MyPosition);

			window.onload = function() { 
				
				if (navigator.geolocation) { navigator.geolocation.getCurrentPosition(MyPosition); 
				} 
			} 
			function MyPosition(position) { 
				var lat = position.coords.latitude; 
				var lng = position.coords.longitude; 
			
			//document.cookie = +lat+,  + lng;
		//	setCookie('test', 'cookie test, 쿠키 테스트', 1);


             //   sessionStorage.setItem("test", "asdad");
              
            	localStorage.setItem("lat", lat);
			localStorage.setItem("lng", lng);

	//setCookie('tistory', 'blog', '7', '/', 'tistory.com', 'secure');
			//	var latlng = new google.maps.LatLng(lat, lng); 
				var options = { zoom: 15, center: latlng, mapTypeId: google.maps.MapTypeId.ROADMAP }; 
				var map = new google.maps.Map(document.getElementById("map"), options); 
				var mapOptions = {
               center: new naver.maps.LatLng(lat, lng),

               zoom: 10
           
			//document.cookie = lat;
};
	//location.href="?lat="+localStorage.lat+"&lng="+localStorage.lng;
//var map = new naver.maps.Map('map', mapOptions);

			}
			
		</script>
<style>
			@import url(https://fonts.googleapis.com/css?family=BenchNine:700);
.snip1535 {
  background-color: #A566FF;
  border: none;
  color: #ffffff;
  cursor: pointer;
  display: inline-block;
  font-family: 'BenchNine', Arial, sans-serif;
  font-size: 1em;
  font-size: 22px;
  line-height: 1em;
  margin: 15px 40px;
  outline: none;
  padding: 12px 40px 10px;
  position: relative;
  text-transform: uppercase;
  font-weight: 700;
}
.snip1535:before,
.snip1535:after {
  border-color: transparent;
  -webkit-transition: all 0.25s;
  transition: all 0.25s;
  border-style: solid;
  border-width: 0;
  content: "";
  height: 24px;
  position: absolute;
  width: 24px;
}
.snip1535:before {
  border-color: #A566FF;
  border-right-width: 2px;
  border-top-width: 2px;
  right: -5px;
  top: -5px;
}
.snip1535:after {
  border-bottom-width: 2px;
  border-color: #A566FF;
  border-left-width: 2px;
  bottom: -5px;
  left: -5px;
}
.snip1535:hover,
.snip1535.hover {
  background-color: #A566FF;
}
.snip1535:hover:before,
.snip1535.hover:before,
.snip1535:hover:after,
.snip1535.hover:after {
  height: 100%;
  width: 100%;
  
}
@import url(https://fonts.googleapis.com/css?family=BenchNine:700);
.snip1537 {
  background-color: #47C83E;
  border: none;
  color: #ffffff;
  cursor: pointer;
  display: inline-block;
  font-family: 'BenchNine', Arial, sans-serif;
  font-size: 1em;
  font-size: 22px;
  line-height: 1em;
  margin: 15px 40px;
  outline: none;
  padding: 12px 40px 10px;
  position: relative;
  text-transform: uppercase;
  font-weight: 700;
}
.snip1537:before,
.snip1537:after {
  border-color: transparent;
  -webkit-transition: all 0.25s;
  transition: all 0.25s;
  border-style: solid;
  border-width: 0;
  content: "";
  height: 24px;
  position: absolute;
  width: 24px;
}
.snip1537:before {
  border-color: #47C83E;
  border-right-width: 2px;
  border-top-width: 2px;
  right: -5px;
  top: -5px;
}
.snip1537:after {
  border-bottom-width: 2px;
  border-color: #47C83E;
  border-left-width: 2px;
  bottom: -5px;
  left: -5px;
}
.snip1537:hover,
.snip1537.hover {
  background-color: #47C83E;
}
.snip1537:hover:before,
.snip1537.hover:before,
.snip1537:hover:after,
.snip1537.hover:after {
  height: 100%;
  width: 100%;
  
}

#footer {
    position:absolute;
    bottom:0;
    width:97%;
    height:25px;   
    background:#ccc;
}
</style>
	</head>


	<body>
	
	
	<!-- <div id="map" style="width: 500px; height: 500px"></div>-->
	
			<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <!--  <div > <button class="snip1535" name="mygps" type="submit">내 위치 확인 </button> -->
 <div > <button class="snip1535" name="help" type="submit">내 주위 도움 요청</button>
	  <div > <button class="snip1535" name="check" type="submit">내 주위 요청 보기</button>
	<h1> _____________________</h1>
	   <div > <button class="snip1537" name="login" type="submit">로그인 or 로그아웃</button>
 <div > <button class="snip1537" name="makeuser" type="submit">회원가입</button>

      </div>
			</form>
<?php

	
session_start();
	
	
	
	
//$phpVar = '<script>sessionStorage.getItem("domain");</script>';
if(isset($_POST['help'])){
	?>
	<script>
	location.href="apply.php?lat="+localStorage.lat+"&lng="+localStorage.lng;

	</script>
	<?php


}
?>

<div id="footer">이 사이트는 크롬(Chrome) 사용을 적극 권장합니다.</div>


<?php
if(isset($_POST['mygps'])){
?>
<script>
location.href="mygps.php?lat="+localStorage.lat+"&lng="+localStorage.lng;
</script>
<?php
}
if(isset($_POST['makeuser'])){
?>
<script>
	location.href="makeuser.php?lat="+localStorage.lat+"&lng="+localStorage.lng;

	</script>
<?php
	}
	if(isset($_POST['login'])){
		if(empty($_SESSION["id"])){
		
	?>
<script>
	location.href="loginuser.php";

	</script>
		<?php 
			} 
				if(!empty($_SESSION["id"])){
					?>
					<script>
	location.href="logoutuser.php";

	</script>
					
					<?php
			
			}
						
}	
if(isset($_POST['check'])){
				?>
			<script>
	location.href="check.php?lat="+localStorage.lat+"&lng="+localStorage.lng;

	</script>

			
			<?php

}

//echo $_COOKIE['abc'];
?>
	</body>
</html>
