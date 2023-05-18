<?php
include('includes/config.inc.php');

$kepek = array();
$olvaso = opendir($MAPPA2);
while (($fajl = readdir($olvaso)) !== false) {
    if (is_file($MAPPA2 . $fajl)) {
        $vege = strtolower(substr($fajl, strlen($fajl) - 4));
        if (in_array($vege, $TIPUSOK))
            $kepek[$fajl] = filemtime($MAPPA2 . $fajl);
    }
}
closedir($olvaso);


if (isset($_POST['kuldes'])) {
    foreach ($_FILES as $fajl) {
        if ($fajl['error'] == 4);
        elseif (!in_array($fajl['type'], $MEDIATIPUSOK))
            $uzenet[] = " Nem megfelelő típus: " . $fajl['name'];
        elseif (
            $fajl['error'] == 1
            or $fajl['error'] == 2
        )
            $uzenet[] = " Túl nagy állomány: " . $fajl['name'];
        else {
            $vegsohely = strtolower($fajl['name']);
            if (file_exists($vegsohely))
                $uzenet[] = " Már létezik: " . $fajl['name'];
            else {
                move_uploaded_file($fajl['tmp_name'], $vegsohely);
                $uzenet[] = ' Ok: ' . $fajl['name'];
            }
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Alaprajzok</title>
</head>

<body>
    <section>
        <div id="galeria">
            <h1 class="inner">Alaprajzok</h1>
            <h2>Feltöltés:</h2>
            <?php
            if (!empty($uzenet)) {
                echo '<ul>';
                foreach ($uzenet as $uz)
                    echo "<li>$uz</li>";
                echo '</ul>';
            }
            ?>
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="elso" required>
                <input type="submit" name="kuldes">
            </form>
            <?php
            foreach ($kepek as $fajl => $datum) {
            ?>
                <img src="<?php echo $MAPPA2 . $fajl ?>" alt=$fajl['name'] data-position="center center" width="490" height="500">
            <?php
            }
            ?>
        </div>
    </section>
<script src="alaprajz.js"></script>
</body>

</html