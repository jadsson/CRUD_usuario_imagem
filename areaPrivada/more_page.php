<?php
session_start();
if(!isset($_SESSION['email'])) {
    header('location: ../index.php');
}

require_once '../vendor/autoload.php';
$u = new App\Model\Crud;


?>

<div id="full_img"> 
    <div class="img">
        <?php
            $nome_imagem = 'imagem1';
            $u->ReadOneImage($nome_imagem);
        ?>
    </div>
    <div class="descricao_img">
        
    </div>
</div>









<?php


?>