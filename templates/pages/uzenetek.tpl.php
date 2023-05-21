<body>
<?php
    

	try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=paneldb', $dbname, $dbjelszo,
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
						
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
                
        $sqlSelect = "select * from uzenetek order by datum desc";
		$sth = $dbh->prepare($sqlSelect);
        $sth->execute();
		$result = $sth->fetchAll();				
			
    }
    catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
		print_r($e);		
    }

?>   
<h1>Üzenetek listája</h1>     
            <table>                
                <tr>
                    <th>Üzenet ID</th>
                    <th>Beküldő neve</th>                    				
                    <th>Dátum+idő</th>
					<th>Üzenet</th>					
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
   
