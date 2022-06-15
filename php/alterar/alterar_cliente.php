<?php

$id = $_POST["id"];

$host = mysqli_connect("localhost", "root", "", "mydb");
$query = "SELECT * FROM clientes WHERE idclientes = $id;";
$exec = mysqli_query($host, $query);

while ($dados = mysqli_fetch_array($exec)){
    echo "<form method='post' action='../atualizar/atualizar_cliente.php'>";

    echo "<table>";
    echo "<td><input type='hidden' name='id' value='$dados[idclientes]'></td></tr>";
    echo "<tr><td>Nome completo:</td>";
    echo "<td><input type='text' name='nome' value='$dados[nome]'></td></tr>";
    echo "<tr><td>CPF:</td>";
    echo "<td><input type='text' maxlength='11' name='cpf' value='$dados[cpf]'></td></tr>";
    echo "<tr><td>Data de Nascimento:</td>";
    echo "<td><input type='date' maxlength='10' name='data' value='$dados[data]'</td></tr>";
    echo "<tr><td>E-mail:</td>";
    echo "<td><input type='text' name='email' value='$dados[email]'></td></tr>";
    echo "<tr><td>Endereço:</td>";
    echo "<td><input type='textarea' name='endereco' value='$dados[endereco]'></td></tr>";
    echo "</table><br>";
 
    echo "<input type='submit' name='atu' value='Atualizar'>";
    echo "</form>";
}

?>