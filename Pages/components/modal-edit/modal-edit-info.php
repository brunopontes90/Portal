<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
     <!-- Modal -->
    <div class="modal fade" id="modal-edit-info" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Editar Informações</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <form class="" method="POST">
                            <div class="form-group">
                                <label class="label">Nome:</label>
                                <input class="form-control" type="text" name="Nome" id="Nome" placeholder="Nome" value="<?=$row['Nome']?>" value="<?=$row['Nome']?>" required />
                            </div>
                            <div class="form-group">
                                <label class="label">Sobrenome:</label>
                                <input class="form-control" type="text" name="Sobrenome" id="Sobrenome" placeholder="Sobrenome" value="<?=$row['Sobrenome']?>" required />
                            </div>
                            <div class="form-group">
                                <label class="label">Nascimento:</label>
                                <input class="form-control" type="text" name="Nascimento" id="Nascimento" placeholder="YYYY/MM/DD" value="<?=$row['DataNascimento']?>" required />
                            </div>
                            <div class="form-group">
                                <label class="label">Genero:</label>
                                <input class="form-control" type="text" name="Genero" id="Genero" placeholder="Genero" value="<?=$row['Genero']?>" required />
                            </div>
                            <div class="form-group">
                                <label class="label">Telefone:</label>
                                <input class="form-control" type="text" name="telefone" id="telefone" placeholder="Telefone" value="<?=$row['Telefone']?>" required />
                            </div>
                            <div class="form-group">
                                <label class="label">Email:</label>
                                <input class="form-control" type="text" name="email" id="email" placeholder="Email" value="<?=$row['Email']?>" required />
                            </div>
                            <div class="form-group">
                                <label class="label">Admin:</label>
                                <input class="form-control" type="text" name="admin" id="admin" placeholder="Admin" value="<?=$row['EAdmin']?>" required />
                            </div>
                            <div class="form-group">
                                <label class="label">Observação:</label>
                                <input class="form-control" type="text" name="observacao" id="observacao" placeholder="Observação" value="<?=$row['Observacoes']?>" required />
                            </div>
                            <div class="form-group">
                                <label class="label">Senha:</label>
                                <input class="form-control" type="text" name="senha" id="senha" placeholder="Senha" value="<?=$row['Senha']?>" required />
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Salvar mudanças</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Captura o clique no botão "Editar", obtém os valores dos elementos da linha correspondente e preenche os campos do formulário com esses valores. -->
    <script>
        $(document).ready(function() {
            $('.edit-button').click(function() {
                let id = $(this).closest('tr').find('th').text();
                let title = $(this).closest('tr').find('td:eq(0)').text();
                let completed = $(this).closest('tr').find('td:eq(1)').text();

                $('#titulo').val(title);
                $('#completo').val(completed);
            });
        });
    </script>
   
</body>
</html>