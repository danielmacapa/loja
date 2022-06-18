<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Tela de Cadastro</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <img src="https://i.imgur.com/7ZFSvUg.png" width="300"/>
        </header>

        <div id="titulo">
            <h4>CADASTRO DE PRODUTOS</h4>
        </div>
        <div id="form">
            <h5>Informe os dados para cadastro:</h5>
            <form action="../php/cadastrar/cadastrar_produto.php" method="post">
                <table>
                    <tr>
                        <td>Título:</td>
                        <td><input type="text" name="titulo" autofocus required></td>
                    </tr>
                    <tr>
                        <td>Descrição:</td>
                        <td><textarea name="descricao"></textarea></td>
                    </tr>
                    <tr>
                        <td>Quantidade:</td>
                        <td><input type="number" min="0" value="0" name="quantidade"></td>
                    </tr>
                    <tr>
                        <td>Preço:</td>
                        <td><input type="text" name="preco"></td>
                    </tr>
                    <tr>
                        <td>Categoria:</td>
                        <td><select name='idcategorias'>
                        <option value=''>Selecione uma categoria:</option>

                        <?php
                        include ("../php/conexao.php");
                        $query = "SELECT * FROM categorias";
                        $exec = mysqli_query($host, $query);

                        while ($dados = mysqli_fetch_array($exec)){
                            $id = $dados["idcategorias"];
                            $nome = $dados["nome"];
                            echo "<option value='$id'>$nome</option>";
                        }?>
                        </select></td>
                    </tr>
                </table><br>
                <input type="submit" name="submit" value="Enviar">
                <input type="reset" value="Limpar"><br><br>
                <input type="button" value="Voltar" 
                onclick="location.href='../index_menu.html'">
            </form>   
        </div>
    </body>
</html>