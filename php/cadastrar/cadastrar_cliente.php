<?php
// inicia a sessão
$host = mysqli_connect("localhost", "root", "", "mydb");

// recupera os dados enviados pelo formulário (form_cliente)
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$data = $_POST["data"];
$email = $_POST["email"];
$endereco = $_POST["endereco"];

// gatilho para conexão com o banco 
if (isset($_POST["submit"])){
    
    // query de inserção
    $query = "INSERT INTO clientes 
    VALUES (default, '$nome', '$cpf', '$data', '$email', '$endereco');";

    // execução da query
    mysqli_query($host, $query);

// verifica se houve inserção e direciona conforme o resultado
        if(mysqli_affected_rows($host) <> 0){
            echo "<script> alert('Cadastro realizado com sucesso');
            location.href='/loja/index_menu.html'</script>";
        }
        else{
            echo "<script>alert('Erro no cadastro');
            location.href='/loja/index_menu.html'</script>";
        }
        

}
?>