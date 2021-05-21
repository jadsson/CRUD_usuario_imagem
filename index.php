<?php
    require_once 'vendor/autoload.php';

    include 'head_out.php';
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
            <h2>AS MAIS VOTADAS DO SITE</h2>
            <div class="secao_imagens_index_externo">
            
            <div class="imagens_index_externo">
                <img src="img/Shani.jpg" alt="">
                <div class="texto_imagens_index_externo">
                    <h3>Cosplay Shani</h3>
                    <p>Cosplay incrivelmente fiel da Shani</p>
                </div>
            </div>
            <div class="imagens_index_externo">
                <img src="img/60a6d82761bda.jpg" alt="">
                <div class="texto_imagens_index_externo">
                    <h3>Cosplay Triss Merigold</h3>
                    <p>Cosplay adulto da Triss Merigold</p>
                </div>
            </div>
            <div class="imagens_index_externo">
                <img src="img/60a6e64a03504.png" alt="">
                <div class="texto_imagens_index_externo">
                    <h3>Geralt e Yennefer</h3>
                    <p>Geralt e Yennefer em fanArt</p>
                </div>
            </div>
            <div class="imagens_index_externo">
                <img src="img/60a6d789294e4.jpg" alt="">
                <div class="texto_imagens_index_externo">
                    <h3>Cosplay Cirilla</h3>
                    <p>Cosplay espetacular da Ciri</p>
                </div>
            </div>
            <div class="imagens_index_externo">
                <img src="img/60a6d6c369ae8.jpg" alt="">
                <div class="texto_imagens_index_externo">
                    <h3>Cosplay Keira Metz</h3>
                    <p>Keira tão sensual quanto você jamais viu</p>
                </div>
            </div>
        </div>
    </div>


    <?php
        include 'footer_out.php';
    ?>
</body>
</html>