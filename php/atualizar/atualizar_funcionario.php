<?php

// recupera os dados enviados pelo formulário (alterar_funcionario)
if (isset($_POST["atu"])) {

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $data = $_POST["data"];
    $email = $_POST["email"];
    $endereco = $_POST["endereco"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    // conexão com banco 
    include("../conexao.php");

    // query de atualização
    $query = "UPDATE funcionarios 
    SET nome='$nome', cpf='$cpf', data='$data', email='$email', 
    endereco='$endereco', usuario='$usuario', senha='$senha'
    WHERE idfuncionarios=$id;";

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