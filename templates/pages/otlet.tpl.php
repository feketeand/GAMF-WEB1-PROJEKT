<?php include ('lakasok.tpl.php') ?>
<?php for($i=0;$i<count($result);$i++) {
$lakasID = $result[$i][0]; }	?>
<h1> Új ötlet feltöltése a <?php echo $lakasID?> lakástípushoz: </h1>
	<form method = "post">
      <fieldset>        
        <br>
        <label> Megnevezés </label> <input type="text" name="megnev" placeholder="Megnevezés" required><br><br>
		<label> Leírás </label> <input type="textarea" rows="5" name="leiras" placeholder="Leírás" required><br><br>
		<label> Új alaprajz ID <input type="text" name="ujarID" value="0" required><br><br>
		<input type="submit" name="mentes" value="Mentés">        	
        <br>&nbsp;
      </fieldset>
    </form>
	
<?php
if(isset($_POST['megnev']) && isset($_POST['leiras'])) {
    try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=paneldb', $dbname, $dbjelszo,
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');                     
                        
        $sqlInsert = "insert into otlet(otletID, felhasznaloID, lakastipusID, megnevezes, leiras, alaprajzID)
                          values(0, :felhID, :tipusID, :megnev, :leir, :ujarID)";
            $stmt = $dbh->prepare($sqlInsert); 
            $stmt->execute(array(':felhID' => $_SESSION['login'],':tipusID' => $lakasID, ':megnev' => $_POST['megnev'],
                                 ':leir' => $_POST['leiras'],':ujarID' => $_POST['ujarID'])); 
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
echo $uzenet;
}
?>