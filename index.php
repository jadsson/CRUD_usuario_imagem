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

    <?php 
        function createCard($nome) {
            echo '<section id="full_index">';
                echo '<div id="content_index">';
                    echo '<div class="circulo"></div>';
                    echo '<div>';
                        echo '<a class="button_a_confirm">'.$nome.'</a>';
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }

        $name = 'Shani';
        createCard($name);
    ?>

    <?php

        include 'footer_out.php';
    
    ?>
</body>
</html>