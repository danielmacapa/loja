<?php
$host = mysqli_connect("localhost", "root", "", "mydb");

$query = "SELECT * FROM funcionarios";
$exec = mysqli_query($host, $query);

if(mysqli_affected_rows($host)){
    echo "<h3>LISTA DE FUNCIONÁRIOS</h3>";

    while ($dados = mysqli_fetch_array($exec)){
        echo "ID: ".$dados['idfuncionarios']."<br>";
        echo "Nome Completo: ".$dados['nome']."<br>";
        echo "CPF: ".$dados['cpf']."<br>";
        echo "Data de Nascimento: ".$dados['data']."<br>";
        echo "E-mail: ".$dados['email']."<br>";
        echo "Endereço: ".$dados['endereco']."<br>";
        echo "Usuário: ".$dados['usuario']."<br>";
        echo "Senha: ".$dados['senha']."<br>";
        echo "----"."<br>";
    }
}
echo "<input type='button' value='Imprimir' 
onclick='window.print()'>          ";
echo "<input type='button' value='Voltar' 
onclick=location.href='/loja/index_menu.html'>";

?>