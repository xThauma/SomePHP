<?php  
if(isset($_GET['pesel'])) {

include 'config.php';
$pesel = $_GET['pesel']; 
 
$myarr = array();
$stmt2 = $db->prepare("select * from historia where pesel = :pesel ORDER BY data DESC LIMIT 5");
$stmt2->bindParam(':pesel', $pesel);
$stmt2->execute(); 
while($data = $stmt2->fetch()){
	$myarr[]= array('zMiejsca'=>$data['zMiejsca'],
	'doMiejsca'=>$data['doMiejsca'],
	'zLat'=>$data['zLat'],
	'zLang'=>$data['zLang'],
	'odleglosc'=>$data['odleglosc'],
	'doLat'=>$data['doLat'],
	'doLang'=>$data['doLang']);
}
}
echo json_encode($myarr); 
?>  