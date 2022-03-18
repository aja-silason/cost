<?php

require_once 'conexao_bd.php';

session_start();

if(!isset($_SESSION['logado'])):
    header('Location: index.php');

endif;

$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";


        $filtro = isset($_GET['filtro'])?$_GET['filtro']:"";

        $sql = "SELECT * FROM postagem where nomepost like '%$filtro%' ";
        $sqln = "SELECT * FROM postagem where contatopost like '%$filtro%' ";
        $resultado = mysqli_query($connect, $sql);

        $resultadon = mysqli_query($connect, $sqln);
        
        $registrosn = mysqli_num_rows($resultadon);
        $registros = mysqli_num_rows($resultado);


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
    <link rel="stylesheet" href="css/pesquisar.css"/>
    
    <title>Pesquisar</title>
</head>
<body>
      
<div class="menuclass">
<div class="menuclass">
                
                <nav class="menu">
                    <ul>
                        <li><div class="logomenu">
                            <h3>QVP</h3>
                        </div></li>
                        
                            
                        <li><form method="get" class="formpesq" action="">
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
    <div class="corpohomeini">

    <h3 class='titutocorpo'><?php echo "<p>$registros Resultados encontrados com o nome '<i style=' font-weight: bold;'>$filtro</i>'</p>"; ?></h3>

    <h3 class='titutocorpo'><?php echo "<p>$registrosn Resultados encontrados com o número '<i style=' font-weight: bold;'>$filtro</i>'</p>"; ?></h3>

        <hr style="color: rgb(218, 218, 218);"/>

        <br>  
        
        <div class="innerconteudoini">   

            <?php              
                                            
                    while($exibirpst = mysqli_fetch_array($resultado) OR $exibirpst = mysqli_fetch_array($resultadon)){
                        
                        $idposts = $exibirpst[0];
                        $imagemposts = $exibirpst[1];
                        $nomepost = $exibirpst[2];
                        $contatopost = $exibirpst[5];
                        $datapost = $exibirpst[7];
                        
                            print "<div class='innerpstgemini'>";                     

                                    print "<div class='innerpostageminipesq'>";
                                        print "<img src='imagens/publicidade4.jpg'>";
                                    print "</div>";

                                    print "<div class='descricaoinipesq'>";

                                        echo "<p>De: ","<a href='#' style='font-weight: bold;'> $nomepost </a>"," feita em ", $datapost, "</p>";

                                        echo "<p> Nome: ","$nomepost","</p>";
                                        echo "<p>Tel: ","$contatopost","</p>";
                                        echo "<br>";
                                        
                                        
                                        echo "<form method='get' action='veritens.php?.$idposts'>
                                            <input type='search' name='idposts' value='$idposts' style='display: none;'/>
                                            <input type='submit' value='Ver a publicação...' class='link'/>
                                        </form>";

                                    print "</div>";
                                    
                            print "</div>";
                        
                }
                                    
            ?>

        </div>
        
    </div>

</body>
</html>