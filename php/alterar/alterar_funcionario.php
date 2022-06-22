<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista de Categorias</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <img src="https://i.imgur.com/7ZFSvUg.png" width="300" />
    </header>
    <?php

    $id = $_POST["id"];

    //conexão com o banco
    include("../conexao.php");

    //gatilho do botão Alterar em listar_cliente.php
    if (isset($_POST["alt"])) {
        $query = "SELECT * FROM funcionarios WHERE idfuncionarios = $id;";
        $exec = mysqli_query($host, $query);

        // construção do formulário de funcionario com os dados preenchidos
        while ($dados = mysqli_fetch_array($exec)) {
            echo "<form method='post' action='../atualizar/atualizar_funcionario.php'>";

            echo "<table>";
            echo "<input type='hidden' name='id' value='$dados[idfuncionarios]'>";
            echo "<tr><td>Nome completo:</td>";
            echo "<td><input type='text' name='nome' value='$dados[nome]'></td></tr>";
            echo "<tr><td>CPF:</td>";
            echo "<td><input type='text' maxlength='11' name='cpf' value='$dados[cpf]'></td></tr>";
            echo "<tr><td>Data de Nascimento:</td>";
            echo "<td><input type='date' maxlength='10' name='data' value='$dados[data]'></td></tr>";
            echo "<tr><td>E-mail:</td>";
            echo "<td><input type='text' name='email' value='$dados[email]'></td></tr>";
            echo "<tr><td>Endereço:</td>";
            echo "<td><input type='textarea' name='endereco' value='$dados[endereco]'></td></tr>";
            echo "<tr><td>Usuário:</td>";
            echo "<td><input type='text' name='usuario' value='$dados[usuario]'></td></tr>";
            echo "<tr><td>Senha:</td><br>";
            echo "<td><input type='password' name='senha' value='$dados[senha]'></td></tr>";
            echo "</table><br>";
            //o botão Atualizar envia os dados do formulário para atualizar_funcionario.php
            echo "<input type='submit' name='atu' value='Atualizar'>";
            echo "</form>";
        }
    } else {
        //este bloco é executado se o botão clicado foi Remover
        $query = "DELETE FROM funcionarios WHERE idfuncionarios = $id;";
        $exec = mysqli_query($host, $query);
        if (mysqli_affected_rows($host) <> 0) {
            echo "<script> alert('Removido com sucesso');
        location.href='/loja/index_menu.html'</script>";
        } else {
            echo "<script>alert('Erro na remoção');
        location.href='/loja/index_menu.html'</script>";
        }
    }
    ?>
</body>

</html>