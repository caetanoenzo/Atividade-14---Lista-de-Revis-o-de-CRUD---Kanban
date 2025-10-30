<?php

include '../bd.php';

$sql = "SELECT * FROM tarefas";

$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = $_POST['descricao'];
    $responsavel = $_POST['responsavel'];
    $nome_setor = $_POST['nome_setor'];
    $prioridade = $_POST['prioridade'];
    $data_cadastro = $_POST['data_cadastro'];
    $status_tarefa = $_POST['status_tarefa'];

    $sql = "INSERT INTO tarefas (descricao, nome_setor, prioridade, data_cadastro, status_tarefa) VALUES ('$descricao', '$nome_setor', '$prioridade', '$data_cadastro', 'status_tarefa)";

    if($conn ->query($sql) === true)
        {echo"Tarefa criada com sucesso!<a href='read.php'>Ver jogadores</a>";}
    else{echo "Erro: " . $conn->error;}
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../styles/style.css">
    <title>Cadastrar Tarefa</title>
</head>
<body>
    
    <form action="" method="POST">
        <label>Descrição: </label>
        <input type="text" name="descricao">
        <br>
        <label>Setor: </label>
        <input type="text" name="nome_setor">
        <br>
        <label>Prioridade: </label>
        <select name="prioridade" id="prior-select">
            <option value="" selected disabled>Selecione...</option>
            <option value="Baixa">Baixa</option>
            <option value="Média">Média</option>
            <option value="Alta">Alta</option>
        </select>
        <br>
        <label>Data de Cadastro: </label>
        <input type="date" name="data_cadastro">
        <br>
        <label>Status: </label>
        <select name="status" id="status-select">
            <option value="" selected disabled>Selecione...</option>
            <option value="A Fazer">A Fazer</option>
            <option value="Fazendo">Fazendo</option>
            <option value="Pronto">Pronto</option>
        </select>
        <br>
        <label>Responsável: </label>
        <select name="responsavel" id="responsavel-select">
            <option value="" selected disabled>Selecione...</option>
            <?php
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<option value='" . $row['id'] . "'>" . $row['responsavel'] . "</option>";
                }
            }
            ?>
        </select>
        <br>
        <input type="submit" value="Cadastrar">
        <input type="button" value="Cancelar" onclick="window.location.href='read.php'">
    </form>

</body>
</html>