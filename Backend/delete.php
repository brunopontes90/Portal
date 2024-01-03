<?php
    session_start();
    include_once __DIR__ . '/../../Database/querys/delete.php';
    $delete_user = new Delete();
    $delete_data = $delete_user->DeleteQuery($_GET['ID']);

?>
