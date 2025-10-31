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

    if ($conn->query($sql) === true) {
        echo "Tarefa criada com sucesso!<a href='read.php'>Ver jogadores</a>";
    } else {
        echo "Erro: " . $conn->error;
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../../styles/style.css">
    <title>Cadastrar Tarefa</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row ms-5 mt-5 me-5">

            <form action="" method="POST">
                <div class="mb-3">
                    <label>Descrição: </label>
                    <input type="text" name="descricao">
                </div>

                <div class="mb-3">
                    <label>Setor: </label>
                    <input type="text" name="nome_setor">
                </div>

                <div class="mb-3">
                    <label>Prioridade: </label>
                    <select name="prioridade" id="prior-select">
                        <option value="" selected disabled>Selecione...</option>
                        <option value="Baixa">Baixa</option>
                        <option value="Média">Média</option>
                        <option value="Alta">Alta</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Data de Cadastro: </label>
                    <input type="date" name="data_cadastro">
                </div>

                <div class="mb-3">
                    <label>Status: </label>
                    <select name="status" id="status-select">
                        <option value="" selected disabled>Selecione...</option>
                        <option value="A Fazer">A Fazer</option>
                        <option value="Fazendo">Fazendo</option>
                        <option value="Pronto">Pronto</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Responsável: </label>
                    <select name="responsavel" id="responsavel-select">
                        <option value="" selected disabled>Selecione...</option>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['id'] . "'>" . $row['responsavel'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <button type="button" class="btn btn-primary" onclick="window.location.href='read.php'">Cancelar</button>
            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>

</html>