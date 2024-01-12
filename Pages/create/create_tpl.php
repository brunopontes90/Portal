<?php
    session_start();
    ob_clean();
    include_once __DIR__ . '/../../Database/querys/create.php';

    $connect = new Create();
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
        <link rel="stylesheet" href="">
        <title>Portal de Usuários</title>
</head>
<body class="container">
    <div>
        <h1 class="text-uppercase text-center mt-5 font-weight-bold">Criar Usuário</h1>
    </div>
    <?php
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($data['CreateUser'])){
            $row_user = $connect->CreateQyuery($data);
        }
    ?>
    <form id="edit-user" class="form shadow-lg p-3 mb-5 bg-white rounded" method="POST" action="">
        <div class="mt-3">
            <label class="label">Nome:</label>
            <input class="form-control" type="text" name="Nome" id="Nome" placeholder="Nome" required/>
        </div>
        <div class="form-group mt-3">
            <label class="label">Sobrenome:</label>
            <input class="form-control" type="text" name="Sobrenome" id="Sobrenome" placeholder="Sobrenome" required />
        </div>
        <div class="form-group mt-3">
            <label class="label">Nascimento:</label>
            <input class="form-control" type="text" name="DataNascimento" id="DataNascimento" placeholder="YYYY-DD-MM" required />
        </div>
        <div class="form-group">
            <label class="label">Genero:</label>
            <input class="form-control" type="text" name="Genero" id="Genero" placeholder="Genero" required />
        </div>
        <div class="form-group">
            <label class="label">Endereço:</label>
            <input class="form-control" type="text" name="Endereco" id="Endereco" placeholder="Rua tal" required />
        </div>
        <div class="form-group">
            <label class="label">Telefone:</label>
            <input class="form-control" type="text" name="telefone" id="telefone" placeholder="11912345678" required />
        </div>
        <div class="form-group">
            <label class="label">Email:</label>
            <input class="form-control" type="text" name="email" id="email" placeholder="email@email.com" required />
        </div>
        <div class="form-group">
            <label class="label">Admin:</label>
            <input class="form-control" type="number" name="admin" id="admin" placeholder="0 ou 1" required />
        </div>
        <div class="form-group">
            <label class="label">Observação:</label>
            <input class="form-control" type="text" name="observacao" id="observacao" placeholder="Observação" required />
        </div>
        <div class="form-group">
            <label class="label">Senha:</label>
            <input class="form-control" type="password" name="senha" id="senha" placeholder="Digite a Senha" required />
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="Salvar mudanças" name="CreateUser"></input>
            <a href="../admin/admin_tpl.php" class="btn btn-secondary">Fechar</a>
        </div>
    </form>
</body>
</html>