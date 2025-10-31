<?php

include '../db.php';

$sql = "SELECT * FROM tarefas INNER JOIN usuario ON tarefas.responsavel usuarios.id WHERE status_tarefa = 'A Fazer'";

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
        <div class="row ms-5 mt-5 me-5">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Nacionalidade</th>
                        <th>Ano de Nascimento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['nome']; ?></td>
                                <td><?php echo $row['nacionalidade']; ?></td>
                                <td><?php echo $row['ano_nascimento']; ?></td>

                                <td>
                                    <a href="update.php?id=<?php echo $row['id']; ?>" class="nav-item btn btn-outline-dark">Editar Autor</a> |
                                    <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')" class="nav-item btn btn-outline-dark">Excluir Autor</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">Nenhum autor encontrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['descricao']; ?></h5>
                        <p class="card-text"><?php echo $row['responsavel']; ?></p>
                        <p class="card-text"><?php echo $row['prioridade']; ?></p>
                        <p class="card-text"><?php echo $row['nome_setor']; ?></p>
                        <label>Prioridade: </label>

                        <div class="mb-3">
                            <select name="prioridade" id="prior-select">
                                <option value="" selected disabled>Selecione...</option>
                                <option value="Baixa">Baixa</option>
                                <option value="Média">Média</option>
                                <option value="Alta">Alta</option>
                            </select>
                        </div>

                        <a href="#" class="btn btn-primary">Update</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php $conn->close(); ?>
</body>

</html>