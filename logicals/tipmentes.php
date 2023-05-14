<?php
if(isset($_POST['felhasznalo']) && isset($_POST['jelszo']) && isset($_POST['vezeteknev']) && isset($_POST['utonev'])) {
    try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=paneldb', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');               
       
            
        $sqlInsert = "insert into lakastipus(lakasTipusID, meret, szobaszam, kulonWC, ablakosKonyha, alaprajzID)
                      values(0, :ltpnev, :ido, :leiras)";
        $stmt = $dbh->prepare($sqlInsert); 
        $stmt->execute(array(':ltpnev' => $_POST['ltp_nev'], ':ido' => $_POST['idoszak'],
                             ':leiras' => $_POST['leiras'],)); 
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
    }
    catch (PDOException $e) {
        $uzenet = "Hiba: ".$e->getMessage();
        $ujra = true;
    }      
}
else {
    header("Location: .");
}
?>