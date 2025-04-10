<?php

require_once('twig_carregar.php');
require('inc/banco.php');
session_start();
$user = $_SESSION['user'] ?? null;
if($user == null){
    header('location:login.php');
};
$dados = $pdo->prepare('SELECT * FROM compras WHERE usuario = :us');
$dados->bindValue(":us",$user['usuario']);
$dados->execute();
$comp = $dados->fetchAll(PDO::FETCH_ASSOC);


echo $twig->render('compras.html',[
    'titulo' => 'Compras',
    'compras' => $comp,
]);