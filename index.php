
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="index.css">
        <title>Portal de Usuários</title>
    </head>
    <body class="container">
        <div class="text-danger text-center">
            <?php if (isset($msg)) echo $msg; ?>
        </div>
        <form class="form shadow-lg p-3 mb-5 bg-white rounded" method="POST" action="Backend/login.php">
            <h1 class="text-center font-weight-bold">Login</h1>
            <div class="mt-2">
                <label for="login" class="font-weight-bold text-muted">Email</label>
                <input type="email" class="form-control" name="login" placeholder="Email" required autofocus>
            </div>
            <div class="mt-3">
                <label for="login" class="font-weight-bold text-muted">Senha</label>
                <input type="password" class="form-control" name="senha" placeholder="Email" required autofocus>
            </div>
            <div class="mt-5">
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="entrar">Entrar</button>
            </div>
        </form>
    </body>
</html>