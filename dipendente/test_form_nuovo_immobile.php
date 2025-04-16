<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form id= "form_inserimento" align="center">
<label for="html">DATI IMMOBILE</label><br>
<input type="text" name="codice_immobile" placeholder="Codice Immobile"><br>
<input type="text" name="metratura" placeholder="Metratura"><br>
<input type="text" name="tipo" placeholder="villa, appartamento,..."><br>
<input type="text" name="indirizzo" placeholder="via ..."><br>
<textarea name="descrizione" rows="5" cols="40">
  Inserisci la descrizione
</textarea><br>

<label for="html">DATI PROPRIETARIO</label><br>
<input type="text" name="codice_fiscale" placeholder="Codice Fiscale"><br>
<input type="text" name="nome" placeholder="Nome"><br>
<input type="text" name="cognome" placeholder="Cognome"><br>
<input type="text" name="indirizzo" placeholder="via ..."><br>

<label for="html">SCEGLI LA DESTINAZIONE</label><br>
<input type="radio" name="filtro_destinazione" value="affitto" onclick="affitto()"
			<?php
			if($_SERVER['REQUEST_METHOD'] === 'POST'){if($_POST['filtro_destinazione'] == "affitto"){echo 'checked';}else {echo '';}}else{echo 'checked';}
			?>>Affittasi
			<input type="radio" name="filtro_destinazione" value="vendita" onclick="vendita()"
			<?php 
			echo($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['filtro_destinazione'] == "vendita")? 'checked' : '';
			?>>Vendesi
</form>
<script src= "form_affitto.js">
</script>
<script src= "form_vendita.js">
</script>

</body>
</html>
