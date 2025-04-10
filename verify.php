<?php

require("inc/banco.php");

$us = $_POST['usuario'] ?? null;
$se = $_POST['senha'] ?? null;

if($us && $se) {
    $dados = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :us");
    $dados->bindValue(":us",$us);
    $dados->execute();
    $user = $dados->fetch(PDO::FETCH_ASSOC);
    if($user != null){
        if(password_verify($se,$user['senha'])){
            session_start();
            $_SESSION['user'] = $user;
            header('location:index.php');
        }else{
            header('location:login.php');
        }
    }else{
        header('location:login.php');
    }
}else{
    header('location:login.php');
};