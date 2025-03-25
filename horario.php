<?php

require_once('twig_carregar.php');

use Carbon\Carbon;

date_default_timezone_set('America/Sao_Paulo');

$carbon = Carbon::now();
$amanha = Carbon::now()->addDay();

echo $twig->render('horario.html',[
    'hora' => $carbon, 'amanha' => $amanha
]);