<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gerar Code - Painel</title>
	<link rel="stylesheet" type="text/css" id="theme" href="./../css/page.css"/>

</head>
<body>

<?php if (isset($_SESSION['id'])){
echo "<center>
	<h1>Seu login foi efetuado com sucesso!</h1>
		<a href=\"logout.php\">Sair</a>
	</center>";}?>

</body>
</html>