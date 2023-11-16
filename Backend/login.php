<?php

require_once '../Database/connect.php';

if(isset($_SESSION['login'])) {

    $msg = 'Já esta logado';

}else if(isset($_POST['entrar'])) {

    // Faz o select no banco verificando se o login e senha informados existem
    $query = $connect_bank->prepare("SELECT ID, Nome, EAdmin FROM Pessoas WHERE Email = :email AND Senha = :senha");
    $query->bindParam(':email', $_POST['login']);
    $query->bindParam(':senha', $_POST['senha']);
    $query->execute();

    // pega todas as linhas em forma de array
    $result = $query->fetchAll(PDO::FETCH_CLASS);

    // Verifica se existe 1 elemento dentro do array
    if (count($result) == 1) {

        session_start();

        //Cria vetor no SESSION para o login do user e verifica se existe esse login nas outras paginas
        $_SESSION['login'] = $result[0]->Nome;
        $_SESSION['ID'] = $result[0]->ID;
        $_SESSION['EAdmin'] = $result[0]->EAdmin;

        // redireciona para a tela admin
        header('Location: ../Pages/admin/admin.php');

    }else{
        header('Location: ../index.php'); //se nao estiver entra no form
    }
}else {

    //include '../Pages/admin/admin.php'; //se nao estiver entra no form
}