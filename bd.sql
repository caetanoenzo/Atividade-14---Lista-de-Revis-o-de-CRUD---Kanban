CREATE DATABASE kanban_enzo_bd;

USE kanban_enzo_bd;

CREATE TABLE
    usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
        nome VARCHAR(100),
        email VARCHAR(100),
        senha VARCHAR(100) NOT NULL
    );

CREATE TABLE
    tarefas (
        id_tarefa INT AUTO_INCREMENT PRIMARY KEY,
        descricao VARCHAR(200) NOT NULL,
        nome_setor VARCHAR(100) NOT NULL,
        prioridade ENUM ('Baixa', 'Média', 'Alta') NOT NULL,
        status_tarefa ENUM ('A Fazer', 'Fazendo', 'Pronto') DEFAULT 'A Fazer' NOT NULL,
        responsavel INT,
        FOREIGN KEY (responsavel) REFERENCES usuarios (id)
    );

INSERT INTO usuarios (nome, email, senha) VALUES
('Enzo Rodrigues Caetano', 'enzo_caetano@estudante.sesisenai.org.br', '123'),
('Ana Beatriz Costa', 'ana.costa@sesi.com', '123'),
('João Pedro Almeida', 'joao.almeida@senai.com', '123'),
('Larissa Ferreira', 'larissa.ferreira@sesi.com', '123'),
('Carlos Eduardo Silva', 'carlos.silva@senai.com', '123');

INSERT INTO tarefas (responsavel, descricao, nome_setor, prioridade, status_tarefa) VALUES
(1, 'Implementar sistema de login com autenticação JWT', 'Desenvolvimento', 'Alta', 'Fazendo'),
(1, 'Criar script SQL para popular o banco de dados inicial', 'Desenvolvimento', 'Média', 'Pronto'),
(2, 'Revisar documentação técnica do projeto', 'Documentação', 'Baixa', 'A Fazer'),
(2, 'Atualizar políticas de segurança da informação', 'TI', 'Alta', 'Fazendo'),
(3, 'Montar dashboard de tarefas em React', 'Frontend', 'Alta', 'Fazendo'),
(3, 'Ajustar responsividade da página Kanban', 'Frontend', 'Média', 'A Fazer'),
(4, 'Criar layout de interface no Figma', 'Design', 'Média', 'Pronto'),
(4, 'Padronizar identidade visual das telas', 'Design', 'Baixa', 'A Fazer'),
(5, 'Configurar servidor Apache e banco MySQL', 'Infraestrutura', 'Alta', 'Fazendo'),
(5, 'Gerar backup automático diário', 'Infraestrutura', 'Média', 'A Fazer');