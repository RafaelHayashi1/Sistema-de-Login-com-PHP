<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Usúarios</title>
</head>

<body style="
    color: white;
    width: 100vw;
    height: 100vh;
    background: #282828;
    background: #252525;
    background: -webkit-radial-gradient(top right, #252525, #050505);
    background: -moz-radial-gradient(top right, #252525, #050505);
    background: radial-gradient(to bottom left, #252525, #050505);">
    <?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    if (empty($_SESSION)) {
        echo "<div> Você não pode acessar essa página!! </div>";
        unset($_SESSION);
        header("Refresh: 5, url=index.php");
    }
    ?>
    <nav class="navbar navbar-dark bg-dark">
        <ul class="nav nav-pills ">
            <li class="nav-item">
                <a class="nav-link" href="painel.php">
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sair.php" style="position:absolute; right:1%">Sair</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <div class="form-group">
            <?php
            if ($_SESSION['nivel'] == 3) {

                if (file_exists("../json/usuarios.json")) {
                    $arq = file_get_contents("../json/usuarios.json");
                    $arq = json_decode($arq, true);
                }

                echo "<h1>Lista De Usuários</h1>";
                echo "
        <table class='table' style='color: white;'>
        <thead class='thead-white'>
                    <tr>
                        <th>Moderadores</th>
                        <th>E-mail </th>
                        <th>Usuário </th>
                        <th>Nível</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>";
                foreach ($arq as $key => $dados) {
                    if ($dados['nivel'] == 2) {

                        echo "
                <tr>
                    <td> " . $dados['nome'] . "</td>
                    <td> {$dados['email']}</td>
                    <td> {$dados['user']}</td>
                    <td> {$dados['nivel']}</td>
                    <td>
                        <a href='atu_user.php?cod={$key}'  style='text-decoration: none; color:white'> Atualizar </a> ||
                        <a href='deletar.php?cod={$key}' style='text-decoration: none; color:white'> Excluir </a>
                    </td>
                </tr>
         
            
            ";

                    }
                }


                echo "
            <table class='table' style='color: white;'>
            <thead class='thead-white'>
                        <tr>
                            <th>Funcionarios</th>
                            <th>E-mail </th>
                            <th>Usuário </th>
                            <th>Nível</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>";
                foreach ($arq as $key => $dados) {
                    if ($dados['nivel'] == 1) {

                        echo "
            <tr>
                <td> " . $dados['nome'] . "</td>
                <td> {$dados['email']}</td>
                <td> {$dados['user']}</td>
                <td> {$dados['nivel']}</td>
                <td>
                    <a href='atu_user.php?cod={$key}'  style='text-decoration: none; color:white'> Atualizar </a> ||
                    <a href='deletar.php?cod={$key}' style='text-decoration: none; color:white'> Excluir </a>
                </td>
            </tr>
     
        ";
                    }
                }

            } else {
                echo "<p class ='alert'>Você não tem permissão para estar aqui!<p>";
                header("Refresh: 0.1, url=../index.php");
                exit();
            }
            ?>
        </div>
</body>

</html>