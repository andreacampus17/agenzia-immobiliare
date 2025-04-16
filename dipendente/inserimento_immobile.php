<?php
$query = "";
$result_query = 0;

if(isset($_POST['btninserimento_immobile']))
{
	if($_POST['filtro_destinazione']=='affitto')
	{
	}
}

if(isset($_POST['btninserimento_affitto']))
{
	if(isset($_POST['nuovo_cliente']) && $_POST['nuovo_cliente'] == 'yes')
	{
		echo 'ciccio';
	}
	else
	{
		echo 'method=post';
	}
}

/*
CREATE TABLE camera(
n_camera int,
immobile int,
metratura float,
tipo char(10),
CONSTRAINT PRIMARY KEY (n_camera,immobile),
FOREIGN KEY (immobile) REFERENCES immobile(codice_immobile) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE affittasi(
immobile int,
data_inizio date,
data_fine date,
prezzo float(2),
CONSTRAINT PRIMARY KEY (immobile,data_inizio),
FOREIGN KEY (immobile) REFERENCES immobile(codice_immobile) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE proprietario(
codice_fiscale char(16),
nome char(10),
cognome char(10),
indirizzo char(20),
CONSTRAINT PRIMARY KEY (codice_fiscale)
);

CREATE TABLE possesso(
proprietario char(16) NOT NULL,
immobile int,
percentuale float(1),
CONSTRAINT PRIMARY KEY (immobile),
FOREIGN KEY (immobile) REFERENCES immobile(codice_immobile) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (proprietario) REFERENCES proprietario(codice_fiscale) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO storico_vendita
SELECT 
CURDATE() as giorno,
$codice_immobile as immobile,
prezzo as prezzo,
$nome_acquirente as nome_acquirente,
$cognome_acquirente as cognome_acquirente,
$c_f_acquirente as c_f_acquirente,
proprietario.nome as nome_proprietario,
proprietario.cognome as cognome_proprietario,
proprietario.codice_fiscale as c_f_proprietario
FROM
proprietario, vendesi, possesso
where
proprietario.codice_fiscale = possesso.proprietario AND
possesso.immobile = $codice_immobile AND
$codice_immobile = vendesi.immobile;

SELECT AUTO_INCREMENT
FROM information_schema.tables
WHERE table_name = 'immobile'
AND table_schema = DATABASE();
*/
?>
