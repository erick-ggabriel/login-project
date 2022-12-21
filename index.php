<?php 
include('./php/conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])){
    if (strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    }elseif (strlen($_POST['senha']) == 0) {
        echo "Digite sua senha";
    }else{

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query =$mysqli->query($sql_code) or die("Falha na execução do código SQL");

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: ./php/painel.php");

        }else{
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

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
<hr color="black" class="hr-title">
<br>
    <div class="login-div" style="margin-top: 25px;margin-right: 15px;" id="bloco">    
    
    <h2 class="title-text">Seja Bem Vindo, Entrar</h2>
    
    <form id="FormLogin" name="FormLogin" method="POST" action="">
        <img src="./img/user-login-icon.png" width="20px" height="20px">
        <input type="text" name="email" class="input-login" placeholder="Usuário" autocomplete="off" id="bloco"/>
        <br>
        <img src="./img/pass-login-icon.png" width="20px" height="20px">
        <input type="password" name="senha" class="input-login" placeholder="Senha" autocomplete="off" id="bloco"/>
        <br>
        <button class="login-button" type="submit">Entrar</button>
        <br>
        <a href="newAccount.php"><p style="font-family: arial; margin-top: 40px;">Criar nova conta</p></a>
    </form>
</div>

</center>

</body>
</html>






