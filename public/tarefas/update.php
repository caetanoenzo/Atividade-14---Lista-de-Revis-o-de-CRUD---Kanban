<?php

include '../bd.php';

$id_tarefa = $_GET['id'];

$sql = "SELECT * FROM tarefas WHERE id='$id_tarefa'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $prioridade = $_POST['prioridade'];
    $status_tarefa = $_POST['status_tarefa'];

    $sql = "UPDATE tarefas SET prioridade='$prioridade', status_tarefa='$status_tarefa' WHERE id='$id_tarefa'";

    if ($conn->query($sql) === true) {
        echo "Tarefa atualizada com sucesso!
                <a href='read.php'>Ver tarefas.</a>
";
    } else {
        echo "Erro " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atualizar Tarefa</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <div class="container">
        <h1>Atualizar Tarefa</h1>
        <form action="" method="POST">
            <label for="nome">Nome:</label>

            <label for="posicao">Prioridade:</label>
            <select name="posicao" class="form-control" required>
                <option value="Baixa" <?php if ($row['prioridade'] == 'Baixa') echo 'selected'; ?>>Baixa</option>
                <option value="Média" <?php if ($row['prioridade'] == 'Média') echo 'selected'; ?>>Média</option>
                <option value="Alta" <?php if ($row['prioridade'] == 'Alta') echo 'selected'; ?>>Alta</option>
            </select>

            <label for="numero_camisa">Status:</label>
            <select name="posicao" class="form-control" required>
                <option value="A Fazer" <?php if ($row['status_tarefa'] == 'A Fazer') echo 'selected'; ?>>A Fazer</option>
                <option value="Fazendo" <?php if ($row['status_tarefa'] == 'Fazendo') echo 'selected'; ?>>Fazendo</option>
                <option value="Pronto" <?php if ($row['status_tarefa'] == 'Pronto') echo 'selected'; ?>>Pronto</option>
            </select>

            <input type="submit" value="Atualizar">
        </form>
    </div>