<?php

require_once('twig_carregar.php');
require('inc/banco.php');



$dados = $pdo->prepare("SELECT * FROM compras WHERE id = :id");
$dados->bindValue(":id",$_GET['id']);
$dados->execute();
$comp = $dados->fetch(PDO::FETCH_ASSOC);


echo $twig->render('compras_edit.html',[
    'titulo' => 'Editar - Compras',
    'compra' => $comp,
]);