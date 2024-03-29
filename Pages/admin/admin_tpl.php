<?php 
    session_start();
    include_once __DIR__ . '/../../Database/querys/select.php';
    $select = new Select();
    $querySelect = $select->getAllUsers();

    if (!isset($_SESSION['ID'])) {
        header('Location: ../../index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/8455a3d02b.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="admin.css">
        <title>Portal de Usuários</title>
    </head>
<body>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <div class="container-fluid">
        <div>
            <?php
                include '../menu/menu_tpl.php';
            ?>
        </div>
        <div>
            <h1 class="text-uppercase text-center mt-5 font-weight-bold">Portal de Usuários</h1>
        </div>
        <div class="mt-4 text-center">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Nascimento</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Criado em</th>
                        <th scope="col">Admin</th>
                        <th scope="col">Observação</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <?php foreach($querySelect as $row) {
                    $userData[$row['ID']] = $row;
                ?>
                <tbody>
                    <tr>
                        <th scope="row"><?=$row['ID']?></th>
                        <td><?=$row['Nome'] . ' ' . $row['Sobrenome']?></td>
                        <td><?=date('d/m/Y', strtotime($row['DataNascimento']))?></td>
                        <td><?=$row['Genero'] == 'Masculino' ? 'M' : 'F' ?></td>
                        <td><?=$row['Endereco']?></td>
                        <td><?=$row['Telefone']?></td>
                        <td><?=$row['Email']?></td>
                        <td><?=date('d/m/Y', strtotime($row['DataCriacao']))?></td>
                        <td><?=$row['EAdmin'] == 1 ? 'Sim': 'Não'?></td>
                        <td><?=$row['Observacoes']?></td>
                        <td>
                            <a href="../update/update_tpl.php?ID=<?=$row['ID']?>" class="btn-edit fas fa-edit"></a>

                            <a href="../../Backend/delete.php?ID=<?=$row['ID']?>" class="btn-delete fas fa-trash-alt"></a>
                        </td>
                    </tr>
                    </tbody>
                <?php }?>
            </table>
        <div>
            <a href="../create/create_tpl.php" class="botao-flutuante">+</a>
        </div>
    </div>
</body>
</html>