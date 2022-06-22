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
    // conexão com banco 
    include("../conexao.php");

    $query = "SELECT * FROM categorias";
    $exec = mysqli_query($host, $query);

    //cabeçalho da tabela
    echo "<div id='tabela'>   
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>AÇÕES</th>
    </tr>";

    // construção da lista por fetch e repetição
    while ($dados = mysqli_fetch_array($exec)) {
        echo "<form method='post' action='../alterar/alterar_categoria.php'>";
        $id = $dados["idcategorias"];
        echo "<tr>";
        echo "<td>" . $dados['idcategorias'] . "</td>";
        echo "<td>" . $dados['nome'] . "</td>";
        echo "<td>" . $dados['descricao'] . "</td>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<td><input type='submit' name='alt' value='Alterar'>
        <input type='submit' name='rem' value='Remover'></td>";
        echo "</tr>";
        echo "</form>";
    }
    echo "</table></div><br>";

    echo "<input type='button' value='Imprimir' 
onclick='window.print()'>          ";
    echo "<input type='button' value='Voltar' 
onclick=location.href='/loja/index_menu.html'>";

    ?>
</body>

</html>