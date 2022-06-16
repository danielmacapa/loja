<?php
// conexão com banco 
include ("../conexao.php");

// comando SQL para remover o registro de acordo com ID
$query = "DELETE FROM clientes WHERE 
idclientes = '$id'";

// execução da query
$exec = mysqli_query($host, $query);

?>