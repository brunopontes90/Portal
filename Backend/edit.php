<?php
ob_clean();
session_start();

require_once '../Database/connect.php';

$result = array();
$sql = "SELECT ID, Nome, Sobrenome, DataNascimento, Genero, Endereco, Telefone, Email, EAdmin, Observacoes, Senha FROM Pessoas WHERE ID = $id LIMIT 1";

$result = $connect_bank->query($sql)->fetchAll();
$row = $result[0];

if (!empty($_POST['Senha'])) {
    $result = $connect_bank->updateUserInfo($_POST);
    if ($result) {
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Falha ao atualizar os dados.";
    }
}

include '../Pages/update/update_tpl.php';