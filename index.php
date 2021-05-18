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
        <?php 
            // function createCard($nome) {
            //     echo '<section id="full_index">';
            //         echo '<div id="content_index">';
            //             echo '<div class="circulo"></div>';
            //             echo '<div>';
            //                 echo '<a class="button_a_confirm">'.$nome.'</a>';
            //             echo '</div>';
            //         echo '</div>';
            //     echo '</section>';
            // }

            // $name = 'Shani';
            // createCard($name);
        ?>
    </div>

    <div id="conteudo_index">
        <h2>AS MAIS VOTADAS DO SITE</h2>
        <div class="secao_imagens_index_externo">
            <div class="imagens_index_externo">
                <img src="img/60a4057004f56.png" alt="">
                <div class="texto_imagens_index_externo">
                    <h3>Kayt Diaz</h3>
                    <p>Print do jogo Gears 5</p>
                </div>
            </div>
            <div class="imagens_index_externo">
                <img src="img/60a3bf406374c.jpg" alt="">
                <div class="texto_imagens_index_externo">
                    <h3>Cosplay Triss Merigold</h3>
                    <p>Cosplay adulto da Triss Merigold</p>
                </div>
            </div>
            <div class="imagens_index_externo">
                <img src="img/60a406112da55.png" alt="">
                <div class="texto_imagens_index_externo">
                    <h3>Geralt e Yennefer</h3>
                    <p>Geralt e Yennefer em fanArt</p>
                </div>
            </div>
            <div class="imagens_index_externo">
                <img src="img/60a406d29dcdf.jpg" alt="">
                <div class="texto_imagens_index_externo">
                    <h3>Cosplay Cirilla</h3>
                    <p>Cosplay espetacular da Ciri</p>
                </div>
            </div>
            <div class="imagens_index_externo">
                <img src="img/60a3bfdb9f636.jpg" alt="">
                <div class="texto_imagens_index_externo">
                    <h3>Cosplay Keira Metz</h3>
                    <p>Keira tão sensual quanto você jamais viu Keira tão sensual quanto você jamais viu Keira tão sensual quanto você jamais viu</p>
                </div>
            </div>
        </div>
    </div>


    <?php
        include 'footer_out.php';
    ?>
</body>
</html>