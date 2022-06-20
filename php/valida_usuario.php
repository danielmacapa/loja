<?php

// recupera os dados enviados pelo formulário (index)
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

// gatilho para conexão com o banco 
if (isset($_POST["submit"])) {

    // conexão com banco 
    include("conexao.php");

    // testa a conexão com o banco
    /* if($host){
    echo "Conexão OK";
    }*/

    // consulta o banco em busca de usuário e senha informados
    $query = "SELECT * FROM funcionarios WHERE usuario = '$usuario'
    AND senha = '$senha'";

    // executa a query (conexão e query)
    $exec = mysqli_query($host, $query);

    // verifica se há correspondência e direciona conforme o resultado
    if (mysqli_num_rows($exec) <> 0) {
        echo "<script> alert('Login realizado com sucesso');
        location.href='../index_menu.html'</script>";
    } else {
        echo "<script>alert('Usuário ou senha inválidos');
        location.href='../index.html'</script>";
    }
}