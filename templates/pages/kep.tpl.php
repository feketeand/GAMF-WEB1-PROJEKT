<body>
<h1>ALAPRAJZ</h1>
<?php
//if(isset($_POST['minter']) && isset($_POST['maxter'])&& isset($_POST['szobamin'])&&isset($_POST['szobamax'])&&isset($_POST['erkely'])&&isset($_POST['kulonWC'])&&isset($_POST['ablakosKonyha'])) {
    

	try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=paneldb', $dbname, $dbjelszo,
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
						
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
                
        //$sqlSelect = "select * from lakastipus where meret >= :mint and meret<= :maxt and szobaszam>=:szmin and szobaszam<= szmax and erkelytipus=:erk and kulonWC=:kW and ablakosKonyha=:aK";
        $sqlSelect = "select kepNev from kepek where kepID= :id";
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
<img src="<?php echo $MAPPA2 . $result['kepNev'] ?>" alt="<?php echo $result['name'] ?>" data-position="center center" width="490" height="500">
   
