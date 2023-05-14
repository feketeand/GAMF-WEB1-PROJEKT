<?php
if(isset($_POST['ltp_nev']) && isset($_POST['kerulet'])&& isset($_POST['idoszak']) && isset($_POST['leiras'])) {
    try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=paneldb', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        // Létezik már a felhasználói név?
        $sqlSelect = "select lakotelepID from lakotelep where ltpNev = :be";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':be' => $_POST['ltp_nev']));
        if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $uzenet = "Ilyen nevű lakótelep már létezik!";
            $ujra = "true";
        }
        else {
            // Ha nem létezik, akkor regisztráljuk
            $sqlInsert = "insert into lakotelep(lakotelepID, ltpNev, kerulet, idoszak, leiras)
                          values(0, :ltpnev, :ker, :ido, :leir)";
            $stmt = $dbh->prepare($sqlInsert); 
            $stmt->execute(array(':ltpnev' => $_POST['ltp_nev'],':ker' => $_POST['kerulet'], ':ido' => $_POST['idoszak'],
                                 ':leir' => $_POST['leiras'],)); 
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