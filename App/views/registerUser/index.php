<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href=<?= URL_CSS . '/register.css' ?> rel="stylesheet" />
    <title>Adote-me</title>
</head>
<body>
    
    <div id="background-register">

        <div id="container-register">

            <div id="password-error"></div>

            <img src=<?= URL_IMG . "/logo.png" ?> alt="logo" class="d-inline-block align-top">
            
            <span>Cadastrar</span>

            <form action="/User/register" method="post" id="form-register">

                <div class="form-label">
                    <input type="text" class="form-control" id="nome" name="name" placeholder="Nome" required>
                </div>

                <div class="form-label">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>

                <div class="form-label">
                    <input type="password" id="password1" class="form-control" name="password" placeholder="Senha" required>
                </div>

                <div class="form-label">
                    <input type="password" id="password2" class="form-control" name="passwordConfirmation" placeholder="Confirme a senha" required>
                </div>

                <div class="form-label">
                    <input type="submit" onclick="salvarUsuario()" class="form-control" value="Cadastrar">
                </div>

            </form>

            <a href="/">Já possui conta? <b>Faça login</b></a>

        </div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

    <script>

        let alertDiv = $('#password-error');

        let alert = (message, type) => {

            let wrapper = document.createElement('div');
            wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

            alertDiv.append(wrapper);
            
        }

        $('#form-register').submit((e) => {

            if ($('#password1').val() != $('#password2').val()) {

                e.preventDefault();

                alert('Digite a mesma senha!', 'danger');

            }
        });
    </script>
</body>
</html>