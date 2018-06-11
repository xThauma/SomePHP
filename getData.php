<?php  
include 'config.php';
$stmt = $db->prepare("select * from widoczki");
$stmt->execute();


while($data = $stmt->fetch()){
	$myarr[]= array('typ'=>$data['typ']
	, 'komentarz'=>$data['komentarz']
	, 'lat'=>$data['lat']
	, 'lng'=>$data['lng']);
}



echo json_encode($myarr); 


?>  