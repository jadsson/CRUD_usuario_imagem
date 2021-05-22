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
<h1 style="text-align: center;">Envie Suas Imagens</h1>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="POST">
    <input type="file" name="arquivo">
    <input type="text" name="titulo" placeholder="titulo da imagem" class="input" maxlength="40">
    <input type="text" name="desc" placeholder="descriçao da imagem" class="input" maxlength="75">
    <button type="submit" placeholder="enviar" name="enviar" class="button_a_confirm">Enviar Arquivo</button>
</form>

<?php 
    if(isset($_POST['enviar'])) {
        $titulo = htmlentities(addslashes($_POST['titulo']));
        $desc   = htmlentities(addslashes($_POST['desc']));

        $permitidos = ['jpg', 'png'];
        $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
        
        if(!empty($titulo)) {
            if(in_array($extensao, $permitidos)) {
                $pasta = "../img/";
                $temporario = $_FILES['arquivo']['tmp_name'];
                $novoNome = uniqid().".$extensao";

                // --- contar quantidade de imagens 
                $user->setId($_SESSION['id']);
                $contImagem = $u->ReadAllImagesUser($user);
                if(count($contImagem) <= 4){
                    if(move_uploaded_file($temporario, $pasta.$novoNome)) {
                        $mensagem = "<div class='mensagem'>
                                        Upload feito com sucesso
                                    </div>";
        
                        $i->setId($_SESSION['id']);
                        $i->setIdUnique(null);
                        $i->setNome($novoNome);
                        $i->setTitulo($titulo);
                        $i->setDesc($desc);
        
                        $cadastrarImg = $u->CreateImage($i);
        
                    } else {
                        $mensagem = "<div class='mensagem'>
                                        Ops! Algo deu errado.
                                    </div>";
                    }
                } else {
                    $mensagem = "<div class='mensagem'>
                                    Você só pode ter 5 imagens na sua conta.
                                </div>";
                }
            } else {
                $mensagem = "<div class='mensagem'>
                                Formato de arquivo inválido.
                            </div>";
            }
        } else {
            $mensagem = "<div class='mensagem'>Sua imagem precisa ter um título</div>";
        }
        if($mensagem !== null) {
            echo $mensagem;
        }
    }

    // --- pegando todas as imagens deste usuário
    $user->setId($_SESSION['id']);
    $images = $u->ReadAllImagesUser($user);
    ?>
    <p>Selecione uma imagem para editar suas informações ou excluí-la</p>
    <div id="img_user_page">
    <?php
    for($i=0; $i<count($images); $i++) {
        echo '<a href="img_edit.php?id_unique='.$images[$i]['id_unique'].'">';
        echo '<img src="../img/'.$images[$i]['img_name'].'" alt="" class="imagens">';
        echo '</a>';
    }
    ?>
    </div>

<?php
    include 'footer_in.php';
?>