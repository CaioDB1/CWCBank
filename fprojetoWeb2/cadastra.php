<?php

// Criar conexão
$servidor = "localhost";
$user = "root";
$password = "";
$bd = "cwcbank";

$conn = new mysqli($servidor, $user, $password, $bd);
if ($conn->connect_error) {
    die("<p style='color:red; text-align:center; font-size:25px;'>Erro de conexão: " . $conn->connect_error . "</p>");
    //O die nterrompe a execução do script e exibe a mensagem de erro.
}

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $renda_mensal = $_POST["renda_mensal"];
    $endereco = $_POST["endereco"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $data_nascimento = $_POST["data_nascimento"];
    $nome_mae = $_POST["nome_mae"];

    // Verificar se o email já existe no banco de dados
    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    // Executa a consulta SQL
    $retorno = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($retorno);

    // Verifica se o array $row contém dados, para evitar e-mails repetidos
    if ($row) {
        echo "<p style='color:red; text-align:center; font-size:25px;'>Usuário com este e-mail ou CPF já existe!</p>";
    } else {
        // Hash da senha usando o algoritmo Blowfish
        $hashsenha = password_hash($senha, PASSWORD_BCRYPT);

        // Comando para nserir novo usuário no banco de dados
        $sql = "INSERT INTO usuario (telefone, email, senha, renda_mensal, endereco, nome, cpf, data_nascimento, nome_mae) 
                VALUES ('$telefone', '$email', '$hashsenha', '$renda_mensal', '$endereco', '$nome', '$cpf', '$data_nascimento', '$nome_mae')";
        // Execução do comando
        $retorno = mysqli_query($conn, $sql);
        if ($retorno === true) {
                    echo "<p style='color:green; text-align:center; font-size:25px;'>Usuário cadastrado com sucesso!</p>";
        } else {
            echo "<p style='color:red; text-align:center; font-size:25px;'>Erro ao cadastrar usuário: " . mysqli_error($conn) . "</p>";
        }
    }
}

// Fechar conexão
$conn->close();
?>
