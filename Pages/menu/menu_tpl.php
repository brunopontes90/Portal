<?php 
    session_start();
    include_once '../../Database/connect.php';
    $connect = new Connect();
    $connectDatabase = $connect->Connection();

    if(isset($_SESSION['ID'])){
        $userInfo = $connect->getUserInfo($_SESSION['ID']);
        $userName = $userInfo['Nome'];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/8455a3d02b.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="#">
</head>
<body>
    <header class="d-flex justify-content-end shadow-sm p-3 mb-5 bg-white rounded p-3">
        <div>
            <?php if(isset($_SESSION['ID'])) {?>
                <div class="d-flex mr-5">
                    <p class="h4 mr-4">Olá, <?=$userName?></p>
                    <a href="../../Backend/exit.php" class="h4 nav-icon mx-3">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
            <?php }?>
        </div>
    </header>
</body>
</html>