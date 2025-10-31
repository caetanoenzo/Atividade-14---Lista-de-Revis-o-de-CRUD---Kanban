<?php require_once __DIR__ . '/../../public/bd.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanban</title>

    <link rel="stylesheet" href="../../styles/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container-fluid p-1 ms-5 me-5">
                    <a class="navbar-brand fs-4" href="#"></a>
                    <a class="navbar-brand" href="#">Kanban</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto p-1">
                            <li class="nav-item ms-5">
                                <a class="nav-link" aria-current="page" href="../../index.php">Dashboard</a>
                            </li>
                            <li class="nav-item ms-5">
                                <a class="nav-link" aria-current="page" href="../../../../2025_atividades_enzo/Atividade-14/public/tarefas/create.php">Cadastrar Tarefas</a>
                            </li>
                            <li class="nav-item ms-5">
                                <a class="nav-link" href="../../../../2025_atividades_enzo/Atividade-14/public/usuarios/create.php">Cadastrar Responsáveis</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>

</html>