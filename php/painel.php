<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Painel</title>
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
        if (session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }

        if(empty($_SESSION)){
            echo "<div> Você não pode acessar essa página!! </div>";
            unset($_SESSION);
            header("Refresh: 0.1, url=../index.php");
        }
    ?>
    <nav class="navbar navbar-dark bg-dark">
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link disabled">Olá, <?php echo $_SESSION['nome']?>!</a></li>
            <li style="<?php if($_SESSION['nivel']==1){echo "";}else{echo "display:none";} ?>;" class="nav-item"> <a href="nivel1.php" class="nav-link">Usúario</a> </li>
            <li style="<?php if($_SESSION['nivel']>=2){echo "";}else{echo "display:none";} ?>;" class="nav-item"> <a href="nivel2.php" class="nav-link">Salarios Funcionarios</a> </li>
            <li style="<?php if($_SESSION['nivel']==3){echo "";}else{echo "display:none";} ?>" class="nav-item">  <a href="nivel3.php" class="nav-link">Administração</a> </li>
            <li class="nav-item" id="sair">  <a href="sair.php"class="nav-link" style="position:absolute; right:1%">Sair</a> </li>
        </ul>
    </nav>
</body>
</html>