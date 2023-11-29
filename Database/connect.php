<?php

class Connect {
    public $hostname = 'mysql:host=127.0.0.2;';
    public $useranme = 'root';
    public $password = '901229';
    public $dbname = 'dbname=Portal';

    var $conn;

    public function Connection(){
        try {
            $this->conn = new PDO($this->hostname . $this->dbname, $this->useranme, $this->password);
        } catch (PDOException $objErro) {
            echo 'SGBD Indisponivel: ' . $objErro -> getMessage();
            exit();
        }
    }

    public function Login(){
        $query = $this->conn->prepare("SELECT ID, Nome, EAdmin FROM Pessoas WHERE Email = :email AND Senha = :senha");
        $query->bindParam(':email', $_POST['login']);
        $query->bindParam(':senha', $_POST['senha']);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_CLASS);

        if (count($result) == 1) {
            session_start();
    
            //Cria vetor no SESSION para o login do user e verifica se existe esse login nas outras paginas
            $_SESSION['login'] = $result[0]->Nome;
            $_SESSION['ID'] = $result[0]->ID;
            $_SESSION['EAdmin'] = $result[0]->EAdmin;
    
            if($_SESSION['EAdmin'] = $result[0]->EAdmin == 1){
                header('Location: ../Pages/admin/admin.php');
            }else {
                header('Location: ../Pages/user/user.php'); 
            }
    
        }else{
            header('Location: ../index.php'); //se nao estiver entra no form
        }
    }
}


