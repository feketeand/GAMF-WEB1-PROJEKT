<body>
    <h1>Beküldött üzenet</h1>
    <?php

    try {
        // Kapcsolódás
        $dbh = new PDO(
            'mysql:host=localhost;dbname=paneldb',
            $dbname,
            $dbjleszo,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );

        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

        $sqlSelect = "select * from uzenetek where uzenetID = :ujID";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':ujID' => $newid));
        $result = $sth->fetchAll();
    } catch (PDOException $e) {
        $errormessage = "Hiba: " . $e->getMessage();
        print_r($e);
    }

    ?>



    <table>
        <tr>
            <th>Üzenet ID</th>
            <th>Beküldő neve</th>
            <th>Dátum+idő</th>
            <th>Üzenet</th>
        </tr>
        <?php for ($i = 0; $i < count($result); $i++) { ?>
            <tr>
                <td><?php echo ($result[$i][0]) ?></td>
                <td><?php echo ($result[$i][1]) ?></td>
                <td><?php echo ($result[$i][2]) ?></td>
                <td><?php echo ($result[$i][3]) ?></td>
            </tr><br>
        <?php } ?>
    </table>