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
$img = new \App\Model\Image;

?>

<?php
    // --- verificando se o id do usuário é o mesmo na tabela das imagens
    // --- impedir que usuários acessem a área de edição de imagem pelo link com id de imagens de outros usuários
    $id_user = $_SESSION['id'];
    $info_img = $u->ReadOneImage(htmlentities(addslashes($_GET['id_unique'])));
    $id_img = $info_img['id'];

    if($id_user === $id_img){
        $imagem = $u->ReadOneImage($id_img);
        ?>
            <div id="img_edit">
                <?php
                    echo '<img src="../img/'.$info_img['img_name'].'" alt="">'; 
                ?>
                <form action="" method="POST" style="color: #fff;">
                    <div>
                        Titulo: <input type="text" maxlength="40" value="<?php echo $info_img['img_title']?>" name="titulo_imagem"><br>
                        Descrição: <textarea type="text" rows="4" maxlength="75" name="desc_imagem"><?php echo $info_img['img_desc']; ?></textarea>
                    </div>
                    <div>
                        <button class="button_a_confirm" name="atualizar">Atualizar</button>
                        <button class="button_a_back" name="excluir">Excluir Imagem</button>
                    </div>
                    <a href="img_user.php" style="color: #fff; margin-top: 20px;">Cancelar</a>
                </form>
            </div>

        <?php

    } else {
        unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'], $_SESSION['senha']);
        header("location: ../index.php");
        exit;
    }


    // ----- editar dados da imagem
    if(isset($_POST['atualizar']))
    {
        $title = htmlentities(addslashes($_POST['titulo_imagem']));
        $desc = htmlentities(addslashes($_POST['desc_imagem']));
        if(!empty($title))
        {
            $u->UpdateImage($title, $desc, $info_img['id_unique']);
            header("location: img_user.php");
        } else {
            echo "<div class='msg_erro'>Sua imagem precisa ter um título</div>";
        }
    }

    // ---- Excluir imagem do banco de dados e da diretório

    if(isset($_POST['excluir']))
    {
        $u->DeleteImage($info_img['id_unique']);
        $caminho_img = "../img/".$info_img['img_name'];
        unlink($caminho_img);
        header("location: img_user.php");
    }
    
?>


<?php
    include 'footer_in.php';
?>
