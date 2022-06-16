<?php
// conexão com banco 
include ("../conexao.php");

$query = "SELECT * FROM produtos";
$exec = mysqli_query($host, $query);

//cabeçalho da tabela
echo "<div id='tabela'> 
<table>
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Descrição</th>
        <th>Quantidade</th>
        <th>Preço</th>
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
    echo "<td><input type='hidden' name='id' value='$id'></td>"; 
    echo "<td><input type='submit' name='alt' value='Alterar'></td>";
    echo "<td><input type='submit' name='rem' value='Remover'></td>";
    echo "</tr>";
    echo "</form>";
}

echo "</table></div><br>";
echo "<input type='button' value='Imprimir' 
onclick='window.print()'>          ";
echo "<input type='button' value='Sair' 
onclick=location.href='/loja/index_menu.html'>";

?>