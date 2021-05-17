<?php

require_once 'vendor/autoload.php';
$u = new \App\Model\User;
$crud = new \App\Model\Crud;

include 'head_out.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="email" placeholder="email">
        <input type="password" name="senha" placeholder="password">
        <input type="submit" name="enviar" value="Submit" class="button_a_confirm">
        <a href="index.php" class="button_a_back">Back</a>
    </form>
    <div style="margin: 0 auto;">
        <a href="cadastrar.php" style="text-align: center; color: rgb(0,162,255)">Cadastre-se</a>
    </div>
</body>

    <?php
        if(isset($_POST['enviar']))
        {
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            if($crud->Login($email, $senha) === false) {
                ?><div class="msg_erro">
                    DADOS INVÁLIDOS
                    </div>
                <?php
            } else {
                $crud->Login($email, $senha);
                header('location: areaPrivada/index.php');
            }
        }

        








        include 'footer_out.php';
    ?>
