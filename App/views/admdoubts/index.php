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
                        <a class="nav-link active" href="/Adm/doubt">Mensagens de dúvidas</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/Adm/user">Usuários</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/Adm/kid">Crianças</a>
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

        <h4>Mensagens de dúvidas</h4>

        <table>

            <thead>
                <tr>
                    <th>Mensagem</th>
                    <th>Usuário</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>

            <?php
            
            $doubtMessages = $data['doubtMessages'];

            if (!empty($doubtMessages)) {

                foreach ($doubtMessages as $doubtMessage) { ?>
                 
                <tr class="doubt-info">
                    <td><?=$doubtMessage['message']?></td>
                    <td><?=$doubtMessage['name']?></td>
                    <td><?=$doubtMessage['email']?></td>
                    <td><?=$doubtMessage['whatsapp'] ? '<button type="button" value="'.$doubtMessage['message'].'-'.$doubtMessage['whatsapp'].'" class="btn modal-anwser" data-bs-toggle="modal" data-bs-target="#answer">Responder por whatsapp</button>' : '' ?></td>
                    <td>
                        <form action="<?= URL_BASE . '/Adm/deleteDoubt' ?>" method="post" class="form-edit-kid">
                            <input type="hidden" name="doubtId" value="<?=$doubtMessage['id']?>">

                            <button class="btn-edit" type="submit">
                                <img class="btn-edit-icon" src="<?= URL_IMG . '/delete.png' ?>" alt="Excluir" />
                            </button>
                        </form>
                    </td>
                </tr>

            <?php
                }
            }
            ?>

            </tbody>

        </table>

    </div>

    <footer>

        <img src="<?= URL_IMG . '/logo.png' ?>" alt="logo">

    </footer>

    <div class="modal fade" id="answer" tabindex="-1" aria-labelledby="answerLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="answerLabel">Responder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <b id="question"></b>
                    <textarea class="form-control" id="answerMessage" placeholder="resposta"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn" id="sendMessage">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="<?= URL_JS . 'jquery-3.4.1.min.js' ?>"></script>

    <script>

        var whatsapp;

        $(".doubt-info").find("td button").click(function() {
            var question = this.value.split("-")[0];
            whatsapp = this.value.split("-")[1];

            $('#question').text(question);
        });

        $('#sendMessage').click(function() {
            var message = $('#answerMessage').val();

            var win = window.open(`https://wa.me/55${whatsapp}?text=${message}`, '_blank');
        });

    </script>

</body>
</html>
