<?php
    session_start();
    unset($_SESSION['email'], $_SESSION['nome'], $_SESSION['senha'], $_SESSION['id']);
    header('location: ../index.php');
    exit;
?>