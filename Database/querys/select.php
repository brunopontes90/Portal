<?php

session_start();
require_once __DIR__ . '../../connect.php';

class Select extends Connect{

    public function __construct(){
        $this->Connection();
    }

    public function getAllUsers(){
        $sql = "SELECT * FROM Pessoas";
        return $this->conn->query($sql)->fetchAll();
    }
}