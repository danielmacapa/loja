<?php

// recupera os dados enviados pelo formulário (form_funcionario)
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$data = $_POST["data"];
$email = $_POST["email"];
$endereco = $_POST["endereco"];
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

// gatilho para conexão com o banco 
if (isset($_POST["submit"])){

    // conexão com banco 
    include ("../conexao.php");

    // query de inserção
    $query = "INSERT INTO funcionarios 
    VALUES (default, '$nome', '$cpf', '$data', '$email', '$endereco', '$usuario', '$senha');";

    // execução da query
    mysqli_query($host, $query);

// verifica se houve inserção e direciona conforme o resultado
        if(mysqli_affected_rows($host)){
            echo "<script> alert('Cadastro realizado com sucesso');
            location.href='/loja/index_menu.html'</script>";
        }
        else{
            echo "<script>alert('Erro no cadastro');
            location.href='/loja/index_menu.html'</script>";
        }
        

}
?>