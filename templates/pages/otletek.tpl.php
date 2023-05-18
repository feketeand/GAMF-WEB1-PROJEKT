<body>

<?php include ('lakasok.tpl.php') ?>
<?php echo $result[$i][0];	?>
<?php
	try {
		echo $result[$i][0];
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=paneldb', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
						
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
                
        
        $sqlSelect = "select * from otlet where lakastipusID= :x";
		$sth = $dbh->prepare($sqlSelect);
        //$sth->execute(array(':mint' => $_POST['minter'], ':maxt' => $_POST['maxter'], ':szmin' => $_POST['szobamin'], ':szmax' => $_POST['szobamax'], ':erk' => $_POST['erkely'], ':kW' => $_POST['kulonWC'], ':aK' => $_POST['ablakosKonyha']));
        $sth->execute(array(':x'=>$lakasID));
		$res = $sth->fetchAll();				
			
    }
    catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
		print_r($e);		
    }		
?>


<h1> Lakástípus: <?php echo $lakasID?>
        
            <table>                
                <tr>
                    <th>ID</th>
                    <th>Feltöltötte</th>
                    <th>Megnevezés</th>					
                    <th>Leírás</th>
					<th>Új alaprajz ID</th>									
                </tr>				
                <?php for($i=0;$i<count($res);$i++){?>
				<tr>
                    <td><?php echo($res[$i][0])?></td>
                    <td><?php echo($res[$i][1])?></td>
                    <td><?php echo($res[$i][3])?></td>
                    <td><?php echo($res[$i][5])?></td>									
					<td><a href="alaprajzok.php"><?php echo($res[$i][4])?></a></td>												
                </tr><br>                
                <?php } ?>
				
            </table>

			
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
        $dbh = new PDO('mysql:host=localhost;dbname=paneldb', 'root', '',
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
}
?>