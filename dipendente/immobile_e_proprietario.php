<?php
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
	header("Content-Type: application/json");
	$json = file_get_contents("php://input");
	$php_arr = json_decode($json,true);
	//controllo connessione al database
include('../connessione_db.php');
	session_start();
	
	//lettura campi array come matrice, ogni riga ha valori [numero_camera, metratura, tipo]e definizione query
	/*
	Formato dati json
	
	-camera1
	-camera2
	-camera...
	-Dati immobile $php_arr[.];
	-codice_proprietario, check proprietario, dati proprietario(se presenti) $php_arr[count($php_arr)-2];
	-affitto/vendita $php_arr[count($php_arr)-1];
	*/
	$utente = "";
	$password ="";
	$query = "";
	$query_av="";
	$result_query;
	$immobile = $php_arr[count($php_arr)-3];
	$proprietario = $php_arr[count($php_arr)-2];
	$next_value = 1;
	
	//QUERY PER INSERIMENTO ATOMICO DI TUTTI I DATI
	mysqli_query($dbc, "SET autocommit=0");
	mysqli_query($dbc, "BEGIN");
	//QUERY IMMOBILE
	do
	{
		$query ="analyze table immobile";
		$result_query = mysqli_query($dbc, $query);
		$query = "SELECT `AUTO_INCREMENT` as codice_immobile FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'agenzia' AND   TABLE_NAME   = 'immobile'";
		$result_query = mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($result_query, MYSQLI_NUM);
		$next_value = $row[0];
		$query = 'INSERT INTO immobile VALUES('.$next_value.',"'.$immobile[0].'","'.$immobile[1].'","'.$immobile[2].'","'.$immobile[3].'")';
		$result_query = mysqli_query($dbc, $query);
	}while(!$result_query);
	
	//QUERY PROPRIETARIO
	if($proprietario[1]=="true" && $result_query)
	{
		$query = 'INSERT INTO proprietario VALUES("'.$proprietario[0].'","'.$proprietario[2].'","'.$proprietario[3].'","'.$proprietario[4].'")';
		$result_query = mysqli_query($dbc, $query);
		echo $result_query;
	}
	//QUERY PROPRIETARIO LOGIN
	if($proprietario[1]=="true" && $result_query)
	{
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
		$utente = substr(str_shuffle($permitted_chars), 0, 8);
		$password = substr(str_shuffle($permitted_chars), 0, 8);
		$query = 'INSERT INTO proprietario_login VALUES("'.$proprietario[0].'","'.$utente.'","'.$password.'")';
		$result_query = mysqli_query($dbc, $query);
		echo $result_query;
	}
	//QUERY POSSESSO
	if($result_query)
	{
		$query = 'INSERT INTO possesso VALUES("'.$proprietario[0].'","'.$next_value.'","'.$proprietario[5].'")';
		$result_query = mysqli_query($dbc, $query);
	}

	//QUERY AFFITTO
	if($result_query)
	{
		if($php_arr[count($php_arr)-1][0] == "affitto")
		{
			$affitto = $php_arr[count($php_arr)-1];
			$query_av= 'INSERT INTO affittasi VALUES('.$next_value.',"'.$affitto[1].'","'.$affitto[2].'",'.$affitto[3].')';
		}
		else
		{
			$vendita = $php_arr[count($php_arr)-1];
			$query_av= 'INSERT INTO vendesi VALUES('.$next_value.',"'.$vendita[1].'",'.$vendita[2].')';
		}
		$result_query = mysqli_query($dbc, $query_av);
	}
	echo $result_query;
	//QUERY CAMERE
	if($result_query)
	{
		echo "inserisco camere";
		for($i = 0; $i < count($php_arr)-3; $i++)
		{
			$camera = $php_arr[$i];
			$query = 'INSERT INTO camera VALUES('.$camera[0].','.$next_value.','.$camera[1].',"'.$camera[2].'")';
			$result_query = mysqli_query($dbc, $query);
		}
	}
	//QUERY GESTIONE
	if($result_query)
	{
		echo "inserisco gestione";
		$query = 'INSERT INTO gestione VALUES("'.$next_value.'","'.$_SESSION['codice_utente_agenzia'].'")';
		$result_query = mysqli_query($dbc, $query);
	}
	//STAMPA RISULTATO
	if($result_query)
	{
		$result_query = mysqli_query($dbc, "COMMIT");
		if($proprietario[1]=="true")
		{
			echo "Inserimento effettuato e il nuovo proprietario ha utente: ".$utente." e password:".$password;
		}
		else
		{
			echo "Inserimento effettuato";
		}
	}
	else
	{
		$result_query = mysqli_query($dbc, "ROLLBACK");
		echo "L'inserimento non è andato a buon fine, verificare che il proprietario non sia già registrato.";
	}
}
?>
