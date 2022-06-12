<?php
$host = mysqli_connect("localhost", "root", "", "loja");

$query = "SELECT * FROM clientes";
$exec = mysqli_query($host, $query);

if(mysqli_affected_rows($host)){
    echo "<h1>Lista de clientes</h1>";

    while ($dados = mysqli_fetch_array($exec)){
        echo "ID: ".$dados['id_clientes']."<br>";
        echo "Nome Completo: ".$dados['nome']."<br>";
        echo "CPF: ".$dados['cpf']."<br>";
        echo "Data de Nascimento: ".$dados['data']."<br>";
        echo "E-mail: ".$dados['email']."<br>";
        echo "Endereço: ".$dados['endereco']."<br>";
    }
}
echo "<input type='button' value='Voltar' 
onclick=location.href='/loja/index_menu.html'>";

?>