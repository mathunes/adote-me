<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/home.css" rel="stylesheet" />
    <script src="https://unpkg.com/axios@0.21.4/dist/axios.min.js"></script>
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
                        <a class="nav-link active" href="/Home">Início</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/HowToAdopt">Como adotar</a>
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

        <!-- carrousel -->

        <div id="carousel-home" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel-home" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel-home" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel-home" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="images/carousel-img-1.png" class="d-block w-100" alt="Família">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Conheça as crianças adotadas</h5>
                        <a href="/SuccessCases" class="link-carousel">
                            <p>Casos de sucesso</p>
                        </a>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="images/carousel-img-2.png" class="d-block w-100" alt="Criança com brinquedo">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Conheça os passos para adoção</h5>
                        <a href="HowToAdopt" class="link-carousel">
                            <p>Como adotar</p>
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/carousel-img-3.png" class="d-block w-100" alt="Pés de crianças">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Mude a história de uma criança</h5>
                        <!-- <a href="#" class="link-carousel">
                            <p>Adote</p>
                        </a> -->
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-home" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carousel-home" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>

        <!-- professionals -->

        <section>

            <h4>Profissionais</h4>

            <div class="cards">

                <div class="card" style="width: 18rem;">
                    <img src="images/prof-jussara.png" class="card-img-top" alt="Foto de Jussara">
                    <div class="card-body">
                        <h5 class="card-title">Jussara Marins Freitas</h5>
                        <p class="card-text">Assistente Social</p>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img src="images/prof-samara.png" class="card-img-top" alt="Foto de Samara">
                    <div class="card-body">
                        <h5 class="card-title">Samara Dias Pires</h5>
                        <p class="card-text">Assistente Social</p>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img src="images/prof-romeu.png" class="card-img-top" alt="Foto de Romeu">
                    <div class="card-body">
                        <h5 class="card-title">Romeu Alves Rossi</h5>
                        <p class="card-text">Assistente Social</p>
                    </div>
                </div>

            </div>

        </section>

        <!-- testimonials -->

        <section>

            <h4>Depoimentos</h4>

            <div class="cards">

                <div class="card" style="width: 18rem;">
                    <img src="images/test-1.png" class="card-img-top" alt="Foto de Família Castro">
                    <div class="card-body">
                        <p class="card-text">“A pequena Juh preencheu um grande vazio que tínhamos em nosso lar.”</p>
                    </div>
                    <div class="card-footer">
                        <span>Família Castro</span>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img src="images/test-2.png" class="card-img-top" alt="Foto de Jamille Sol">
                    <div class="card-body">
                        <p class="card-text">“Mabel é a prova de que sonhos podem se tornar realidade.”</p>
                    </div>
                    <div class="card-footer">
                        <span>Jamille Sol</span>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img src="images/test-3.png" class="card-img-top" alt="Foto de Martins López">
                    <div class="card-body">
                        <p class="card-text">“Depois de tanto tempo de espera, tenho meu companheiro para assistir futebol comigo.”</p>
                    </div>
                    <div class="card-footer">
                        <span>Martins López</span>
                    </div>
                </div>

            </div>

        </section>

        <!-- contact -->

        <section>

            <h4>Contato</h4>

            <form id="form-contact" action="<?= URL_BASE . '/Contact/register' ?>" method="post">
                <input type="hidden" name="userId" value="<?=$_SESSION['userId']?>">

                <div class="mb-3">
                    <label for="form-message" class="form-label">Mensagem</label>
                    <textarea class="form-control" name="message" id="form-message" rows="3"></textarea>
                </div>

                <button type="submit" class="btn">Enviar</button>
            </form>

        </section>

    </div>

    <footer>

        <img src="images/logo.png" alt="logo">

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
