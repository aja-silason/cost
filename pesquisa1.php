<?php

require_once 'conexao_bd.php';

session_start();

if(!isset($_SESSION['logado'])):
    header('Location: index.php');

endif;

$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);

?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilohome.css"/>
    <link rel="stylesheet" href="css/estilomenu.css"/>
    <title>Pesquisa</title>
</head>
<body>
      
        <div class="menu">
                    
            <nav class="menu">
                <ul>
                    <li><div class="logomenu">
                        <h3 style="color: #061327;
                        font-size: 3em;
                        width: 15%;
                        margin-top: 0%;
                        margin-bottom: -2%;">QVP</h3>
                    </div></li>
                    
                        
                    <li><form method="post" class="formpesq" action="pesquisa.php">
                        <input type="search" placeholder="Quem você procura?" class="inputpesquisar"><input type="submit" value="Pesquisar" class="btnpesquisar">
                    </form></li>
                    <li><a href="home.php" class="active">Home</a></li>
                    <li><a href="perfil.php">Meu Perfil</a></li>
                    <li><a href="post.php"><li>Criar post</a></li>
                    <li><a href="yelp.php"><li>Yelp</a></li>
                    <li><p><?php echo $dados['nome'];?></p></li>
                    <li><img src=""></li>
                    <li><a href="logout.php"><li>Terminar Sessão</a></li>
                </ul>
            </nav>
        </div>
    <br>
        <div class="corpoedtperfil">
            <h3 class="titutocorpo">Resultado da Pesquisa</h3>
            <hr/>

        </div>

    </body>
</html>