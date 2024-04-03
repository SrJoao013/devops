<?php
// Configurações do banco de dados
$servername = "localhost"; //
$username = "devops";
$password = "devops";
$dbname = "dados";
try {
    // Conexão com o banco de dados usando PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Definir o modo de erro do PDO como exceção
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Verificar se os dados do formulário foram enviados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];

        // Preparar a consulta SQL para inserir os dados
        $sql = "INSERT INTO dados_usuario (nome, email, mensagem) VALUES (:nome, :email, :mensagem)";
        $stmt = $conn->prepare($sql);
        
        // Bind dos parâmetros
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mensagem', $mensagem);

        // Executar a consulta preparada
        $stmt->execute();

        echo "Dados inseridos com sucesso!";
    }
} catch(PDOException $e) {
    // Em caso de erro, exibir mensagem de erro
    echo "Erro ao inserir dados: " . $e->getMessage();
}

// Fechar a conexão com o banco de dados (não necessário com PDO)
$conn = null;
?>
