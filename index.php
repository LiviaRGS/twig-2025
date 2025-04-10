<?php

require_once('twig_carregar.php');
session_start();
$user = $_SESSION['user'] ?? null;
if($user == null){
    header('location:login.php');
};

echo $twig->render('index.html',[
    'fruta' => 'Merlin',
]);