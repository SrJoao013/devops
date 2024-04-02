<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "user";
$password = "senha";
$dbname = "dados";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Preparar e executar a consulta SQL para inserir os dados
    $sql = "INSERT INTO dados_usuario (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";
    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
