<?php
session_start();

// Conectar ao banco de dados
$servidor = "localhost";
$user = "root";
$password = "";
$bd = "cwcbank";

$conn = new mysqli($servidor, $user, $password, $bd);
if ($conn->connect_error) {
    die("<p style='color:red; text-align:center; font-size:25px;'>Erro de conexão: " . $conn->connect_error . "</p>");
}

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Verificar se o email existe no banco de dados
    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        // Verificar se a senha está correta
        if (password_verify($senha, $user['senha'])) {
            // Login bem-sucedido, redirecionar para a página inicial
            $_SESSION['user_id'] = $user['id'];
            header("Location: PaginaInicial.html");
            exit();
        } else {
            // Senha incorreta
            echo "<p style='color:red; text-align:center; font-size:25px;'>Senha incorreta!</p>";
        }
    } else {
        // Usuário não encontrado
        echo "<p style='color:red; text-align:center; font-size:25px;'>Usuário não encontrado!</p>";
    }
}

// Fechar conexão
$conn->close();
?>
