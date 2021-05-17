<?php 
session_start();
if(!isset($_SESSION['email'])) {
    header('location: ../index.php');
    exit();
}
require_once '../vendor/autoload.php';

include 'head_in.php';
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="POST">
    <input type="file" name="arquivo">
    <button type="submit" placeholder="enviar" name="enviar" class="button_a_confirm">Enviar Arquivo</button>
</form>

<?php 
    if(isset($_POST['enviar'])) {
        $permitidos = ['png', 'jpg'];   // -- tipos permitidos para upload
        $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);

        if(in_array($extensao, $permitidos)) {
            $pasta = '../img/';
            $temporario = $_FILES['arquivo']['tmp_name'];
            $novoNome = uniqid().".$extensao";

            if(move_uploaded_file($temporario, $pasta.$novoNome)) {
                echo "Upload feito com sucesso";
            } else {
                echo "Erro ao fazer upload";
            }
        } else {
            echo "Formato inválido";
        }
    }






    include 'footer_in.php';
?>