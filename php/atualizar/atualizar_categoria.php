<?php

// recupera os dados enviados pelo formulário (alterar_categoria)
if (isset($_POST["atu"])) {

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];

    // conexão com banco 
    include("../conexao.php");

    // query de atualização
    $query = "UPDATE categorias 
    SET nome='$nome', descricao='$descricao'
    WHERE idcategorias=$id;";

    // echo "<pre>";
    // print_r($query);
    // echo "</pre>";
    // die();

    // execução da query
    mysqli_query($host, $query);

    // verifica se houve inserção e direciona conforme o resultado
    if (mysqli_affected_rows($host) <> 0) {
        echo "<script> alert('Cadastro atualizado com sucesso');
            location.href='/loja/index_menu.html'</script>";
    } else {
        echo "<script>alert('Erro na atualização do cadastro');
            location.href='../index_menu.html'</script>";
    }
}