<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista de Categorias</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <img src="https://i.imgur.com/7ZFSvUg.png" width="300" />
    </header>
    <?php

    $id = $_POST["id"];

    // conexão com banco 
    include("../conexao.php");

    if (isset($_POST["alt"])) {
        $query = "SELECT * FROM categorias WHERE idcategorias = $id;";
        $exec = mysqli_query($host, $query);

        while ($dados = mysqli_fetch_array($exec)) {
            echo "<form method='post' action='../atualizar/atualizar_categoria.php'>";

            echo "<table>";
            echo "<input type='hidden' name='id' value='$dados[idcategorias]'>";
            echo "<tr><td>Título:</td>";
            echo "<td><input type='text' name='nome' value='$dados[nome]'></td></tr>";
            echo "<tr><td>Descrição:</td>";
            echo "<td><textarea name='descricao' value='$dados[descricao]'></textarea></td></tr>";
            echo "</table><br>";

            echo "<input type='submit' name='atu' value='Atualizar'>";
            echo "</form>";
        }
    } else {

        // limpa chave estrangeira
        $query = "UPDATE produtos SET categorias_idcategorias = '6' 
    WHERE categorias_idcategorias = $id;";
        mysqli_query($host, $query);
        // deleta registro de categoria
        $query2 = "DELETE FROM categorias WHERE idcategorias = $id;";
        mysqli_query($host, $query2);

        if (mysqli_affected_rows($host) <> 0) {
            echo "<script> alert('Removido com sucesso');
        location.href='/loja/index_menu.html'</script>";
        } else {
            echo "<script>alert('Erro na remoção');
        location.href='/loja/index_menu.html'</script>";
        }
    }
    ?>
</body>

</html>