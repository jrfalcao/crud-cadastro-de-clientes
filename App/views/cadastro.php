<!DOCTYPE html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="/App/assets/css/style.css">
        
        <title>Cadastro de cliente</title>
    </head>
    <body>
        <div id="main_container" class="container">
            <br>
            <center><h1><?= isset($user) && !empty($user) ?'Cadastro de ' : 'Atualização de '?>Cliente</h1></center>
            <br>
            <div class="alerta"></div>
            <form action="/user/save" method="post" onSubmit="return formValidator(this);">
                <div class="row">
                    <div class="form-group col">
                        <label for="name">Nome Completo:</label>
                        <input type="text" name="name" value="<?= isset($user) && !empty($user) ? $user['name'] : ''?>" id="name" class="form-control" autocomplete="off" required/>
                    </div>                    
                </div>
                
                <div class="row">
                    <div class="form-group col">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" value="<?= isset($user) && !empty($user) ? $user['email'] : ''?>" class="form-control" autocomplete="off" required/>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col">
                        <label for="fone">Telefone:</label>
                        <input type="tel" name="fone" value="<?= isset($user) && !empty($user) ? $user['fone'] : ''?>" class="form-control" autocomplete="off" required/>
                    </div>

                    <div class="form-group col">
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" value="<?= isset($user) && !empty($user) ? $user['cpf'] : ''?>" class="form-control" autocomplete="off" required/>
                    </div>
                </div>
                <div class="text-right">
                    <a href="/" class="btn btn-warning btn-sm">Voltar</a>  
                    <?php if(isset($user) && !empty($user)):?>
                    <input type="hidden" name="id_user" value="<?=$user['id_user']?>" id="id_user" />
                    <input type="submit" name="save_submit" value="Atualizar" class="btn btn-success btn-sm" /> 
                    <?php else: ?>
                    <input type="submit" name="save_submit" value="Salvar" class="btn btn-success btn-sm" />
                    <?php endif; ?>
                </div>
            </form>
        </div>
            
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="/App/assets/js/main.js"></script>
    </body>
</html>