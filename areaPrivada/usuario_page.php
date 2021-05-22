<?php 
    if(!isset($_SESSION))session_start();
    if(!isset($_SESSION['email'])) {
        header("location: ../index.php");
        exit;
    }
    require_once '../vendor/autoload.php';

    $u = new \App\Model\Crud;
    $user = new \App\Model\User;
    include 'head_in.php';

    $dados = $u->ReadOneUser($_SESSION['id']);

?>

<div>
    <form action="" method="POST">
        <h1 style="color: #fff; text-align: center;">ATUALIZAR DADOS <br>DA CONTA</h1>
        <input type="text" maxlength="12" name="nome" value="<?php echo $dados['n'];?>">
        <input type="email" maxlength="100" name="email" value="<?php echo $dados['e'];?>">
        <input type="password" maxlength="255" name="senha" placeholder="insira sua senha atual ou uma nova">
        <input type="password" maxlength="255" name="conf_senha" placeholder="confirme sua senha atual ou a nova"><br>
        <input type="submit" class="button_a_confirm" name="atualizar_dados" value="Atualizar"><br><br>
        <input type="submit" class="button_a_back" name="excluir_conta" value="Excluir Conta"><br><br>
        <a href="index.php" style="color: #fff;">Cancelar</a>
    </form>
</div>

<?php
    if(isset($_POST['atualizar_dados']))
    {
        $nome           = htmlentities(addslashes($_POST['nome']));
        $email          = htmlentities(addslashes($_POST['email']));
        $senha          = htmlentities(addslashes($_POST['senha']));
        $conf_senha     = htmlentities(addslashes($_POST['conf_senha']));

        if(!empty($nome) && !empty($email) && !empty($senha) && !empty($conf_senha)){
            if($senha === $conf_senha) {
                $user->setNome($nome);
                $user->setEmail($email);
                $user->setSenha($senha);
                $user->setId($_SESSION['id']);
                $u->Update($user);
                header("location: img_user.php");
            } else {
                echo "<div class='msg_erro'>Senhas divergentes!</div>";
            }
        } else {
            echo "<div class='msg_erro'>Preencha todos os campos!</div>";
        }
    }


    if(isset($_POST['excluir_conta'])) {
        header("location: excluir_conta.php");
    }
?>


<?php 

    include 'footer_in.php';
?>