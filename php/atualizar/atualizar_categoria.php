<?php

// recupera os dados enviados pelo formulário (alterar_categoria)
if (isset($_POST["atu"])){

    $id = $_POST["id"];
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];

    // conexão com banco 
    include ("../conexao.php");

    // query de atualização
    $query = "UPDATE categorias 
    SET titulo='$titulo', descricao='$descricao'
    WHERE idcategorias=$id;";

    // execução da query
    mysqli_query($host, $query);

    // verifica se houve inserção e direciona conforme o resultado
        if(mysqli_affected_rows($host) <> 0){
            echo "<script> alert('Cadastro atualizado com sucesso');
            location.href='/loja/index_menu.html'</script>";
        }
        else{
            echo "<script>alert('Erro na atualização do cadastro');
            location.href='../index_menu.html'</script>";
        }
        

}

?>