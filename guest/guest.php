<?php
$query = "";
//CONTROLLO CONNESSIONE DBMS
include('../connessione_db.php');
$query = "SELECT * FROM immobile";
$result_query = mysqli_query($dbc, $query);
?>
<html>
	<head>
		<link rel="icon" href="casa.png" />	</head>
		<title>Ricerca</title>
		<link rel= "stylesheet" href="guest.css">
	</head>
		<body>
	<div class=testa-bordo>
		<a href="http://localhost/agenzia_immobiliare/index/index.html">
				<input type="button" id="button" value="Homepage" />
			</a>
	</div>

	<?php 
		
		if ($result_query)
		{
			$rowcount = mysqli_num_rows($result_query);
			echo "<div class=allinea align=center>";
			for($i = 0; $i < min($rowcount,20); $i++)
			{
				$row = mysqli_fetch_array($result_query,MYSQLI_NUM);
				echo "<div class=zoom align=center> Tipo: ".$row[1]."<br>Metratura: ".$row[2]."<br>Indirizzo: ".$row[3]."<br>Descrizione: ".$row[4]." </div>";
				if($i % 4 == 3)
				{
				echo "<br>";
				}
			}
		}
		else
		{
			echo'query sbagliata';
		}
		echo "</div>";
			
	?>
	</body>
</html>