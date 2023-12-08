<?php
    session_start();
    ob_start();
    include_once __DIR__ . '/../../Database/querys/update.php';
    $id = filter_input(INPUT_GET, "ID", FILTER_SANITIZE_NUMBER_INT);

    $connect = new Update();
    $connectDatabase = $connect->Connection();
    $row_user = $connect->editUser($id);

    if($row_user == null){
        $_SESSION['msg'] = "<p style='color: #FF0000;'>Erro; Usuário não encontrado</p>";
        header("Location: ../admin/admin_tpl.php");
        exit();
    }

    $data =  filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // VERIFICA SE O USER CLICOU NO BOTAO
    if(!empty($data['updateUser'])){
        $connect->UpdateQuery($data, $id);
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
        <link rel="stylesheet" href="">
        <title>Portal de Usuários</title>
</head>
<body class="container">
    <div>
        <h1 class="text-uppercase text-center mt-5 font-weight-bold">Editar Usuário</h1>
    </div>
    <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }        
    ?>
    <form id="edit-user" class="form shadow-lg p-3 mb-5 bg-white rounded" method="POST" action="">
        <div class="mt-3">
            <label class="label">Nome:</label>
            <input class="form-control" type="text" name="Nome" id="Nome" value="<?=$row_user['Nome']?>" placeholder="Nome" required/>
        </div>
        <div class="form-group mt-3">
            <label class="label">Sobrenome:</label>
            <input class="form-control" type="text" name="Sobrenome" id="Sobrenome" value="<?=$row_user['Sobrenome']?>" placeholder="Sobrenome" required />
        </div>
        <div class="form-group">
            <label class="label">Nascimento:</label>
            <input class="form-control" type="text" name="Nascimento" id="Nascimento" value="<?=$row_user['DataNascimento']?>" placeholder="YYYY/MM/DD" required />
        </div>
        <div class="form-group">
            <label class="label">Genero:</label>
            <input class="form-control" type="text" name="Genero" id="Genero" value="<?=$row_user['Genero']?>" placeholder="Genero" required />
        </div>
        <div class="form-group">
            <label class="label">Telefone:</label>
            <input class="form-control" type="text" name="telefone" id="telefone" value="<?=$row_user['Telefone']?>" placeholder="Telefone" required />
        </div>
        <div class="form-group">
            <label class="label">Email:</label>
            <input class="form-control" type="text" name="email" id="email" value="<?=$row_user['Email']?>" placeholder="Email" required />
        </div>
        <div class="form-group">
            <label class="label">Admin:</label>
            <input class="form-control" type="text" name="admin" id="admin" value="<?=$row_user['EAdmin']?>" placeholder="Admin" required />
        </div>
        <div class="form-group">
            <label class="label">Observação:</label>
            <input class="form-control" type="text" name="observacao" id="observacao" value="<?=$row_user['Observacoes']?>" placeholder="Observação" required />
        </div>
        <div class="form-group">
            <label class="label">Senha:</label>
            <input class="form-control" type="text" name="senha" id="senha" value="<?=$row_user['Senha']?>" placeholder="Senha" required />
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="Salvar mudanças" name="updateUser"></input>
            <a href="../admin/admin_tpl.php" class="btn btn-secondary">Fechar</a>
        </div>
    </form>
</body>
</html>