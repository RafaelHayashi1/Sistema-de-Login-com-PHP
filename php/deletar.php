<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" text="text/css">
    <title>Deletar Dados</title>
</head>

<body>
    <form class="container" method="post">
        <h2>Deseja deletar os dados?</h2>
        <input type="submit" name="Sim" id="Sim" value="Sim"
            style="background-color: #666;border-radius: 10px;"><br><br>
        <input type="submit" name="Não" id="Não" value="Não"
            style="background-color: #666;border-radius: 10px;"><br><br>
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
                header("Refresh: 1, url=nivel3.php");
                exit();
            }

            if ($_SESSION['nivel'] == 3) {
                extract($arq[$cod]);
            }

            //$cod = $cod;
            $sim = isset($_POST["Sim"]) ? $_POST["Sim"] : 0;
            $não = isset($_POST["Não"]) ? $_POST["Não"] : 0;
            if ($sim == "Sim") {
                unset($arq[$cod]);
                $arq = json_encode($arq);
                if (file_put_contents("../json/usuarios.json", $arq)) {
                    echo "<div class='accept'> Dados deletados com sucesso!</div>";
                    header("Refresh: 0.6, url=nivel3.php");
                    exit();
                }
            }
            if ($não == "Não") {
                header("Refresh: 0.1, url=nivel3.php");
            }
        } else {
            echo "<p class ='alert'>Você não tem permissão para estar aqui!<p>";
            header("Refresh: 0.1, url=painel.php");
        }
        ?>
    </form>
    </div>
    </div>
</body>

</html>