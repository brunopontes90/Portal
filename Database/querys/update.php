<?php
ini_set('display_errors', 1); //mostra os erros, em produção coloque 0
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

        if (!$empty_input) {
            $query_update = "UPDATE Pessoas SET";
            $fieldsToUpdate = [];

            if (!empty($data['Nome'])) {
                $fieldsToUpdate[] = "Nome=:nome";
            }

            if (!empty($data['Sobrenome'])) {
                $fieldsToUpdate[] = "Sobrenome=:sobrenome";
            }

            if (!empty($data['Genero'])) {
                $fieldsToUpdate[] = "Genero=:genero";
            }

            if (!empty($data['Endereco'])) {
                $fieldsToUpdate[] = "Endereco=:endereco";
            }

            if (!empty($data['Telefone'])) {
                $fieldsToUpdate[] = "Telefone=:telefone";
            }

            if (!empty($data['EAdmin'])) {
                $fieldsToUpdate[] = "EAdmin=:eadmin";
            }

            if (!empty($data['Observacoes'])) {
                $fieldsToUpdate[] = "Observacoes=:obs";
            }

            if (!empty($data['Senha'])) {
                $fieldsToUpdate[] = "Senha=:senha";
            }

            $query_update .= " " . implode(", ", $fieldsToUpdate) . " ";

            $query_update .= " WHERE ID=:id";

            $edit_user = $this->conn->prepare($query_update);

            if (!empty($data['Nome'])) {
                $edit_user->bindParam(':nome', $data['Nome']);
            }

            if (!empty($data['Sobrenome'])) {
                $edit_user->bindParam(':sobrenome', $data['Sobrenome']);
            }

            if (!empty($data['Genero'])) {
                $edit_user->bindParam(':genero', $data['Genero']);
            }

            if (!empty($data['Endereco'])) {
                $edit_user->bindParam(':endereco', $data['Endereco']);
            }

            if (!empty($data['Telefone'])) {
                $edit_user->bindParam(':telefone', $data['Telefone']);
            }

            if (!empty($data['EAdmin'])) {
                $edit_user->bindParam(':eadmin', $data['EAdmin']);
            }

            if (!empty($data['Observacoes'])) {
                $edit_user->bindParam(':obs', $data['Observacoes']);
            }

            if (!empty($data['Senha'])) {
                $edit_user->bindParam(':senha', $data['Senha']);
            }

            $edit_user->bindParam(':id', $id);

            var_dump($query_update);

            if ($edit_user->execute()) {
                $_SESSION['msg'] = "<p style='color: #01DF01;'>Usuário editado com sucesso!</p>";
                header("Location: ../../Pages/admin/admin_tpl.php");
            } else {
                $_SESSION['msg'] = "<p style='color: #FF0000;'>Erro; Usuario não editado com sucesso!</p>";
            }
        }
    }
}

