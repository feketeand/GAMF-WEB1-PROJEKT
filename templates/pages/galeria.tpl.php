<?php
include('includes/config.inc.php');

$kepek = array();
$olvaso = opendir($MAPPA);
while (($fajl = readdir($olvaso)) !== false) {
    if (is_file($MAPPA . $fajl)) {
        $vege = strtolower(substr($fajl, strlen($fajl) - 4));
        if (in_array($vege, $TIPUSOK))
            $kepek[$fajl] = filemtime($MAPPA . $fajl);
    }
}
closedir($olvaso);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Galéria</title>
</head>

<body>
    <section id="intro" class="wrapper style1 fullscreen fade-up">
        <div id="galeria">
            <h1>Galéria</h1>
            <?php
            foreach ($kepek as $fajl => $datum) {
            ?>
                <a href="<?php echo $MAPPA . $fajl ?>">
                    <img src="<?php echo $MAPPA . $fajl ?>" alt="" data-position="center center" width="486" height="500">
                </a>
            <?php
            }
            ?>
        </div>
    </section>
</body>

</html