   
<section class="wrapper style2 spotlights">  
    <form class="urlap" action = "belep2.php" method = "post">
      <fieldset>
        <h3>Bejelentkezés<h3>
        <br>                    
          <input type="text" name="felhasznaloNev" placeholder="felhasználó" required><br>
          <input type="password" name="jelszo" placeholder="jelszó" required><br><br>
          <input type="submit" name="belepes" value="Belépés" href="index.php?belep">                               
        <br>&nbsp;
      </fieldset>
    </form>

    
    <form action = "regisztral2.php" method = "post">
      <fieldset>
        <legend>Regisztrálja magát, ha még nem felhasználó!</legend>
        <h3>Regisztráció</h3>
        <br>
        <input type="text" name="vezeteknev" placeholder="vezetéknév" required><br>
        <input type="text" name="keresztnev" placeholder="keresztnév" required><br>
        <input type="text" name="felhasznaloNev" placeholder="felhasználó név" required><br>
        <input type="password" name="jelszo" placeholder="jelszó" required><br>
        <input type="submit" name="regisztracio" value="Regisztráció" href="index.php?regisztral">
        <br>&nbsp;
      </fieldset>
    </form>
  
</section>
