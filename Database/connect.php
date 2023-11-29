<?php

class Connect {
    public $hostname = 'mysql:host=127.0.0.2;';
    public $useranme = 'root';
    public $password = '901229';
    public $dbname = 'dbname=Portal';

    var $conn;

    function Connection(){
        try {
            $this->conn = new PDO($this->hostname . $this->dbname, $this->useranme, $this->password);
        } catch (PDOException $objErro) {
            echo 'SGBD Indisponivel: ' . $objErro -> getMessage();
            exit();
        }
    }
}


