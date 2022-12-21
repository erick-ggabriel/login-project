<?php
if(!isset($_SESSION)){
	session_start();
}

if(!isset($_SESSION['id'])){
	echo "<center>
	<h1>Você não está logado, para continuar,</h1>
	<a href=\"./../index.php\">entre com seu login e senha</a>
	<br>
	</center>";
}

?>

