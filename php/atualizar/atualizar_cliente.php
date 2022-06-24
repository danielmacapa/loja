<?php

// recupera os dados enviados pelo formulário (form_cliente)
if (isset($_POST["atu"])) {

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $data = $_POST["data"];
    $email = $_POST["email"];
    $endereco = $_POST["endereco"];

    // conexão com banco 
    include("../conexao.php");

    // query de atualização
    $query = "UPDATE clientes 
    SET nome='$nome', cpf='$cpf', data='$data', email='$email', endereco='$endereco'
    WHERE idclientes=$id;";

    // execução da query
    mysqli_query($host, $query);

    // verifica se houve inserção e direciona conforme o resultado
    if (mysqli_affected_rows($host) <> 0) {
        echo "<script> alert('Cadastro atualizado com sucesso');
            location.href='/loja/index_menu.html'</script>";
    } else {
        echo "<script>alert('Nenhum registro foi atualizado');
            location.href='/loja/index_menu.html'</script>";
    }
}