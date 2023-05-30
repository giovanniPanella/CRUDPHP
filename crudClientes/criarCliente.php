<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Criar Cliente</title>
</head>
<body>
   <div class = "container mt-5">

   <?php
    // Vamos colocar a Mensagem pra ver se o Cliente foi cadastrado ou não
    include ('mensagem.php')
   ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class ="card-header">
                    <h4>
                        Adicionar Cliente
                        <a href="index.php" class= "btn btn-danger float-end">Voltar</a>
                    </h4>
                </div>
                <div class ="card-body">
                    <form action="codigos.php" method = "POST">
                        <div class = "mb-3">
                            <label for="">Nome</label>
                            <input type="text" name ="nome" class ="form-control">
                        </div>
                        <div class = "mb-3">
                            <label for="">E-mail</label>
                            <input type="text" name ="email" class ="form-control">
                        </div>
                        <div class = "mb-3">
                            <label for="">Cidade</label>
                            <input type="text" name ="cidade" class ="form-control">
                        </div>
                        <div class = "mb-3">
                            <label for="">Estado</label>
                            <input type="text" name ="uf" class ="form-control">
                        </div>
                        <div class = "mb-3">
                            <button type="submit" name="salvarCliente" class ="btn btn-primary">Salvar Cliente</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>



     </div>
   </div>




   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>