<?php 
session_start();
if(!isset($_SESSION['email'])) {
    header('location: ../index.php');
    exit();
}
require_once '../vendor/autoload.php';
$u = new \App\Model\Crud;
$user = new \App\Model\User;
$i = new \App\Model\Image;

include_once 'head_in.php';
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="POST">
    <input type="file" name="arquivo">
    <input type="text" name="titulo" placeholder="titulo da imagem">
    <input type="text" name="desc" placeholder="descriçao da imagem">
    <button type="submit" placeholder="enviar" name="enviar" class="button_a_confirm">Enviar Arquivo</button>
</form>

<?php 
    if(isset($_POST['enviar'])) {
        $titulo = addslashes($_POST['titulo']);
        $desc = addslashes($_POST['desc']);

        $permitidos = ['jpg', 'png'];
        $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);

        if(in_array($extensao, $permitidos)) {
            $pasta = "../img/";
            $temporario = $_FILES['arquivo']['tmp_name'];
            $novoNome = uniqid().".$extensao";

            if(move_uploaded_file($temporario, $pasta.$novoNome)) {
                $mensagem = "Upload feito com sucesso";

                $i->setId($_SESSION['id']);
                $i->setIdUnique(null);
                $i->setNome($novoNome);
                $i->setTitulo($titulo);
                $i->setDesc($desc);

                $cadastrarImg = $u->CreateImage($i);
                if(!$cadastrarImg) {
                    echo "Você já enviou a quantidade máxima de imagens permitidas";
                }

            } else {
                $mensagem = "Falha no upload";
            }

        } else {
            $mensagem = "Formato inválido";
        }

    }

    // --- pegando todas as imagens deste usuário
    $user->setId($_SESSION['id']);
    $images = $u->ReadAllImagesUser($user);

    ?>
    <h1 id="titulo_img_user">Suas Imagens</h1>
    <div id="img_user_page">
    <?php
    for($i=0; $i<count($images); $i++) {
        echo '<img src="../img/'.$images[$i]['img_name'].'" alt="" class="imagens">';
    }
    ?>
    </div>

<?php
    include 'footer_in.php';
?>