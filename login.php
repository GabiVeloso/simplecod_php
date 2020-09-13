    <?php
    session_start();
    ?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1">
        <meta name="author" content="">
        <meta name="format-detection" content="telephone=no">
        <meta name="description" content="">
        <title>Bem vindo ! Faça o seu Login!</title>
        <style>
            .div {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .login {
                font-size: 2em;
                font-family: arial;
                color: black;
            }
        </style>

    </head>

    <body bgcolor="#CEECF5">
        <div class="div">
            <div class="login">

                <h3 class="title has-text-grey">Área restrita, realize o seu login!</h3>
              
            </div>
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?> <form method="POST" action="valida.php">
                <label>Usuário</label>
                <input type="text" name="usuario" placeholder="Digite o seu usuário"><br><br>

                <label>Senha</label>
                <input type="password" name="senha" placeholder="Digite a sua senha"><br><br>

                <input type="submit" name="btnLogin" value="Acessar">
                <h4> </h4>
                <h4> </h4>
                <a href="cadastrar.php">Crie o seu cadastro aqui !</a>




            </form>
            <br><br><br>

    </body>

    </html>