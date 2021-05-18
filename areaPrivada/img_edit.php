<?php
session_start();
if(!isset($_SESSION['email'])) {
    header('location: ../index.php');
    exit();
}
require_once '../vendor/autoload.php';

include 'head_in.php';

$u = new \App\Model\Crud;
$user = new \App\Model\User;

?>

<?php

    $id = $_GET['id_unique'];
    $imagem = $u->ReadOneImage($id);

    // echo "<pre>";print_r($imagem);echo "</pre>";
    


?>
<div id="img_edit">
    <?php
        echo '<img src="../img/'.$imagem['img_name'].'" alt="">'; 
    ?>
<form action="" method="POST" style="color: #fff;">
    <div>
        Titulo: <input type="text" value="<?php echo $imagem['img_title']?>" ><br>
        Descrição: <textarea type="text" rows="4" maxlength="255"><?php echo $imagem['img_desc']; ?></textarea>
    </div>
    <div>
        <button class="button_a_confirm" name="atualizar">Atualizar</button>
        <button class="button_a_back" name="excluir">Excluir Imagem</button>
    </div>
    <a href="img_user.php" style="color: #fff;">Cancelar</a>
</form>
</div>

<?php
    include 'footer_in.php';
?>