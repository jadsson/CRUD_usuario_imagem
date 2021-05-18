<?php
if(!isset($_SESSION))session_start();
if(!isset($_SESSION['email'])) {
    header('location: ../index.php');
    exit();
}

require_once '../vendor/autoload.php';
$i = new \App\Model\Crud;
include 'head_in.php';

$id = $_GET['id_unique'];
$imagem = $i->ReadOneImage($id);    // sempre passar o valor para uma variável

?>
<div id="img_full_page">
    <?php
        echo '<img src="../img/'.$imagem["img_name"].'" alt="">';
        
    ?>
</div>
<div id="img_full_conteudo">
    <?php
        echo '<h2>'.$imagem["img_title"].'</h2>';
        echo '<p>'.$imagem["img_desc"].'</p>';
    ?>
</div>

<script src="../js/script.js"></script>
