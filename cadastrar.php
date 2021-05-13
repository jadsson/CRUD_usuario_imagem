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
        <input type="text" placeholder="name" name="name"><br>
        <input type="email" placeholder="email" name="email"><br>
        <input type="password" placeholder="password" name="senha"><br>
        <input type="password" placeholder="confirm password" name="conf_senha"><br>
        <input type="submit" value="Submit" name="enviar" class="button_a_confirm">
        <a href="index.php" class="button_a_back">Back</a>

    </form>


    <?php
        
        if(isset($_POST['enviar']))
        {
            $n = addslashes($_POST['name']);
            $e = addslashes($_POST['email']);
            $s = addslashes($_POST['senha']);
            $c_s = addslashes($_POST['conf_senha']);

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
                ?><div class="msg_erro">ATENÇÃO!!! PREENCHA OS CAMPOS OBRIGATÓRIOS</div><?php
            }
        }
    




        include 'footer_out.php';
    ?>
