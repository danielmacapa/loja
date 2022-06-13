<?php
$host = mysqli_connect("localhost", "root", "", "loja");

$query = "SELECT * FROM produtos";
$exec = mysqli_query($host, $query);

if(mysqli_affected_rows($host)){
    echo "<h1>Lista de produtos</h1>";

    while ($dados = mysqli_fetch_array($exec)){
        echo "ID: ".$dados['id_produtos']."<br>";
        echo "Descrição: ".$dados['descricao']."<br>";
        echo "Categoria: ".$dados['categoria']."<br>";
        echo "Quantidade: ".$dados['quantidade']."<br>";
        echo "Preço: ".$dados['preco']."<br><br>";
    }
}
echo "<input type='button' value='Voltar' 
onclick=location.href='/loja/index_menu.html'>";

?>