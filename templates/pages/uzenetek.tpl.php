<body>
<?php
//if(isset($_POST['minter']) && isset($_POST['maxter'])&& isset($_POST['szobamin'])&&isset($_POST['szobamax'])&&isset($_POST['erkely'])&&isset($_POST['kulonWC'])&&isset($_POST['ablakosKonyha'])) {
    

	try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=paneldb', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
						
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
                
        //$sqlSelect = "select * from lakastipus where meret >= :mint and meret<= :maxt and szobaszam>=:szmin and szobaszam<= szmax and erkelytipus=:erk and kulonWC=:kW and ablakosKonyha=:aK";
        $sqlSelect = "select * from uzenetek order by datum desc";
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
<h1>Üzenetek listája</h1>     
            <table>                
                <tr>
                    <th>üzenet ID</th>
                    <th>beküldő neve</th>                    				
                    <th>dátum+idő</th>
					<th>üzenet</th>						
                </tr>				
                <?php for($i=0;$i<count($result);$i++){?>
				<tr>
                    <td><?php echo($result[$i][0])?></td>
                    <td><?php echo($result[$i][1])?></td>
                    <td><?php echo($result[$i][2])?></td>
                    <td><?php echo($result[$i][3])?></td>										
                </tr><br>                
                <?php } ?>
            </table>
   
