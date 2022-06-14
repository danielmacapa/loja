<?php
$host = mysqli_connect("localhost", "root", "", "mydb");

$query = "SELECT * FROM produtos";
$exec = mysqli_query($host, $query);

if(mysqli_affected_rows($host)){
    echo "<h3>LISTA DE PRODUTOS</h3>";

    while ($dados = mysqli_fetch_array($exec)){
        echo "ID: ".$dados['idprodutos']."<br>";
        echo "Título: ".$dados['titulo']."<br>";
        echo "Descrição: ".$dados['descricao']."<br>";
        echo "Quantidade: ".$dados['quantidade']."<br>";
        echo "Preço: ".$dados['preco']."<br>";
        echo "----"."<br>";
    }
}
echo "<input type='button' value='Imprimir' 
onclick='window.print()'>          ";
echo "<input type='button' value='Voltar' 
onclick=location.href='/loja/index_menu.html'>";

?>