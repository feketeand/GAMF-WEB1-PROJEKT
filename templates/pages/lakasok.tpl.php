<body>
<h1>Lakástípusok listája</h1>
<?php
//if(isset($_POST['minter']) && isset($_POST['maxter'])&& isset($_POST['szobamin'])&&isset($_POST['szobamax'])&&isset($_POST['erkely'])&&isset($_POST['kulonWC'])&&isset($_POST['ablakosKonyha'])) {
    

	try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=paneldb', $dbname, $dbjelszo,
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
						
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
                
        //$sqlSelect = "select * from lakastipus where meret >= :mint and meret<= :maxt and szobaszam>=:szmin and szobaszam<= szmax and erkelytipus=:erk and kulonWC=:kW and ablakosKonyha=:aK";
        $sqlSelect = "select * from lakastipus order by szobaszam";
		$sth = $dbh->prepare($sqlSelect);
        //$sth->execute(array(':mint' => $_POST['minter'], ':maxt' => $_POST['maxter'], ':szmin' => $_POST['szobamin'], ':szmax' => $_POST['szobamax'], ':erk' => $_POST['erkely'], ':kW' => $_POST['kulonWC'], ':aK' => $_POST['ablakosKonyha']));
        $sth->execute();
		$result = $sth->fetchAll();				
			
    }
    catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
		print_r($e);		
    }
	
	

//else {
	//header("Location: .");
	//}
?>




        
            <table>                
                <tr>
                    <th>ID</th>
                    <th>Méret (m2)</th>
                    <th>Szobák száma</th>					
                    <th>Külön WC</th>
					<th>Ablakos konyha</th>
					<th>Erkély</th>
					<th>AlaprajzID</th>
					<th>Ötletek</th>					
                </tr>				
                <?php for($i=0;$i<count($result);$i++){?>
				<tr>
                    <td><?php echo($result[$i][0])?></td>
                    <td><?php echo($result[$i][1])?></td>
                    <td><?php echo($result[$i][2])?></td>
                    <td><?php echo($result[$i][3])?></td>
					<td><?php echo($result[$i][4])?></td>
					<td><?php echo($result[$i][5])?></td>
					<td><a href="alaprajzok.php" target="_blank"><?php echo($result[$i][6])?></a></td>
					<td><a href="?oldal=otletek">Lista</a>/
					<a href="?oldal=otlet">Új</a></td>					
                </tr><br>                
                <?php } ?>
            </table>
   
