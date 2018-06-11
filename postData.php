<?php  
if(isset($_GET['typ'],
 $_GET['komentarz'], 
 $_GET['lat'], 
 $_GET['lng'])) {
	
include 'config.php';
$typ = $_GET['typ']; 
$komentarz = $_GET['komentarz']; 
$lat = $_GET['lat']; 
$lng = $_GET['lng']; 

$stmt = $db->prepare("INSERT INTO widoczki 
(typ, komentarz, lat, lng) values (:typ, :komentarz, :lat, :lng)");
$stmt->bindParam(':typ', $typ);
$stmt->bindParam(':komentarz', $komentarz);
$stmt->bindParam(':lat', $lat);
$stmt->bindParam(':lng', $lng);
$stmt->execute();
}
?>  