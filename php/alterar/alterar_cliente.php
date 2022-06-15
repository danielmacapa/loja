<?php

$id = $_POST["id"];

$host = mysqli_connect("localhost", "root", "", "mydb");
$query = "SELECT * FROM clientes WHERE idclientes = $id;";

while ($dados = mysqli_fetch_array($exec)){
    echo "<form method='post' action='../alterar/alterar_cliente.php'>";
    $id = $dados["idclientes"];
    echo "<tr>";
    echo "<td>".$dados['idclientes']."</td>";
    echo "<td>".$dados['nome']."</td>";
    echo "<td>".$dados['cpf']."</td>";
    echo "<td>".$dados['data']."</td>";
    echo "<td>".$dados['email']."</td>";
    echo "<td>".$dados['endereco']."</td>";
    echo "<td><input type='hidden' name='id' value='$id'></td>"; 
    echo "<td><input type='submit' name='alt' value='Alterar'></td>";
    echo "<td><input type='submit' name='rem' value='Remover'></td>";
    echo "</tr>";
    echo "</form>";
}

// if (isset($_POST["submit"])){


/* $host = mysqli_connect("localhost", "root", "", "mydb");

$query = "SELECT * FROM clientes";
$exec = mysqli_query($host, $query);

if(mysqli_affected_rows($host)){
    echo "<h3>LISTA DE CLIENTES</h3>";
}
echo "<input type='button' value='Imprimir' 
onclick='window.print()'>          ";
echo "<input type='button' value='Voltar' 
onclick=location.href='/loja/index_menu.html'>";
*/

?>