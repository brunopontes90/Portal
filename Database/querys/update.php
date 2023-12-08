<?php

session_start();
require_once __DIR__ . '../../connect.php';

class Update extends Connect{

    public function __construct(){
        $this->Connection();
    }

    public function editUser($id){
        if (empty($id)) {
            return null;
        }

        $query_edit_user = "SELECT ID, Nome, Sobrenome, DataNascimento, Genero, Endereco, Telefone,Email, EAdmin, Observacoes, Senha FROM Pessoas WHERE ID = $id LIMIT 1";
        $result_edit_user = $this->conn->prepare($query_edit_user);
        $result_edit_user->execute();

        if (($result_edit_user) && ($result_edit_user->rowCount() != 0)) {
            return $result_edit_user->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    public function UpdateQuery($data, $id){
        $empty_input = false;
        $data = array_map('trim', $data);

        // verifica se tem campo vazio 
        if(in_array("", $data)){
            $empty_input = true;
            echo "<p style='color: #FF0000;'>Erro; Necessario preencher todos os campos!</p>";

        }elseif(!filter_var($data['Email'], FILTER_VALIDATE_EMAIL)){
            $empty_input = true;
            echo "<p style='color: red ;'>ERRO: Preencher com email válido!</p>";
        }
        
        // VERIFICA SE TEM ESTRUTURA DE EMAIL
        if(!filter_var($data['Email'], FILTER_VALIDATE_EMAIL)){
            $empty_input = true;
            echo "<p style='color: red ;'>ERRO: Preencher com email válido!</p>";
        }

        if(!$empty_input){

            $query_update = "UPDATE Pessoas SET Nome=:nome, Sobrenome=:sobrenome, DataNascimento=:nascimento, Genero=:genero, Endereco=:endereco, Telefone=:telefone, Email=:email, EAdmin=:eadmin, Observacoes=:obs, Senha=:senha
            WHERE ID=:id";

            $edit_user = $this->conn->prepare($query_update);
            
            $edit_user->bindParam(':nome', $data['Nome']);
            $edit_user->bindParam(':sobrenome', $data['Sobrenome']);
            $edit_user->bindParam(':nascimento', $data['DataNascimento']);
            $edit_user->bindParam(':genero', $data['Genero']);
            $edit_user->bindParam(':endereco', $data['Endereco']);
            $edit_user->bindParam(':telefone', $data['Telefone']);
            $edit_user->bindParam(':email', $data['Email']);
            $edit_user->bindParam(':eadmin', $data['EAdmin']);
            $edit_user->bindParam(':obs', $data['Observacoes']);
            $edit_user->bindParam(':senha', $data['Senha']);
            $edit_user->bindParam(':id', $id);

            if($edit_user->execute()){
                $_SESSION['msg'] = "<p style='color: #01DF01;'>Usuário editado com sucesso!</p>";
                header("Location: ../Pages/admin/admin_tpl.php");
            }else{
                $_SESSION['msg'] = "<p style='color: #FF0000;'>Erro; Usuario não editado com sucesso!</p>";
                
            }
        }
    }
}

