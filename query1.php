<?php
//CONTROLLO CONNESSIONE DBMS
if(!isset($dbc))
{
	$dbc = mysqli_connect('localhost','root','ciaociao123!!!','agenziaimmobiliare');
	mysqli_set_charset($dbc, "utf8");
}
//CALCOLO QUERY IN BASE A BOTTONE PREMUTO E FILTRI
if(isset($_POST['nomebottone1']) || isset($_POST['nomebottone2']) )
{
	if($_POST['nomebottone1'])
	{
		$query = "select utente from proprietario_login where utente = \""."$utente". "\"and  password =\""."$password"."\"";
	}
	if($_POST['nomebottone2'])
	{
		$query = "select utente from proprietario_login where utente = \""."$utente". "\"and  password =\""."$password"."\"";
	}
}


//$result_query = mysqli_query($dbc, $query);

?>