<?php
	
	$lat11='37.8543821';
	$lng11='128.22164910000004';
	$lat22='37.4031661';
	$lng22='127.1138363';



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
	} else { 
		return $miles; 
	} 
}	

echo geoDistance($lat11,$lng11,$lat22,$lng22);
?>