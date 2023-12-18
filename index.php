<?php
ob_start();
session_start();
include_once './Database/connect.php';
header("Location: ./index_tpl.php");
$connect = new Connect();
$connectDatabase = $connect->Connection();

if(isset($_POST['login'])){
    $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $login = $connect->Login($data);

    if($login){
        if($_SESSION['EAdmin'] == 1){
            header('Location: ../Pages/admin/admin_tpl.php');
        } else {
            header('Location: ../Pages/user/user_tpl.php'); 
        }
        exit();
    }else {
        $echo =  "<p style='color: red ;'>ERRO: Credenciais invalidas, tente novamente</p>";
    }
}
