<?php
if(!isset($_SESSION)) session_start();
if(!isset($_SESSION['email'])) {
    header("location: ../index.php");
    exit;
}
require_once '../vendor/autoload.php';

$u = new \App\Model\Crud;
$user = new \App\Model\User;

include 'head_in.php';

?>
<h1 style="text-align: center;">Tem certeza que deseja excluir sua conta?</h1>
<form action="" method="POST">
    <button class="button_a_back" style="width: 100%; height:90px" name="excluir_conta">SIM, QUERO EXCLUIR</button>
    <button class="button_a_confirm" style="width: 100%; height:90px" name="cancelar">CANCELAR EXCLUSÃO</button>
</form>

<?php 
    if(isset($_POST['cancelar'])) {
        header("location: img_user.php");
    }

    if(isset($_POST['excluir_conta'])) {
        if($u->Delete($_SESSION['id'])) {
            $u->Delete($_SESSION['id']);
            unset($_SESSION['email'], $_SESSION['id'], $_SESSION['nome']);
            header("location: ../index.php");
            exit;
        } else {
            echo "<h1 style='color: red; text-align: center;font-weight: 600;'>Você não pode excluir sua conta se ainda tem imagens nela.</h1>";
        }
    }

?>



















<?php include 'footer_in.php'; ?>