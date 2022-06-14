<?php
$host = mysqli_connect("localhost", "root", "", "loja");

$query = "SELECT * FROM categorias";
$exec = mysqli_query($host, $query);

if(mysqli_affected_rows($host)){
    echo "<h1>Lista de categorias</h1>";

    while ($dados = mysqli_fetch_array($exec)){
        echo "ID: ".$dados['id_categorias']."<br>";
        echo "Descrição: ".$dados['descricao']."<br>";
        echo "Data de cadastro: ".$dados['data']."<br>";
        echo "Código de barras: ".$dados['codbar']."<br><br>";
    }
}
echo "<input type='button' value='Voltar' 
onclick=location.href='/loja/index_menu.html'>";

?>