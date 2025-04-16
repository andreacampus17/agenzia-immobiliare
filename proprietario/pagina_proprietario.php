<?php //CONTROLLO SESSIONE
	session_start();
	
	if(isset($_SESSION['tipo_utente_agenzia']) && $_SESSION['tipo_utente_agenzia']== 'proprietario')
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
		<link rel= "stylesheet" href="style_proprietario.css">
		<title>PROPRIETARIO</title>
	</head>
	<body>
	<div class ="testa-bordo">
	<form action ="http://localhost/agenzia_immobiliare/login/logout.php" method="post" style="float: right;">
		<?php
			echo'<button class ="button" style="float: right;">' . $nome_utente. " " . $cognome_utente. '</button>';

		?>
		<br>
		<input type ="submit" name="logout" id="logout_style" value="Logout" align="center" >
		</form>
	</div>
	<div align = "center">
	<form action="pagina_proprietario.php" method= "post">
			<input type="submit" id = "nav"  name= "btnimmobili" value="IMMOBILI">
			<select  name="list_immobili" >  
						<option> AFFITTO</option>
						<option> VENDITA </option>  
					</select>
			<input type="submit" id = "nav"  name= "btnaffittati" value="AFFITTATI">
			<input type="submit" id = "nav"  name= "btnversamenti" value="VERSAMENTI">
			
	</form>
	</div>
	</body>

	<?php
	include('query_proprietario.php');
	?>
	
</html>
