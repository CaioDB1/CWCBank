<?php

// Inicia uma nova sessão ou retoma uma sessão existente para armazenar dados que podem ser acessados em várias páginas 
session_start();

// Conexão com o banco de dados
$servidor = "localhost";
$user = "root";
$password = "";
$bd = "cwcbank";

$conn = new mysqli($servidor, $user, $password, $bd);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
    //O die nterrompe a execução do script e exibe a mensagem de erro.

}

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

// Verificar se o e-mail existe
    $sql = "SELECT * FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);
// s indica que é string
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

// Verifica se a senha fornecida ($senha) corresponde ao hash armazenado
    if ($user && password_verify($senha, $user["senha"])) {
        // Definir variáveis de sessão
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["nome"] = $user["nome"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["telefone"] = $user["telefone"];
        $_SESSION["renda_mensal"] = $user["renda_mensal"];
        $_SESSION["endereco"] = $user["endereco"];

        // Redirecionar para a página de dados cadastrados
        header("Location: PaginaInicial.html");
        exit();
    } else {
        echo "<p style='color:red;'>Usuário ou senha inválidos!</p>";
    }
}

$conn->close();
?>
