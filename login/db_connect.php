<?php
$utente = $_POST['user'];
$password = $_POST['pwd'];
$dbc = mysqli_connect('localhost','root','ciaociao123!!','agenzia');
mysqli_set_charset($dbc, "utf8");

//CONTROLLO SE UTENTE è PROPRIETARIO
$select1 = "(SELECT codice_fiscale FROM proprietario_login WHERE utente = '". $utente . "' AND  password ='". $password ."')";
$query = "SELECT proprietario.codice_fiscale,nome,cognome FROM proprietario,".$select1." as select1 WHERE proprietario.codice_fiscale = select1.codice_fiscale";

$result_query = mysqli_query($dbc, $query);

if($result_query){ //controllo errori
	//conto quante righe
	$rowcount = mysqli_num_rows($result_query);
	//echo "rowcount = $rowcount ";
	if ($rowcount != 0)
	{
		$row = mysqli_fetch_array($result_query, MYSQLI_NUM);
		session_start();
		$_SESSION['codice_utente_agenzia'] = $row[0];
		$_SESSION['nome_utente_agenzia'] = $row[1];
		$_SESSION['cognome_utente_agenzia'] = $row[2];
		$_SESSION['tipo_utente_agenzia'] = "proprietario";

		header("Location: /agenzia_immobiliare/proprietario/pagina_proprietario.php");
		exit();
	}
	else
	{
		//CONTROLLO SE UTENTE è CLIENTE
$select1 = "(SELECT codice_fiscale FROM cliente_login WHERE utente = '". $utente . "' AND  password ='". $password ."')";
$query = "SELECT cliente.codice_fiscale,nome,cognome FROM cliente,".$select1." as select1 WHERE cliente.codice_fiscale = select1.codice_fiscale";

$result_query = mysqli_query($dbc, $query);

if($result_query){ //controllo errori
	//conto quante righe
	$rowcount = mysqli_num_rows($result_query);
	//echo "rowcount = $rowcount ";
	if ($rowcount != 0)
	{
		$row = mysqli_fetch_array($result_query, MYSQLI_NUM);
		session_start();
		$_SESSION['codice_utente_agenzia'] = $row[0];
		$_SESSION['nome_utente_agenzia'] = $row[1];
		$_SESSION['cognome_utente_agenzia'] = $row[2];
		$_SESSION['tipo_utente_agenzia'] = "cliente";

		header("Location: /agenzia_immobiliare/cliente/pagina_cliente.php");
		exit();
	}
	else
	{
				//CONTROLLO SE UTENTE è DIPENDENTE
$select1 = "(SELECT codice_fiscale FROM dipendente_login WHERE utente = '". $utente . "' AND  password ='". $password ."')";
$query = "SELECT dipendente.codice_fiscale,nome,cognome FROM dipendente,".$select1." as select1 WHERE dipendente.codice_fiscale = select1.codice_fiscale";

$result_query = mysqli_query($dbc, $query);

if($result_query){ //controllo errori
	//conto quante righe
	$rowcount = mysqli_num_rows($result_query);
	if ($rowcount != 0)
	{
		$row = mysqli_fetch_array($result_query, MYSQLI_NUM);
		session_start();
		$_SESSION['codice_utente_agenzia'] = $row[0];
		$_SESSION['nome_utente_agenzia'] = $row[1];
		$_SESSION['cognome_utente_agenzia'] = $row[2];
		$_SESSION['tipo_utente_agenzia'] = "dipendente";

		header("Location: /agenzia_immobiliare/dipendente/pagina_dipendente.php");
		exit();
	}
			else
			{
				echo "password sbagliata";
			}
		}
		else
		{
			echo "errore nella query3";
		}
	}
}
else
{
	echo "errore nella query2";
}
	}
}
else
{
	echo "errore nella query1";
}
?>
