<?php

require_once 'config.php';

$config = new Config();

try {
    $connect_bank = new PDO($config->hostname . $config->dbname, $config->useranme, $config->password);
} catch (PDOException $objErro) {
    echo 'SGBD Indisponivel: ' . $objErro -> getMessage();
    exit();
}


