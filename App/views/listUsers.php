<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="/bower_components/bootstrap-sweetalert/dist/sweetalert.css">
        <link rel="stylesheet" href="/App/assets/css/style.css">
        <title></title>
    </head>
    <body>
        <div class="container">

            <br>
            <?php if(count($users)<=0): ?>
                <h1>
                    Não existem usuários cadastrados 
                    <a href="/" class="btn btn-secondary btn-sm btn-outline">Inicio</a>
                    <a href="/user/cadastro" class="btn btn-dark btn-sm btn-outline">Novo</a>
                </h1>
            <?php else: ?>
                <center>
                    <h1>Listagem de Clientes</h1>
                </center>
                <br>
                <table id="table-users" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>
                                <a href="/" class="btn btn-secondary btn-sm btn-outline">Inicio</a>
                                <a href="/user/cadastro" class="btn btn-dark btn-sm btn-outline">Novo</a>
                            </th>                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?=$user['name']?></td>
                                <td><?=$user['email']?></td>
                                <td><?=$user['fone']?></td>
                                <td><?=$user['cpf']?></td>
                                <td>
                                    <a href="/user/cadastro/<?=$user['id_user']?>" class="btn btn-warning btn-sm user_edit">Editar</a>
                                    <button class="btn btn-danger btn-sm user_delete" value="<?=$user['id_user']?>">Excluir</button>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>        
            <?php endif; ?>

            <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
            <script src="/bower_components/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
            <script src="/App/assets/js/main.js"></script>
        </div>
    </body>
</html>
