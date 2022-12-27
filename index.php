<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" text="text/css">
    <title>Document</title>
</head>

<body>

    <?php
    session_start();
    session_destroy();
    setcookie('PHPSESSID', null, -1, '/');
    ?>

    <form class="container" method="post" action="php/valida_user.php">
        <h2>Login</h2>
        <div id="borda2">
            <input type="text" name="user" id="user" class="distancia" placeholder="Usuário">
            <input type="password" name="senha" id="senha" class="distancia" placeholder="Senha">
            <input type='checkbox' onchange=Lembrarsenha(this); style='width:15px;'>Lembrar Senha
            <br><br>
            <input type="submit" name="enviar" id="enviar" value="Logar"><br><br>
            <a href="php/registro.php"><input type="button" value="Registro"></a>
        </div>
    </form>
    <script src="javascript/cookie_salvarSenha.js"></script>
</body>

</html>