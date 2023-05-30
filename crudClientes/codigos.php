<?php
 session_start();
 require 'conex.php';
 

 //Criar Rotina de inserir dados no Bando de Dados
 if (isset($_POST['salvarCliente'])){ // se clicar no Botão salvar Cliente pelo metodo POST
   
    //Pegando os dados do formulário e quardando nas váriáveis
    $nome = mysqli_real_escape_string($con,$_POST['nome']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $cidade = mysqli_real_escape_string($con,$_POST['cidade']);
    $uf = mysqli_real_escape_string($con,$_POST['uf']);

    //criando uma requisição
    $requisicao = "INSERT INTO cliente (nome,email,cidade,uf) VALUES ('$nome','$email','$cidade','$uf')";
    //preparando dos dados para envio conectando ao BD e mandando a Requisição
    $query_run = mysqli_query($con,$requisicao);

    //verificando se tudo vai dar certo
    if ($query_run){
        $_SESSION['mensagem'] = "Cliente Cadastrado com Sucesso"; //essa mensagem vamos colocar na pagina
        header("Location: criarCliente.php");
        exit(0);
    }else{
        $_SESSION['mensagem'] = "Cliente não Cadastrado";
        header("Location: criarCliente.php");
        exit(0);
    }
 }

//Rotina de Editar os dados no Banco de Dados
if(isset($_POST['atualizar']))
{
    $idCliente = mysqli_real_escape_string($con, $_POST['idCliente']); //Vai ser usado para editar o Cliente Certo
    //Pegando os dados do formulário e quardando nas váriáveis
    $nome = mysqli_real_escape_string($con,$_POST['nome']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $cidade = mysqli_real_escape_string($con,$_POST['cidade']);
    $uf = mysqli_real_escape_string($con,$_POST['UF']);

    //criando a requisição de atualização
    $requisicao = "UPDATE cliente SET Nome='$nome', Email='$email', Cidade='$cidade',UF='$uf' WHERE Id='$idCliente'";
     //preparando dos dados para envio conectando ao BD e mandando a Requisição
    $query_run = mysqli_query($con,$requisicao);
    if($query_run)
    {
        $_SESSION['mensagem'] = "Aluno atualizado com sucesso. Clique em Voltar para Sair desta página!";
        header("Location: editarCliente.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensagem'] = "Aluno não atualizado";
        header("Location: editarCliente.php");
        exit(0);
    }
}

//Criando a Rotina de Deletar o Cliente
if(isset($_POST['deletarCliente']))
{
    $idCliente = mysqli_real_escape_string($con, $_POST['deletarCliente']);

    $requisicao = "DELETE FROM cliente WHERE Id='$idCliente'";
    $query_run = mysqli_query($con, $requisicao);

    if($query_run)
    {
        $_SESSION['mensagem'] = "Cliente excluido com sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensagem'] = "Não foi possivel excluir o Cliente";
        header("Location: index.php");
        exit(0);
    }
}


?>