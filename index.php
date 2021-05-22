<?php
    require_once 'vendor/autoload.php';

    include 'head_out.php';
    $u = new \App\Model\Crud;
    $img = $u->ReadAllImages();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
</head>
<body>
    <div id="fundo_index">
        <div>
            <h1>ENVIE SUAS FOTOS FAVORITAS</h1>
        </div>
    </div>

        <div id="conteudo_index">
            <h2>ÚLTIMOS ENVIOS</h2>
            <div class="secao_imagens_index_externo">
            <?php 
                for($i=0; $i<count($img); $i++) {
                    ?>
                    <div class="imagens_index_externo">
                        <?php echo "<img src=img/".$img[$i]['img_name'].">"; ?>
                        <div class="texto_imagens_index_externo">
                            <h3><?php echo $img[$i]['img_title']; ?></h3>
                            <p><?php echo $img[$i]['img_desc']; ?></p>
                        </div>
                    </div>
                    <?php
                    if($i == 4) break;
                }
            
            ?>
        </div>
        <br>
    </div>


    <?php
        include 'footer_out.php';
    ?>
</body>
</html>