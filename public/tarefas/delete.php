<?php
include "../bd.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID inválido. <a href='read.php'>Voltar</a>";
    exit;
}

$id_tarefa = (int) $_GET['id'];

$sql = "DELETE FROM tarefas WHERE id = $id_tarefa";

if ($conn->query($sql) === true) {
    echo "Tarefa excluída com sucesso.
        <a href='read.php'>Ver tarefas.</a>";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
exit;