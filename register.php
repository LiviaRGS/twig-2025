<?php

require("inc/banco.php");

$us = $_POST['usuario'] ?? null;
$se = $_POST['senha'] ?? null;

if($us && $se) {
    $query = $pdo->prepare('INSERT INTO usuarios (usuario, senha) VALUES (:us, :se)');
    $query->bindValue(':us',$us);
    $query->bindValue(':se', password_hash($se, PASSWORD_DEFAULT));
    $query->execute();

    header('location:login.php');
};