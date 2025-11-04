<?php

include '../db.php';

$sql = "SELECT * FROM tarefas INNER JOIN usuario ON tarefas.responsavel usuarios.id WHERE status_tarefa = 'Fazendo'";

$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../../styles/style.css">
</head>

<body>

    <div class="container-fluid">

    </div>

    <?php

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "
            <div class=\"container-fluid\">
                <div class=\"row\">
                    <div class=\"col\">
                        <div class=\"card bg-light p-3 mb-3 mt-3 \">
                            <div class=\"card-header fw-bold\">{$row['descricao']}</div>
                            <div class=\"card-body\">
                                <p class=\"card-text\">Usuário: {$row['nome']}</p>
                                <p class=\"card-text\">Setor: {$row['nome_setor']}</p>
                                <p class=\"card-text\">Prioridade: {$row['prioridade']}</p>
                                <a method='GET' class='btn btn-primary mb-4 mt-2' href='public/tarefas/create.php?id={$row['id_tarefa']}'>Editar</a>
                                <a class='btn btn-danger mb-4 b mt-2' href='public/tarefas/delete.php?id={$row[' id_tarefa']}'>Excluir</a>

                                <form action='public/tarefas/updateStatus.php' method='POST'>
                                    <select name='status_tarefa' class='form-select' required>
                                        <option value='A fazer'>A fazer</option>
                                        <option value='Fazendo' selected>Fazendo</option>
                                        <option value='Pronto'>Pronto</option>
                                    </select>
                                    <input type='hidden' name='id_tarefa' value='{$row[' id_tarefa']}'>
                                    <button type='submit' class='btn btn-primary'>Atualizar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    ";
        }
    }

    ?>

    <?php $conn->close(); ?>
</body>

</html>