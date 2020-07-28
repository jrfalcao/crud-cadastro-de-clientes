<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="/App/assets/css/style.css">
        <title>Cadastro de Cliente - <?= ucfirst($acao)?></title>
    </head>
    <body>
        <br>
        <?php if($status):?>
        <center>
            <h1 class="success">Sucesso ao executar ação <strong><em><?= $acao ?></em></strong> usuário</h1>
        </center>
        <?php else:?>
        <center>
            <h1 class="success">Erro ao <strong><em><?= $acao ?></em></strong> usuário!</h1>        
        </center>
        <?php endif;?>
        <br>
        <center>
            <a href="/" class="btn btn-primary">Inicio</a>
            <a href="/user/cadastro" class="btn btn-warning">Voltar para cadastro</a>
            <a href="/user/lista" class="btn btn-success">Lista de Usuários</a>
        </center>
    </body>
</html>
