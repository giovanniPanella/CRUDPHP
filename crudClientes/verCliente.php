
<?php
    require 'conex.php'

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Visualizar Cliente</title>
</head>
<body>

    <div class="container mt-5">
        <div class= "row">
            <div class="col-md-12">
                <div class ="card-header">
                    <h4>Dados do Cliente
                        <a href="index.php" class= "btn btn-danger float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body>
                    <?php
                        if(isset($_GET['Id']))
                        {
                            $idCliente = mysqli_real_escape_string($con, $_GET['Id']);
                            $requisicao = "SELECT * FROM cliente WHERE Id='$idCliente'";
                            $query_run = mysqli_query($con,$requisicao);

                            if(mysqli_num_rows($query_run)>0)
                            {

                                $cliente= mysqli_fetch_array($query_run);
                                ?>

                                    <div class = "mb-3">
                                        <label for="">Nome</label>
                                        <p class ="form-control">
                                            <?=$cliente['Nome'];?>
                                        </p>
                                    </div>
                                    <div class = "mb-3">
                                        <label for="">E-mail</label>
                                        <p class ="form-control">
                                            <?=$cliente['Email'];?>
                                        </p>
                                    </div>
                                    <div class = "mb-3">
                                        <label for="">Cidade</label>
                                        <p class ="form-control">
                                            <?=$cliente['Cidade'];?>
                                        </p>
                                    </div>
                                    <div class = "mb-3">
                                        <label for="">UF</label>
                                        <p class ="form-control">
                                            <?=$cliente['UF'];?>
                                        </p>
                                    </div>
                                <?php
                            } 
                            else
                            {
                                echo "<h4>Nenhum Cliente Cadastrado </h4>";
                            }
                        
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>

