<?php

require("inc/banco.php");

session_start();

$user = $_SESSION['user'];
$seOld = $_POST['senhaOld'] ?? null;
$se = $_POST['senha'] ?? null;
$seRep = $_POST['senhaRep'] ?? null;

if($seOld && $se && $seRep) {
    if($user != null){
        if(password_verify($seOld,$user['senha'])){
            if($se == $seRep && !password_verify($se,$user['senha'])){
                $query = $pdo->prepare('UPDATE usuarios SET senha = :se WHERE id = :id');
                $pass = password_hash($se, PASSWORD_DEFAULT);
                $query->bindValue(':id',$user['id']);
                $query->bindValue(':se', $pass);
                $query->execute();
                $_SESSION['user']['senha'] = $pass;
                header('location:index.php');
            }else{
                header('location:trocaSenha.php');
            }
        }else{
            header('location:trocaSenha.php');
        }
    }else{
        header('location:trocaSenha.php');
    }
}else{
    header('location:trocaSenha.php');
};
