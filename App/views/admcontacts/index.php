<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/admcontacts.css" rel="stylesheet" />
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
                                <a class="dropdown-item" href="<?= URL_BASE . '/Home' ?>">Início</a>
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

    <div class="container container-page">

        <h4>Mensagens de contato</h4>

        <table>

            <thead>
                <tr>
                    <th>Mensagem</th>
                    <th>Usuário</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>

            <?php
            
            $contactMessages = $data['contactMessages'];

            if (!empty($contactMessages)) {

                foreach ($contactMessages as $contactMessage) { ?>
                 
                <tr>
                    <td><?=$contactMessage['message']?></td>
                    <td><?=$contactMessage['name']?></td>
                    <td><?=$contactMessage['email']?></td>
                </tr>

            <?php
                }
            }
            ?>

            </tbody>

        </table>

    </div>

    <footer>

        <img src="images/logo.png" alt="logo">

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
