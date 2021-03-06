<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista de Funcionários</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <img src="https://i.imgur.com/7ZFSvUg.png" width="300" />
    </header>

    <?php
    // conexão com banco 
    include("../conexao.php");

    // comando SQL para trazer os dados do registro de acordo com ID
    $query = "SELECT * FROM funcionarios";
    $exec = mysqli_query($host, $query);

    //cabeçalho da tabela
    echo "<div id='tabela'> 
<table>
    <tr>
        <th>ID</th>
        <th>Nome Completo</th>
        <th>CPF</th>
        <th>Data de Nascimento</th>
        <th>E-mail</th>
        <th>Endereço</th>
        <th>Usuário</th>
        <th>Senha</th>
        <th>AÇÕES</th>
    </tr>";

    // construção da lista por fetch e repetição
    while ($dados = mysqli_fetch_array($exec)) {
        echo "<form method='post' action='../alterar/alterar_funcionario.php'>";
        $id = $dados["idfuncionarios"];
        echo "<tr>";
        echo "<td>" . $dados['idfuncionarios'] . "</td>";
        echo "<td>" . $dados['nome'] . "</td>";
        echo "<td>" . $dados['cpf'] . "</td>";
        echo "<td>" . $dados['data'] . "</td>";
        echo "<td>" . $dados['email'] . "</td>";
        echo "<td>" . $dados['endereco'] . "</td>";
        echo "<td>" . $dados['usuario'] . "</td>";
        echo "<td>" . $dados['senha'] . "</td>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<td><input type='submit' name='alt' value='Alterar'>
        <input type='submit' name='rem' value='Remover'></td>";
        echo "</tr>";
        echo "</form>";
    }

    echo "</table></div><br>";
    echo "<input type='button' value='Imprimir' 
onclick='window.print()'>          ";
    echo "<input type='button' value='Voltar' 
onclick=location.href='/loja/index_menu.html'>";


    ?>
</body>

</html>