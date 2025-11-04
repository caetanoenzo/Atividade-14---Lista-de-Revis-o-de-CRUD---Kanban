<?php

include '../db_connect.php';
include '../partials/header.php';

if (isset($_GET['id'])) {
    $id_tarefa = $_GET['id_tarefa'];

    $sql2 = "SELECT * FROM tarefas INNER JOIN usuarios ON tarefas.responsavel = usuarios.id WHERE id_tarefa='$id_tarefa'";
    $result = $conn->query($sql2);
    $tarefa_row = $result->fetch_assoc();

    $responsavel_fk = $tarefa_row['responsavel'];
    $descricao = $tarefa_row['descricao'];
    $nome_setor = $tarefa_row['nome_setor'];
    $prioridade = $tarefa_row['prioridade'];
    $status = $tarefa_row['status'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $responsavel_fk = $_POST['responsavel'];
        $descricao = $_POST['descricao'];
        $nome_setor = $_POST['nome_setor'];
        $prioridade = $_POST['prioridade'];
        $status = $_POST['status_tarefa'];

        $sql = "UPDATE tarefas SET responsavel='$responsavel_fk', descricao='$descricao', nome_setor='$nome_setor', prioridade='$prioridade', status_tarefa='$status' WHERE id_tarefa='$id_tarefa'";

        if ($conn->query($sql) === true) {
            echo "<script>alert('Tarefa Atualizada com sucesso.');</script>";
            header('Location: ../index.php');
            exit();
        } else {
            echo "Erro " . $sql . '<br>' . $conn->error;
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
    <title>Atualizar Tarefa</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row ms-5 mt-5 me-5">

            <form action="create.php?id=<?php echo $id_tarefa; ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label" for="usuario">Usuário: </label>
                    <select name="responsavel" class="form-select" required>
                        <?php
                        $sql = "SELECT reponsavel, nome FROM usuarios";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($usuario_row = $result->fetch_assoc()) {
                                $selected = ($usuario_row['responsavel'] == $responsavel_fk) ? 'selected' : '';
                                echo "<option value='" . $usuario_row['id'] . "' $selected>" . $usuario_row['nome'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="descricao">Descrição da Tarefa: </label>
                    <input type="text" name="descricao" class="form-control" required value="<?php echo htmlspecialchars($descricao) ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="nome_setor">Nome do Setor: </label>
                    <input type="text" name="nome_setor" class="form-control" required value="<?php echo htmlspecialchars($nome_setor) ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="prioridade">Prioridade: </label>
                    <select name="prioridade" class="form-select" required>
                        <option value="Baixa" <?php if ($prioridade == "Baixa") echo "selected"; ?>>Baixa</option>
                        <option value="Média" <?php if ($prioridade == "Média") echo "selected"; ?>>Média</option>
                        <option value="Alta" <?php if ($prioridade == "Alta") echo "selected"; ?>>Alta</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="status_tarefa">Status: </label>
                    <select name="status" class="form-select" required>
                        <option value="A Fazer" <?php if ($status == "A Fazer") echo "selected"; ?>>A Fazer</option>
                        <option value="Fazendo" <?php if ($status == "Fazendo") echo "selected"; ?>>Fazendo</option>
                        <option value="Pronto" <?php if ($status == "Pronto") echo "selected"; ?>>Pronto</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>
                <button type="button" class="btn btn-primary" onclick="window.location.href='read.php'">Cancelar</button>
            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>

</html>

<?php
} else {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $responsavel_fk = $_POST['responsavel'];
        $descricao = $_POST['descricao'];
        $nome_setor = $_POST['nome_setor'];
        $prioridade = $_POST['prioridade'];
        $data_cadastro = $_POST['data_cadastro'];
        $status = $_POST['status_tarefa'];

        $sql = "INSERT INTO tarefas (responsavel, descricao, nome_setor, prioridade, status_tarefa, data_cadastro) VALUES ('$responsavel_fk', '$descricao', '$nome_setor', '$prioridade', '$status')";

        if($conn->query($sql) === true) {
            echo "<script>alert('Tarefa cadastrada com sucesso.');</script>";
            header('Location: ../../index.php');
            exit();
        } else {
            echo "Erro " . $sql . '<br>' . $conn->error;
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

            <form action="create.php?id=<?php echo $id_tarefa; ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label" for="usuario">Usuário: </label>
                    <select name="responsavel" class="form-select" required>
                        <?php
                        $sql = "SELECT reponsavel, nome FROM usuarios";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($usuario_row = $result->fetch_assoc()) {
                                echo "<option value='" . $usuario_row['id'] . "' $selected>" . $usuario_row['nome'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="descricao">Descrição da Tarefa: </label>
                    <input type="text" name="descricao" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="nome_setor">Nome do Setor: </label>
                    <input type="text" name="nome_setor" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Data de Cadastro: </label>
                    <input type="date" name="data_cadastro">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="prioridade">Prioridade: </label>
                    <select name="prioridade" class="form-select" required>
                        <option value="Baixa" <?php if ($prioridade == "Baixa") echo "selected"; ?>>Baixa</option>
                        <option value="Média" <?php if ($prioridade == "Média") echo "selected"; ?>>Média</option>
                        <option value="Alta" <?php if ($prioridade == "Alta") echo "selected"; ?>>Alta</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="status">Status: </label>
                    <select name="status" class="form-select" required>
                        <option value="A Fazer" <?php if ($status == "A Fazer") echo "selected"; ?>>A Fazer</option>
                        <option value="Fazendo" <?php if ($status == "Fazendo") echo "selected"; ?>>Fazendo</option>
                        <option value="Pronto" <?php if ($status == "Pronto") echo "selected"; ?>>Pronto</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>
                <button type="button" class="btn btn-primary" onclick="window.location.href='read.php'">Cancelar</button>
            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>

</html>
<?php
}
?>