<?php
// return for back folder
chdir(dirname(__DIR__));

ini_set('display_errors', 'On');
error_reporting(E_ALL);

// config paths
define('DS', DIRECTORY_SEPARATOR);
define('RABBIT_PATH', realpath(dirname(__DIR__)));

try{

    $autoload = RABBIT_PATH . DS . 'vendor' . DS . 'autoload.php';

    if(!file_exists($autoload))
        throw new Exception(sprintf("O Arquivo %s não foi encontrado favor instalar o composer.phar", $autoload));

    include_once ($autoload);

    Rabbit\Core\Application::getInstance()->run();

}catch (Exception $e){
    echo "<h1>ERROR 500</h1>";
    echo "Error codigo: <strong>{$e->getCode()}</strong><br />";
    echo "Mensagem: {$e->getMessage()}<br />";
    echo "Printstack:<pre>{$e->getTraceAsString()}</pre>";
}