<?php
    session_start();
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
    <title>Inicio</title>
</head>
<body>
<div class="container mt-3">
    <div class = "row">
        <div class="col-md-12">
           <div class= "card">
                <div class = "card-header">
                    <h4>Detalhes do Cliente
                        <a href="criarCliente.php" class="btn btn-primary float-end">Adicionar</a>
                        <?php $_SESSION['mensagem'] = "";?>
                    </h4>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Cidade</th>
                                <th>UF</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $requisicao = "SELECT * FROM cliente";
                                $query_run = mysqli_query($con,$requisicao);
                                if(mysqli_num_rows($query_run)> 0 ){
                                    foreach($query_run as $cliente)
                                    {
                                        ?>
                                        <tr>
                                            <td><?=$cliente['Id'];?></td>
                                            <td><?=$cliente['Nome'];?></td>
                                            <td><?=$cliente['Email'];?></td>
                                            <td><?=$cliente['Cidade'];?></td>
                                            <td><?=$cliente['UF'];?></td>
                                            <td>
                                                <a href="verCliente.php?Id=<?=$cliente['Id']?>" class="btn btn-info btn-sm">Visualizar</a>
                                                <a href="editarCliente.php?Id=<?=$cliente['Id']?>" class="btn btn-success btn-sm">Editar</a>
                                                <form action="codigos.php" method="POST" class="d-inline">
                                                    <button type="submit" name="deletarCliente" value="<?=$cliente['Id'];?>" class = "btn btn-danger btn-sm">Deletar</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }else{
                                    echo "<h5> Nenhum Cliente Cadastrado</h5>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>