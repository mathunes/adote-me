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
            <a class="navbar-brand" href="./home">
                <img src="images/logo.png" alt="logo" class="d-inline-block align-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto d-flex mb-2 mb-lg-0">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/HowToAdopt">Mensagens de contato</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/SuccessCases">Mensagens de dúvidas</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/SuccessCases">Usuários</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/SuccessCases">Crianças</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/SuccessCases">Processos de adoção</a>
                    </li>
                    <li class="nav-item dropdown mx-2 li-profile">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img id="btn-profile" src="images/profile.png" alt="Perfil">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <li>
                                <a class="dropdown-item" href="<?= URL_BASE . '/AdmHome' ?>">Administração</a>
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

    <div class="container">


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
                        <p class="card-text">“Depois de tanto de espera, tenho meu companheiro para assistir futebol comigo.”</p>
                    </div>
                    <div class="card-footer">
                        <span>Martins López</span>
                    </div>
                </div>

            </div>

        </section>

    </div>
    <footer>

        <img src="images/logo.png" alt="logo">

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
