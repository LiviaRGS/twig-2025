<?php

require("inc/banco.php");

$nome = $_POST['nome'] ?? null;
$data = $_POST['data'] ?? null;
session_start();
$user = $_SESSION['user'];

if($nome && $data) {
    $query = $pdo->prepare('INSERT INTO compromissos (nome, data, usuario) VALUES (:no, :da, :us)');
    $query->bindValue(':no',$nome);
    $query->bindValue(':da',$data);
    $query->bindValue(':us',$user['usuario']);
    $query->execute();

    header('location:compromissos.php');
}else{
    header('location:compromissos.php');
};