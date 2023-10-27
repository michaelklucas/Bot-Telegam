<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Comunication\Alert;

try {
    $codigo = $_GET['valor'];
    if ($codigo != 1) {
        throw new \Exception("Código Inválido -  valor esperado 1", 400);
    }
    echo 'Sucesso!';
    Alert::sendMessage('SUCESSO NA AÇÃO');
} catch (\Exception $e) {
    echo $e->getMessage();
    Alert::sendMessage($e->getCode() . ' : ' . $e->getMessage());
}
