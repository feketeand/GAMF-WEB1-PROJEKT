<?php
if

if(isset($_POST['meret']) && isset($_POST['szobaszam']) && isset($_POST['erkely'])&& isset($_POST['alaprajzID'])&&isset($_POST['kulonWC'])&&isset($_POST['ablakosKonyha']) {
    try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=paneldb', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');               
       
            
        $sqlInsert = "insert into lakastipus(lakasTipusID, meret, szobaszam, erkelytipus, kulonWC, ablakosKonyha, alaprajzID)
                      values(0, :ter, :szam, :erk, :kW, :aK, :alaprajz)";
        $stmt = $dbh->prepare($sqlInsert); 
        $stmt->execute(array(':ter' => $_POST['meret'], ':szam' => $_POST['szobaszam'],
                             ':erk' => $_POST['erkely'],':kW' => $_POST['kulonWC'], ':aK' => $_POST['ablakosKonyha'], ':alaprajz' => $_POST['alaprajzID'])); 
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
//else {
 //   header("Location: .");
//}
?>