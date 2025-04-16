<?php
$query = "";
//CONTROLLO CONNESSIONE DBMS
include('../connessione_db.php');
//CALCOLO QUERY IN BASE A BOTTONE PREMUTO E FILTRI SE POST IN ARRIVO
if($_SERVER['REQUEST_METHOD'] === 'POST')	
{
	//BOTTONE PER IMMOBILI IN VENDESI O AFFITTASI
	if(isset($_POST['btnimmobili']))
	{
		//check sui radio button e calcolo query necessaria per immobili affitto/vendita
		if(isset($_POST['list_immobili']))
		{
			if($_POST['list_immobili'] == "AFFITTO")
			{
			$query = "SELECT immobile.codice_immobile as Immobile,tipo,metratura,descrizione,possesso.proprietario,data_inizio as Inizio,data_fine as Fine,prezzo FROM affittasi,possesso,immobile,gestione WHERE immobile.codice_immobile = gestione.immobile AND gestione.dipendente = '".
			$_SESSION['codice_utente_agenzia']."' AND possesso.immobile = immobile.codice_immobile AND affittasi.immobile = immobile.codice_immobile";
			}
		else if($_POST['list_immobili'] == "VENDITA")
			
			{
			$query = "SELECT immobile.codice_immobile as Immobile,tipo,metratura,descrizione,possesso.proprietario,giorno as Data,prezzo FROM vendesi,possesso,immobile,gestione WHERE immobile.codice_immobile = gestione.immobile AND gestione.dipendente = '".
			$_SESSION['codice_utente_agenzia']."' AND possesso.immobile = immobile.codice_immobile  AND vendesi.immobile = immobile.codice_immobile";
			}
		}
		
	}
	//BOTTONE PER PROPRIETARI
	if(isset($_POST['btnproprietari']))
	{
		$query = "SELECT proprietario.codice_fiscale as 'Codice Fiscale', proprietario.nome, proprietario.cognome, proprietario.indirizzo, possesso.immobile FROM proprietario, possesso, immobile, gestione WHERE gestione.dipendente = '".$_SESSION['codice_utente_agenzia']."' AND gestione.immobile = immobile.codice_immobile AND possesso.immobile = immobile.codice_immobile AND possesso.proprietario = proprietario.codice_fiscale";
	}
	//BOTTONE PER AFFITTI ATTUALI O PASSATI
	if(isset($_POST['btnaffitti']))
	{
		//check sui radio button e calcolo query necessaria per immobili affitto/vendita
		if(isset($_POST['list_affitti']))
		{
			if($_POST['list_affitti'] == "ATTUALI")
			{
				$query ="SELECT affitto_presente.cliente,affitto_presente.immobile,affitto_presente.data_inizio as 'Data Inizio',affitto_presente.data_fine as 'Data Fine',affitto_presente.prezzo FROM affitto_presente, immobile,gestione WHERE gestione.dipendente = '".$_SESSION['codice_utente_agenzia']."' AND gestione.immobile = immobile.codice_immobile AND affitto_presente.immobile = immobile.codice_immobile";
			}
			else if($_POST['list_affitti'] == "PASSATI")
			{
				$query = "SELECT affitto_passato.cliente,affitto_passato.immobile,affitto_passato.data_inizio as 'Data Inizio',affitto_passato.data_fine as 'Data Fine',affitto_passato.prezzo FROM affitto_passato, immobile,gestione WHERE gestione.dipendente = '".$_SESSION['codice_utente_agenzia']."' AND gestione.immobile = immobile.codice_immobile AND affitto_passato.immobile = immobile.codice_immobile";
			}
		}
	}
	if($query != "")
	{
	$result_query = mysqli_query($dbc, $query);
	if($result_query){ //controllo errori
	//conto quante righe
	$rowcount = mysqli_num_rows($result_query);
	}
	else
	{ //altrimenti stampo la query sbagliata
		echo $query;
	}
	if ($rowcount != 0)
	{
		echo '<table align="'."center".'" id= "'."tabella".'">';
		$field = mysqli_field_count($dbc);
		echo "<tr id= ".'"'."campi".'"'.'" id= "'."tabella".'">';
		for($i =0; $i < $field; $i++)
		{
			$finfo = mysqli_fetch_field_direct($result_query, $i);
			printf("<td id= ".'"'."tabella".'"'.">%s</td>", ucfirst($finfo->name));

		}
		echo '</tr>';
		for($i = 0; $i < $rowcount; $i++)
		{
			echo '<tr id= "'."tabella".'">';
			$row = mysqli_fetch_array($result_query,MYSQLI_NUM);
			foreach($row as $element)
			{
				echo '<td id= "'."tabella".'">'.$element .'</td>';
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	}
}
include('form_inserimenti_dipendente.php');

?>