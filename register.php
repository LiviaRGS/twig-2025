<?php

require("inc/banco.php");

$us = $_POST['usuario'] ?? null;
$se = $_POST['senha'] ?? null;
$no = $_POST['nome'] ?? null;

if($us && $se && $no) {
    $query = $pdo->prepare('INSERT INTO usuarios (usuario, senha, nome) VALUES (:us, :se, :no)');
    $query->bindValue(':us',$us);
    $query->bindValue(':no',$no);
    $query->bindValue(':se', password_hash($se, PASSWORD_DEFAULT));
    $query->execute();

    header('location:login.php');
};