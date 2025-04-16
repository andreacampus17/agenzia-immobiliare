<?php
$query = "";
//CONTROLLO CONNESSIONE DBMS


	include('../connessione_db.php');

//CALCOLO QUERY IN BASE A BOTTONE PREMUTO E FILTRI
if($_SERVER['REQUEST_METHOD'] === 'POST')
	
{
	
	if(isset($_POST['btnimmobili']))
	{
		if(isset($_POST['btnimmobili']))
		{
			//check sui radio button e calcolo query necessaria per immobili affitto/vendita
			if($_POST['list_immobili'] == "AFFITTO")
			{
				$query = "SELECT codice_immobile as Immobile,percentuale,tipo,metratura,indirizzo,descrizione,data_inizio as 'Data Inizio',data_fine as 'Data Fine',prezzo FROM possesso,immobile,affittasi WHERE possesso.proprietario = '".$_SESSION['codice_utente_agenzia']."' AND possesso.immobile = immobile.codice_immobile AND immobile.codice_immobile = affittasi.immobile";
			}
			elseif($_POST['list_immobili'] == "VENDITA")
			{
				$query = "SELECT codice_immobile as Immobile,percentuale,tipo,metratura,indirizzo,descrizione,giorno as data,prezzo FROM possesso,immobile,vendesi WHERE possesso.proprietario = '".$_SESSION['codice_utente_agenzia']."' AND possesso.immobile = immobile.codice_immobile AND immobile.codice_immobile = vendesi.immobile";
			}
		}		
	}
	if(isset($_POST['btnaffittati']))
	{
		$query = "SELECT cliente.nome as 'Nome Cliente',cliente.cognome as 'Cognome Cliente',cliente.codice_fiscale as 'Codice Fiscale',affitti.immobile as Immobile,data_inizio as Inizio,data_fine as Fine,
		prezzo,percentuale FROM (SELECT * FROM affitto_presente UNION SELECT * FROM affitto_passato) as affitti,possesso,cliente WHERE possesso.proprietario = 
		'".$_SESSION['codice_utente_agenzia']."' AND possesso.immobile = affitti.immobile AND affitti.cliente = cliente.codice_fiscale";
	}
	if(isset($_POST['btnversamenti']))
	{
		$query = "SELECT * FROM versamento,cliente WHERE  versamento.cliente = cliente.codice_fiscale AND versamento.proprietario ='". $_SESSION['codice_utente_agenzia'] . "'";
	}
	
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
		echo '<table align="'."center".'">';
		$field = mysqli_field_count($dbc);
		echo "<tr id= ".'"'."campi".'"'.">";
		for($i =0; $i < $field; $i++)
		{
			$finfo = mysqli_fetch_field_direct($result_query, $i);
			printf("<td>%s</td>", ucfirst($finfo->name));

		}
		echo "</tr>";
		for($i = 0; $i < $rowcount; $i++)
		{
			echo "<tr>";
			$row = mysqli_fetch_array($result_query,MYSQLI_NUM);
			foreach($row as $element)
			{
				echo "<td> $element </td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	else {echo "<h3 align=center>Nessun dato presente</h3>";}
}


?>