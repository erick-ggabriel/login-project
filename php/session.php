<?php
include('protect.php');
include('conexao.php');

if(isset($_SESSION['id'])){
	
	//O ID é uma informação que veio dá página de login
	$user = $_SESSION['id'];

	//Aqui usamos o ID para ler outras informações do úsuario
	$sql_code = "SELECT * FROM usuarios WHERE id = '$user'";
    $sql_query =$mysqli->query($sql_code) or die("Falha na execução do código SQL");
	$usuario = $sql_query->fetch_assoc();

}


?>