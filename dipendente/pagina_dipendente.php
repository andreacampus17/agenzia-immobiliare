<?php //CONTROLLO SESSIONE
	session_start();
	
	if(isset($_SESSION['tipo_utente_agenzia']) && $_SESSION['tipo_utente_agenzia']== 'dipendente')
		{
			$nome_utente = $_SESSION['nome_utente_agenzia'];
			$cognome_utente = $_SESSION['cognome_utente_agenzia'];
		}
		else
		{	
			header("Location: index.html");
			exit();
		}
?>
<!DOCTYPE html>
<html>

	<head>
		 <link 
     href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
 </head>
		<meta charset ="utf-8">
		<link rel="icon" href="casa.png" />	</head>
		<link rel= "stylesheet" href="style_dipendente.css">
		<title>DIPENDENTE</title>
	</head>
	
	<body>
	<div class ="testa-bordo">
	<form action ="http://localhost/agenzia_immobiliare/login/logout.php" method="post" style="float: right;">
		<?php
		echo'<button class ="button">' . $nome_utente. " " . $cognome_utente. '</button>' ;
		?>
		<br>
		<input type ="submit" name="logout" id="logout_style" value="Logout" align="center" >
		</form>
	</div>
	
	
	
	<form action="pagina_dipendente.php" method= "post" align="center">
	
			<!-- PROPRIETARI DI IMMOBILI NELLA SUA ZONA -->
		<div align = "center">
			<input type="submit" id = "nav" name= "btnimmobili" value="IMMOBILI" >
					<select  name="list_immobili" >  
						<option> AFFITTO</option>
						<option> VENDITA </option>  
					</select>
						
			
			<!-- PROPRIETARI DI IMMOBILI NELLA SUA ZONA -->
			<input type="submit" id = "nav"  name= "btnproprietari" value="PROPRIETARI">
			<!-- AFFITTI PRESENTI E PASSATI DI IMMOBILI NELLA SUA ZONA CON INFO CLIENTI -->
			<input type="submit" id = "nav"  name= "btnaffitti" value="AFFITTI">
			
			<select  name="list_affitti" >  
						<option> ATTUALI</option>
						<option> PASSATI </option>  
					</select>
			
			
			
			<input type="submit" id = "nav"  name= "btninserimenti" value="INSERISCI DATI">
				<select id = "size" name="list_inserimento" align="right"">  
				  
				<option> IMMOBILE E PROPRIETARIO</option>
				<option> NUOVO AFFITTO </option>  
				<option> VENDITA EFFETTUATA </option>  
			</select>
			
			<!-- AFFITTI PRESENTI E PASSATI DI IMMOBILI NELLA SUA ZONA CON INFO CLIENTI -->
			
			
			
			
			<!-- INSERIMENTO IMMOBILE E PROPRIETARIO IN VENDESI/AFFITTASI -->
			
			<!-- INSERIMENTO NUOVO CLIENTE E AFFITTO PRESENTE -->
			
			<!-- INSERIMENTO IMMOBILE VENDESI IN VENDUTO (CODICE_IMMOBILE,DATI ACQUIRENTE) -->
		</div>
	</form>
	
	
	<?php
	include('query_dipendente.php');
	?>
	
	</body>

	
	
</html>