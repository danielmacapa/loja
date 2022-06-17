<?php

$id = $_POST["id"];

// conexão com banco 
include ("../conexao.php");

if (isset($_POST["alt"])){
    $query = "SELECT * FROM categorias WHERE idcategorias = $id;";
    $exec = mysqli_query($host, $query);

    while ($dados = mysqli_fetch_array($exec)){
        echo "<form method='post' action='../atualizar/atualizar_categoria.php'>";

        echo "<table>";
        echo "<td><input type='hidden' name='id' value='$dados[idcategorias]'></td></tr>";
        echo "<tr><td>Título:</td>";
        echo "<td><input type='text' name='titulo' value='$dados[titulo]'></td></tr>";
        echo "<tr><td>Descrição:</td>";
        echo "<td><input type='textarea' name='descricao' value='$dados[descricao]'></td></tr>";
        echo "</table><br>";
    
        echo "<input type='submit' name='atu' value='Atualizar'>";
        echo "</form>";
    }
}else{
    $query = "DELETE FROM categorias WHERE idcategorias = $id;";
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