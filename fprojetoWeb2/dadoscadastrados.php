<?php
// Inicia uma nova sessão ou retoma uma sessão existente para armazenar dados que podem ser acessados em várias páginas 
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION["user_id"])) {
    header("Location: TelaLogin.html"); // Redireciona para a tela de login se não estiver logado
    exit();
}

// Recupera os dados do usuário da sessão
$telefone = $_SESSION["telefone"];
$email = $_SESSION["email"];
$renda_mensal = $_SESSION["renda_mensal"];
$endereco = $_SESSION["endereco"];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Conta | CWC Bank</title>
    <link rel="icon" type="text/css" href="Imagens/login/logo2.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Styles/inicio.css">
</head>
<body>
    <header><!-- inicio Cabecalho -->
        <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #DD245B;">
            <div class="container">
            
                <a href="PaginaInicial.html" class="navbar-brand">
                    <img src="Imagens/login/logo.png" alt="Logo" height="40">
                </a>
        
                <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="nav-principal">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="PaginaInicial.html" class="nav-link">Início |</a>
                        </li>
                        <li class="nav-item">
                            <a href="emprestimo.html" class="nav-link">Empréstimo |</a>
                        </li>
                        <li class="nav-item">
                            <a href="investimento.html" class="nav-link">Investimentos |</a>
                        </li>
                        <li class="nav-item">
                            <a href="transferencias.html" class="nav-link">Transferências |</a>
                        </li>
                        <li class="nav-item">
                            <a href="noticias.html" class="nav-link">Notícias</a>
                        </li>
                    </ul>
                </div>
        
                <!-- Usuário -->
                <div class="user-menu dropdown">
                    <button class="btn btn-light dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="Imagens/usuario.png" alt="User Logo" height="30" class="rounded-circle">
                    </button>
                    <div class="dropdown-menu dropdown-menu-end p-3 shadow-lg" id="userMenuDropdown">
                        <div class="user-info mb-3">
                            <img src="Imagens/usuario.png" alt="User Logo" height="40" class="rounded-circle">
                            <span class="ms-2 fw-bold">Nome Completo</span>
                        </div>
                        
                        <div class="account-info p-2 mb-3 border rounded bg-light">
                            <p class="mb-1"><strong>Agência:</strong> XXXX</p>
                            <p class="mb-1"><strong>Conta:</strong> XXXXX-X</p>
                            <p class="mb-1"><strong>Código do Banco:</strong> XXX</p>
                        </div>
                        
                        <!-- Submenu expansível -->
                        <div class="accordion" id="userMenuAccordion">
    
                            <!-- Minha Conta -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Minha Conta
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#userMenuAccordion">
                                    <div class="accordion-body">
                                        <a class="dropdown-item" href="dadoscadastrados.php">Dados Cadastrais</a>
                                        <a class="dropdown-item" href="dadospessoais.html">Dados Pessoais</a>
                                    </div>
                                </div>
                            </div>
    
                            <!-- Privacidade -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Privacidade
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#userMenuAccordion">
                                    <div class="accordion-body">
                                        <a class="dropdown-item" href="preferenciacomunicacao.html">Preferências de Comunicação</a>
                                        <a class="dropdown-item" href="politicaprivacidade.html">Política de Privacidade</a>
                                    </div>
                                </div>
                            </div>
    
                            <!-- Ajuda -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Ajuda
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#userMenuAccordion">
                                    <div class="accordion-body">
                                        <a class="dropdown-item" href="ajuda.html">Dúvidas Frequentes</a>
                                    </div>
                                </div>
                            </div>
    
                        </div>
    
                    </div>
                </div>
            </div>
        </nav>
    </header>
</body>
    

<!--guia -->
<div class="guia">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
        
        <span style=" font-size: 20px;"><b>Dados Cadastrais</b></span><br>
        <span><a href="minhaconta.html"><b> &larr;</b> Voltar</a></span>
        </div>
    </div>
    </div>
</div>
<br>

<!--dados-->
<div id="dados" class="container">
    <div class="card mb-4">
        <div class="row g-0">
        <div class="col-md-12">
            <h5>Atualize seu cadastro</h5>
            <p>Confirme se as informações sobre você estão atualizadas. Caso algo tenha mudado, faça as alterações necessárias.</p>
            <p>
                <b>Telefone</b><br>
                <?php echo htmlspecialchars($telefone); ?><br>
                <hr>
                <b>E-mail</b><br>
                <?php echo htmlspecialchars($email); ?><br>
                <hr>
                <b>Renda Mensal</b><br>
                <?php echo htmlspecialchars($renda_mensal); ?><br>
                <hr>
                <b>Endereço</b><br>
                <?php echo htmlspecialchars($endereco); ?><br>
            </p>
        </div>
            
        </div>
        </div>
</div>

    
    
    <footer class="footer text-justify text-white py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <img src="Imagens/login/logo2.png">
                </div>
                <div class="col-md-2">
                    <h5>Sobre Nós</h5>
                    <p>Quem somos?</p>
                </div>
                <div class="col-md-3">
                    <h5>Precisa de ajuda?</h5>
                    <p>Dúvidas frequentes</p>
                </div>
                <div class="col-md-5">
                    <h5>Nossos números</h5>
                    <p>
                        <b>Capitais e regiões metropolitanas</b><br>
                        3003 2001<br>
                        <b>Demais localidades</b><br>
                        0800 210 08963<br>
                        <b>SAC</b><br>
                        0800 210 1912<br>
                        <b>Ouvidoria</b><br>
                        0800 210 7279<br>
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
           <!--Redes sociais-->
            <div class="col-md-12">
                <h5>Redes sociais</h5>
                    <ul class="navbar-nav">
                    <li><a href="" class="btn btn-outline-secondary" target="_blank">
                        <i class="bi bi-instagram"></i>
                    </a> Instagram</li>
                    <li><a href="" class="btn btn-outline-secondary" target="_blank">
                        <i class="bi bi-youtube"></i>
                    </a> Canal no Youtube</li>
                    <li><a href="" class="btn btn-outline-secondary" target="_blank">
                        <i class="bi bi-facebook"></i>
                    </a> Facebook</li>
                    <li><a href="" class="btn btn-outline-secondary" target="_blank">
                        <i class="bi bi-linkedin"></i>
                    </a> Linkedin</li>
                    
                    </ul>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
