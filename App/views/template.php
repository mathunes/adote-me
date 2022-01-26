<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adote-me</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="<?= URL_IMG ?>uff.png" width="40" height="30" alt="logo UFF">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="/Home">Home <span class="sr-only">(current)</span></a>
            <?php
            if (isset($_SESSION['id'])): ?>
                <a class="nav-item nav-link" href="/Dashboard">Dashboard</a>
                <a class="nav-item nav-link" href="/AcessoRestrito/logout">Logout</a>
            <?php else: ?>    
                <a class="nav-item nav-link" href="/AcessoRestrito/login">Área Restrita</a>
            <?php endif ?>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-3">
        <?php require_once '../App/views/' . $view . '.php' ?>
    </div>

    <script src="<?= URL_JS ?>jquery-3.4.1.min.js"></script>
    <script src="<?= URL_JS ?>popper.min.js"></script>
    <script src="<?= URL_JS ?>bootstrap.min.js"></script>

</body>

</html>