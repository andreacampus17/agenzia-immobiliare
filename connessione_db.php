<?php
if(!isset($dbc))
{
	$dbc = mysqli_connect('localhost','root','ciaociao123!!','agenzia');
	mysqli_set_charset($dbc, "utf8");
}
?>