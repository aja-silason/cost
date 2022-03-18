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
    <link rel="stylesheet" href="css/post.css"/>
    <title>Post</title>
</head>
<body>
      
<div class="menuclass">
                
                <nav class="menu">
                    <ul>
                        <li><div class="logomenu">
                            <h3>QVP</h3>
                        </div></li>
                        
                            
                        <li><form method="get" class="formpesq" action="pesquisa.php">
                            <input type="search" placeholder="Quem você procura?" name="filtro" class="inputpesquisar" required><input type="submit" value="Pesquisar" class="btnpesquisar">
                        </form></li>
                        <li><a href="home.php" class="active">Home</a></li>
                        <li><a href="perfil.php">Meu Perfil</a></li>
                        <li><a href="post.php"><li>Criar post</a></li>
                        <li><a href="yelp.php"><li>Yelp</a></li>
                        
                        <li><a href="logout.php"><li>Sair</a></li>
                    </ul>
                </nav>
            </div>
        <br>
            <div class="corpopost">
                <br>
                <li><p><?php echo $dados['nome'];?></p></li>
                <li><img src=""></li>    
        
            <h3 class="titutocorpo">Criar Postagem</h3>

            <div class="campoposts">
                <div class="postfree">
                    <a href="postfree.php">
                        <img>
                        <h1>Publicação Grátis</h1>
                        <p>Fazer uma publicação grátis, obterás um alcance minimo de usuários.</p>
                    </a>
                </div>
                
                <div class="postpago">
                <a href="postpago.php">
                        <img>
                        <h1>Publicação Paga</h1>
                        <p>Fazer uma publicação paga, obterás um alcance amplo de todos os usuários do sistema.</p>
                    </a>
                </div>
            </div>
            


        </div>

    </body>
</html>