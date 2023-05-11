<?php

if(isset($_POST['felhasznaloNev']) && isset($_POST['jelszo']) && isset($_POST['vezeteknev']) && isset($_POST['keresztnev'])) {
    
    try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=paneldb', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        // Létezik már a felhasználói név?
        $sqlSelect = "select felhasznaloID from felhasznalo where felhasznaloNev = :felhasznaloNev";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':felhasznaloNev' => $_POST['felhasznaloNev']));
        

        if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $uzenet = "A felhasználói név már foglalt!";
            $ujra = "true";
            
        }
        
        else {
            
            // Ha nem létezik, akkor regisztráljuk
            $sqlInsert = "insert into felhasznalo(felhasznaloID, vezeteknev, keresztnev, felhasznaloNev, jelszo)
                          values(0, :vezeteknev, :keresztnev, :felhasznaloNev, :jelszo)";
            $stmt = $dbh->prepare($sqlInsert); 
            $stmt->execute(array(':vezeteknev' => $_POST['vezeteknev'], ':keresztnev' => $_POST['keresztnev'],
                                 ':felhasznaloNev' => $_POST['felhasznaloNev'], ':jelszo' => sha1($_POST['jelszo']))); 
            
            if($count = $stmt->rowCount()) {
                $newid = $dbh->lastInsertId();
                $uzenet = "A regisztrációja sikeres.<br>Azonosítója: {$newid}";                     
                $ujra = false;
                
            }
            else {
                $uzenet = "A regisztráció nem sikerült.";
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

<!DOCTYPE html>
<html>
    <head>
        <title>Regisztráció</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php if(isset($uzenet)) { ?>
            <h1><?= $uzenet ?></h1>
            <?php if($ujra) { ?>
                <a href="index.php?oldal=belepes">Próbálja újra!</a>
            <?php } ?>
        <?php } ?>
        <a href="index.php?/"> Tovább a kezdőlapra</a>
    </body>  
</html>