<?php

require_once('twig_carregar.php');
require('inc/banco.php');
use Carbon\Carbon;
date_default_timezone_set('America/Sao_Paulo');

if(isset($_GET['ord'])){
    if($_GET['ord'] == 1){
        $dados = $pdo->query('SELECT * FROM compromissos ORDER BY data');
    }else{
        $dados = $pdo->query('SELECT * FROM compromissos ORDER BY data DESC');
    }
}else{
    $dados = $pdo->query('SELECT * FROM compromissos');
};
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