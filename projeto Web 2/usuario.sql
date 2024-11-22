CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    telefone VARCHAR(15) NOT NULL,          
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(200) NOT NULL,      
    renda_mensal DECIMAL(10, 2) NOT NULL,    
    endereco VARCHAR(255) NOT NULL,          
    nome VARCHAR(100) NOT NULL,              
    cpf CHAR(14) UNIQUE NOT NULL,            
    data_nascimento DATE NOT NULL,           
    nome_mae VARCHAR(100) NOT NULL,          
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
