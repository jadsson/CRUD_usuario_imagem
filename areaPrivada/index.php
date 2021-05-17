<?php
session_start();
if(!isset($_SESSION['email'])) {
    header('location: ../index.php');
}

require_once '../vendor/autoload.php';
$u = new \App\Model\Crud;

include 'head_in.php';
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
    

<?php include 'footer_in.php'; ?>