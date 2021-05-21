<?php

require_once 'vendor/autoload.php';
$crud = new \App\Model\Crud;
$usuario = new \App\Model\User;

include 'head_out.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="" method="post">
        <h2>Novo Usuário</h2>
        <input type="text" placeholder="nome de usuário" name="name" class="input" maxlength="12"><br>
        <input type="email" placeholder="email" name="email" class="input"><br>
        <input type="password" placeholder="senha" name="senha" class="input"><br>
        <input type="password" placeholder="confirmar senha" name="conf_senha" class="input"><br>
        <input type="submit" value="Cadastrar" name="enviar" class="button_a_confirm">
        <a href="login.php" class="button_a_back">Login</a>

    </form>


    <?php
        
        if(isset($_POST['enviar']))
        {
            $n      = htmlentities(addslashes($_POST['name']));
            $e      = htmlentities(addslashes($_POST['email']));
            $s      = htmlentities(addslashes($_POST['senha']));
            $c_s    = htmlentities(addslashes($_POST['conf_senha']));

            if(!empty($n) && !empty($e) && !empty($s) && !empty($c_s)) {
                if($s === $c_s) {
                    $usuario->setNome($n);
                    $usuario->setEmail($e);
                    $usuario->setSenha($s);

                    if($crud->Create($usuario) === false) {
                        ?><div class="msg_erro"><?php echo $e?> JÁ CADASTRADO</div><?php ;
                    } else {
                        $crud->Create($usuario);
                        header('location: login.php');
                    }

                } else {
                   ?><div class="msg_erro">SENHAS DIVERGENTES</div><?php
                }
            } else {
                ?><div class="msg_erro">ATENÇÃO!!! Todos os campos são obrigatórios</div><?php
            }
        }
    




        include 'footer_out.php';
    ?>
