<?php

require_once 'conexao_bd.php';

session_start();

if(!isset($_SESSION['logado'])):
    header('Location: index.php');

endif;

$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";

$sms = "SELECT * FROM mensagem";

$resultadosms = mysqli_query($connect, $sms);        
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);


?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilohome.css"/>
    <link rel="stylesheet" href="css/estilomenu.css"/>
    <link rel="stylesheet" href="css/yelp.css"/>
    <title>Yelp</title>
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
            <div class="corpoyelp">
                <br>
                <li><p><?php echo $dados['nome'];?></p></li>
                <li><img src=""></li>
    <br>

            <h3 class="titutocorpo">Chat da comunidade</h3>
            <br>

            <div class="innermensagens">
                <?php              
                                            
                    while($exibirsms = mysqli_fetch_array($resultadosms)){
                        $idms = $exibirsms[0];
                        $sms = $exibirsms[1];
                        $datams = $exibirsms[2];
                        
                        print "<div class='mensagens'>";  
                            
                            print "<span>";print "<span>";
                            print "<span>";print "$sms";print "</span>";
                            print "<br>";
                            print "<span style='float:right; color: lightgray; margin-top: 2px;'>";print "$datams";print "<span>";

                        print "</div>";
                        print "<br>";                
                    }
                    
                    mysqli_close($connect);
                                        
                ?>
            </div>
            <br>
            <hr>
            <br>
            <div class="innersendmensagens">  
                <form method="POST" action="processaryelp.php">
  
                    <textarea class="textomensagem" placeholder="Escreva a sua mensagem" name="textomensagem"></textarea>
                    <ul>
                        <li><input type="" value="" class="btnlike" name="btnlike"></li>
                        <li><input type="" value="" class="btnimg" name="btnimg"></li>
                        <li><input type="" value="" class="btnhearth" name="btnhearth"></li>
                        <input type="submit" value="&UpArrow;" class="btnsend" name="btnsend">
                    </ul>
                                
                </form>
            </div>
        </div>

    </body>
</html>