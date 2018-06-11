<?php
if (isset($_GET['pesel'], $_GET['zMiejsca'], $_GET['doMiejsca'], $_GET['zLat'], 
		$_GET['zLang'], $_GET['odleglosc'], $_GET['doLat'], $_GET['doLang'], $_GET['data'])) {
    
    include 'config.php';
    $pesel     = $_GET['pesel'];
    $zMiejsca  = $_GET['zMiejsca'];
    $doMiejsca = $_GET['doMiejsca'];
    $zLat      = $_GET['zLat'];
    $zLang     = $_GET['zLang'];
    $odleglosc = $_GET['odleglosc'];
    $doLat     = $_GET['doLat'];
    $doLang    = $_GET['doLang'];
    $data      = $_GET['data'];
    
    $stmt = $db->prepare("INSERT INTO historia 
                    (pesel, zMiejsca, doMiejsca, zLat, zLang, odleglosc, doLat, doLang, data)
            values (:pesel,:zMiejsca,:doMiejsca,:zLat,:zLang,:odleglosc,:doLat,:doLang,:data)");
    $stmt->bindParam(':pesel', $pesel);
    $stmt->bindParam(':zMiejsca', $zMiejsca);
    $stmt->bindParam(':doMiejsca', $doMiejsca);
    $stmt->bindParam(':zLat', $zLat);
    $stmt->bindParam(':zLang', $zLang);
    $stmt->bindParam(':odleglosc', $odleglosc);
    $stmt->bindParam(':doLat', $doLat);
    $stmt->bindParam(':doLang', $doLang);
    $stmt->bindParam(':data', $data);
    $stmt->execute();
}
?>  
