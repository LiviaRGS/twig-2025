<?php

require("inc/banco.php");

$item = $_POST['item'] ?? null;

session_start();
$user = $_SESSION['user'];

if($item) {
    $query = $pdo->prepare('INSERT INTO compras (item, usuario) VALUES (:it, :us)');
    $query->bindValue(':it',$item);
    $query->bindValue(':us',$user['usuario']);
    $query->execute();

    header('location:compras.php');
};