<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <title>Portal de Usuários</title>
    </head>
    <body>
        <?php
            require_once '../../Database/connect.php';

            $result = array();
            $sql = "SELECT * FROM Pessoas";

            // Verifique se $connect_bank está definido
            if (isset($connect_bank)) {
                $result = $connect_bank->query($sql)->fetchAll();
            }
        ?>
        <div class="container-fluid">
            <div>
                <h1 class="text-uppercase text-center mt-5 font-weight-bold">Usuários</h1>
            </div>
            <div class="mt-4 text-center">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Nascimento</th>
                            <th scope="col">Genero</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach($result as $row) {?>
                                <td scope="row"><?=$row['Nome'] . ' ' . $row['Sobrenome']?></td>
                                <td><?=date('d/m/Y', strtotime($row['DataNascimento']))?></td>
                                <td><?=$row['Genero']?></td>
                                <td><?=$row['Endereco']?></td>
                                <td><?=$row['Telefone']?></td>
                                <td><?=$row['Email']?></td>
                            <?php }?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
        </div>
    </body>
</html>