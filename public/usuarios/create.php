<?php

include '../bd.php';

$sql = "SELECT * FROM usuarios";

$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";

    if($conn ->query($sql) === true)
        {echo"Responsável criado com sucesso!<a href='read.php'>Ver Responsáveis</a>";}
    else{echo "Erro: " . $conn->error;}
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../styles/style.css">
    <title>Cadastrar Responsável</title>
</head>
<body>
    
    <form action="" method="POST">
        <label>Nome: </label>
        <input type="text" name="nome">
        <br>
        <label>Posição: </label>
        <select name="positions" id="posi-select">
            <option value="" selected disabled>Selecione...</option>
            <option value="GOL">GOL</option>
            <option value="ZAG">ZAG</option>
            <option value="MEI">MEI</option>
            <option value="ATA">ATA</option>
        </select>
        <br>
        <label>Número da Camisa: </label>
        <input type="text" name="num_cami">
        <br>
        <label>Time: </label>
        <select name="times" id="time-select">
            <option value="" selected disabled>Selecione...</option>
            <?php
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                }
            }
            ?>
        </select>
        <br>
        <input type="submit" value="Criar">
        <input type="button" value="Cancelar" onclick="window.location.href='read.php'">
    </form>

</body>
</html>