<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="<?= URL_CSS . '/adm.css'?>" rel="stylesheet" />
    <script src="https://unpkg.com/axios@0.21.4/dist/axios.min.js"></script>
    <title>Adote-me</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg mb-4 navbar-light">
        <div class="container">
            <a class="navbar-brand">
                <img src="<?= URL_IMG . '/logo.png' ?>" alt="logo" class="d-inline-block align-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto d-flex mb-2 mb-lg-0">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/Adm">Mensagens de contato</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/Adm/doubt">Mensagens de dúvidas</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/Adm/user">Usuários</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link active" href="/Adm/kid">Crianças</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/Adm/adoptionProcess">Processos de adoção</a>
                    </li>
                    <li class="nav-item dropdown mx-2 li-profile">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img id="btn-profile" src="<?= URL_IMG . '/profile.png' ?>" alt="Perfil">
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

        <h4>Adicionar criança</h4>

        <form action="<?= URL_BASE . '/Adm/registerKid' ?>" method="post">

            <div class="form-label">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" required>
            </div>

            <div class="form-label">
                <input type="date" class="form-control" id="birthday" name="birthday" required>
            </div>

            <select class="form-select" name="gender">
                <option value="FEMININO">Feminino</option>
                <option value="MASCULINO">Masculino</option>
            </select>

            <div class="form-label">
                <input type="text" class="form-control" id="photo_link" name="photo_link" placeholder="Link da foto" required>
            </div>

            <div class="form-label">
                <input type="text" class="form-control" id="localization" name="localization" placeholder="Estado (Rio de Janeiro, São Paulo...)" required>
            </div>

            <div class="form-label">
                <input type="text" class="form-control" id="health" name="health" placeholder="Estado de saúde" required>
            </div>

            <div class="form-label" id="brothers-container">
                <label for="brothers">Irmãos</label>
                <select id="brothers" name="brothers[]" multiple>
                    <?php
                        $brothers = $data['brothers'];

                        foreach ($brothers as $brother) { 
                    ?>

                            <option value="<?=$brother[0]?>"><?=$brother['name']?></option>                        

                    <?php
                        }
                    ?>
                </select>
            </div>

            <button class="btn">Cadastrar</button>

        </form>

    </div>

    <footer>

        <img src="<?= URL_IMG . '/logo.png' ?>" alt="logo">

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
