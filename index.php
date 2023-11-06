<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Pessoas</title>
</head>
<body>
<?php
        require_once 'Database/connect.php';

        $result = array();
        $sql = "SELECT * FROM Pessoas";

        // Verifique se $connect_bank está definido
        if (isset($connect_bank)) {
            $result = $connect_bank->query($sql)->fetchAll();
        }
    ?>
    <div>
        <?php foreach($result as $row) {?>
            <p><?=$row['Nome']?></p>
            <p><?=$row['Sobrenome']?></p>
        <?php }?>
    </div>
</body>
</html>