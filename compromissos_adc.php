<?php

require("inc/banco.php");

$nome = $_POST['nome'] ?? null;
$data = $_POST['data'] ?? null;

if($nome && $data) {
    $query = $pdo->prepare('INSERT INTO compromissos (nome, data) VALUES (:no, :da)');
    $query->bindValue(':no',$nome);
    $query->bindValue(':da',$data);

    $query->execute();

    header('location:compromissos.php');
}else{
    header('location:compromissos.php');
};