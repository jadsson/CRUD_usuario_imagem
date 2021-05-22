<?php
    if(!$_SESSION)session_start();
    if(!isset($_SESSION['email']))
    {
        header('location: ../index.php');
        exit();
    }
    require_once '../vendor/autoload.php';

    // --- pegando nome de usuário direto do bando de dados, evita erro de user diferente depois de editado
    $u = new \App\Model\Crud;

    $nome = $u->ReadOneUser($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mobileMenu.css">
    <link rel="stylesheet" href="../css/img_user.css">
    <link rel="stylesheet" href="../css/index_imagens.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <header id="menu_out">
        <div id="logo">&M&</div>
        <nav id="lista_menu_out">
            <button id="btn_mobile" style="padding: 5px 10px; font-size: 2.5em; background: none; color: white; border: none; cursor: pointer;">=</button>
            <ul>
                <li><a href="index.php"> Início</a></li>
                <li><a href="img_user.php"> Imagens</a></li>
                <li><a href="usuario_page.php"> <?php echo $nome['n']; ?></a></li>
                <li><a href="sair.php"> Sair</a></li>
            </ul>
        </nav>
    </header>