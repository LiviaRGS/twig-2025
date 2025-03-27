<?php

require_once('twig_carregar.php');
require('inc/banco.php');



$dados = $pdo->prepare("SELECT * FROM compromissos WHERE id = :id");
$dados->bindValue(":id",$_GET['id']);
$dados->execute();
$comp = $dados->fetch(PDO::FETCH_ASSOC);


echo $twig->render('compromissos_edit.html',[
    'titulo' => 'Editar - Compromissos',
    'compromisso' => $comp,
]);