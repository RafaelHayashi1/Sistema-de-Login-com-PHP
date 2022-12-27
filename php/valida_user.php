<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="container">
    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); //pegar dados de index.php form
    if (isset($dados) && !in_array("", $dados)) {
        if (file_exists("../json/usuarios.json")) { //se o arquivo json existir executar abaixo
            $arq = file_get_contents("../json/usuarios.json"); //pegar dados de arquivo json
            $arq = json_decode($arq, true); //transformar em matrix
            foreach ($arq as $a) { //loop para varrer matriz $arq = coluna $a = linha
                if ($a['user'] == $dados['user'] && $a['senha'] == $dados['senha']) { //user e senha para login
                    session_start(); //inicio sesseion
                    $_SESSION = array(
                        'user' => $a['user'],
                        'nome' => $a['nome'],
                        'email' => $a['email'],
                        'nivel' => $a['nivel'],
                        'horas_trab' => $a['horas_trab'],
                        'valor_r' => $a['valor_r'],
                        'total' => $a['total'],
                    );
                    header('Location: painel.php');
                }
            }
        }
    }

    if (!isset($_SESSION)) {
        echo "<div class='infor'> O usuário não existe no sistema!! </div>";
        echo " <a href='registro.php'> Crie o seu usuário clicando aqui! </a> </div>";
        header("Refresh: 5, url=../index.php");
    }

    ?>
</body>

</html>