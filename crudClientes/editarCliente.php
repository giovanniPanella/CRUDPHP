<?php
session_start();
require 'conex.php';
?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Editar Cliente</title>
</head>
<body>
    <div class="container mt-5">

        <?php include('mensagem.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Cliente 
                            <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_GET['Id'])) //pega o valor de id para edição
                            {
                                $idCliente = mysqli_real_escape_string($con, $_GET['Id']);
                                $requisicao = "SELECT * FROM cliente WHERE Id='$idCliente'";
                                $query_run = mysqli_query($con,$requisicao);
                                if(mysqli_num_rows($query_run)>0)
                                {
                                    $cliente = mysqli_fetch_array($query_run);
                                    ?>

                                    <form action="codigos.php" method="POST">
                                        <input type="hidden" name="idCliente" value = "<?=$cliente['Id']; ?>">
                                        <div class ="mb-3">
                                            <label for="">Nome</label>
                                            <input type="text" name="nome" value = "<?=$cliente['Nome'];?>" class="form-control">
                                        </div>
                                        <div class ="mb-3">
                                            <label for="">E-mail</label>
                                            <input type="email" name="email" value = "<?=$cliente['Email'];?>" class="form-control">
                                        </div>
                                        <div class ="mb-3">
                                            <label for="">Cidade</label>
                                            <input type="text" name="cidade" value = "<?=$cliente['Cidade'];?>" class="form-control">
                                        </div>
                                        <div class ="mb-3">
                                            <label for="">UF</label>
                                            <input type="text" name="UF" value = "<?=$cliente['UF'];?>" class="form-control">
                                        </div>
                                        <div class ="mb-3">
                                            <button type="submit" name="atualizar" class="btn btn-primary">
                                                Atualizar
                                            </button>
                                        </div>

                                    </form>
                                    <?php
                                }
                                else
                                {
                                    echo "<h4>Nenhum Id Encontrado </h4>";
                                }
                            }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>