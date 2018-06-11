<?php  
if(isset($_GET['id_trasy'])){
	
include 'config.php';

$id_trasy = (int) $_GET['id_trasy']; 
$stmt = $db->prepare("select * from trasy");
$stmt->bindParam(':id_trasy', $id_trasy);
$stmt->execute();
$myarr = array();
while($data = $stmt->fetch()){
	$myarr[]= array('id_trasy'=>$data['id_trasy']
	, 'poczatek'=>$data['poczatek']);
}
echo json_encode($myarr);
}
?>  