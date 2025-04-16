<?php
if(isset($_POST['btninserimento_vendita']))
{
$query = 'INSERT INTO storico_vendita
SELECT 
CURDATE() as giorno,'.
$_POST["codice_immobile"].' as immobile,
prezzo as prezzo,"'.
$_POST["nome_acquirente"].'" as nome_acquirente,"'.
$_POST["cognome_acquirente"].'" as cognome_acquirente,"'.
$_POST["c_f_acquirente"].'" as c_f_acquirente,
proprietario.nome as nome_proprietario,
proprietario.cognome as cognome_proprietario,
proprietario.codice_fiscale as c_f_proprietario
FROM
proprietario, vendesi, possesso
where
proprietario.codice_fiscale = possesso.proprietario AND
possesso.immobile = '.
$_POST["codice_immobile"].' AND '.
$_POST["codice_immobile"].' = vendesi.immobile';
$result_query = mysqli_query($dbc, $query);
	var_dump($result_query);
	if($result_query)
	{
	$query = 'SELECT proprietario FROM possesso
	WHERE possesso.immobile = '.$_POST["codice_immobile"];
	$result_query = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($result_query,MYSQLI_NUM);
	$proprietario = $row[0];
	$query = 'SELECT COUNT(DISTINCT(possesso.immobile)) FROM possesso
	WHERE "'.$proprietario.'" = possesso.proprietario';
	$result_query = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($result_query,MYSQLI_NUM);
	$conto_immobili = $row[0];
	$query = 'DELETE FROM possesso WHERE possesso.immobile = '.$_POST["codice_immobile"];
	$result_query = mysqli_query($dbc, $query);
	$query = 'DELETE FROM vendesi WHERE vendesi.immobile = '.$_POST["codice_immobile"];
	$result_query = mysqli_query($dbc, $query);
		if($conto_immobili == 1)
		{
		$query = 'DELETE FROM proprietario WHERE "'.$proprietario.'" = proprietario.codice_fiscale';
		$result_query = mysqli_query($dbc, $query);
		}
	}
}
?>