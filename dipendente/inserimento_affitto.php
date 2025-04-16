<?php
if(isset($_POST['btninserimento_affitto']))
	{
		$query = "";
		//QUERY PER INSERIMENTO ATOMICO DI TUTTI I DATI
		mysqli_query($dbc, "SET autocommit=0");
		mysqli_query($dbc, "BEGIN");
		if (isset($_POST['nuovo_cliente']) && $_POST['nuovo_cliente'] == 'yes') 
		{
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
			$utente = substr(str_shuffle($permitted_chars), 0, 8);
			$password = substr(str_shuffle($permitted_chars), 0, 8);
			$query = 'INSERT INTO cliente_login VALUES("'.$_POST['c_f_cliente'].'","'.$utente.'","'.$password.'")';
			$result_query = mysqli_query($dbc, $query);
			$query = "INSERT INTO cliente VALUES('".$_POST['c_f_cliente']."','".$_POST['nome_cliente']."','".$_POST['cognome_cliente']."','".$_POST['indirizzo_cliente']."')";
			$result_query = mysqli_query($dbc, $query);
			$query = 'INSERT INTO affitto_presente VALUES("'.$_POST['c_f_cliente'].'",'.$_POST['codice_immobile'].
			",'".$_POST['data_inizio']."','".$_POST['data_fine']."',".$_POST["prezzo"].")";
			$result_query = mysqli_query($dbc, $query);
		}
		else
		{
			$query = 'SELECT * FROM cliente WHERE codice_fiscale = "'.$_POST['c_f_cliente'].'"';
			$result_query = mysqli_query($dbc, $query);
			if($result_query && mysqli_num_rows($result_query) == 1)
			{
				$query = 'INSERT INTO affitto_presente VALUES("'.$_POST['c_f_cliente'].'",'.$_POST['codice_immobile'].",'".$_POST['data_inizio']."','".$_POST['data_fine']."',".$_POST["prezzo"].")";
				$result_query = mysqli_query($dbc, $query);
			}
		}
	if($result_query)
	{
		mysqli_query($dbc, "COMMIT");
		echo "Inserimento corretto e il nuovo cliente ha utente: ".$utente." e password ".$password;
	}
	else
	{
		mysqli_query($dbc, "ROLLBACK");
		echo "Inserimento errato, riprovare.";
	}
}
?>
