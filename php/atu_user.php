<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" text="text/css">
    <title>Atualizar Dados</title>
</head>

<body>
    <div class="container">
        <?php
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (empty($_SESSION)) {
            echo "<div> Você não pode acessar essa página!! </div>";
            unset($_SESSION);
            header("Refresh: 5, url=index.php");
        }
        if ($_SESSION['nivel'] == 3) {
            $cod = filter_input(INPUT_GET, "cod", FILTER_VALIDATE_INT);
            if (file_exists("../json/usuarios.json")) {
                $arq = file_get_contents("../json/usuarios.json");
                $arq = json_decode($arq, true);
            } else {
                echo "<div class='alert'> Não existe dados de usuário!! </div>";
                header("Refresh: 5, url=usuarios.php");
                exit();
            }


            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if (isset($dados)) {
                $cod = $dados['cod'];
                unset($dados['cadastrar'], $dados['cod']);

                $dados['senha'] = ($dados['senha']);
                $arq[$cod] = $dados;
                $arq = json_encode($arq);
                if (file_put_contents("../json/usuarios.json", $arq)) {
                    echo "<div class='accept'> Dados atualizados com sucesso!</div>";
                    header("Refresh: 1, url=nivel3.php");
                    exit();
                }

            }

            if ($_SESSION['nivel'] == 3) {
                extract($arq[$cod]);

                session_write_close();

            }

        } else {
            echo "<p class ='alert'>Você não tem permissão para estar aqui!<p>";
            header("Refresh: 0.1, url=painel.php");
        }

        ?>
        <div class="borda4">
            <h1 class="titulo">Atualização de usuários</h1>
            <form action="" method="post" id="borda">
                <div class="distancia">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $nome ?>">
                </div>
                <div class="distancia">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $email ?>">
                </div>
                <div class="distancia">
                    <label for="user">User</label>
                    <input type="text" name="user" id="user" value="<?php echo $user ?>">
                </div>
                <div class="distancia">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" value="<?php echo $senha ?>">
                </div>
                <div class="distancia">
                    <label for="nivel">Nível</label>
                    <select name="nivel">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                <input type="hidden" name="cod" value="<?php echo $cod ?>">
                <input type="submit" value="Atualizar" name="cadastrar" id="cadastrar">
            </form>
        </div>
    </div>
</body>

</html>