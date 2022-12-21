<?php

include('./php/conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])){
    if (strlen($_POST['email']) == 0) {
        echo "Digite um e-mail válido";
    }elseif (strlen($_POST['senha1']) == 0) {
        echo "Digite sua nova senha";
    }elseif (strlen($_POST['senha2']) == 0) {
        echo "Por questão de segurança, digite sua nova senha novamente";
    }elseif ($_POST['senha1'] != $_POST['senha2']) {
        echo "A senha nois dois campos não conferem, tente digitá-las novamente.";
    }else{

    	$email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha1']);

        //ALTER TABLE `usuarios` CHANGE COLUMN `id` `id` int(16) NOT NULL AUTO_INCREMENT;
    	$sql_code = "INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`) VALUES (NULL, NULL, '$email', '$senha', NULL)";
        $sql_query = $mysqli->query($sql_code) or die($sql_code);

		header("Location: index.php");
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Gerar Code - Entrar</title>
            <style type="text/css">

    #bloco{
        margin-left: 0px;
        -webkit-box-shadow: 9px 7px 5px rgba(50, 50, 50, 0.77);
        -moz-box-shadow:    9px 7px 5px rgba(50, 50, 50, 0.77);
        box-shadow:         9px 7px 5px rgba(50, 50, 50, 0.77);
    }

    </style>          
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/page.css"/>
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
<center>
       <div class="divSuperior">
    <center>
    <h1 class="title" style="font-family: Arial; text-align: center; margin: auto; display: inline;">Gerar Code.com</h1>
    <img src="./img/qr-code-icon.png" width="40px" height="40px" style="display: inline; position: sticky; top: 50%; margin-left: 20px;">
        </center>
</div>
<br>
<hr color="black">
<br>
    <div class="login-div" style="margin-top: 25px;margin-right: 15px; height: 340px;" id="bloco">    
    
    <h2 class="title-text">Cadastre-se</h2>
    
    <form id="FormLogin" name="FormLogin" method="POST" action="">
        <img src="./img/user-login-icon.png" width="20px" height="20px">
        <input type="text" name="email" class="input-login" placeholder="Digite um e-mail válido" autocomplete="off" id="bloco"/>
        <br>
        <input type="password" name="senha1" style="margin-left: 25px;" class="input-login" placeholder="Digite sua nova senha" autocomplete="off" id="bloco"/>
        <br>
        <img src="./img/pass-login-icon.png" width="20px" height="20px">
        <input type="password" name="senha2" class="input-login" placeholder="Digite sua nova senha novamente" autocomplete="off" id="bloco"/>
        <br>
        <button class="login-button" type="submit">Criar conta</button>
        <br>
        <a href="index.php"><p style="font-family: arial; margin-top: 20px;">Já tenho uma conta</p></a>
    </form>
</div>

</center>

</body>
</html>