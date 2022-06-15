<?php
// inicia a sessão
$host = mysqli_connect("localhost", "root", "", "mydb");

// comando SQL para remover o registro de acordo com ID
$query = "DELETE FROM clientes WHERE 
idclientes = '$categoria'";

// execução da query
$exec = mysqli_query($host, $query);

?>