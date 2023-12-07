<?php
session_start();

require_once '../Database/connect.php';

if (!empty($_POST['Senha'])) {
    $result = $connect_bank->updateUserInfo($_POST);
    if ($result) {
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Falha ao atualizar os dados.";
    }
}