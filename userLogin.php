<?php  
if(isset($_GET['pesel'], 
		$_GET['haslo'])) {
	
include 'config.php';
$pesel = $_GET['pesel']; 
$haslo = $_GET['haslo'];
 
$myarr = array();
$stmt2 = $db->prepare("select * from uzytkownicy where pesel = :pesel and haslo = :haslo");
$stmt2->bindParam(':pesel', $pesel);
$stmt2->bindParam(':haslo', $haslo);
$stmt2->execute(); 
while($data = $stmt2->fetch()){
	$myarr[]= array('pesel'=>$data['pesel']);
}
if (empty($myarr)) {
echo "niema";
} else {
	echo "jest";
		}
		}
?>  