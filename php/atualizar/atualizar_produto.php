<?php

// recupera os dados enviados pelo formulário (form_produto)
if (isset($_POST["atu"])) {

    $id = $_POST["id"];
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $quantidade = $_POST["quantidade"];
    $preco = $_POST["preco"];
    $categoria = $_POST["categoria"];

    // conexão com banco 
    include("../conexao.php");

    // query de atualização
    $query = "UPDATE produtos 
    SET titulo='$titulo', descricao='$descricao', quantidade='$quantidade', 
    preco='$preco', categorias_idcategorias = '$categoria'
    WHERE idprodutos=$id;";

    // echo "<pre>";
    //     print_r($query);
    // echo "</pre>";
    //     die();

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