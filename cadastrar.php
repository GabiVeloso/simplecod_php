<?php
session_start();
ob_start();
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if ($btnCadUsuario) {
    include_once 'conexao.php';
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados);
    $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);

    $result_usuario = "INSERT INTO usuarios (nome,sobrenome,profissão,cargo atual, email, usuario, senha) VALUES (
					'" . $dados['nome'] . "',
                    '" . $dados['sobrenome'] . "',
                    '" . $dados['profissão'] . "',
                    '" . $dados['cargo atual'] . "',
					'" . $dados['email'] . "',
					'" . $dados['usuario'] . "',
					'" . $dados['senha'] . "'
					)";
    $resultado_usario = mysqli_query($conn, $result_usuario);
    if (mysqli_insert_id($conn)) {
        $_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
        header("Location: login.php");
    } else {
        $_SESSION['msg'] = "Erro ao cadastrar o usuário";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title> Cadastrar</title>
</head>

<body bgcolor="#E0F8F7">


    <h2>Cadastro</h2>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form method="POST" action="">
        <label>Nome</label>
        <input type="text" name="nome" placeholder="Digite o nome "><br><br>

        <label>Sobrenome</label>
        <input type="text" name="sobrenome" placeholder="Digite o sobrenome "><br><br>

        <label>Profissão</label>
        <input type="text" name="profissão" placeholder="Digite a profissão "><br><br>

        <label>Cargo Atual</label>
        <input type="text" name="cargo atual" placeholder="Digite o cargo atual"><br><br>

        <label>E-mail</label>
        <input type="text" name="email" placeholder="Digite o seu e-mail"><br><br>

        <label>Usuário</label>
        <input type="text" name="usuario" placeholder="Digite o usuário"><br><br>

        <label>Senha</label>
        <input type="password" name="senha" placeholder="Digite a senha"><br><br>

        <input type="submit" name="btnCadUsuario" value="Cadastrar"><br><br>

        Lembrou? <a href="login.php">Clique aqui</a> para logar

    </form>
</body>

</html>