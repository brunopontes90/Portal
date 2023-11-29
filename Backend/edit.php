<?php

session_start();

require_once '../Database/connect.php';

if(!empty($_SESSION['id'])){
    if(!empty($_POST['Senha'])){
        $obj = $connect_bank->prepare("UPDATE Pessoas SET Senha = :senha WHERE ID = :id");
        $obj->bindParam(':senha', $_POST['Senha']);
        $obj->bindParam(':id', $_POST['ID']);

        $obj->execute();
    }

    $obj = $connect_bank->prepare("UPDATE Pessoas SET 
        Nome = :nome,
        Sobrenome = :sobrenome,
        DataNascimento = :nascimento,
        Genero = :genero,
        Endereco = :endereco,
        Telefone = :telefone,
        Email = :email,
        EAdmin = :eadmin,
        Observacoes = :obs,
        Senha = :senha
    WHERE 
        ID = :id    
    ");

    $obj->bindParam(':nome', $_POST['Nome']);
    $obj->bindParam(':sobrenome', $_POST['Sobrenome']);
    $obj->bindParam(':nascimento', $_POST['DataNascimento']);
    $obj->bindParam(':genero', $_POST['Genero']);
    $obj->bindParam(':endereco', $_POST['Endereco']);
    $obj->bindParam(':telefone', $_POST['Telefone']);
    $obj->bindParam(':email', $_POST['Email']);
    $obj->bindParam(':eadmin', $_POST['EAdmin']);
    $obj->bindParam(':obs', $_POST['Observacoes']);
    $obj->bindParam(':senha', $_POST['Senha']);
}

if($obj->execute()){
    header('Location: ../Pages/admin/admin.php');
}else {
    $echo = ':-( deu erro, tente novamente';
}