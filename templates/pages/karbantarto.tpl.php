    <h3>Karbantartó</h2>
    <form action = "?oldal=ltpmentes" method = "post">
      <fieldset>
        <legend>Új lakótelep hozzáadása</legend>
        <br>
        <label>Lakótelep neve: <input type="text" name="ltp_nev" placeholder="Lakótelep neve" required><br><br>
        <label>Kerület: <input type="text" name="kerulet" placeholder="Kerület(1-23)" required><br><br>
		<label>Építési időszak:  <select name="idoszak">
			<option value="0" selected disabled>Válasszon!</option>
			<option value="50-es évek">50-es évek</option>
			<option value="60-as évek">60-as évek</option>
			<option value="70-as évek">70-es évek</option>
			<option value="80-as évek">80-as évek</option>
			<option value="90-as évek">90-es évek</option>
		</select><br><br>
        <label>Leírás: <input type="textarea" name="leiras" placeholder="Leírás" required><br><br>        
        <input type="submit" name="mentes" value="Mentés">
        <br>&nbsp;
      </fieldset>	  
    </form>	
	<form action = "?oldal=tipmentes" method = "post">
      <fieldset>
        <legend>Új lakástípus hozzáadása</legend>
        <br>
        <label>Alapterület: <input type="text" name="meret" placeholder="Méret (m2)" ><br><br>
        <label>Szobák száma: <input type="number" name="szobaszam" placeholder="Szobaszám" ><br><br>
		<label>Erkély típusa:  <select name="erkely">
			<option value="0" selected disabled>Válasszon!</option>
			<option value="Nincs">Nincs</option>
			<option value="Francia erkély">Francia erkély</option>
			<option value="Erkély">Erkély</option>
			<option value="Lodzsa">Lodzsa</option>			
		</select><br><br>
		<label>Külön WC <input type="checkbox" name="kulonWC"><br><br>
		<label>Ablakos konyha <input type="checkbox" name="ablakosKonyha" ><br><br>
        <label>Alaprajz sorszáma: <input type="text" name="alaprajzID" placeholder="alaprajz sorszáma" >				
		<br><br>       
        <input type="submit" name="mentes" value="Mentés">
        <br>&nbsp;
      </fieldset>	  
    </form>
	<form action= "alaprajzok.php" target="_blank">
		<input type="submit" value= "Alaprajzok" > </button>
	</form>
	
