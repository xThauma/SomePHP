<?php  
if(isset($_GET['pesel'])) {

include 'config.php';
$pesel = $_GET['pesel']; 
 
$myarr = array();
$stmt2 = $db->prepare("select count(odleglosc) from historia where pesel='1'");
$stmt2->bindParam(':pesel', $pesel);
$stmt2->execute(); 
while($data = $stmt2->fetch()){
	$myarr[]= array('count(odleglosc)'=>$data['count(odleglosc)']);
}
}
echo json_encode($myarr); 
?>  