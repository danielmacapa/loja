<?php
$host = mysqli_connect("localhost", "root", "", "loja");

$query = "SELECT * FROM funcionarios";
$exec = mysqli_query($host, $query);

if(mysqli_affected_rows($host)){
    echo "<h1>Lista de funcionários</h1>";

    while ($dados = mysqli_fetch_array($exec)){
        echo "ID: ".$dados['id_funcionarios']."<br>";
        echo "Nome Completo: ".$dados['nome']."<br>";
        echo "CPF: ".$dados['cpf']."<br>";
        echo "Data de Nascimento: ".$dados['data']."<br>";
        echo "E-mail: ".$dados['email']."<br>";
        echo "Endereço: ".$dados['endereco']."<br>";
        echo "Usuário: ".$dados['usuario']."<br>";
        echo "Senha: ".$dados['senha']."<br><br>";
    }
}
echo "<input type='button' value='Voltar' 
onclick=location.href='/loja/index_menu.html'>";

?>