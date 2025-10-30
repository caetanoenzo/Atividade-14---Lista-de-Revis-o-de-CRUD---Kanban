<?php

include '../bd.php';

$sql = "SELECT * FROM tarefas";

$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visualizar Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles/style.css">
  </head>

<body>
        <h1> Lista de Tarefas
        <a href="create.php" class="btn btn-outline-dark">Adicionar Tarefa</a>
        </h1>    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Setor</th>
                <th>Prioridade</th>
                <th>Data de Cadastro</th>
                <th>Status</th>
                <th>Responsável</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['descricao']; ?></td>
                        <td><?php echo $row['nome_setor']; ?></td>
                        <td><?php echo $row['prioridade']; ?></td>
                        <td><?php echo $row['data_cadastro']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo $row['responsavel']; ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $row['id']; ?>">Editar</a> |

                            <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="4">Nenhuma tarefa encontrada.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php $conn->close(); ?>
</body>
</html>