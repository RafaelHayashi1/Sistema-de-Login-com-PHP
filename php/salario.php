<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" text="text/css">
    <title>Salarios</title>
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
        if ($_SESSION['nivel'] >= 2) {
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
                $arq[$cod]['horas_trab'] = ($dados['horas_trab']);
                $arq[$cod]['valor_r'] = ($dados['valor_r']);
                $arq[$cod]['total']=($dados['horas_trab']*$dados['valor_r']);
                $arq = json_encode($arq);
                if (file_put_contents("../json/usuarios.json", $arq)) {
                    echo "<div class='accept'> Dados atualizados com sucesso!</div>";
                    header("Refresh: 1, url=nivel2.php");
                    exit();
                }

            }

            if ($_SESSION['nivel'] >= 2) {
                extract($arq[$cod]);

                session_write_close();

            }

        } else {
            echo "<p class ='alert'>Você não tem permissão para estar aqui!<p>";
            header("Refresh: 0.1, url=painel.php");
        }

        ?>
        <div id="borda4">
            <h1 class="titulo">Atualização de usuários</h1>
            <form action="" method="post">
                <div class="distancia">
                    <label for="nome">Horas Trabalhadas</label>
                    <input type="text" name="horas_trab" id="nome" value="<?php echo $horas_trab ?>">
                </div>
                <div class="distancia">
                    <label for="text">Valor Por Hora</label>
                    <input type="text" name="valor_r" id="email" value="<?php echo $valor_r ?>">
                </div>
                <input type="hidden" name="cod" value="<?php echo $cod ?>"><br>
                <input type="submit" value="Atualizar">
            </form>
        </div>
    </div>
</body>

</html>