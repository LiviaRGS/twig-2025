<?php

require_once('twig_carregar.php');

use Carbon\Carbon;

session_start();
$user = $_SESSION['user'] ?? null;
if($user == null){
    header('location:login.php');
};

date_default_timezone_set('America/Sao_Paulo');

$carbon = Carbon::now();
$amanha = Carbon::now()->addDay();

echo $twig->render('horario.html',[
    'hora' => $carbon, 'amanha' => $amanha
]);