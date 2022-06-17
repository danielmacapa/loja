<?php


// recupera os dados enviados pelo formulário (form_produto)
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$quantidade = $_POST["quantidade"];
$preco = $_POST["preco"];
$idcategorias = $_POST["idcategorias"];

// gatilho para conexão com o banco 
if (isset($_POST["submit"])){

    // conexão com banco 
    include ("../conexao.php");
    
    // query de inserção
    $query = "INSERT INTO produtos ('idprodutos', 'titulo', 'descricao', 'quantidade', 'preco', 
    'categorias_idcategorias') 
    VALUES (default, '$titulo', '$descricao', '$quantidade', '$preco', '$idcategorias');";

    // $query = "INSERT INTO produtos 
    // VALUES (default, '$titulo', '$descricao', '$quantidade', '$preco', '$idcategorias');";

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