<?php
    $servidor = "Localhost";
    $usuario = "inline";
    $senha = "03172005";
    $banco = "db_inline";

    $cn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
?>