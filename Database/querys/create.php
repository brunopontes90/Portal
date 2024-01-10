<?php
ini_set('display_errors', 1); //mostra os erros, em produção coloque 0
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '../../connect.php';

class Create extends Connect{

    public function __construct(){
        $this->Connection();
    }

    public function CreateQyuery($data){
        $empty_input = false;
        $data = array_map('trim', $data);

        if(in_array("", $data)){
            $empty_input = true;
            echo "<p style='color: red ;'>ERRO: Necessario preencher todos os campos!</p>";
        }

        if(!$empty_input){

            $query_create_user  = "INSERT INTO Pessoas (Nome, Sobrenome, DataNascimento, Genero, Endereco, Telefone, Email, EAdmin, Observacoes, Senha) VALUES (:nome, :sobrenome, :datanascimento, :genero, :endereco, :telefone, :email, :eadmin, :obs, :senha)";
            
            $create_user = $this->conn->prepare($query_create_user);
            $create_user->bindParam(':nome', $data[':nome']);
            $create_user->bindParam(':sobrenome', $data[':sobrenome']);
            $create_user->bindParam(':datanascimento', $data[':datanascimento']);
            $create_user->bindParam(':genero', $data[':genero']);
            $create_user->bindParam(':endereco', $data[':endereco']);
            $create_user->bindParam(':telefone', $data[':telefone']);
            $create_user->bindParam(':email', $data[':email']);
            $create_user->bindParam(':eadmin', $data[':eadmin']);
            $create_user->bindParam(':obs', $data[':obs']);
            $create_user->bindParam(':senha', $data[':senha']);

            $create_user->execute();

            if($create_user->rowCount()){
                unset($data);
                $_SESSION['msg'] = "<p style='color: green ;'>Usuario cadastrado com sucesso!</p>";
                header("Location: ../../Pages/admin/admin_tpl.php");
            }else {
                echo "<p style='color: red ;'>ERRO: tente novamente</p>";
            }
        }
    }
}