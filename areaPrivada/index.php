<?php
session_start();
if(!isset($_SESSION['email'])) {
    header('location: ../index.php');
}

require_once '../vendor/autoload.php';
$u = new \App\Model\Crud;
$user = new \App\Model\User;

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
<?php
    $user->setId($_SESSION['id']);
    $images = $u->ReadAllImages();
?>

<section id="index_imagens">

    <?php 
        for($i=0; $i<count($images); $i++) {
            echo '<a href="img_full_page.php?id_unique='.$images[$i]['id_unique'].'">';
            echo '<img src="../img/'.$images[$i]['img_name'].'" alt="'.$images[$i]['img_title'].'">';
            echo '</a>';
        }
    ?>
</section>

<?php include 'footer_in.php'; ?>