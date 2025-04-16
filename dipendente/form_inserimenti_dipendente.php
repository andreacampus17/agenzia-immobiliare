.<?php
//CONTROLLO PER FORM INSERIMENTI
if($_SERVER['REQUEST_METHOD'] === 'POST')	
{
	if(isset($_POST['btninserimenti']))
	{
		//check sui radio button e calcolo query necessaria per immobili affitto/vendita
		if(isset($_POST['list_inserimento']))
		{
			if($_POST['list_inserimento'] == "IMMOBILE E PROPRIETARIO")
			{//FORM INSERIMENTO NUOVO IMMOBILE, RELATIVO PROPRIETARIO E DESTINAZIONE(VENDESI O AFFITTASI)
				echo"
				<form METHOD =POST align=right id=form_inserimento onsubmit=".'"return controllo_immobili();"'.">
				<table align=center height=450 >
					<tr>
						<td>
							<label for=html align=center>DATI IMMOBILE</label><br>
							<input type=text id=metratura_immobile name=metratura placeholder=Metratura><br>
							<input type=text id=tipo_immobile name=tipo placeholder='villa, appartamento,...'><br>
							<input type=text id=indirizzo_immobile name=indirizzo placeholder='via ...'><br>
							<input type=text id=descrizione_immobile name=descrizione placeholder='Inserisci descrizione!!' >
						</td>
						<td id=form_interno>
							<label for=html align=center>DATI PROPRIETARIO</label><br>
							<input type=text id=codice_fiscale name=codice_fiscale placeholder='Codice Fiscale'><br>
							<input type=text id=percentuale name=percentuale placeholder=0%><br>
							<label for=html>NUOVO PROPRIETARIO</label><br>
							<input type=checkbox id=nuovo_proprietario name=nuovo_proprietario onclick=form_nuovo_proprietario()><br>
							<input type=text name=nome id=nome_proprietario placeholder=Nome disabled=true><br>
							<input type=text name=cognome id=cognome_proprietario placeholder=Cognome disabled=true><br>
							<input type=text name=indirizzo_proprietario id=indirizzo_proprietario placeholder='via ...' disabled=true><br>
							<input type=radio id=filtro_affitto name=filtro_destinazione value=affitto onclick=affitto()";
							if($_SERVER['REQUEST_METHOD'] === 'POST')
							{
								if(isset($_POST['filtro_destinazione']))
								{
									if($_POST['filtro_destinazione'] == "affitto")
									{
										echo ' checked';
									}
									else
									{
										echo '';
									}
								}else
								{
									echo '';
								}
							}
							echo ">Affittasi
							<input type=radio id=filtro_vendita name=filtro_destinazione value=vendita onclick=vendita()";
							 if($_SERVER['REQUEST_METHOD'] === 'POST')
							 {
								 if(isset($_POST['filtro_destinazione']))
								 {
									 if($_POST['filtro_destinazione'] == "vendita")
									 {
										 echo ' checked';
									 }
									 else
									 {
										 echo '';
									 }
								} 
								else
								{
								echo '';
								}
							}
							echo">Vendesi
						</td>
						<td>
							<label for=html align=center>DATI CAMERA</label><br>
							<input type=text id=n_camera name=n_camera placeholder='Numero Camera'><br>
							<input type=text id=metratura_camera name=metratura_camera placeholder=...mq><br>
							<input type=text id=tipo_camera name=tipo_camera placeholder='bagno, camera da letto,...'><br>
							<button type=button onclick=aggiungi_camera()>SALVA CAMERA</button><br>
							<label for=html align=center id=label_numero_camera></label><br>
							<label for=html align=center id=label_metratura></label><br>
							<label for=html align=center id=label_tipo></label><br>
						</td>
					</tr>
					</table>
					<div id=errors align=center display=none>
					</div>
					<div style=text-align:center>
							<label for=html id=input_check></label><br>
							<button type=button class=button onclick=controllo_immobili()>SALVA</button><br>
					</div>
				</form>
				";
			}
			elseif($_POST['list_inserimento'] == "NUOVO AFFITTO")
			{//FORM INSERIMENTO NUOVO CLIENTE E IMMOBILE IN AFFITTO
			echo"
			<form id=form_cliente method=POST onsubmit=".'"return controllo_affitti();"'.">
			<table align=center height=200px width=1100px>
			<tr>
				<td>
					<label for=html align=center>DATI CLIENTE</label><br>
					<input type=text name=c_f_cliente id=c_f_cliente placeholder='Codice Fiscale'><br>
					<input type=checkbox id=nuovo_cliente name=nuovo_cliente onclick=form_nuovo_cliente() value='yes'> <label for=html align=center>NUOVO CLIENTE</label><br>
					<input type=text name=nome_cliente id=nome_cliente placeholder=Nome disabled=true><br>
					<input type=text name=cognome_cliente id=cognome_cliente placeholder=Cognome disabled=true><br>
					<input type=text name=indirizzo_cliente id=indirizzo_cliente placeholder='via ...' disabled=true><br>
				</td>
				<td>
					<label for=html align=center>DATI AFFITTO</label><br>
					<input type=text id=codice_immobile name=codice_immobile placeholder='Codice Immobile'><br>
					<label for=html> Data Inizio </label><br>
					<input type=date style=width:180px; name=data_inizio id=data_inizio><br>
					<label for=html> Data Fine </label><br>
					<input type=date style=width:180px; name=data_fine id=data_fine><br>
					<input type=text id=prezzo name=prezzo placeholder=Prezzo><br>
					
				</td>
			</tr>
			</table>
			<div id=errors align=center display=none>
			</div>
			<div style=text-align:center>
					<label for=html id=input_check></label><br>
					<input type=submit class=button id=salva_affitto name=btninserimento_affitto value=SALVA align=center margin=auto>
				</div>
			</form>";
			}
			elseif($_POST['list_inserimento'] == "VENDITA EFFETTUATA")
			{//FORM INSERIMENTO DATI PER STORICIZZAZIONE VENDITA DA VENDESI A STORICO VENDITA
				echo"
			<form id=form_cliente method=POST onsubmit=".'"return controllo_vendita();"'.">
			<table align=center height=200 width=800>
			<tr>
				<td>
					<label for=html align=center>CODICE IMMOBILE</label><br>
					<input type=text name=codice_immobile id=codice_immobile placeholder=''><br>
				</td>
				<td>
					<label for=html align=center>DATI ACQUIRENTE</label><br>
					<input type=text id=c_f_acquirente name=c_f_acquirente placeholder='Codice Fiscale'><br>
					<input type=text name=nome_acquirente id=nome_acquirente placeholder='Nome'><br>
					<input type=text name=cognome_acquirente id=cognome_acquirente placeholder='Cognome'><br>
				</td>
			</tr>
			</table>
			</div>
			<div id=errors align=center>
			</div>
			<div style=text-align:center>  
					<label for=html id=input_check></label><br>
					<input type=submit class=button id=salva_vendita name=btninserimento_vendita value=SALVA align=center margin=auto>
				</div>
			</form>";
			}
			else
			{
				echo "seleziona qualcosa, STRONZO!";
			}
		}
	}
	echo'<script src= "form_affitto.js"></script>
	<script src= "form_vendita.js"></script>
	<script src="form_proprietario.js"></script>
	<script src="controlli_inserimento_immobile.js"></script>
	<script src="controlli_inserimento_affitti.js"></script>
	<script src="controlli_inserimento_vendita.js"></script>
	<script src="form_cliente.js"></script>';
	include("inserimento_affitto.php");
	include("inserimento_vendita.php");
}


?>
