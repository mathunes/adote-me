<?php
if (isset($data['mensagens'])) { ?>
  <div class="col-6">
    <div class="alert alert-danger" role="alert">
      <?php

      foreach ($data['mensagens'] as $mensagem) {
        echo $mensagem . "<br>";
      }

      ?>
    </div>
  </div>
<?php
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/login.css" rel="stylesheet" />
    <title>Adote-me</title>
</head>
<body>
    
    <div id="background-login">

        <div id="container-login">
            
            <img src="images/logo.png" alt="logo">

            <span>Entrar</span>

            <form action="<?= URL_BASE . '/Authentication/login' ?>" method="post">

                <div class="form-label">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>

                <div class="form-label">
                    <input type="password" class="form-control" name="password" placeholder="Senha">
                </div>

                <div class="form-label">
                    <input type="submit" class="form-control" value="Entrar">
                </div>

            </form>
           <div>
                <a href="/cadastrar">Não possui conta? <b>Cadastra-se</b></a>
           </div>

        </div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
