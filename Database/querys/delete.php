<?php
session_start();
require_once __DIR__ . '/../connect.php';

class Delete extends Connect {

    public function __construct(){
        $this->Connection();
    }

    public function DeleteQuery($id){
        $delete_user = "DELETE FROM Pessoas WHERE ID = :id";
        $result_delete_user = $this->conn->prepare($delete_user);
        $result_delete_user->bindParam(':id', $id);
        
        if ($result_delete_user->execute()) {
            $_SESSION['msg'] = "<p style='color: #01DF01;'>Usuário deletado com sucesso!</p>";
            header("Location: ../../Pages/admin/admin_tpl.php");
        } else {
            $_SESSION['msg'] = "<p style='color: #FF0000;'>Erro; Usuário não foi deletado com sucesso!</p>";
        }
    }
}
?>
