<?php
session_start();
if(!isset($_SESSION['email'])) {
    header('location: ../index.php');
    session_destroy();
    exit();
}

require_once '../vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
</head>
<body>
    <h1>PÁGINA INICIAL</h1>

    <a href="sair.php" class="button_a_back">Exit</a>
</body>
</html>