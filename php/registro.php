<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <form class="container" method="post">
        <h2 class="strings">Cadastro De Usuários</h2>
        <div id="borda">
            <input type="text" name="nome" id="nome" class="distancia" placeholder="Nome"
                onkeypress="return nome_r(event)">
            <input type="text" name="email" id="email" class="distancia" placeholder="Email"
                onkeypress="return email_r(event)">
            <small id="textEmail"></small>
            <input type="text" name="user" id="user" class="distancia" placeholder="User"
                onkeypress="return senha_user(event)">
            <input type="password" name="senha" id="senha" class="distancia" placeholder="Senha"
                onkeypress="return senha_user(event)"><br><br>
            <input type="button" onclick="validar_form()" value="Validar formulario"><br><br>
            <input type="hidden" name="nivel" id="cadastrar" value="Cadastrar">
        </div>
        <div class="alert" id="texto" style="display:none;"></div>
        <?php
        $dados = filter_input_array(INPUT_POST);
        if (isset($dados) && !in_array("", $dados)) { //não deixar nenhum campo vazio.
            unset($dados['enviar']); //remove o tudo do formulario de name ='enviar';
            $dados['nivel'] = 1;
            $dados['horas_trab'] = 0;
            $dados['valor_r'] = 0;
            $dados['total'] = 0;
            if (file_exists("../json/usuarios.json")) { //se json existe
                $arq = file_get_contents("../json/usuarios.json");
                $arq = json_decode($arq, true); //vem como objeto se colocar true volta a ser matriz
                array_push($arq, $dados);
                $vlr_json = json_encode($arq);
                if (file_put_contents("../json/usuarios.json", $vlr_json)) { //se colocar o json no arquivo json exibir
                    echo "<div class='alert'>Castrado com sucesso!</div>";
                    header("Refresh:2,url=../index.php");
                } //voltar para o index.php depis de 5 sec
                else {
                    echo "Erro ao cadastrar";
                    header("Refresh:2,url=../index.php");
                }
            } else {
                $arq = array(0 => $dados);
                $arq['nivel'] = 1;
                $dados['horas_trab'] = 0;
                $dados['valor_r'] = 0;
                $dados['total'] = 0;
                $arq = json_encode($arq);
                if (file_put_contents("../json/usuarios.json", $arq)) {
                    echo "<div class'alert'> Cadastro realizado com sucesso!</div>";
                    header("Refresh: 1, url=../index.php");
                } else {
                    echo "<div class'alert'> Não foi possível cadastrar o usuário! </div>";
                    header("Refresh: 1, url=../index.php");
                }
            }
        }
        ?>
        <script type="text/javascript" src="../javascript/validar_form.js"></script>
    </form>
</body>

</html>