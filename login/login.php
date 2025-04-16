<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8">
		<title>Login Page</title>
		<link rel="icon" href="casa.png" />	</head>
		<link rel= "stylesheet" href="login.css">
	</head>
	<body>
				<form action="/agenzia_immobiliare/login/login.php" method= "post" id ="login-class" align="center">
					<input type="text" id="fname" name="user" placeholder="Nome Utente" align="center"><br>
					<input type="password" id="pwd" name="pwd" placeholder="Password" align="center"><br>
					<input type="submit" name="login" value="Login"></br>
					<input type="submit" name="homepage" value="Homepage">
				</form>	
<?php
include('../connessione_db.php');
if($_SERVER['REQUEST_METHOD']=="POST"  && isset($_POST["login"]))
{
	$utente = $_POST['user'];
	$password = $_POST['pwd'];
					


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
				echo "<div class=errore_login align=center><label style=color:red;margin-top:20px;>Password sbagliata</label><div>";
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
}
elseif($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST["homepage"]))
{
	session_destroy();
	header("Location: /agenzia_immobiliare/index/index.html");
	exit();
}
?>
</body>
</html>