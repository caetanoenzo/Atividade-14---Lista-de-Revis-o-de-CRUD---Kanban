<?php

include 'bd.php';

session_start();

$msg = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST["nome"] ?? "";
    $pass = $_POST["senha"] ?? "";

    $stmt = $conn->prepare("SELECT id, nome, senha FROM usuario WHERE nome=? AND senha=?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    $dados = $result->fetch_assoc();
    $stmt->close();

    if ($dados) {
        $_SESSION["id"] = $dados["id"];
        $_SESSION["nome"] = $dados["nome"];
        header("Location: ../index.php?id=" . $dados["id"]);
        exit;
    } else {
        $msg = "Usuário ou senha incorretos!";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
}
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../styles/style.css">
</head>

<body>

    <div class="container-fluid d-flex flex-column justify-content-center align-items-center">

        <div class="row">
            <?php include __DIR__ . '../../partials/header.php'; ?>
        </div>

        <div class="row ms-5 mt-5 me-5">
            <p class="mt-4 fw-bold text-center">Login</p>
            <?php if ($msg): ?><p class=""><?= $msg ?></p><?php endif; ?>

            <form action="create.php" method="POST">
                <div class="mb-3">
                    <label>Nome: </label>
                    <input type="text" name="nome">
                </div>


                <div class="mb-3">
                    <label>Senha: </label>
                    <input type="password" name="senha">
                </div>

                <button type="submit" class="btn btn-primary">Entrar</button>
                <button type="button" class="btn btn-primary" onclick="window.location.href='read.php'">Cancelar</button>
            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>

</html>