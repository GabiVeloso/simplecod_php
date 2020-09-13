<?php
 
session_start();
if (!empty($_SESSION['id'])) {
    echo "Bem Vindo, " . $_SESSION['nome'] . "!! <br>";
    echo "<a href='sair.php'>Sair</a>";
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: login.php");
}