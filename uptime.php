<?php
//**
// usar crom e comtab pra deixar tudo no automatico
//**
require __DIR__ . '/vendor/autoload.php';

use \App\Comunication\Alert;

try {
    $url = 'https://e-brigada.com.br/admin/login';
    $curl = curl_init($url);
    curl_setopt_array($curl, [
        CURLOPT_HEADER => true,
        CURLOPT_NOBODY => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 10
    ]);

    curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    if ($httpCode != 200) {
        if ($httpCode == 0) {
            Alert::sendMessage('ATENÇÃO: A url: ' . $url . ' Não existe! ');
            exit;
        }

        if ($httpCode == 503) {
            Alert::sendMessage('SISTEMA FORA DO AR');
            //header("Refresh: 5");
            exit;
        }

        if ($httpCode == 302) {
            Alert::sendMessage('TA FAZENDO REDIRECT (COISA DE CORNO)');
            exit;
        }

        throw new Exception('ATENÇÃO: A url ' . $url . ' retornou o status ' . $httpCode . ' STATUS: ' . $httpCode);
        Alert::sendMessage('ATENÇÃO: A url ' . $url . ' retornou o status ' . $httpCode . ' STATUS: ' . $httpCode);
    }

    //**
    //
    // setiver tudo certo manda msg
    //
    //**

    Alert::sendMessage('Tudo bem por hora! :\/');

    
} catch (\Exception $e) {
    echo $e->getMessage();
    Alert::sendMessage($e->getCode() . ' : ' . $e->getMessage());
}
