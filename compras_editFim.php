<?php

require("inc/banco.php");

$item = $_POST['item'] ?? null;
$id = $_POST['id'];

if($item) {
    $query = $pdo->prepare('UPDATE compras SET item = :item WHERE id = :id');
    $query->bindValue(':id',$id);
    $query->bindValue(':item',$item);

    $query->execute();

    header('location:compras.php');
};