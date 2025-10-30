<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KanBan</title>

    <link rel="stylesheet" href="/styles/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>

    <div class="container-fluid dashboard">
        <div class="row">
            <?php include __DIR__ . '/public/partials/header.php'; ?>
        </div>



        <div class="container">
        <div class="row">
            <div class="col-sm">
            Uma de três colunas
            </div>
            <div class="col-sm">
            Uma de três colunas
            </div>
            <div class="col-sm">
            Uma de três colunas
            </div>
        </div>
        </div>


        <div class="row fixed-bottom">
            <?php include __DIR__ . '/public/partials/footer.php'; ?>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>