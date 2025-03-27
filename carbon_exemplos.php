<?php
require_once('vendor/autoload.php');

use Carbon\Carbon;

date_default_timezone_set('America/Sao_Paulo');

echo Carbon::now().'<br>';

//Adiciona um dia

echo Carbon::now()->addDay()."<br>";

//Subtrair uma semana

echo Carbon::now()->subWeek()."<br>";

//Adiciona 4 anos

echo "Próximas olimpíadas: ";
echo Carbon::createFromDate(2024)->addYears(4)->year;
echo "<br>";
//Idade de alguém

echo "Sua idade é: ".Carbon::createFromDate(2007,12,28)->age;

//É fim de semana?

echo '<br>';

if(Carbon::now()->isWeekend()){
    echo 'Festa!';
}else{
    echo 'Life sad :(';
}

echo '<br>';

$nascimento = Carbon::createFromDate(2007,12,28);
echo 'Diferença de data: '.Carbon::now()->diff($nascimento);

$dataaleatoria = '2023-04-05';

$data = Carbon::parse($dataaleatoria);