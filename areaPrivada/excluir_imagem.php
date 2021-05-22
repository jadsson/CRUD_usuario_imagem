<?php
if(!isset($_SESSION))session_start();
if(!isset($_SESSION['email'])) {
    header("location: ../index.php");
    exit;
}
require_once '../vendor/autoload.php';

include 'head_in.php';

$i = new \App\Model\Crud;
$id = htmlentities(addslashes($_GET['id_unique']));
$img = $i->ReadOneImage($id);

?>
<h1 style="text-align: center; margin-bottom:40px">Tem certeza que deseja excluir esta imagem?</h1>
<?php echo "<img src='../img/".$img['img_name']."' style='pointer-events:none; width:50%; margin:0 auto;'>"; ?>
<form action="" method="POST">
    <button class="button_a_back" style="width: 60%; height:80px" name="excluir_imagem">SIM, QUERO EXCLUIR A IMAGEM</button>
    <button class="button_a_confirm" style="width: 60%; height:80px" name="cancelar">CANCELAR</button>
</form>

<?php 
    if($_SESSION['id'] !== $img['id']) {
        header("location: img_user.php");
    } else {
        if(isset($_POST['cancelar'])) {
            header("location: img_user.php");
        }

        if(isset($_POST['excluir_imagem'])) {
            $u->DeleteImage($img['id_unique']);
            $caminho_img = '../img/'.$img['img_name'];
            unlink($caminho_img);
            header('location: img_user.php');
        }
    }

?>

<?php include 'footer_in.php'; ?>