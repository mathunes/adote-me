<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="<?= URL_CSS ?>/success.css" rel="stylesheet" />
        <script src="https://unpkg.com/axios@0.21.4/dist/axios.min.js"></script>
        <title>Adote-me</title>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg mb-4 navbar-light">
        <div class="container">
            <a class="navbar-brand" href="./home">
                <img src="<?= URL_IMG ?>/logo.png" alt="logo" class="d-inline-block align-top">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto d-flex mb-2 mb-lg-0">
                   <li class="nav-item mx-2">
                        <a class="nav-link" href="/Home">Início</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/HowToAdopt">Como adotar</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/SuccessCases">Casos de sucesso</a>
                    </li>
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Processo de adoção
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Adote uma criança</a></li>
                            <li><a class="dropdown-item" href="<?= URL_BASE . '/Kid/myAdoptions' ?>">Minhas adoções</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown mx-2 li-profile">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img id="btn-profile" src="<?= URL_IMG ?>/profile.png" alt="Perfil">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <li>
                                <a class="dropdown-item" href="<?= URL_BASE . '/Adm' ?>">Administração</a>
                            </li>
                            <li>
                                <form action="<?= URL_BASE . '/Authentication/logout' ?>" method="post">
                                    <button class="btn" type="submit" id="btn-exit">Sair</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- offcanvas menu -->

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Buscar criança</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

            <form action="<?= URL_BASE . '/Kid/search' ?>" method="post" id="form-search">

                <h6>Sexo</h6>

                <div class="input-container">

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="sexo2" value="FEMININO" checked>
                        <label class="form-check-label" for="sexo2">
                            Feminino
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="sexo3" value="MASCULINO">
                        <label class="form-check-label" for="sexo3">
                            Masculino
                        </label>
                    </div>

                </div>

                <h6>Idade máxima</h6>

                <div class="mb-3">
                    <input type="number" class="form-control" min="0" name="maxAge" value="18" required>
                </div>

                <button type="submit" class="btn">Filtrar</button>

            </form>

        </div>
    </div>

    <div class="container" id="container">

        <section>

            <h4 class="text-center">Minhas adoções</h4>

            <div class="cards" id="cards">

            <?php
            
            $kids = $data['kids'];

            $today = new DateTime(date('Y-m-d'));

            if (!empty($kids)) {

                foreach ($kids as $kid) { ?>
                    
                    <div class="card">

                        <img class="card-img-top" src="<?=$kid['photo_link']?>" />

                        <div class="card-body">

                            <h5 class="card-title"><?=$kid['name']?></h5>

                            <!-- <p class="card-text"><?=$today->diff(new Datetime($kid['birthday']))->y?> anos</p>
                            
                            <p class="card-text"><?=$kid['localization']?></p>

                            <p class="card-text"><?=$kid['health']?></p> -->

                            <p class="card-text" id="adoption-status"><?=$kid['status']?></p>

                            <form action="<?= URL_BASE . '/Kid/cancelAdoption' ?>" method="post">

                                <input type="hidden" name="kidId" value="<?=$kid[0]?>" />

                                <input type="hidden" name="userId" value="<?=$_SESSION["userId"]?>" />

                                <button class="btn">Cancelar adoção</button>

                            </form>

                        </div>

                    </div>
                    
                <?php

                }

            } else {

                echo "Não há adoções";

            }
            ?>

            </div>           

        </section>

    </div>

    <footer class="fixed-bottom">

        <img src="<?= URL_IMG ?>/logo.png" alt="logo">

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
