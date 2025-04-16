.<?php
$query = "";
//CONTROLLO CONNESSIONE DBMS
include('../connessione_db.php');
//CALCOLO QUERY IN BASE A BOTTONE PREMUTO E FILTRI
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
	if(isset($_POST['affitti']))
	{
		if(isset($_POST['list_affitti']))
		{
			//check sui radio button e calcolo query necessaria per immobili affitto/vendita
			if($_POST['list_affitti'] == "PASSATI")
			{
				$query = " SELECT * FROM affitto_passato WHERE affitto_passato.cliente='".$_SESSION['codice_utente_agenzia']."'";
			}
		elseif($_POST['list_affitti'] == "ATTUALI")
			{
				$query = "SELECT * FROM affitto_presente WHERE affitto_presente.cliente='".$_SESSION['codice_utente_agenzia']."'";
			}
		}
		
	}
	
	if(isset($_POST['btnversamenti']))
	{
		//check sui radio button e calcolo query necessaria per immobili affitto/vendita
		$query ="SELECT * FROM versamento WHERE versamento.cliente='".$_SESSION['codice_utente_agenzia']."'";
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
	else
	{
		echo "<h3 align=center>Nessun dato presente</h3>";
	}
	
}


?>