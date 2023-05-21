<body>
<?php include ('lakasok.tpl.php') ?>
<table>                			
                <?php for($i=0;$i<count($result);$i++){?>
				<tr>
                    <td><?php echo($result[$i][0])?></td>				
                </tr><br>                
                <?php $lakasID = $result[$i][0]; } ?> 
            </table>
<?php
	try {
        for($i=0;$i<count($result);$i++) {
		echo $result[$i][0];
        }
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=paneldb', $dbname, $dbjelszo,
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
                    <td><?php echo($res[$i][otletID])?></td>
                    <td><?php echo($res[$i][felhasznaloID])?></td>
                    <td><?php echo($res[$i][megnevezes])?></td>
                    <td><?php echo($res[$i][leiras])?></td>									
					<td><a href="alaprajzok.php"  target="_blank"><?php echo($res[$i][4])?></a></td>												
                </tr><br>                
                <?php } ?>
				
            </table>