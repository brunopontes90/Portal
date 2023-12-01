<?php

class Connect {
    public $hostname = 'mysql:host=127.0.0.2;';
    public $username = 'root';
    public $password = '901229';
    public $dbname = 'dbname=Portal';

    var $conn;

    public function Connection(){
        try {
            $this->conn = new PDO($this->hostname . $this->dbname, $this->username, $this->password);
        } catch (PDOException $objErro) {
            echo 'SGBD Indisponivel: ' . $objErro -> getMessage();
            exit();
        }
    }

    public function getUserInfo($userID){
        $query = $this->conn->prepare("SELECT * FROM Pessoas WHERE ID = :id");
        $query->bindParam(':id', $userID);
        $query->execute();
        
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function Login(){
        $query = $this->conn->prepare("SELECT ID, Nome, EAdmin FROM Pessoas WHERE Email = :email AND Senha = :senha");
        $query->bindParam(':email', $_POST['login']);
        $query->bindParam(':senha', $_POST['senha']);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_CLASS);

        if (count($result) == 1) {
            session_start();
            $_SESSION['Email'] = $result[0]->Nome;
            $_SESSION['ID'] = $result[0]->ID;
            $_SESSION['EAdmin'] = $result[0]->EAdmin;
            return true;
    
        }else{
            return false;
        }
    }

    public function SelectQuery(){
        $sql = "SELECT * FROM Pessoas";
        return $this->conn->query($sql)->fetchAll();
    }
}


