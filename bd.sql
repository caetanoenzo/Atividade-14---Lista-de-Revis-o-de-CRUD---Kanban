CREATE DATABASE kanban_bd;

USE kanban_bd;

CREATE TABLE
    usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
        nome VARCHAR(100),
        email VARCHAR(100)
    );

CREATE TABLE
    tarefas (
        id INT AUTO_INCREMENT PRIMARY KEY,
        descricao VARCHAR(200) NOT NULL,
        nome_setor VARCHAR(100) NOT NULL,
        prioridade ENUM ('Baixa', 'Média', 'Alta') NOT NULL,
        data_cadastro DATE NOT NULL,
        status_tarefa ENUM ('A Fazer', 'Fazendo', 'Pronto') DEFAULT 'A Fazer' NOT NULL,
        responsavel INT,
        FOREIGN KEY (responsavel) REFERENCES usuarios (id)
    );