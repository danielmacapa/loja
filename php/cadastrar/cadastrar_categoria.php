<?php
// inicia a sessão
//session_start();
$host = mysqli_connect("localhost", "root", "", "loja");

// recupera os dados enviados pelo formulário (form_categoria)
$descricao = $_POST["descricao"];
$data = $_POST["data"];
$codbar = $_POST["codigo"];

// gatilho para conexão com o banco 
if (isset($_POST["submit"])){
    
    // conexão com banco     
    if ($host){
        echo "Conexão OK"; 
        echo "<script> alert('$descricao')</script>";
    }

    // query de inserção
    $query = "INSERT INTO categorias 
    VALUES ('4', '$descricao', '$data', '$codbar');";

    // execução da query
    mysqli_query($host, $query);

   /* // verifica se houve inserção e direciona conforme o resultado
        if(mysqli_affected_rows($host)){
            echo "<script> alert('Cadastro realizado');
            location.href='/loja/index_menu.html'</script>";
        }else{
            echo "<script>alert('Erro no cadastro');
            location.href='/loja/index_menu.html'</script>";
        }
        */

}
?>