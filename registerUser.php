<?php  
if(isset($_GET['imie'], 
			$_GET['naziwsko'], 
			$_GET['pesel'], 
			$_GET['haslo'], 
			$_GET['email'], 
			$_GET['numer_telefonu'])) {
	
include 'config.php';
$imie = $_GET['imie']; 
$naziwsko = $_GET['naziwsko']; 
$pesel = $_GET['pesel']; 
$haslo = $_GET['haslo'];
$email = $_GET['email']; 
$numer_telefonu = $_GET['numer_telefonu']; 
 
$myarr = array();
$stmt2 = $db->prepare("select * from uzytkownicy where pesel = :pesel");
$stmt2->bindParam(':pesel', $pesel);
$stmt2->execute(); 
while($data = $stmt2->fetch()){
	$myarr[]= array('pesel'=>$data['pesel']);
}
if (empty($myarr)) {
echo "niema";
$stmt = $db->prepare("INSERT INTO uzytkownicy 
(imie, naziwsko, pesel, haslo, email, numer_telefonu) 
VALUES  
(:imie,:naziwsko,:pesel,:haslo,:email,:numer_telefonu)");
$stmt->bindParam(':imie', $imie);
$stmt->bindParam(':naziwsko', $naziwsko);
$stmt->bindParam(':pesel', $pesel);
$stmt->bindParam(':haslo', $haslo);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':numer_telefonu', $numer_telefonu);
$stmt->execute();
} else {
	echo "jest";
}
			}
?>  