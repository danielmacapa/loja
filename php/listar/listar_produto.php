<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Lista de Produtos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <img src="https://i.imgur.com/7ZFSvUg.png" width="300"/>
        </header>

<?php
// conexão com banco 
include ("../conexao.php");

// importa dados de produtos
$query = "SELECT * FROM produtos";
$exec = mysqli_query($host, $query);

//importa dados de categorias
$query2 = "SELECT * FROM categorias";
$exec2 = mysqli_query($host, $query2);
while ($dados2 = mysqli_fetch_array($exec2)){
    $titulo_categorias = $dados2["idcategorias"];
}


//cabeçalho da tabela
echo "<div id='tabela'> 
<table>
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Descrição</th>
        <th>Quantidade</th>
        <th>Preço</th>
        <th>Categoria</th>
        <th>AÇÕES</th>
    </tr>";

// construção da lista por fetch e repetição
while ($dados = mysqli_fetch_array($exec)){
    echo "<form method='post' action='../alterar/alterar_produto.php'>";
    $id = $dados["idprodutos"];
    echo "<tr>";
    echo "<td>".$dados['idprodutos']."</td>";
    echo "<td>".$dados['titulo']."</td>";
    echo "<td>".$dados['descricao']."</td>";
    echo "<td>".$dados['quantidade']."</td>";
    echo "<td>".$dados['preco']."</td>";
    echo "<td>".$dados[$titulo_categorias]."</td>";
    echo "<td><input type='hidden' name='id' value='$id'></td>"; 
    echo "<td><input type='submit' name='alt' value='Alterar'></td>";
    echo "<td><input type='submit' name='rem' value='Remover'></td>";
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