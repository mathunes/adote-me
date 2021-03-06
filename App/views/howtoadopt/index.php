<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/howtoadopt.css" rel="stylesheet" />
    <title>Adote-me</title>
</head>
<body>

<nav class="navbar navbar-expand-lg mb-4 navbar-light">
    <div class="container">
        <a class="navbar-brand">
            <img src="images/logo.png" alt="logo" class="d-inline-block align-top">
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
                        <a class="nav-link active" href="/HowToAdopt">Como adotar</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/SuccessCases">Casos de sucesso</a>
                    </li>
                <li class="nav-item dropdown mx-2">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Processo de adoção
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Adote uma criança</a></li>
                        <li><a class="dropdown-item" href="<?= URL_BASE . '/Kid/myAdoptions' ?>">Minhas adoções</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown mx-2 li-profile">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img id="btn-profile" src="images/profile.png" alt="Perfil">
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

<div class="container">

    <!-- steps -->

    <section>

        <h4>Etapas</h4>

        <div class="cards">

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <img src="images/step-1.png" class="card-img-top" alt="Crianças">
                    <h5 class="card-title">1 - Selecionar a criança</h5>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <img src="images/step-2.png" class="card-img-top" alt="Documentação">
                    <h5 class="card-title">2 - Candidatar-se</h5>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <img src="images/step-3.png" class="card-img-top" alt="Martelo de juiz">
                    <h5 class="card-title">3 - Aguardar resultado</h5>
                </div>
            </div>

        </div>

    </section>

    <!-- deadline -->

    <section>

        <h4>Prazo</h4>

        <div class="cards">

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <img src="images/deadline.png" class="card-img-top" alt="Calendário">
                    <h5 class="card-title">10 dias para divulgação do resultado</h5>
                </div>
            </div>

        </div>

    </section>

    <!-- documentation -->

    <section>

        <h4>Documentação</h4>

        <div class="cards">

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <img src="images/docs.png" class="card-img-top" alt="Documentos">
                    <h5 class="card-title d-inline-block" id="docs" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-html="true" data-bs-content="RG - CPF">Documentos pessoais</h5>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <img src="images/income.png" class="card-img-top" alt="Dinheiro">
                    <h5 class="card-title">Renda mensal</h5>
                </div>
            </div>

        </div>

    </section>

    <!-- doubt -->

    <section>

        <h4>Dúvidas</h4>

        <form id="form-contact" action="<?= URL_BASE . '/Doubt/register' ?>" method="post">
            <input type="hidden" name="userId" value="<?=$_SESSION['userId']?>">

            <div class="mb-3">
                <label for="form-message" class="form-label">Dúvida</label>
                <textarea class="form-control" name="message" id="form-message" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="whatsapp" class="form-label">WhatsApp para resposta</label>
                <input type="text" class="form-control" name="whatsapp" id="whatsapp" placeholder="(21) 98765-4321">
            </div>

            <button type="submit" class="btn">Enviar</button>

        </form>

    </section>

</div>

<footer>

    <img src="images/logo.png" alt="logo">

</footer>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="<?= URL_JS . 'jquery-3.4.1.min.js' ?>"></script>
<script src="<?= URL_JS . 'jquery.mask.min.js' ?>"></script>

<script>
        $('#whatsapp').mask('(00) 00000-0000');

        var myCarousel = document.querySelector('#carousel-home')
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 2000,
            wrap: true
        })

        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        });

    </script>

</body>
</html>
