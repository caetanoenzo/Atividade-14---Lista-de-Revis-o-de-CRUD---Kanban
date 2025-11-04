<?php

include '../bd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_tarefa = $_POST['id_tarefa'];
    $status_tarefa = $_POST['status_tarefa'];

    $sql = "UPDATE tarefas SET status_tarefa = ? WHERE id_tarefa = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status_tarefa, $id_tarefa);

    if ($stmt->execute()) {
        header("Location: ../../index.php");
        exit();
    } else {
        echo "Erro ao atualizar status: " . $stmt->error;
    }
}

?>