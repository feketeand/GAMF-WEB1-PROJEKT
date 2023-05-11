<?php

function ki($szoveg)
{
    echo htmlspecialchars($szoveg, ENT_QUOTES);
}


$hiba = false;
$sikeres = "";
$sikertelen = "";

if (empty($_POST['name'])) {
    $hiba = true;
    $sikertelen = "<p class='text-danger'>A név mezőnek NEM szabad üresnek lennie!</p>";
}

else if (empty($_POST['email'])) {
    $hiba = true;
    $sikertelen = "<p class='text-danger'>Az email mezőnek NEM szabad üresnek lennie!</p>";
}

else if (empty($_POST['message'])) {
    $hiba = true;
    $sikertelen = "<p class='text-danger'>A szövegdoboznak NEM szabad üresnek lennie!</p>";
}

else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $hiba = true;
}

else if (!$hiba) {
     $sikeres = "<p class='text-success'>Sikeres küldés</p>";
}

$gomb = $_POST['gomb'] ?? false;

?>
<section id="five" class="wrapper style1 fade-up">
    <div class="inner">
        <h2>Kapcsolat</h2>
        <p>Várjuk a jobbnál jobb ötleteket, észrevételeket az oldallal kapcsolatban</p>
        <div class="split style1">
            <section>
                <form method="post">

                    <div class="fields">
                        <div class="field half">
                            <label for="name">Név</label>
                            <input type="text" name="name" id="name" />
                            <p class='text-danger' id="hibaN"></p>
                        </div>
                        <div class="field half">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" />
                            <p class='text-danger' id="hibaE"></p>
                        </div>
                        <div class="field">
                            <label for="message">Üzenet</label>
                            <textarea name="message" id="message" rows="5"></textarea>
                            <p class='text-danger' id="hibaM"></p>
                        </div>
                    </div>
                    <ul class="actions">
                        <li><a href="" class="button submit" name="gomb">Üzenet küldése</a></li>
                    </ul>
                </form>
            </section>
            <?php if ($gomb && $hiba) {
                echo $sikertelen;
            } else if ($gomb && !$hiba) {
                echo $sikeres;
            } ?>
            <section>
                <ul class="contact">
                    <li>
                        <h3>Cím</h3>
                        <span>12345 Somewhere Road #654<br />
                            Nashville, TN 00000-0000<br />
                            USA</span>
                    </li>
                    <li>
                        <h3>Email</h3>
                        <a href="#">user@untitled.tld</a>
                    </li>
                    <li>
                        <h3>Telefon</h3>
                        <span>(000) 000-0000</span>
                    </li>
                    <li>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10797.321910637262!2d19.021367266803015!3d47.42499898877641!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741e79e6a97ce95%3A0xfcfbb1c858b18cc1!2sBudapest%2C%20Budapest%20XXII.%20ker%C3%BClete%2C%201222!5e0!3m2!1shu!2shu!4v1683807481528!5m2!1shu!2shu" width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </li>
                </ul>
            </section>
        </div>
    </div>
</section>
<script src="kapcsolat.js"></script>