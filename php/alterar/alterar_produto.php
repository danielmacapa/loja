<?php

$id = $_POST["id"];

// conexão com banco 
include ("../conexao.php");

//gatilho do botão Alterar em listar_produto.php
if (isset($_POST["alt"])){
    $query = "SELECT * FROM produtos WHERE idprodutos = $id;";
    $exec = mysqli_query($host, $query);

    // construção do formulário de produto com os dados preenchidos
    while ($dados = mysqli_fetch_array($exec)){
        echo "<form method='post' action='../atualizar/atualizar_produto.php'>";

        echo "<table>";
        echo "<td><input type='hidden' name='id' value='$dados[idprodutos]'></td></tr>";
        echo "<tr><td>Título:</td>";
        echo "<td><input type='text' name='titulo' value='$dados[titulo]'></td></tr>";
        echo "<tr><td>Descrição:</td>";
        echo "<td><input type='textarea' name='descricao' value='$dados[descricao]'></td></tr>";
        echo "<tr><td>Quantidade:</td>";
        echo "<td><input type='number' name='quantidade' value='$dados[quantidade]'></td></tr>";
        echo "<tr><td>Preço:</td>";
        echo "<td><input type='text' name='preco' value='$dados[preco]'></td></tr>";

        echo "<tr><td>Categoria:</td>";
        echo "<td><select name='idcategorias'>";
        echo "<option value=''>Selecione uma categoria:</option>";

        include ("../php/conexao.php");
        $query2 = "SELECT * FROM categorias";
        $exec2 = mysqli_query($host, $query2);

        while ($dados2 = mysqli_fetch_array($exec2)){
            $id2 = $dados2["idcategorias"];
            $nome = $dados2["nome"];
            echo "<option value='$id2'>$nome</option>";
        }
            echo "</select></td></tr>";

        echo "</table><br>";    
        echo "<input type='submit' name='atu' value='Atualizar'>";
        echo "</form>";
    }
}else{
    $query = "DELETE FROM produtos WHERE idprodutos = $id;";
    $exec = mysqli_query($host, $query);
    if(mysqli_affected_rows($host) <> 0){
        echo "<script> alert('Removido com sucesso');
        location.href='/loja/index_menu.html'</script>";
    }
    else{
        echo "<script>alert('Erro na remoção');
        location.href='/loja/index_menu.html'</script>";
    }
}
?>