<?php

require("inc/banco.php");

$nome = $_POST['nome'] ?? null;
$data = $_POST['data'] ?? null;
$id = $_POST['id'];

if($nome && $data){
    $query = $pdo->prepare('UPDATE compromissos SET nome = :nome, data = :data WHERE id = :id');
    $query->bindValue(':id',$id);
    $query->bindValue(':nome',$nome);
    $query->bindValue(':data',$data);

    $query->execute();

    header('location:compromissos.php');
}else{
    header('location:compromissos.php');
};