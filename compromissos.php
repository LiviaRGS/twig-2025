<?php

require_once('twig_carregar.php');
require('inc/banco.php');
use Carbon\Carbon;
date_default_timezone_set('America/Sao_Paulo');

session_start();
$user = $_SESSION['user'] ?? null;
if($user == null){
    header('location:login.php');
};

if(isset($_GET['ord'])){
    if($_GET['ord'] == 1){
        $dados = $pdo->prepare('SELECT * FROM compromissos WHERE usuario = :us ORDER BY data');
    }else{
        $dados = $pdo->prepare('SELECT * FROM compromissos WHERE usuario = :us ORDER BY data DESC');
    }
}else{
    $dados = $pdo->prepare('SELECT * FROM compromissos WHERE usuario = :us');
};

$dados->bindValue(":us",$user['usuario']);
$dados->execute();

$comp = $dados->fetchAll(PDO::FETCH_ASSOC);
$compnovo = [];


foreach($comp as $i){
    $carb = carbon::parse($i['data']);
    $datafinal = $carb->day." / ".$carb->month." / ".$carb->year;
    if($carb->isWeekend()){
        $extra = "É fim de semana!";
    }else{
        $extra = "";
    };
    $compnovo[] = ["id"=>$i['id'],"nome"=>$i['nome'],"data"=>$datafinal,"extra"=>$extra];
};


echo $twig->render('compromissos.html',[
    'titulo' => 'Compromissos',
    'compromissos' => $compnovo,
]);