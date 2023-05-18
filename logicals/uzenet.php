<?php
if (isset($_SESSION['login'])){
	$nev=$_SESSION['login'];
}
else{
	$nev="vendeg";
}
date_default_timezone_set('Europe/Budapest');
$datumi= date('Y-m-d H:i:s');
if(isset($_POST['message'])){
    try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=paneldb', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');                          
            
        $sqlInsert = "insert into uzenetek(uzenetID, felhasznalo, datum, iras)
                          values(0, :login, :datum, :uzi)";
            $stmt = $dbh->prepare($sqlInsert); 
            $stmt->execute(array(':login' => $nev, ':uzi' => $_POST['message'], ':datum' => $datumi));
            if($count = $stmt->rowCount()) {
                $newid = $dbh->lastInsertId();
                $uzenet = "A mentés sikeres.<br>Azonosító: {$newid}";                     
                $ujra = false;
            }
            else {
                $uzenet = "A mentés nem sikerült.";
                $ujra = true;
            }
    }
    catch (PDOException $e) {
        $uzenet = "Hiba: ".$e->getMessage();
        $ujra = true;
    }      
}


?>