<?php

include '../bd.php';
$id_tarefa = $_GET['id_tarefa'];

$sql = " DELETE FROM tarefas WHERE id_tarefa=$id_tarefa";

if ($conn->query($sql) === true) {
    header('Location: ../../index.php');
    exit();
} else {
    echo "Erro " . $sql . '<br>' . $conn->error;
}
$conn->close();
exit();
?>